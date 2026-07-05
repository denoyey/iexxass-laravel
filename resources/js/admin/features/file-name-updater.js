class FileNameUpdater {
    constructor() {
        this.bindEvents();
    }

    bindEvents() {
        document.addEventListener('change', (e) => {
            const input = e.target.closest('input[type="file"][onchange="updateFileName(this)"]');
            if (input) {
                input.removeAttribute('onchange');
                this.updateDisplay(input);
            } else if (e.target.matches('input[type="file"].file-name-updater')) {
                this.updateDisplay(e.target);
            }
        });
    }

    updateDisplay(input) {
        const container = input.closest('.flex.justify-center') || input.parentElement.parentElement;
        const display = container.querySelector('#file-name-display') || document.getElementById('file-name-display');

        if (display) {
            if (input.files && input.files.length > 0) {
                display.textContent = 'File terpilih: ' + input.files[0].name;
                display.classList.remove('hidden');
            } else {
                display.classList.add('hidden');
            }
        }
    }
}

export function initFileNameUpdater() {
    new FileNameUpdater();
}
