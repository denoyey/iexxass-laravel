import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initScrollAnimations() {
    const headers = document.querySelectorAll(".header");
    headers.forEach(header => {
        gsap.fromTo(header,
            { opacity: 0, y: 50, scale: 0.9 },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: header,
                    start: "top 80%",
                    once: true
                }
            }
        );
    });
}
