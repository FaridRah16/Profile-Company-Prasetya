document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.custom-header-wrapper');
    const updateHeader = () => {
        if (header) {
            header.classList.toggle('custom-header-scrolled', window.scrollY > 40);
        }
    };

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const heroItems = document.querySelectorAll(
        '.hero-home .hero-title, .hero-home .text-danger-emphasis, .hero-home .hero-subtitle, .hero-home .d-flex.flex-wrap.gap-3'
    );

    if (prefersReducedMotion) return;

    heroItems.forEach((item, index) => {
        item.classList.add('hero-entrance');
        item.style.setProperty('--entrance-delay', `${index * 120}ms`);
    });

    const revealTargets = document.querySelectorAll(
        '#profil-perusahaan .row.align-items-center, #layanan .text-center, .service-card-horizontal, .commitment-card, #armada .text-center, .car-card-modern, #cara-pemesanan .text-center, .step-item-card, .cta-banner-wrapper'
    );

    document.querySelectorAll('.service-card-horizontal, .car-card-modern, .step-item-card').forEach((card, index) => {
        card.style.setProperty('--reveal-delay', `${Math.min(index % 6, 5) * 80}ms`);
    });

    revealTargets.forEach((item) => item.classList.add('scroll-reveal'));
    document.documentElement.classList.add('motion-ready');

    if (!('IntersectionObserver' in window)) {
        revealTargets.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries, currentObserver) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                currentObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -36px 0px' });

    revealTargets.forEach((item) => observer.observe(item));
});
