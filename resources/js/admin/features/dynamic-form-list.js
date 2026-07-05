export class DynamicFormList {
    constructor(containerSelector, addBtnSelector, itemSelector, removeBtnSelector, dragHandleSelector) {
        this.container = document.querySelector(containerSelector);
        this.addBtn = document.querySelector(addBtnSelector);
        this.itemSelector = itemSelector;
        this.removeBtnSelector = removeBtnSelector;
        this.dragHandleSelector = dragHandleSelector;

        if (this.container && this.addBtn) {
            this.init();
        }
    }

    init() {
        this.addBtn.addEventListener('click', () => this.addRow());
        this.container.addEventListener('click', (e) => this.handleRemove(e));
        this.updateRemoveButtons();

        // Initialize SortableJS
        if (typeof window.Sortable !== 'undefined' && this.dragHandleSelector) {
            new window.Sortable(this.container, {
                handle: this.dragHandleSelector,
                animation: 150,
                ghostClass: 'bg-gray-100',
            });
        }
    }

    updateRemoveButtons() {
        const rows = this.container.querySelectorAll(this.itemSelector);
        rows.forEach((row) => {
            const btn = row.querySelector(this.removeBtnSelector);
            if (btn) {
                if (rows.length > 1) {
                    btn.classList.remove('hidden');
                } else {
                    btn.classList.add('hidden');
                }
            }
        });
    }

    addRow() {
        const firstRow = this.container.querySelector(this.itemSelector);
        if (!firstRow) return;

        const newRow = firstRow.cloneNode(true);
        const inputs = newRow.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            if (input.type === 'checkbox' || input.type === 'radio') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });

        this.container.appendChild(newRow);
        this.updateRemoveButtons();
    }

    handleRemove(e) {
        const btn = e.target.closest(this.removeBtnSelector);
        if (btn) {
            const rows = this.container.querySelectorAll(this.itemSelector);
            if (rows.length > 1) {
                btn.closest(this.itemSelector).remove();
                this.updateRemoveButtons();
            }
        }
    }
}

export function initDynamicFormList() {
    new DynamicFormList(
        '#features-container',
        '#btn-add-feature',
        '.feature-row',
        '.btn-remove-feature',
        '.drag-handle-feature'
    );
}
