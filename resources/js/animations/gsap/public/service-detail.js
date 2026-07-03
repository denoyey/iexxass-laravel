import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initServiceDetailAnimations() {
    // Select all service detail sections precisely
    const serviceSections = document.querySelectorAll('.service-detail-section');

    serviceSections.forEach(section => {
        // Find all elements we want to animate inside this section
        const items = section.querySelectorAll('.service-anim');

        if (items.length > 0) {
            // Pre-hide items immediately to prevent them from showing before scrolling
            gsap.set(items, { opacity: 0, y: 50, scale: 0.95 });

            // Animate them in sequence with a smooth stagger effect
            ScrollTrigger.create({
                trigger: section,
                start: "top 75%", // Trigger when the section is 75% in view
                once: true,
                onEnter: () => {
                    gsap.to(items, {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        duration: 0.8,
                        stagger: 0.15, // This is the secret to the smooth sequential "waterfall" effect
                        ease: "power2.out",
                        overwrite: "auto"
                    });
                }
            });
        }
    });

    // Custom GSAP Hover animations for service detail images to prevent CSS conflict
    const imageContainers = document.querySelectorAll(".service-image-container");
    imageContainers.forEach(container => {
        const glow = container.querySelector(".image-glow");
        const img = container.querySelector(".service-img");

        container.addEventListener("mouseenter", () => {
            if (glow) gsap.to(glow, { opacity: 1, duration: 0.7, ease: "power2.out" });
            if (img) gsap.to(img, { scale: 1.05, duration: 0.7, ease: "power2.out" });
        });
        container.addEventListener("mouseleave", () => {
            if (glow) gsap.to(glow, { opacity: 0, duration: 0.7, ease: "power2.out" });
            if (img) gsap.to(img, { scale: 1, duration: 0.7, ease: "power2.out" });
        });
    });
}
