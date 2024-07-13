<?php
namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        // Tambahkan pemeriksaan untuk memastikan data user ada
        if (!$user || !$user->email) {
            return redirect('login')->withErrors(['error' => 'Gagal mendapatkan data dari ' . $provider]);
        }

        // Logika untuk mencari atau membuat user baru
        $authUser = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name ?? 'Nama Tidak Tersedia', // Gunakan nilai default jika nama tidak tersedia
            'password' => bcrypt('your_random_password')
        ]);

        Auth::login($authUser, true);

        return redirect('/products');
    }
}
