import gsap from 'gsap';

export function initDropdown() {
    const langToggleBtn = document.getElementById('langToggleBtn');
    const langDropdown = document.getElementById('langDropdown');
    const langToggleIcon = document.getElementById('langToggleIcon');
    let isLangOpen = false;

    if (langToggleBtn && langDropdown) {
        langToggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            isLangOpen = !isLangOpen;
            if (isLangOpen) {
                langDropdown.classList.remove('hidden');
                gsap.to(langDropdown, { opacity: 1, duration: 0.2, y: 0, ease: "power2.out", startAt: { y: -10 } });
                langToggleBtn.setAttribute('aria-expanded', 'true');
                langToggleIcon.classList.add('rotate-180');
            } else {
                gsap.to(langDropdown, {
                    opacity: 0, duration: 0.2, y: -10, ease: "power2.in", onComplete: () => {
                        langDropdown.classList.add('hidden');
                    }
                });
                langToggleBtn.setAttribute('aria-expanded', 'false');
                langToggleIcon.classList.remove('rotate-180');
            }
        });

        document.addEventListener('click', (e) => {
            if (isLangOpen && !langToggleBtn.contains(e.target) && !langDropdown.contains(e.target)) {
                isLangOpen = false;
                gsap.to(langDropdown, {
                    opacity: 0, duration: 0.2, y: -10, ease: "power2.in", onComplete: () => {
                        langDropdown.classList.add('hidden');
                    }
                });
                langToggleBtn.setAttribute('aria-expanded', 'false');
                langToggleIcon.classList.remove('rotate-180');
            }
        });
    }
}
