//carousel
let currentIndex = 0;
  const slides = document.querySelectorAll('.carousel-item');
  
  function showSlide(index) {
    slides.forEach(slide => slide.style.transform = `translateX(-${index * 100}%)`);
  }

  function nextSlide() {
    currentIndex++;
    if (currentIndex >= slides.length) {
      currentIndex = 0;
    }
    showSlide(currentIndex);
  }

  function prevSlide() {
    currentIndex--;
    if (currentIndex < 0) {
      currentIndex = slides.length - 1;
    }
    showSlide(currentIndex);
  }

  setInterval(nextSlide, 10000); // Change slide every 10 seconds