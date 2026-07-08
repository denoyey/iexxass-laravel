export function initContactForm() {
    const form = document.getElementById('contactForm');
    const statusMessage = document.getElementById('statusMessage');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    statusMessage.textContent = data.message;
                    form.reset();
                } else {
                    statusMessage.textContent = data.message || "Failed to send message.";
                }
                if (typeof grecaptcha !== 'undefined') {
                    grecaptcha.reset();
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                statusMessage.textContent = "Something went wrong!";
            });
    });
}
