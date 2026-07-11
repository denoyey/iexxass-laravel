import Sortable from 'sortablejs';

export function initProjectsAdmin() {
    // 2. Multi Image Gallery Preview Logic
    const imagesInput = document.getElementById('images');
    const galleryPreviewContainer = document.getElementById('gallery-preview-container');

    if (imagesInput && galleryPreviewContainer) {
        imagesInput.addEventListener('change', function () {
            galleryPreviewContainer.innerHTML = ''; // clear existing

            if (this.files && this.files.length > 0) {
                galleryPreviewContainer.classList.remove('hidden');

                Array.from(this.files).forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const div = document.createElement('div');
                            div.className = 'relative aspect-square rounded-lg overflow-hidden border border-gray-200';

                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'w-full h-full object-cover';

                            // Optional: add a visual delete button(would require more complex JS state management for the input.files array)
                            // For simplicity, we just show previews.If they want to remove one, they re - select files.

                            div.appendChild(img);
                            galleryPreviewContainer.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            } else {
                galleryPreviewContainer.classList.add('hidden');
            }
        });
    }



    // 4. Bulk Delete Logic
    const selectAllCheckbox = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
    const bulkDeleteForm = document.getElementById('bulkDeleteForm');
    const bulkDeleteIds = document.getElementById('bulkDeleteIds');
    const selectedCount = document.getElementById('selectedCount');

    if (selectAllCheckbox && bulkDeleteBtn) {
        const updateBulkDeleteState = () => {
            const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
            const count = checkedBoxes.length;

            if (count > 0) {
                bulkDeleteBtn.removeAttribute('disabled');
                selectedCount.textContent = `${count} dipilih`;
                selectedCount.classList.remove('hidden');
            } else {
                bulkDeleteBtn.setAttribute('disabled', 'true');
                selectedCount.classList.add('hidden');
            }
        };

        selectAllCheckbox.addEventListener('change', (e) => {
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = e.target.checked;
            });
            updateBulkDeleteState();
        });

        rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const allChecked = document.querySelectorAll('.row-checkbox:checked').length === rowCheckboxes.length;
                selectAllCheckbox.checked = allChecked;
                updateBulkDeleteState();
            });
        });

        bulkDeleteBtn.addEventListener('click', () => {
            const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
            if (checkedBoxes.length === 0) return;

            const ids = Array.from(checkedBoxes).map(cb => cb.value).join(',');

            window.dispatchEvent(new CustomEvent('open-delete-modal', {
                detail: {
                    action: bulkDeleteForm.getAttribute('action'),
                    message: `${checkedBoxes.length} project beserta seluruh gambarnya akan dihapus permanen!`,
                    inputs: [
                        { name: 'ids', value: ids }
                    ]
                }
            }));
        });
    }
}

// Global function for gallery image deletion (used in Edit Project blade)
window.confirmDeleteImage = function (id) {
    const form = document.getElementById('delete-image-form-' + id);
    if (form) {
        window.dispatchEvent(new CustomEvent('open-delete-modal', {
            detail: {
                action: form.getAttribute('action'),
                message: 'Gambar galeri ini akan dihapus permanen!'
            }
        }));
    }
};
