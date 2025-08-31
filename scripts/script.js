let isScrolling = false;
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.nav-link');

function updateActiveLink() {
    let current = '';

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        const sectionHeight = section.clientHeight;

        if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
            current = section.getAttribute('id');
        }
    });

    if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight - 10) {
        current = 'socials';
    }

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + current) {
            link.classList.add('active');
        }
    });
    
    isScrolling = false;
}

window.addEventListener('scroll', () => {
    if (!isScrolling) {
        isScrolling = true;
        requestAnimationFrame(updateActiveLink);
    }
});

let boxes = document.querySelectorAll(".progress-box");
let skillsAnimated = false; 

function load_bars() {
    if (skillsAnimated) return;
    skillsAnimated = true;
    
    boxes.forEach((box, index) => {
        let line = box.querySelector(".line");
        let increasing_percentage = box.querySelector(".increasing-percentage");
        let total_percentage = box.querySelector(".total-percentage");
        
        if (!line || !increasing_percentage || !total_percentage) return;
        
        let targetValue = parseInt(total_percentage.innerHTML);
        let p = 0;
        
        setTimeout(() => {
            let my_interval = setInterval(() => {
                p++;
                line.style.width = p + "%";
                increasing_percentage.innerHTML = p + "%";
                if (p >= targetValue) {
                    clearInterval(my_interval);
                }
            }, 25);
        }, index * 100);
    });
}

const skillsSection = document.getElementById('skills');
if (skillsSection) {
    const skillsObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !skillsAnimated) {
                load_bars();
                skillsObserver.unobserve(skillsSection);
            }
        });
    }, { threshold: 0.3, rootMargin: '0px 0px -100px 0px' });

    skillsObserver.observe(skillsSection);
}

const heroSection = document.querySelector('.hero');
let typedInstance = null;

if (heroSection) {
    const heroObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && typeof Typed !== 'undefined' && !typedInstance) {
                try {
                    typedInstance = new Typed('#typed', {
                        strings: ['Full Stack Web Developer'],
                        typeSpeed: 50,
                        backSpeed: 25,
                        loop: false,
                        showCursor: true,
                        cursorChar: '|',
                        onComplete: (self) => {
                            setTimeout(() => {
                                if (self.cursor) {
                                    self.cursor.remove();
                                }
                            }, 1000);
                        }
                    });
                    heroObserver.unobserve(heroSection);
                } catch (error) {
                    console.warn('Typed.js not loaded properly:', error);
                    heroObserver.unobserve(heroSection);
                }
            }
        });
    }, { threshold: 0.5 });

    heroObserver.observe(heroSection);
}

const hamburger = document.getElementById('hamburger');
const navMenu = document.querySelector('.nav-menu');

if (hamburger && navMenu) {
    hamburger.addEventListener('click', () => {
        const isActive = navMenu.classList.contains('active');
        
        navMenu.classList.toggle('active');
        hamburger.classList.toggle('open');
        
        hamburger.setAttribute('aria-expanded', !isActive);
        navMenu.setAttribute('aria-hidden', isActive);
        
        if (!isActive) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    });

    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
                hamburger.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
                navMenu.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }
        });
    });

    document.addEventListener('click', function(event) {
        const isClickInsideNav = navMenu.contains(event.target);
        const isClickOnHamburger = hamburger.contains(event.target);
        
        if (!isClickInsideNav && !isClickOnHamburger && navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
            hamburger.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
            navMenu.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
            hamburger.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
            navMenu.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }
    });
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const target = document.getElementById(targetId);
        
        if (target) {
            const headerHeight = document.querySelector('.header').offsetHeight;
            const targetPosition = target.offsetTop - headerHeight - 20;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    updateActiveLink();
    
    const contactBtn = document.getElementById("contact-btn");
    const contactForm = document.getElementById("contact-form");
    const contactFeedback = document.getElementById("contact-feedback");

    if (contactBtn && contactForm) {
        contactBtn.addEventListener("click", () => {
            const isVisible = contactForm.style.display === "flex";
            
            if (isVisible) {
                contactForm.style.display = "none";
                contactForm.setAttribute("aria-hidden", "true");
                contactBtn.setAttribute('aria-expanded', 'false');
            } else {
                contactForm.style.display = "flex";
                contactForm.setAttribute("aria-hidden", "false");
                contactBtn.setAttribute('aria-expanded', 'true');
                
                const firstInput = contactForm.querySelector('input[type="email"]');
                if (firstInput) {
                    setTimeout(() => firstInput.focus(), 100);
                }
            }
        });

        document.addEventListener('click', function(event) {
            const isClickInsideForm = contactForm.contains(event.target);
            const isClickOnButton = contactBtn.contains(event.target);
            
            if (!isClickInsideForm && !isClickOnButton && contactForm.style.display === "flex") {
                contactForm.style.display = "none";
                contactForm.setAttribute("aria-hidden", "true");
                contactBtn.setAttribute('aria-expanded', 'false');
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && contactForm.style.display === "flex") {
                contactForm.style.display = "none";
                contactForm.setAttribute("aria-hidden", "true");
                contactBtn.setAttribute('aria-expanded', 'false');
            }
        });
    }

    const params = new URLSearchParams(window.location.search);
    const status = params.get("status");

    if (status && contactFeedback) {
        let message = '';
        if (status === "success") {
            message = "✅ Message sent successfully!";
            contactFeedback.style.background = '#4CAF50';
        } else if (status === "error") {
            message = "❌ Message could not be sent. Please try again.";
            contactFeedback.style.background = '#f44336';
        }
        
        if (message) {
            contactFeedback.textContent = message;
            contactFeedback.classList.add("show");
            setTimeout(() => contactFeedback.classList.remove("show"), 5000);
        }
    }
    
    if (status) {
        const url = new URL(window.location);
        url.searchParams.delete('status');
        window.history.replaceState({}, document.title, url);
    }
});

let headerScrolling = false;
window.addEventListener('scroll', function() {
    if (!headerScrolling) {
        headerScrolling = true;
        requestAnimationFrame(() => {
            const header = document.querySelector('.header');
            if (header) {
                if (window.scrollY > 50) {
                    header.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
                    header.style.backdropFilter = 'blur(10px)';
                } else {
                    header.style.boxShadow = '0 2px 6px rgba(0,0,0,0.1)';
                    header.style.backdropFilter = 'none';
                }
            }
            headerScrolling = false;
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#contact-form form');
    if (form) {
        const emailInput = form.querySelector('input[type="email"]');
        const messageInput = form.querySelector('textarea');
        
        if (emailInput) {
            emailInput.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (this.value && !emailRegex.test(this.value)) {
                    this.style.borderColor = '#f44336';
                    this.title = 'Please enter a valid email address';
                } else {
                    this.style.borderColor = '#ccc';
                    this.title = '';
                }
            });
        }
        
        if (messageInput) {
            messageInput.addEventListener('input', function() {
                const charCount = this.value.length;
                const maxLength = 500;
                
                if (charCount > maxLength) {
                    this.style.borderColor = '#f44336';
                } else {
                    this.style.borderColor = '#ccc';
                }
            });
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const profileImg = document.querySelector('.profile-image');
    if (profileImg && !profileImg.complete) {
        profileImg.loading = 'eager';
    }
    
    if ('IntersectionObserver' in window) {
        const lazyImages = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
    }
});