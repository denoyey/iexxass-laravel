import gsap from 'gsap';

class PortfolioModal {
    constructor() {
        this.currentPortfolio = null;
        this.currentImageIndex = 0;
        this.isAnimating = false;

        this.elements = {
            overlay: document.getElementById('portfolioModalOverlay'),
            backdrop: document.getElementById('portfolioModalBackdrop'),
            content: document.getElementById('portfolioModalContent'),
            controls: document.getElementById('portfolioModalControls'),
            image: document.getElementById('portfolioModalImage'),
            indicators: document.getElementById('portfolioModalIndicators'),
            title: document.getElementById('portfolioModalTitle'),
            category: document.getElementById('portfolioModalCategory'),
            desc: document.getElementById('portfolioModalDesc'),
        };

        this.bindEvents();
    }

    bindEvents() {
        window.openPortfolioModal = this.open.bind(this);
        window.closePortfolioModal = this.close.bind(this);
        window.portfolioNextImage = this.nextImage.bind(this);
        window.portfolioPrevImage = this.prevImage.bind(this);
        window.goToPortfolioImage = this.goToImage.bind(this);
    }

    open(project) {
        this.currentPortfolio = project;
        this.currentImageIndex = 0;

        // Populate Data
        this.elements.title.innerText = project.title;
        this.elements.category.innerText = project.category;
        this.elements.desc.innerText = project.description;

        this.updateImage();
        this.setupIndicators();

        if (project.images.length > 1) {
            this.elements.controls.classList.remove('hidden');
        } else {
            this.elements.controls.classList.add('hidden');
        }

        // Display before animation
        this.elements.overlay.style.display = 'flex';

        // Prevent body scroll and pause Lenis smooth scroll
        document.body.classList.add('overflow-hidden');
        if (window.lenis) window.lenis.stop();

        // GSAP Animations
        gsap.to(this.elements.overlay, { duration: 0.1, autoAlpha: 1 });
        gsap.to(this.elements.backdrop, { duration: 0.3, opacity: 1, ease: "power2.out" });
        gsap.fromTo(this.elements.content,
            { y: 50, scale: 0.95, opacity: 0 },
            { duration: 0.4, y: 0, scale: 1, opacity: 1, ease: "back.out(1.2)", delay: 0.1 }
        );
    }

    close() {
        gsap.to(this.elements.content, { duration: 0.3, y: 30, scale: 0.95, opacity: 0, ease: "power2.in" });
        gsap.to(this.elements.backdrop, { duration: 0.3, opacity: 0, ease: "power2.in", delay: 0.1 });
        gsap.to(this.elements.overlay, {
            duration: 0.1,
            autoAlpha: 0,
            delay: 0.4,
            onComplete: () => {
                this.elements.overlay.style.display = 'none';

                // Restore body scroll and resume Lenis smooth scroll
                document.body.classList.remove('overflow-hidden');
                if (window.lenis) window.lenis.start();

                this.currentPortfolio = null;
            }
        });
    }

    nextImage() {
        if (!this.currentPortfolio || this.isAnimating) return;
        this.currentImageIndex = (this.currentImageIndex + 1) % this.currentPortfolio.images.length;
        this.transitionImage();
    }

    prevImage() {
        if (!this.currentPortfolio || this.isAnimating) return;
        this.currentImageIndex = (this.currentImageIndex - 1 + this.currentPortfolio.images.length) % this.currentPortfolio.images.length;
        this.transitionImage();
    }

    goToImage(index) {
        if (!this.currentPortfolio || this.currentImageIndex === index || this.isAnimating) return;
        this.currentImageIndex = index;
        this.transitionImage();
    }

    transitionImage() {
        this.isAnimating = true;
        gsap.to(this.elements.image, {
            duration: 0.2,
            opacity: 0.5,
            onComplete: () => {
                this.updateImage();
                gsap.to(this.elements.image, {
                    duration: 0.3,
                    opacity: 1,
                    onComplete: () => {
                        this.isAnimating = false;
                    }
                });
            }
        });
    }

    updateImage() {
        if (!this.currentPortfolio) return;
        this.elements.image.src = this.currentPortfolio.images[this.currentImageIndex];

        // Update dots
        const dots = document.querySelectorAll('.portfolio-dot');
        dots.forEach((dot, idx) => {
            gsap.to(dot, {
                duration: 0.3,
                width: idx === this.currentImageIndex ? 16 : 6,
                backgroundColor: idx === this.currentImageIndex ? "rgba(255,255,255,1)" : "rgba(255,255,255,0.5)"
            });
        });
    }

    setupIndicators() {
        this.elements.indicators.innerHTML = '';
        if (!this.currentPortfolio || this.currentPortfolio.images.length <= 1) return;

        this.currentPortfolio.images.forEach((_, idx) => {
            const dot = document.createElement('div');
            dot.className = 'portfolio-dot w-1.5 h-1.5 rounded-full cursor-pointer bg-white/50';
            dot.onclick = () => this.goToImage(idx);
            this.elements.indicators.appendChild(dot);
        });
    }
}

class ProjectsSlider {
    constructor() {
        this.slider = document.getElementById('projectsSlider');
        this.prevBtn = document.getElementById('projectsPrevBtn');
        this.nextBtn = document.getElementById('projectsNextBtn');
        this.leftOverlay = document.getElementById('projectsLeftOverlay');
        this.rightOverlay = document.getElementById('projectsRightOverlay');

        this.isSliderReady = false;

        if (!this.slider || !this.prevBtn || !this.nextBtn) return;

        this.bindEvents();
        this.initObserver();
        this.updateButtons();
    }

    bindEvents() {
        window.slideProjects = this.slide.bind(this);
        this.slider.addEventListener('scroll', this.updateButtons.bind(this));
        window.addEventListener('resize', this.updateButtons.bind(this));
    }

    initObserver() {
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                setTimeout(() => {
                    this.isSliderReady = true;
                    this.updateButtons();
                }, 1000);
                observer.disconnect();
            }
        }, { threshold: 0.2 });

        observer.observe(this.slider);
    }

    updateButtons() {
        if (!this.isSliderReady) {
            this.toggleVisibility(false, false);
            return;
        }

        if (this.slider.scrollWidth > this.slider.clientWidth) {
            const showLeft = this.slider.scrollLeft > 0;
            const showRight = Math.ceil(this.slider.scrollLeft + this.slider.clientWidth) < this.slider.scrollWidth - 1;
            this.toggleVisibility(showLeft, showRight);
        } else {
            this.toggleVisibility(false, false);
        }
    }

    toggleVisibility(showLeft, showRight) {
        if (showLeft) {
            this.prevBtn.classList.remove('opacity-0', 'pointer-events-none');
            this.leftOverlay.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            this.prevBtn.classList.add('opacity-0', 'pointer-events-none');
            this.leftOverlay.classList.add('opacity-0', 'pointer-events-none');
        }

        if (showRight) {
            this.nextBtn.classList.remove('opacity-0', 'pointer-events-none');
            this.rightOverlay.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            this.nextBtn.classList.add('opacity-0', 'pointer-events-none');
            this.rightOverlay.classList.add('opacity-0', 'pointer-events-none');
        }
    }

    slide(direction) {
        const cardElement = this.slider.querySelector('.portfolio-card');
        if (!cardElement) return;
        const cardWidth = cardElement.offsetWidth;
        const gap = window.innerWidth >= 768 ? 20 : 16;
        const scrollAmount = cardWidth + gap;

        this.slider.scrollBy({
            left: direction === 'left' ? -scrollAmount : scrollAmount,
            behavior: 'smooth'
        });
    }
}

export function initPortfolioModal() {
    new PortfolioModal();
}

export function initProjectsSlider() {
    new ProjectsSlider();
}
