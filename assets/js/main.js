document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.custom-header-wrapper');
    const updateHeader = () => {
        if (header) {
            header.classList.toggle('custom-header-scrolled', window.scrollY > 40);
        }
    };

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });

    const filterButtons = document.querySelectorAll('.filter-type-btn');
    const catalogItems = document.querySelectorAll('.car-catalog-item');
    const searchInput = document.querySelector('#carSearchInput');
    const noCarsFoundAlert = document.querySelector('#noCarsFoundAlert');
    let activeCatalogType = 'all';

    const catalogTypes = {
        mpv: ['mpv', 'lmpv'],
        suv: ['suv', 'compact suv', 'lsuv', 'crossover'],
        hatchback: ['hatchback']
    };

    const applyCatalogFilters = () => {
        if (!catalogItems.length) return;

        const searchTerm = (searchInput?.value || '').trim().toLowerCase();
        const allowedTypes = catalogTypes[activeCatalogType] || [];
        let visibleCount = 0;

        catalogItems.forEach((item) => {
            const carType = (item.dataset.type || '').toLowerCase();
            const carName = (item.dataset.name || '').toLowerCase();
            const matchesType = activeCatalogType === 'all' || allowedTypes.includes(carType);
            const matchesSearch = !searchTerm || carName.includes(searchTerm) || carType.includes(searchTerm);
            const isVisible = matchesType && matchesSearch;

            item.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount += 1;
        });

        if (noCarsFoundAlert) {
            noCarsFoundAlert.style.display = visibleCount ? 'none' : 'block';
        }
    };

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            activeCatalogType = (button.dataset.type || 'all').toLowerCase();

            filterButtons.forEach((filterButton) => {
                const isActive = filterButton === button;
                filterButton.classList.toggle('active', isActive);
                filterButton.classList.toggle('btn-primary-red', isActive);
                filterButton.classList.toggle('btn-outline-dark-custom', !isActive);
            });

            applyCatalogFilters();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', applyCatalogFilters);
    }

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
