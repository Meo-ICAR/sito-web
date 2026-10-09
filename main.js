/* ==========================================================================
   SUITE UNICO — Global JavaScript (main.js)
   ========================================================================== */

// Cartella dello script (radice del sito): permette alle pagine in /prodotti/
// di caricare header e footer e di risolvere correttamente i loro link relativi.
const SITE_BASE = document.currentScript
    ? new URL('.', document.currentScript.src).href
    : new URL('/', window.location.href).href;

function loadFragment(file, placeholderId) {
    return fetch(SITE_BASE + file)
        .then(res => res.ok ? res.text() : Promise.reject(res.status))
        .then(data => {
            const placeholder = document.getElementById(placeholderId);
            if (!placeholder) return;
            placeholder.innerHTML = data;
            placeholder.querySelectorAll('[href], [src]').forEach(el => {
                ['href', 'src'].forEach(attr => {
                    const v = el.getAttribute(attr);
                    if (v && !/^([a-z][a-z0-9+.-]*:|\/|#)/i.test(v)) {
                        el.setAttribute(attr, SITE_BASE + v);
                    }
                });
            });
        })
        .catch(() => { /* header/footer non disponibili: la pagina resta utilizzabile */ });
}

document.addEventListener('DOMContentLoaded', () => {
    // 1. Caricamento dinamico dell'Header
    loadFragment('header.html', 'header-placeholder');

    // 2. Caricamento dinamico del Footer
    loadFragment('footer.html', 'footer-placeholder');

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