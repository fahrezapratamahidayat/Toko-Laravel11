import 'flowbite';
import Alpine from 'alpinejs';
import 'preline'
import './bootstrap';

window.Alpine = Alpine;

Alpine.start();

const modal = new HSOverlay(document.querySelector('#hs-basic-modal-update'));
const openBtn = document.querySelector('#hs-basic-modal-update');

openBtn.addEventListener('click', () => {
    modal.open();
});

// const openBtn = document.querySelector('#open-btn');

openBtn.addEventListener('click', () => {
    HSOverlay.open('#hs-basic-modal-update');
});