(function ($) {
'use strict';

$(function () {
var $toggle = $('#mobileMenuToggle');
var $panel = $('#mobile-menu-panel');
$panel.attr('aria-hidden', 'true');

// Mobile menu toggle accessible state.
$toggle.on('click keypress', function (event) {
if (event.type === 'keypress' && event.key !== 'Enter' && event.key !== ' ') {
return;
}

event.preventDefault();
var isExpanded = $toggle.attr('aria-expanded') === 'true';
$toggle.attr('aria-expanded', !isExpanded);
if (isExpanded) {
$panel.removeClass('open').addClass('hidden');
$panel.attr('aria-hidden', 'true');
} else {
$panel.removeClass('hidden').addClass('open');
$panel.attr('aria-hidden', 'false');
}
});

// Close mobile menu when clicking links.
$panel.find('a').on('click', function () {
$toggle.attr('aria-expanded', false);
$panel.removeClass('open').addClass('hidden');
$panel.attr('aria-hidden', 'true');
});

// GSAP animations for sections.
if (typeof gsap !== 'undefined') {
gsap.registerPlugin(ScrollTrigger);

$('[data-animate]').each(function () {
var $el = $(this);
var animationType = $el.data('animate') || 'fade-up';
var delay = parseFloat($el.data('delay')) || 0;
var fromVars = { autoAlpha: 0, y: 40 };
var toVars = { duration: 1, autoAlpha: 1, y: 0, ease: 'power3.out', delay: delay };

if (animationType === 'fade-right') {
fromVars = { autoAlpha: 0, x: -40 };
toVars = { duration: 1, autoAlpha: 1, x: 0, ease: 'power3.out', delay: delay };
} else if (animationType === 'fade-left') {
fromVars = { autoAlpha: 0, x: 40 };
toVars = { duration: 1, autoAlpha: 1, x: 0, ease: 'power3.out', delay: delay };
}

gsap.fromTo(
$el,
fromVars,
Object.assign({}, toVars, {
scrollTrigger: {
trigger: $el[0],
start: 'top 80%',
toggleActions: 'play none none reverse',
},
})
);
});
}
});
})(jQuery);
