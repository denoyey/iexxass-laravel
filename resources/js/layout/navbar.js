// Navbar Fixed
window.onscroll = function () {
    const header = document.querySelector("header");
    if (!header) return;
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
    } else {
        header.classList.remove("navbar-fixed");
    }
};

// Hamburger Menu
const hamburger = document.querySelector("#hamburger");
const navbar = document.querySelector("#nav-menu");

if (hamburger && navbar) {
    hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('hamburger-active');
        navbar.classList.toggle('hidden');
    });
}

// Smooth Scrolling Menu Links
document.querySelectorAll('.menu-link').forEach(link => {
    link.addEventListener('click', function (e) {
        const target = this.dataset.target;
        const section = document.getElementById(target);

        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
            history.pushState(null, '', window.location.pathname);
        }
    });
});
