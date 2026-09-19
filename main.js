/* ==========================================================================
   SUITE UNICO — Global JavaScript (main.js)
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Caricamento dinamico dell'Header
    fetch('header.html')
        .then(res => res.text())
        .then(data => {
            const headerPlaceholder = document.getElementById('header-placeholder');
            if (headerPlaceholder) headerPlaceholder.innerHTML = data;
        });

    // 2. Caricamento dinamico del Footer
    fetch('footer.html')
        .then(res => res.text())
        .then(data => {
            const footerPlaceholder = document.getElementById('footer-placeholder');
            if (footerPlaceholder) footerPlaceholder.innerHTML = data;
        });

    // 3. Inizializzazione del Carosello in Homepage
    initCarousel();
});

// 4. Funzione per l'apertura/chiusura del Menu Mobile (Header)
function toggleMobileMenu() {
    const nav = document.getElementById('mainNav');
    if (nav) {
        nav.classList.toggle('active');
    }
}

// 5. Logica del Carosello
function initCarousel() {
    const track = document.querySelector('.carousel-track');
    if (!track) return; // Se la pagina attuale non ha il carosello, interrompe la funzione

    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.next-btn');
    const prevButton = document.querySelector('.prev-btn');
    const dotsNav = document.querySelector('.carousel-nav');
    if (!dotsNav) return;
    const dots = Array.from(dotsNav.children);

    const moveToSlide = (currentSlide, targetSlide) => {
        const targetIndex = slides.indexOf(targetSlide);
        track.style.transform = 'translateX(-' + (targetIndex * 100) + '%)';
        currentSlide.classList.remove('current-slide');
        targetSlide.classList.add('current-slide');
    };

    const updateDots = (currentDot, targetDot) => {
        currentDot.classList.remove('current-slide');
        targetDot.classList.add('current-slide');
    };

    if (nextButton) {
        nextButton.addEventListener('click', () => {
            const currentSlide = track.querySelector('.current-slide');
            let nextSlide = currentSlide.nextElementSibling || slides[0];
            const currentDot = dotsNav.querySelector('.current-slide');
            let nextDot = currentDot.nextElementSibling || dots[0];

            moveToSlide(currentSlide, nextSlide);
            updateDots(currentDot, nextDot);
        });
    }

    if (prevButton) {
        prevButton.addEventListener('click', () => {
            const currentSlide = track.querySelector('.current-slide');
            let prevSlide = currentSlide.previousElementSibling || slides[slides.length - 1];
            const currentDot = dotsNav.querySelector('.current-slide');
            let prevDot = currentDot.previousElementSibling || dots[dots.length - 1];

            moveToSlide(currentSlide, prevSlide);
            updateDots(currentDot, prevDot);
        });
    }

    dotsNav.addEventListener('click', e => {
        const targetDot = e.target.closest('button');
        if (!targetDot) return;

        const currentSlide = track.querySelector('.current-slide');
        const currentDot = dotsNav.querySelector('.current-slide');
        const targetIndex = dots.indexOf(targetDot);
        const targetSlide = slides[targetIndex];

        moveToSlide(currentSlide, targetSlide);
        updateDots(currentDot, targetDot);
    });
}