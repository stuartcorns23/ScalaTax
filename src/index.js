// Mobile navigation toggle
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.site-header .site-nav');

  if (!toggle || !nav) {
    return;
  }

  const setOpen = (open) => {
    nav.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
    toggle.textContent = open ? '✕' : '☰';
  };

  toggle.addEventListener('click', () => {
    setOpen(!nav.classList.contains('is-open'));
  });

  // Close on Escape, returning focus to the button
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && nav.classList.contains('is-open')) {
      setOpen(false);
      toggle.focus();
    }
  });

  // Close when tapping outside the header
  document.addEventListener('click', (event) => {
    if (nav.classList.contains('is-open') && !event.target.closest('.site-header')) {
      setOpen(false);
    }
  });

  // Reset when resizing back up to the desktop layout
  window.matchMedia('(min-width: 1025px)').addEventListener('change', (event) => {
    if (event.matches) {
      setOpen(false);
    }
  });
});
