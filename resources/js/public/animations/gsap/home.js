import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initScrollAnimations() {
Hero Section Initial Animation (Plays on page load)
    const heroElements = document.querySelectorAll(".hero-anim");
    if (heroElements.length >= 2) {
        const logo = heroElements[0];
        const title = heroElements[1];
        const rest = Array.from(heroElements).slice(2);

        const tl = gsap.timeline({ delay: 0.1 });

1. Logo comes from bottom to top
        tl.from(logo, {
            y: 60,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        })
2. Title slides out from left to right (as if emerging from logo)
            .from(title, {
                x: -80,
                opacity: 0,
                duration: 1,
                ease: "power3.out"
            }, "-=0.6")
3. Tagline and buttons fade in from below
            .from(rest, {
                y: 30,
                opacity: 0,
                duration: 0.8,
                stagger: 0.2,
                ease: "power3.out"
            }, "-=0.4");
    }

Sequential Stagger for Section Headers (About, Services)
    const sectionHeaders = document.querySelectorAll(".section-header");
    sectionHeaders.forEach(header => {
        const children = header.children;
        if (children.length > 0) {
            gsap.set(children, { opacity: 0, y: 30 });
            ScrollTrigger.create({
                trigger: header,
                start: "top 80%",
                once: true,
                onEnter: () => {
                    gsap.to(children, {
                        opacity: 1,
                        y: 0,
                        duration: 1,
                        stagger: 0.2,
                        ease: "power3.out",
                        overwrite: "auto"
                    });
                }
            });
        }
    });

    const headers = document.querySelectorAll(".header");
    if (headers.length > 0) {
        gsap.set(headers, { opacity: 0, y: 30, scale: 0.95 });
        headers.forEach(header => {
            ScrollTrigger.create({
                trigger: header,
                start: "top 80%",
                once: true,
                onEnter: () => {
                    gsap.to(header, {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        duration: 0.4,
                        ease: "power2.out",
                        overwrite: "auto"
                    });
                }
            });
        });
    }

Custom GSAP Hover animations & Scroll Entrance for cards
    const cards = document.querySelectorAll(".card, .portfolio-card");
    if (cards.length > 0) {
Entrance animation on scroll
        gsap.set(cards, { opacity: 0, y: 40, scale: 0.95 });
        ScrollTrigger.create({
            trigger: cards[0].parentElement, // The grid container
            start: "top 80%",
            once: true,
            onEnter: () => {
                gsap.to(cards, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.8,
                    stagger: 0.2, // Sequential stagger effect
                    ease: "power2.out",
                    overwrite: "auto"
                });
            }
        });
    }

GSAP Scroll Animation for Quote Elements
    const quoteElements = document.querySelectorAll(".quote-element");
    if (quoteElements.length > 0) {
        gsap.set(quoteElements, { opacity: 0, y: 40, scale: 0.95 });
        ScrollTrigger.create({
            trigger: quoteElements[0].parentElement,
            start: "top 80%",
            once: true,
            onEnter: () => {
                gsap.to(quoteElements, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 1,
                    stagger: 0.15,
                    ease: "power3.out",
                    overwrite: "auto"
                });
            }
        });
    }
}
