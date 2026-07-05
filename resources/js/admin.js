import './bootstrap';
import { initAdminModules } from './admin/index';
import Sortable from 'sortablejs';

window.Sortable = Sortable;

document.addEventListener('DOMContentLoaded', () => {
    initAdminModules();
});
