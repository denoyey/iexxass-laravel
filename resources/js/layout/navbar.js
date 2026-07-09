import gsap from 'gsap';

// Hamburger Menu
const hamburger = document.querySelector("#hamburger");
const navbar = document.querySelector("#nav-menu");

if (hamburger && navbar) {
    let isMenuOpen = false;

    hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('hamburger-active');
        isMenuOpen = !isMenuOpen;

        if (isMenuOpen) {
            navbar.classList.remove('hidden');
            gsap.fromTo(navbar,
                { opacity: 0, y: -20, scale: 0.95 },
                {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.4,
                    ease: 'power3.out'
                }
            );
        } else {
            gsap.to(navbar, {
                opacity: 0,
                y: -10,
                scale: 0.98,
                duration: 0.3,
                ease: 'power3.in',
                onComplete: () => {
                    navbar.classList.add('hidden');
                    gsap.set(navbar, { clearProps: "all" });
                }
            });
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function (e) {
        if (isMenuOpen && !hamburger.contains(e.target) && !navbar.contains(e.target)) {
            hamburger.classList.remove('hamburger-active');
            isMenuOpen = false;
            gsap.to(navbar, {
                opacity: 0,
                y: -10,
                scale: 0.98,
                duration: 0.3,
                ease: 'power3.in',
                onComplete: () => {
                    navbar.classList.add('hidden');
                    gsap.set(navbar, { clearProps: "all" });
                }
            });
        }
    });

    // Reset styles if resized to desktop to prevent transform conflicts
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && isMenuOpen) {
            hamburger.classList.remove('hamburger-active');
            navbar.classList.add('hidden');
            isMenuOpen = false;
            gsap.set(navbar, { clearProps: "all" });
        }
    });
}

// Smooth Scrolling Menu Links
document.querySelectorAll('.menu-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const target = this.dataset.target;
        const section = document.getElementById(target);

        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
            history.pushState(null, '', window.location.pathname);

            const hamburgerBtn = document.querySelector("#hamburger");
            if (hamburgerBtn && hamburgerBtn.classList.contains('hamburger-active')) {
                hamburgerBtn.click();
            }
        }
    });
});
