function animateSectionOnScroll() {
    var section = document.querySelector('.about');
    var sectionPosition = section.getBoundingClientRect().top;
    var screenHeight = window.innerHeight;
  
    if (sectionPosition < screenHeight) {
      section.classList.add('animated');
    }
  }
  
  window.addEventListener('scroll', animateSectionOnScroll);