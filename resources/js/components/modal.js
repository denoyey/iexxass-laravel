// Modal Logic
window.openModal = function (modalId) {
    const el = document.getElementById(modalId);
    if (el) {
        el.style.display = 'block';
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
    }
}

window.closeModal = function (modalId) {
    const el = document.getElementById(modalId);
    if (el) {
        el.style.display = 'none';
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
    }
}
