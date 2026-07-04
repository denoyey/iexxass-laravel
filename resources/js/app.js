import './bootstrap';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
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

document.addEventListener("DOMContentLoaded", () => {
    // Initialize Lenis Smooth Scrolling
    const lenis = new Lenis();
    window.lenis = lenis; // Expose globally for modals to control

    // Sync Lenis with GSAP ScrollTrigger
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
});