import { initScrollAnimations } from './home';
import { initDropdown } from './dropdown';
import { initServiceDetailAnimations } from './service-detail';
import { initPortfolioModal, initProjectsSlider } from './projects';

export function initAnimations() {
    initScrollAnimations();
    initDropdown();
    initServiceDetailAnimations();
    initPortfolioModal();
    initProjectsSlider();
}
