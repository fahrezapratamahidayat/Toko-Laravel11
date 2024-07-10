<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view("products.products", compact("products"));
    }

    // public function adminIndex(Request $request)
    // {
    //     $search = $request->input('search');
    //     $category = $request->input('category');
    //     $minPrice = $request->input('min_price');
    //     $maxPrice = $request->input('max_price');
    //     $sort = $request->input('sort', 'name');
    //     $order = $request->input('order', 'asc');

    //     $query = Product::with('category');

    //     if (!empty($search)) {
    //         $query->search($search);
    //     }

    //     if (!empty($category)) {
    //         $query->where('category_id', $category);
    //     }

    //     if (!empty($minPrice)) {
    //         $query->where('price', '>=', $minPrice);
    //     }

    //     if (!empty($maxPrice)) {
    //         $query->where('price', '<=', $maxPrice);
    //     }

    //     $query->orderBy($sort, $order);

    //     $query = Product::query();

    //     if ($request->has('category_name') && !empty($request->category_name)) {
    //         $query->whereHas('category', function ($q) use ($request) {
    //             $q->where('name', 'like', '%' . $request->category_name . '%');
    //         });
    //     }

    //     $products = $query->paginate(10)->withQueryString();
    //     $categories = Category::all();

    //     $products = $query->paginate(10)->withQueryString();
    //     $categories = Category::all();

    //     return view("products.admin-products", compact("products", "categories"));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function adminIndex(Request $request)
    {
        // $query = Product::query();

        // if ($request->has('category') && !empty($request->category)) {
        //     $query->whereHas('category', function ($q) use ($request) {
        //         $q->where('name', $request->category);
        //     });
        // }

        // $products = $query->paginate(10)->withQueryString();
        // $categories = Category::all();

        // return view("products.admin-products", compact("products", "categories"));
        $categoryName = $request->input('category');

        if ($categoryName) {
            $category = Category::where('name', $categoryName)->firstOrFail();
            $products = $category->products()->paginate(10)->withQueryString();
        } else {
            $products = Product::paginate(10)->withQueryString();
        }

        $categories = Category::all();

        return view("products.admin-products", compact("products", "categories"));
    }
    public function create()
    {
        $categories = Category::all();
        return view("products.product-store", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|min:3|max:255',
                'description' => 'required',
                'price' => 'required',
                'brand' => 'required',
                'category_id' => 'required',
                'stock' => 'required|integer',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'name.required' => 'Nama Produk dibutuhkan',
                'name.min' => 'Minimal 3 karakter',
                'name.max' => 'Maksimal 150 karakter',
                'description.required' => 'Deskripsi dibutuhkan',
                'price.required' => 'Harga dibutuhkan',
                'brand.required' => 'Merek dibutuhkan',
                'category_id.required' => 'Kategori dibutuhkan',
                'stock.required' => 'Stok dibutuhkan',
                'image.required' => 'Gambar dibutuhkan',
                'image.image' => 'File harus berupa gambar',
                'image.mimes' => 'Gambar harus berformat: jpeg, png, jpg, gif, atau svg',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2048 kilobytes'
            ]);

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'slug' => Str::lower($request->name),
                'stock' => $request->stock,
            ];

            if ($image = $request->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $data['image'] = "$profileImage";
            }

            Product::create($data);
            return redirect('admin/products')->with('success', 'Produk berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('admin/products')->with('error', 'Terjadi kesalahan saat menyimpan produk: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::with('category')->find($product->id);
        return view("products.product-detail", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'min:3|max:255',
                'description' => 'min:3|max:255',
                'stock' => 'integer',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'name.min' => 'nama produk minimal 3 karakter',
                'name.max' => 'nama produk maksimal 150 karakter',
                'description.min'=> 'deskripsi minimal 3 karakter',
                'description.max'=> 'deskripsi maksimal 255 karakter',
                'image.image' => 'File harus berupa gambar',
                'image.mimes' => 'Gambar harus berformat: jpeg, png, jpg, gif, atau svg',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2048 kilobytes'
            ]);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $validatedData['image'] = $imageName;
            }

            $product->update($validatedData);
            return redirect('/admin/products')->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect('/admin/products')->with('error', 'Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect('/admin/products')->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/admin/products')->with('error', 'Terjadi kesalahan saat menghapus produk: ' . $e->getMessage());
        }
    }
}
