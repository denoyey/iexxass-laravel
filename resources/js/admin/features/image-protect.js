export function initImageProtect() {
    const isDashboard = document.getElementById('admin-sidebar') !== null;

    const images = document.querySelectorAll('img');
    images.forEach((img) => {
        img.setAttribute('draggable', 'false');

        if (!isDashboard) {
            img.addEventListener('contextmenu', (e) => {
                e.preventDefault();
            });
        }
    });
}
