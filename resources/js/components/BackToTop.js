/**
 * BackToTop.js
 * Object-Oriented Controller for the Back to Top Button
 */

export class BackToTopController {
    constructor(buttonId = 'backToTopBtn', scrollThreshold = 400) {
        this.button = document.getElementById(buttonId);
        this.scrollThreshold = scrollThreshold;

        if (this.button) {
            this.init();
        }
    }

    /**
     * Initialize event listeners
     */
    init() {
        this.bindEvents();
    }

    /**
     * Bind DOM events to class methods
     */
    bindEvents() {
        window.addEventListener('scroll', () => this.handleScroll());
        this.button.addEventListener('click', () => this.scrollToTop());
    }

    /**
     * Handle window scroll event
     */
    handleScroll() {
        if (window.scrollY > this.scrollThreshold) {
            this.showButton();
        } else {
            this.hideButton();
        }
    }

    /**
     * Display the button with animations
     */
    showButton() {
        this.button.classList.remove('opacity-0', 'translate-y-10', 'scale-90', 'pointer-events-none');
        this.button.classList.add('opacity-100', 'translate-y-0', 'scale-100');
    }

    /**
     * Hide the button with animations
     */
    hideButton() {
        this.button.classList.add('opacity-0', 'translate-y-10', 'scale-90', 'pointer-events-none');
        this.button.classList.remove('opacity-100', 'translate-y-0', 'scale-100');
    }

    /**
     * Smoothly scroll back to the top of the page
     */
    scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
}
