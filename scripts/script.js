// ScrollSpy for highlighting current section
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.nav-link');

function updateActiveLink() {
    let current = '';

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100; // adjust for fixed header
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + current) {
            link.classList.add('active');
        }
    });
}

// Run scrollspy on scroll
window.addEventListener('scroll', updateActiveLink);

// Skill progress bars
let boxes = document.querySelectorAll(".progress-box");

function load_bars() {
    boxes.forEach(box => {
        let line = box.querySelector(".line");
        let increasing_percentage = box.querySelector(".increasing-percentage");
        let total_percentage = box.querySelector(".total-percentage");
        let p = 0;
        let my_interval = setInterval(() => {
            p++;
            line.style.width = p + "%";
            increasing_percentage.innerHTML = p + "%";
            if (increasing_percentage.innerHTML == total_percentage.innerHTML) {
                clearInterval(my_interval);
            }
        }, 25);
    });
}

// Animate bars when Skills section is in view
const skillsSection = document.getElementById('skills');
const skillsObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            load_bars();
            skillsObserver.unobserve(skillsSection); // run only once
        }
    });
}, { threshold: 0.5 });

skillsObserver.observe(skillsSection);

// Hero Typed.js animation
const heroSection = document.querySelector('.hero');
const heroObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const typed = new Typed('#typed', {
                strings: ['Full Stack Web Developer'],
                typeSpeed: 50,
                backSpeed: 25,
                loop: false,
                showCursor: true,
                cursorChar: '|',
                onComplete: (self) => {
                    self.cursor.remove();
                }
            });
            heroObserver.unobserve(heroSection); // run only once
        }
    });
}, { threshold: 0.5 });

heroObserver.observe(heroSection);

// Main DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {

    // Initial ScrollSpy call
    updateActiveLink();

    // Contact form toggle
    const contactBtn = document.getElementById("contact-btn");
    const contactForm = document.getElementById("contact-form");

    contactBtn.addEventListener("click", () => {
        if (contactForm.style.display === "flex") {
            contactForm.style.display = "none";
            contactForm.setAttribute("aria-hidden", "true");
        } else {
            contactForm.style.display = "flex";
            contactForm.setAttribute("aria-hidden", "false");
        }
    });

    // Contact feedback messages
    const params = new URLSearchParams(window.location.search);
    const status = params.get("status");
    const feedback = document.getElementById("contact-feedback");

    if (status === "success") {
        feedback.textContent = "Message sent successfully!";
        feedback.classList.add("show");
        setTimeout(() => feedback.classList.remove("show"), 4000);
    } else if (status === "error") {
        feedback.textContent = "Message could not be sent. Try again.";
        feedback.classList.add("show");
        setTimeout(() => feedback.classList.remove("show"), 4000);
    }
});
