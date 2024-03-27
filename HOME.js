// slideshow.js
let currentSlide = 0;
showSlides();

function showSlides() {
    const slides = document.getElementsByClassName("slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    currentSlide++;
    if (currentSlide > slides.length) {
        currentSlide = 1;
    }
    slides[currentSlide - 1].style.display = "block";
    setTimeout(showSlides, 3000); // Change slides every 3 seconds (adjust as needed)
}