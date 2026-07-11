export function initSortable() {
    const containers = document.querySelectorAll('[data-sortable="true"]');

    if (containers.length === 0) return;

    containers.forEach(container => {
        const route = container.getAttribute('data-sortable-route');

        if (!route) {
            console.warn('SortableJS: data-sortable-route is missing on the container');
            return;
        }

        let debounceTimeout;

        new window.Sortable(container, {
            handle: '.drag-handle',
            animation: 150,
            ghostClass: 'bg-gray-100',
            onEnd: function (evt) {
                clearTimeout(debounceTimeout);

                debounceTimeout = setTimeout(() => {
                    const rows = container.querySelectorAll('[data-id]');
                    const order = Array.from(rows).map((row, index) => ({
                        id: row.getAttribute('data-id'),
                        position: index + 1
                    }));

                    fetch(route, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ order: order })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                if (window.showToast) {
                                    window.showToast('success', 'Berhasil!', data.message || 'Urutan data berhasil diperbarui.');
                                } else {
                                    console.log(data.message || 'Berhasil diperbarui');
                                }
                            } else if (data.error) {
                                if (window.showToast) {
                                    window.showToast('error', 'Gagal!', data.error || 'Terjadi kesalahan.');
                                } else {
                                    console.error(data.error);
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Error during sortable fetch:', error);
                            if (window.showToast) {
                                window.showToast('error', 'Gagal!', 'Terjadi kesalahan saat mengurutkan data.');
                            }
                        });
                }, 800);
            },
        });
    });
}
