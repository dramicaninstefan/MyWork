const buttons = document.querySelectorAll('.faq-toggle');
const faqs = document.querySelector('.faq');

buttons.forEach((button) => {
  button.addEventListener('click', () => {
    button.parentNode.classList.toggle('active');
  });
});
