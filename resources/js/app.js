import './bootstrap';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import { initLenisAutoPrevent } from './components/lenis-auto-prevent';
import Lenis from 'lenis';
import L from 'leaflet';
import '@fontsource/abhaya-libre/400.css';
import '@fontsource/abhaya-libre/500.css';
import '@fontsource/abhaya-libre/600.css';
import '@fontsource/abhaya-libre/700.css';
import '@fontsource/abhaya-libre/800.css';
import 'leaflet/dist/leaflet.css';

gsap.registerPlugin(ScrollTrigger);

import './bootstrap';
import '@fontsource/abhaya-libre/400.css';
import '@fontsource/abhaya-libre/500.css';
import '@fontsource/abhaya-libre/600.css';
import '@fontsource/abhaya-libre/700.css';
import '@fontsource/abhaya-libre/800.css';
import 'leaflet/dist/leaflet.css';

// Import layout scripts (navbar, modal, backtotop)
import './layout/navbar';
import './components/modal';
import { BackToTopController } from './components/BackToTop';

// Import map initialization
import { initMap } from './components/map';

// Import specific page logic
import { initContactForm } from './pages/public/contact';

// Import GSAP animations
import { initAnimations } from './animations/gsap/index';

// Import Global Security Scripts
import { initImageSecurity } from './security/image-protection';
import PdfViewer from './components/PdfViewer';

// Ensure all resources (images, css, etc) and Custom Web Fonts are fully loaded
Promise.all([
    new Promise(resolve => {
        if (document.readyState === 'complete') {
            resolve();
        } else {
            window.addEventListener("load", resolve);
        }
    }),
    document.fonts.ready
]).then(() => {
    // Hide Page Loader if exists
    const loader = document.getElementById('page-loader');
    if (loader) {
        loader.style.transition = 'opacity 0.4s ease-out';
        loader.style.opacity = '0';
        setTimeout(() => loader.remove(), 400);
    }

    setTimeout(() => {
        const lenis = new Lenis();
        window.lenis = lenis;

        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((time) => {
            lenis.raf(time * 1000);
        });
        gsap.ticker.lagSmoothing(0);

        initAnimations();
        initMap();
        initContactForm();
        initImageSecurity();
        new BackToTopController();
        initLenisAutoPrevent();

        // Initialize PDF Viewers
        document.querySelectorAll('.pdf-viewer-instance').forEach(el => {
            const viewer = new PdfViewer(el);
            viewer.render();
        });
    }, 100);
});