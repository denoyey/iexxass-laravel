import { initScrollAnimations } from './public/home';
import { initDropdown } from './public/dropdown';
import { initServiceDetailAnimations } from './public/service-detail';

export function initAnimations() {
    initScrollAnimations();
    initDropdown();
    initServiceDetailAnimations();
}
