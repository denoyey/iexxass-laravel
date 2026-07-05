class MultiUploadModal {
    constructor() {
        this.modal = document.getElementById('editLogoModal');
        this.backdrop = document.getElementById('editLogoModalBackdrop');
        this.modalContent = document.getElementById('editLogoModalContent');
        this.closeBtns = document.querySelectorAll('.btn-close-modal');
        this.editForm = document.getElementById('editLogoForm');
        this.altInput = document.getElementById('edit_alt_text');

        if (!this.modal) return;
        this.baseRoute = this.modal.getAttribute('data-base-route');

        this.bindEvents();
    }

    bindEvents() {
        document.querySelectorAll('.btn-edit-logo').forEach(btn => {
            btn.addEventListener('click', (e) => this.handleEditClick(e.currentTarget));
        });

        this.closeBtns.forEach(btn => {
            btn.addEventListener('click', () => this.closeModal());
        });

        if (this.backdrop) {
            this.backdrop.addEventListener('click', () => this.closeModal());
        }
    }

    handleEditClick(btn) {
        const id = btn.getAttribute('data-logo-id');
        const alt = btn.getAttribute('data-alt-text');

        this.editForm.action = `${this.baseRoute}/${id}`;
        this.altInput.value = alt || '';

        // Trigger global AdminCropper or single-image event if necessary to reset preview
        const previewImg = document.getElementById('edit_image-preview');
        const resetBtn = document.getElementById('edit_image-btn-reset');
        if (previewImg && resetBtn) {
            resetBtn.click();
        }

        this.openModal();
    }

    openModal() {
        this.modal.classList.remove('hidden');
        setTimeout(() => {
            this.backdrop.classList.remove('opacity-0');
            this.modalContent.classList.remove('opacity-0', 'scale-95');
            this.modalContent.classList.add('scale-100');
        }, 10);
    }

    closeModal() {
        this.backdrop.classList.add('opacity-0');
        this.modalContent.classList.remove('scale-100');
        this.modalContent.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            this.modal.classList.add('hidden');
        }, 300);
    }
}

export function initMultiUploadModal() {
    new MultiUploadModal();
}
