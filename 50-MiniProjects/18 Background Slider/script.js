const body = document.body;
const slides = document.querySelectorAll('.slide');
const leftBtn = document.getElementById('left');
const rightBtn = document.getElementById('right');

let ActiveSlide = 0;

rightBtn.addEventListener('click', () => {
  ActiveSlide++;

  if (ActiveSlide > slides.length - 1) {
    ActiveSlide = 0;
  }

  setBgToBody();
  setActiveSlide();
});

leftBtn.addEventListener('click', () => {
  ActiveSlide--;

  if (ActiveSlide < 0) {
    ActiveSlide = slides.length - 1;
  }

  setBgToBody();
  setActiveSlide();
});

setBgToBody();

function setBgToBody() {
  body.style.backgroundImage = slides[ActiveSlide].style.backgroundImage;
}

function setActiveSlide() {
  slides.forEach((slide) => {
    slide.classList.remove('active');
  });

  slides[ActiveSlide].classList.add('active');
}
