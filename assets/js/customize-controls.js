(function ($) {
  'use strict';

  function getPreviewWindow() {
    var previewer = wp.customize.previewer;

    if (!previewer) {
      return null;
    }

    var iframe = null;

    if (previewer.container && previewer.container.length) {
      iframe = previewer.container.find('iframe')[0];
    }

    if (!iframe) {
      iframe = document.querySelector('#customize-preview iframe');
    }

    if (!iframe || !iframe.contentWindow) {
      return null;
    }

    try {
      var doc = iframe.contentWindow.document;

      if (!doc || !doc.body) {
        return null;
      }

      return iframe.contentWindow;
    } catch (error) {
      return null;
    }
  }

  function scrollInPreview(selector) {
    var previewWindow = getPreviewWindow();

    if (!previewWindow) {
      return false;
    }

    var doc = previewWindow.document;
    var target = doc.querySelector(selector);

    if (!target) {
      return false;
    }

    var header = doc.getElementById('header');
    var offset = header ? header.offsetHeight + 16 : 96;
    var top =
      target.getBoundingClientRect().top +
      (previewWindow.pageYOffset || previewWindow.scrollY || 0) -
      offset;

    previewWindow.scrollTo({
      top: Math.max(0, top),
      behavior: 'smooth',
    });

    return true;
  }

  function scrollPreviewTo(selector) {
    var attempts = 0;
    var maxAttempts = 12;

    var tryScroll = function () {
      attempts += 1;

      if (scrollInPreview(selector)) {
        return;
      }

      if (attempts < maxAttempts) {
        window.setTimeout(tryScroll, 250);
      }
    };

    if (
      wp.customize.previewer.deferred &&
      wp.customize.previewer.deferred.active &&
      typeof wp.customize.previewer.deferred.active.done === 'function'
    ) {
      wp.customize.previewer.deferred.active.done(tryScroll);
    } else {
      tryScroll();
    }
  }

  function bindScrollOnExpand(componentId, selector) {
    var component =
      wp.customize.section(componentId) || wp.customize.panel(componentId);

    if (!component) {
      return;
    }

    component.expanded.bind(function (isExpanded) {
      if (!isExpanded) {
        return;
      }

      var pageUrls =
        (typeof remotiqCustomizerScroll !== 'undefined' &&
          remotiqCustomizerScroll.pageUrls) ||
        {};
      var pageUrl = pageUrls[componentId];

      if (pageUrl && wp.customize.previewer && wp.customize.previewer.previewUrl) {
        wp.customize.previewer.previewUrl.set(pageUrl);
      }

      window.setTimeout(function () {
        scrollPreviewTo(selector);
      }, pageUrl ? 600 : 300);
    });
  }

  wp.customize.bind('ready', function () {
    if (
      typeof remotiqCustomizerScroll === 'undefined' ||
      !remotiqCustomizerScroll.targets
    ) {
      return;
    }

    $.each(remotiqCustomizerScroll.targets, function (componentId, selector) {
      bindScrollOnExpand(componentId, selector);
    });
  });
})(jQuery);
