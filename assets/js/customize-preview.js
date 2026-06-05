(function () {
  'use strict';

  function scrollToTarget(selector) {
    var target = document.querySelector(selector);

    if (!target) {
      return false;
    }

    target.scrollIntoView({
      behavior: 'smooth',
      block: 'start',
    });

    return true;
  }

  function handleScrollMessage(selector) {
    if (!selector || typeof selector !== 'string') {
      return;
    }

    if (!scrollToTarget(selector)) {
      window.setTimeout(function () {
        scrollToTarget(selector);
      }, 500);
    }
  }

  if (wp.customize && wp.customize.preview) {
    wp.customize.preview.bind('remotiq-scroll-to', handleScrollMessage);
  }
})();
