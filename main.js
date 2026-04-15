// Wait for DOM to load
document.addEventListener("DOMContentLoaded", () => {
    const menuIcon = document.querySelector("#mobile-menu");
    const navUl = document.querySelector("nav ul");

    menuIcon.addEventListener("click", () => {
        navUl.classList.toggle("active");
    });

    document.querySelectorAll("nav ul li a").forEach(link =>{
        link.addEventListener("click",() => {
            navUl.classList.remove("active");
        });
    });
});





let reviewIndex = 0;
const reviewsWrapper = document.querySelector('.reviews-wrapper');
const totalReviews = document.querySelectorAll('.reviews-content').length;

function showReview() {
    reviewIndex++;
    if (reviewIndex >= totalReviews) reviewIndex = 0;
    const offset = -reviewIndex * 110; // move reviews
    reviewsWrapper.style.transform = `translateX(${offset}%)`;
}

// Change review every 4 seconds
setInterval(showReview, 4000);


document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".occasion-content");

    const revealOnScroll = () => {
        cards.forEach((card) => {
            const rect = card.getBoundingClientRect();
            if (rect.top < window.innerHeight - 80) {
                card.style.animation = "fadeUp 0.8s ease forwards";
            }
        });
    };

    window.addEventListener("scroll", revealOnScroll);
    revealOnScroll();
});




document.addEventListener("DOMContentLoaded", function() {
    const galleryContainer = document.querySelector('.gallery-container');
    
    // Clone images to make an infinite scroll loop
    const clone = galleryContainer.cloneNode(true);
    galleryContainer.parentElement.appendChild(clone);
    
    // Smooth continuous scrolling effect using requestAnimationFrame
    let scrollSpeed = 0.8; // adjust scroll speed here
    let scrollAmount = 0;
    
    function autoScroll() {
        scrollAmount += scrollSpeed;
        galleryContainer.style.transform = `translateX(-${scrollAmount}px)`;
        if (scrollAmount >= galleryContainer.scrollWidth / 2) {
            scrollAmount = 0;
        }
        requestAnimationFrame(autoScroll);
    }
    
    autoScroll();
});


