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

    // 3. Section Routing & ScrollSpy System
    const validSections = ['beranda', 'tentang', 'layanan', 'kinerja', 'informasi', 'disclaimer', 'kontak'];
    const trackedSections = validSections.map(id => ({
        id: id,
        el: document.getElementById(id)
    })).filter(item => item.el !== null);

    // Helper: Determine URL for section based on current path
    function getSectionUrl(sectionId) {
        if (!window.PPIP_CONFIG) return '#' + sectionId;
        const currentPath = window.location.pathname;
        if (currentPath.includes('/ppip')) {
            return window.PPIP_CONFIG.sectionBaseUrl + '/' + sectionId;
        }
        return window.PPIP_CONFIG.baseUrl + '/' + sectionId;
    }

    // Helper: Extract section ID from an anchor or element
    function getTargetSectionId(link) {
        if (!link) return null;
        const dataSec = link.getAttribute('data-section');
        if (dataSec && validSections.includes(dataSec)) {
            return dataSec;
        }
        const href = link.getAttribute('href');
        if (!href) return null;
        if (href.startsWith('#')) {
            const h = href.replace(/^#/, '');
            if (validSections.includes(h)) return h;
        }
        const match = href.match(/\/(beranda|tentang|layanan|kinerja|informasi|disclaimer|kontak)(?:$|\?|#)/);
        if (match && validSections.includes(match[1])) {
            return match[1];
        }
        return null;
    }

    // Helper: Update active class on all corresponding section links (navbar & footer)
    function setActiveNavLink(sectionId) {
        if (!sectionId) return;
        document.querySelectorAll('.nav-section-link, [data-section]').forEach(link => {
            const linkSec = getTargetSectionId(link);
            if (linkSec === sectionId) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    // Helper: Smooth scroll to specific section
    function scrollToSection(sectionId, smooth = true) {
        const targetSection = document.getElementById(sectionId);
        if (!targetSection) return;
        const navbarHeight = navbar ? navbar.offsetHeight : 80;
        const elementPosition = targetSection.getBoundingClientRect().top + window.scrollY;
        const offsetPosition = Math.max(0, elementPosition - navbarHeight + 5);

        window.scrollTo({
            top: offsetPosition,
            behavior: smooth ? 'smooth' : 'auto'
        });
    }

    let isManualClickScrolling = false;
    let manualScrollTimeout = null;
    let lastReportedSection = null;

    // ScrollSpy: Highlights active link and updates URL in address bar saat scroll
    function updateScrollSpy() {
        if (isManualClickScrolling) return;

        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;
        const documentHeight = Math.max(
            document.body.scrollHeight,
            document.documentElement.scrollHeight
        );
        const navbarHeight = navbar ? navbar.offsetHeight : 80;

        let currentActiveId = 'beranda';

        // 1. Jika sudah scroll mendekati bagian paling bawah halaman -> aktifkan Kontak
        if (scrollY + windowHeight >= documentHeight - 50) {
            currentActiveId = 'kontak';
        } else if (scrollY < 100) {
            // 2. Jika masih di bagian paling atas -> Beranda
            currentActiveId = 'beranda';
        } else {
            // 3. Deteksi section yang sedang berada di viewport
            // Trigger point: 30% dari tinggi layar atau tepat di bawah navbar
            const triggerPoint = Math.max(navbarHeight + 40, windowHeight * 0.32);

            for (let i = trackedSections.length - 1; i >= 0; i--) {
                const sec = trackedSections[i].el;
                const rect = sec.getBoundingClientRect();

                // Jika bagian atas section sudah mencapai trigger point dan section belum keluar dari viewport
                if (rect.top <= triggerPoint && rect.bottom > navbarHeight) {
                    currentActiveId = trackedSections[i].id;
                    break;
                }
            }
        }

        setActiveNavLink(currentActiveId);

        // Update URL di browser address bar secara dinamis saat scroll ke bawah atau ke atas
        if (currentActiveId !== lastReportedSection) {
            lastReportedSection = currentActiveId;
            const newUrl = getSectionUrl(currentActiveId);
            if (window.history && window.history.replaceState) {
                window.history.replaceState({ section: currentActiveId }, '', newUrl);
            }
        }
    }

    // Scroll event listener dengan requestAnimationFrame untuk performa optimal 60fps
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

    // 4. Smooth Scrolling saat klik menu navigasi / tombol section
    function handleSectionClick(e, sectionId) {
        e.preventDefault();
        setActiveNavLink(sectionId);

        // Update URL via pushState agar tercatat di history browser
        const newUrl = getSectionUrl(sectionId);
        if (window.history && window.history.pushState) {
            window.history.pushState({ section: sectionId }, '', newUrl);
        }
        lastReportedSection = sectionId;

        // Kunci update scrollspy sesaat saat transisi scroll berjalan
        isManualClickScrolling = true;
        if (manualScrollTimeout) clearTimeout(manualScrollTimeout);

        scrollToSection(sectionId, true);

        // Lepaskan kunci setelah smooth scroll selesai
        manualScrollTimeout = setTimeout(() => {
            isManualClickScrolling = false;
            updateScrollSpy();
        }, 850);

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

    // Pasang listener pada semua link section (.nav-section-link, data-section, atau href #section)
    document.querySelectorAll('.nav-section-link, [data-section], a[href^="#"]').forEach(link => {
        const secId = getTargetSectionId(link);
        if (secId) {
            link.addEventListener('click', function (e) {
                handleSectionClick(e, secId);
            });
        }
    });

    // Brand link (Logo PPIP) -> Beranda
    const brandLink = document.querySelector('.brand-wrapper');
    if (brandLink) {
        brandLink.addEventListener('click', function (e) {
            e.preventDefault();
            handleSectionClick(e, 'beranda');
        });
    }

    // Initial load check: jika membuka URL /ppip/tentang atau /tentang langsung
    function checkInitialSection() {
        let initSec = (window.PPIP_CONFIG && window.PPIP_CONFIG.activeSection) || 'beranda';
        
        const pathMatch = window.location.pathname.match(/\/(beranda|tentang|layanan|kinerja|informasi|disclaimer|kontak)/);
        if (pathMatch) {
            initSec = pathMatch[1];
        } else if (window.location.hash) {
            const h = window.location.hash.replace('#', '');
            if (validSections.includes(h)) initSec = h;
        }

        lastReportedSection = initSec;
        setActiveNavLink(initSec);

        if (initSec && initSec !== 'beranda') {
            setTimeout(() => {
                isManualClickScrolling = true;
                scrollToSection(initSec, false);
                setTimeout(() => {
                    isManualClickScrolling = false;
                    updateScrollSpy();
                }, 250);
            }, 100);
        }
    }

    checkInitialSection();
    window.addEventListener('load', function () {
        updateScrollSpy();
        if (lastReportedSection && lastReportedSection !== 'beranda') {
            scrollToSection(lastReportedSection, false);
        }
    });

    // 5. Dukungan tombol Back / Forward di browser
    window.addEventListener('popstate', function (e) {
        let sec = (e.state && e.state.section) ? e.state.section : null;
        if (!sec) {
            const match = window.location.pathname.match(/\/(beranda|tentang|layanan|kinerja|informasi|disclaimer|kontak)/);
            sec = match ? match[1] : 'beranda';
        }
        if (validSections.includes(sec)) {
            lastReportedSection = sec;
            setActiveNavLink(sec);
            isManualClickScrolling = true;
            scrollToSection(sec, true);
            setTimeout(() => {
                isManualClickScrolling = false;
            }, 850);
        }
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
