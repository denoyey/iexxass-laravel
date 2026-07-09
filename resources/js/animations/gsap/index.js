import { initScrollAnimations } from './public/home';
import { initDropdown } from './public/dropdown';
import { initServiceDetailAnimations } from './public/service-detail';
import { initPortfolioModal, initProjectsSlider } from './public/projects';

export function initAnimations() {
    initScrollAnimations();
    initDropdown();
    initServiceDetailAnimations();
    initPortfolioModal();
    initProjectsSlider();
}
