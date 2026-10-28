(() => {
  'use strict';
  document.querySelectorAll('.favorite').forEach((button) => {
    button.addEventListener('click', () => {
      const selected = button.getAttribute('aria-pressed') !== 'true';
      button.setAttribute('aria-pressed', String(selected));
      const icon = button.querySelector('i');
      icon.classList.toggle('fa-solid', selected);
      icon.classList.toggle('fa-regular', !selected);
    });
  });
  const slider = document.querySelector('.review-slider');
  if (!slider) return;
  const track = slider.querySelector('.review-track');
  const slides = [...track.children];
  const dots = slider.querySelector('[data-review-dots]');
  const prev = slider.querySelector('[data-review-prev]');
  const next = slider.querySelector('[data-review-next]');
  const status = slider.querySelector('[data-review-status]');
  let index = 0;
  let visible = 1;
  function render() {
    visible = window.matchMedia('(min-width: 992px)').matches ? 3 : window.matchMedia('(min-width: 768px)').matches ? 2 : 1;
    const max = Math.max(0, slides.length - visible);
    index = Math.min(index, max);
    track.style.transform = `translateX(-${index * 100 / visible}%)`;
    slides.forEach((slide, i) => { slide.setAttribute('aria-hidden', String(i < index || i >= index + visible)); });
    prev.disabled = index === 0;
    next.disabled = index === max;
    // Preserve focused dot buttons during ordinary slide changes.
    if (dots.children.length !== max + 1) {
      dots.replaceChildren();
      for (let i = 0; i <= max; i++) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'review-dot';
        dot.setAttribute('aria-label', `Show reviews ${i + 1} to ${i + visible}`);
        dot.setAttribute('aria-controls', 'review-track');
        dot.addEventListener('click', () => { index = i; render(); });
        dots.append(dot);
      }
    }
    [...dots.children].forEach((dot, i) => dot.setAttribute('aria-current', String(i === index)));
    status.textContent = `Showing reviews ${index + 1} to ${index + visible} of ${slides.length}`;
  }
  prev.addEventListener('click', () => { index = Math.max(0, index - 1); render(); });
  next.addEventListener('click', () => { index = Math.min(slides.length - visible, index + 1); render(); });
  slider.addEventListener('keydown', (event) => {
    if (event.key === 'ArrowLeft') { event.preventDefault(); index = Math.max(0, index - 1); render(); }
    if (event.key === 'ArrowRight') { event.preventDefault(); index = Math.min(slides.length - visible, index + 1); render(); }
  });
  window.addEventListener('resize', render);
  render();
})();
