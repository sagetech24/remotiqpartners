document.addEventListener('DOMContentLoaded', () => {
  const yearEl = document.getElementById('year');
  if (yearEl) {
    yearEl.textContent = new Date().getFullYear();
  }

  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const iconOpen = document.getElementById('icon-open');
  const iconClose = document.getElementById('icon-close');
  const header = document.getElementById('header');
  const nav = document.getElementById('nav');

  if (menuToggle && mobileMenu && iconOpen && iconClose) {
    menuToggle.addEventListener('click', () => {
      const open = !mobileMenu.classList.contains('hidden');
      mobileMenu.classList.toggle('hidden');
      iconOpen.classList.toggle('hidden', !open);
      iconClose.classList.toggle('hidden', open);
      menuToggle.setAttribute('aria-expanded', String(open));
    });

    document.querySelectorAll('.mobile-link').forEach((link) => {
      link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        iconOpen.classList.remove('hidden');
        iconClose.classList.add('hidden');
        menuToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  const aboutSection = document.getElementById('about-us');
  if (aboutSection) {
    const cardContainer =
      aboutSection.querySelector('.about-cards') ||
      aboutSection.querySelector('.grid > div:first-child');

    if (cardContainer) {
      cardContainer.classList.add('about-cards');
      cardContainer.querySelectorAll(':scope > div').forEach((card) => {
        card.classList.add('about-card-animate');
      });

      document.documentElement.classList.add('js-about-animate');

      const revealAboutCards = () => {
        aboutSection.classList.add('is-visible');
        cardContainer.classList.add('is-visible');
      };

      if (!('IntersectionObserver' in window)) {
        revealAboutCards();
      } else {
        const aboutObserver = new IntersectionObserver(
          (entries, observer) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting && entry.intersectionRatio >= 0.25) {
                revealAboutCards();
                observer.disconnect();
              }
            });
          },
          {
            threshold: [0, 0.25, 0.5],
            rootMargin: '-12% 0px -12% 0px',
          }
        );

        aboutObserver.observe(cardContainer);
      }
    }
  }

  const valuesSection = document.getElementById('our-values');
  if (valuesSection) {
    const valuesCardContainer =
      valuesSection.querySelector('.values-cards') ||
      valuesSection.querySelector('.max-w-7xl > .flex.flex-col') ||
      valuesSection.querySelector('.max-w-7xl > div:last-child');

    if (valuesCardContainer) {
      valuesCardContainer.classList.add('values-cards');

      let cardIndex = 0;
      const valueCards =
        valuesCardContainer.querySelectorAll('article').length > 0
          ? valuesCardContainer.querySelectorAll('article')
          : valuesCardContainer.querySelectorAll('.grid > *');

      valueCards.forEach((card) => {
        card.classList.add('values-card-animate');
        card.style.setProperty('--values-card-delay', `${cardIndex * 0.2}s`);
        cardIndex += 1;
      });

      document.documentElement.classList.add('js-values-animate');

      const revealValuesCards = () => {
        valuesSection.classList.add('is-visible');
        valuesCardContainer.classList.add('is-visible');
      };

      if (!('IntersectionObserver' in window)) {
        revealValuesCards();
      } else {
        const valuesObserver = new IntersectionObserver(
          (entries, observer) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting && entry.intersectionRatio >= 0.25) {
                revealValuesCards();
                observer.disconnect();
              }
            });
          },
          {
            threshold: [0, 0.25, 0.5],
            rootMargin: '-12% 0px -12% 0px',
          }
        );

        valuesObserver.observe(valuesSection);
      }
    }
  }

  const servicesSection = document.getElementById('our-services');
  if (servicesSection) {
    const servicesCardContainer =
      servicesSection.querySelector('.services-cards') ||
      servicesSection.querySelector('.max-w-7xl > .grid:last-child');

    if (servicesCardContainer) {
      servicesCardContainer.classList.add('services-cards');

      let cardIndex = 0;
      const serviceCards =
        servicesCardContainer.querySelectorAll('article').length > 0
          ? servicesCardContainer.querySelectorAll('article')
          : servicesCardContainer.querySelectorAll(':scope > *');

      serviceCards.forEach((card) => {
        card.classList.add('services-card-animate');
        card.style.setProperty('--services-card-delay', `${cardIndex * 0.2}s`);
        cardIndex += 1;
      });

      document.documentElement.classList.add('js-services-animate');

      const revealServicesCards = () => {
        servicesSection.classList.add('is-visible');
        servicesCardContainer.classList.add('is-visible');
      };

      if (!('IntersectionObserver' in window)) {
        revealServicesCards();
      } else {
        const servicesObserver = new IntersectionObserver(
          (entries, observer) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting && entry.intersectionRatio >= 0.25) {
                revealServicesCards();
                observer.disconnect();
              }
            });
          },
          {
            threshold: [0, 0.25, 0.5],
            rootMargin: '-12% 0px -12% 0px',
          }
        );

        servicesObserver.observe(servicesSection);
      }
    }
  }

  if (header && nav) {
    const scrollThreshold = () => window.innerHeight * 0.05;

    window.addEventListener(
      'scroll',
      () => {
        const scrolled = window.scrollY > scrollThreshold();
        nav.classList.toggle('is-scrolled', scrolled);
        header.classList.toggle('shadow-md', scrolled);
      },
      { passive: true }
    );
  }
});
