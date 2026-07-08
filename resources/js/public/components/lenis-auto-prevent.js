export function initLenisAutoPrevent() {
    const checkLenisScroll = () => {
        const containers = document.querySelectorAll('.lenis-auto-prevent');
        containers.forEach(container => {
            if (container.scrollHeight > container.clientHeight) {
                container.setAttribute('data-lenis-prevent', 'true');
            } else {
                container.removeAttribute('data-lenis-prevent');
            }
        });
    };

    checkLenisScroll();
    window.addEventListener('resize', checkLenisScroll);

Timeout to ensure content is fully rendered before checking
    setTimeout(checkLenisScroll, 100);
    setTimeout(checkLenisScroll, 500);
}
