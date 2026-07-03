import './bootstrap';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
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

// Import layout scripts (navbar, modal)
import './layout/navbar';
import './components/modal';

// Import map initialization
import { initMap } from './components/map';

// Import specific page logic
import { initContactForm } from './pages/public/contact';

// Import GSAP animations
import { initAnimations } from './animations/gsap/index';

document.addEventListener("DOMContentLoaded", () => {
    initAnimations();
    initMap();
    initContactForm();
});