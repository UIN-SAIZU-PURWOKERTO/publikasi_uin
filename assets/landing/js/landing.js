/**
 * PPIP LPPM UIN Saizu Purwokerto - Landing Page Scripts
 * Interactive behaviors, modals, smooth scroll, scrollspy, and mobile navigation
 */

document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('siteNavbar');
    const navLinks = document.getElementById('navLinks');
    const mobileToggle = document.getElementById('mobileToggle');

    // 1. Navbar Scroll Effect (Glassmorphism shadow saat scroll)
    function handleNavbarScroll() {
        if (!navbar) return;
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
    window.addEventListener('scroll', handleNavbarScroll, { passive: true });
    handleNavbarScroll();

    // 2. Mobile Menu Toggle
    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener('click', function () {
            navLinks.classList.toggle('active');
            const icon = mobileToggle.querySelector('i');
            if (icon) {
                if (navLinks.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
        });
    }

    // 3. ScrollSpy & Menu Nav Active Highlight
    const navAnchors = document.querySelectorAll('#navLinks a[href^="#"]');
    const trackedSections = [
        { id: 'beranda', el: document.getElementById('beranda') },
        { id: 'tentang', el: document.getElementById('tentang') },
        { id: 'layanan', el: document.getElementById('layanan') },
        { id: 'kinerja', el: document.getElementById('kinerja') },
        { id: 'informasi', el: document.getElementById('informasi') },
        { id: 'kontak', el: document.getElementById('kontak') }
    ].filter(item => item.el !== null);

    function setActiveNavLink(hash) {
        if (!hash) return;
        navAnchors.forEach(link => {
            if (link.getAttribute('href') === hash) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    let isManualClickScrolling = false;
    let manualScrollTimeout = null;

    function updateScrollSpy() {
        if (isManualClickScrolling) return;

        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;
        const documentHeight = Math.max(
            document.body.scrollHeight,
            document.documentElement.scrollHeight
        );
        const navbarHeight = navbar ? navbar.offsetHeight : 80;

        // Jika scroll mencapai bagian paling bawah halaman -> aktifkan Kontak
        if (scrollY + windowHeight >= documentHeight - 60) {
            setActiveNavLink('#kontak');
            return;
        }

        // Jika berada di dekat bagian paling atas -> aktifkan Beranda
        if (scrollY < 120) {
            setActiveNavLink('#beranda');
            return;
        }

        // Tentukan section yang posisinya sedang berada di viewport
        const checkPosition = scrollY + navbarHeight + 80;
        let currentActiveId = 'beranda';

        for (let i = 0; i < trackedSections.length; i++) {
            const sec = trackedSections[i].el;
            const top = sec.offsetTop;
            const height = sec.offsetHeight;

            if (checkPosition >= top && checkPosition < top + height) {
                currentActiveId = trackedSections[i].id;
                break;
            } else if (checkPosition >= top) {
                currentActiveId = trackedSections[i].id;
            }
        }

        setActiveNavLink('#' + currentActiveId);
    }

    // Event listener scroll dengan requestAnimationFrame
    let ticking = false;
    window.addEventListener('scroll', function () {
        if (!ticking) {
            window.requestAnimationFrame(function () {
                updateScrollSpy();
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });

    // Initial check
    updateScrollSpy();
    window.addEventListener('load', updateScrollSpy);

    // 4. Smooth Scrolling saat klik menu tab atas
    navAnchors.forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetHash = this.getAttribute('href');
            if (!targetHash || targetHash === '#' || !targetHash.startsWith('#')) return;

            const targetSection = document.querySelector(targetHash);
            if (targetSection) {
                e.preventDefault();

                // Langsung sorot menu yang diklik
                setActiveNavLink(targetHash);

                // Kunci update scrollspy sesaat saat transisi scroll berjalan
                isManualClickScrolling = true;
                if (manualScrollTimeout) clearTimeout(manualScrollTimeout);

                const navbarHeight = navbar ? navbar.offsetHeight : 80;
                const elementPosition = targetSection.getBoundingClientRect().top + window.scrollY;
                const offsetPosition = Math.max(0, elementPosition - navbarHeight + 5);

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                // Lepaskan kunci setelah smooth scroll selesai
                manualScrollTimeout = setTimeout(() => {
                    isManualClickScrolling = false;
                    updateScrollSpy();
                }, 800);

                // Tutup menu mobile jika sedang terbuka
                if (navLinks && navLinks.classList.contains('active')) {
                    navLinks.classList.remove('active');
                    if (mobileToggle) {
                        const icon = mobileToggle.querySelector('i');
                        if (icon) {
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        }
                    }
                }
            }
        });
    });

    // Smooth scroll juga untuk anchor internal selain navbar (misal tombol di Hero)
    document.querySelectorAll('a[href^="#"]:not(#navLinks a)').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (!targetId || targetId === '#' || !targetId.startsWith('#')) return;
            const targetEl = document.querySelector(targetId);
            if (targetEl) {
                e.preventDefault();
                const navbarHeight = navbar ? navbar.offsetHeight : 80;
                const elementPosition = targetEl.getBoundingClientRect().top + window.scrollY;
                const offsetPosition = Math.max(0, elementPosition - navbarHeight + 5);

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // 5. Generic Modal Handlers
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Attach open buttons
    document.querySelectorAll('[data-open-modal]').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const modalId = this.getAttribute('data-open-modal');
            openModal(modalId);
        });
    });

    // Attach close buttons
    document.querySelectorAll('.ppip-modal-close, [data-close-modal]').forEach(btn => {
        btn.addEventListener('click', function () {
            const modal = this.closest('.ppip-modal');
            if (modal) {
                closeModal(modal.id);
            }
        });
    });

    // Close when clicking outside of modal card
    document.querySelectorAll('.ppip-modal').forEach(modal => {
        modal.addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });

    // Escape key closes modals
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.ppip-modal.active').forEach(modal => {
                closeModal(modal.id);
            });
        }
    });

    // 6. Animated Counter Effect for Stats
    const countElements = document.querySelectorAll('[data-counter]');
    if (countElements.length > 0 && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const targetCount = parseInt(el.getAttribute('data-counter'), 10) || 0;
                    const suffix = el.getAttribute('data-suffix') || '';
                    animateCounter(el, targetCount, suffix);
                    obs.unobserve(el);
                }
            });
        }, { threshold: 0.5 });

        countElements.forEach(el => observer.observe(el));
    }

    function animateCounter(element, target, suffix) {
        let current = 0;
        const duration = 1500;
        const stepTime = 20;
        const steps = duration / stepTime;
        const increment = target / steps;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target.toLocaleString('id-ID') + suffix;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString('id-ID') + suffix;
            }
        }, stepTime);
    }
});
