import './bootstrap';


window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
    } else {
        header.classList.remove("navbar-fixed");
    }
};

const hamburger = document.querySelector("#hamburger");
const navbar = document.querySelector("#nav-menu");

hamburger.addEventListener('click' , function(){
    hamburger.classList.toggle('hamburger-active');
    navbar.classList.toggle('hidden');
});

document.querySelectorAll('.menu-link').forEach(link => {
    link.addEventListener('click', function () {
        const target = this.dataset.target;
        const section = document.getElementById(target);

        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
            history.pushState(null, '', window.location.pathname);
        }
    });
});

   window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    // document.onkeydown = function(event) {
    //     event = event || window.event;
    //     if (event.key === 'Escape') {
    //         document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    //         let modals = document.getElementsByClassName('modal');
    //         Array.prototype.slice.call(modals).forEach(i => {
    //             i.style.display = 'none'
    //         })
    //     }
    // };

      const form = document.getElementById('contactForm');
    const statusMessage = document.getElementById('statusMessage');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // cegah reload

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // tampilkan pesan sukses / error
            if(data.success){
                statusMessage.textContent = data.message;
                form.reset(); // reset form
                // reset form 
                document.querySelector("#contactForm").reset();
                // reset reCAPTCHA
                grecaptcha.reset();
            } else {
                statusMessage.textContent = "Failed to send message.";
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            statusMessage.textContent = "Something went wrong!";
        });
    });


    document.addEventListener("DOMContentLoaded", () => {
    const headers = document.querySelectorAll(".header");

    const observer = new IntersectionObserver(
        entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                    observer.unobserve(entry.target); // animasi hanya sekali
                }
            });
        },
        {
            threshold: 0.3
        }
    );

    headers.forEach(header => observer.observe(header));
});