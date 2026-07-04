import gsap from 'gsap';

function getScrollbarWidth() {
    return window.innerWidth - document.documentElement.clientWidth;
}

window.openModal = function (modalId) {
    const el = document.getElementById(modalId);
    if (el) {
        const scrollbarWidth = getScrollbarWidth();
        const body = document.body;
        const header = document.querySelector('header');

        body.style.paddingRight = `${scrollbarWidth}px`;
        if (header) {
            header.style.paddingRight = `${scrollbarWidth}px`;
        }

        body.classList.add('overflow-y-hidden');

        el.style.display = 'block';

        gsap.fromTo(el,
            { opacity: 0 },
            { opacity: 1, duration: 0.3, ease: 'power2.out' }
        );
    }
}

window.closeModal = function (modalId) {
    const el = document.getElementById(modalId);
    if (el) {
        gsap.to(el, {
            opacity: 0,
            duration: 0.25,
            ease: 'power2.in',
            onComplete: () => {
                el.style.display = 'none';

                const body = document.body;
                const header = document.querySelector('header');

                body.classList.remove('overflow-y-hidden');
                window.lenis?.start();

                body.style.paddingRight = '';
                if (header) {
                    header.style.paddingRight = '';
                }

                gsap.set(el, { clearProps: "all" });
            }
        });
    }
}
