export function initImageSecurity() {
    // 1. Mencegah Klik Kanan (Context Menu) pada semua gambar
    document.addEventListener('contextmenu', function (e) {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
        }
    });

    // 2. Mencegah Drag & Drop pada semua gambar
    document.addEventListener('dragstart', function (e) {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
        }
    });

    // 3. Fungsi untuk menerapkan atribut CSS keamanan secara paksa ke elemen <img>
    const protectImages = () => {
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            // Atribut HTML bawaan
            img.setAttribute('draggable', 'false');

            // Properti CSS untuk menonaktifkan seleksi dan drag
            img.style.userSelect = 'none';
            img.style.webkitUserSelect = 'none';
            img.style.mozUserSelect = 'none';
            img.style.msUserSelect = 'none';

            // Spesifik untuk browser berbasis WebKit (Chrome, Safari, iOS)
            img.style.webkitUserDrag = 'none';

            // Mencegah menu pop-up saat gambar ditahan (long-press) di perangkat mobile/iOS
            img.style.webkitTouchCallout = 'none';
        });
    };

    // Jalankan perlindungan saat fungsi dipanggil pertama kali
    protectImages();

    // 4. MutationObserver: Memantau jika ada gambar baru yang dimuat secara dinamis 
    // (misalnya oleh animasi, lazy load, atau script lain) dan langsung mengamankannya.
    const observer = new MutationObserver((mutations) => {
        let shouldProtect = false;
        for (let mutation of mutations) {
            if (mutation.addedNodes.length > 0) {
                shouldProtect = true;
                break;
            }
        }
        if (shouldProtect) {
            protectImages();
        }
    });

    observer.observe(document.body, { childList: true, subtree: true });
}
