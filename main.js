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


// Get all menu links and menu sections
const menuLinks = document.querySelectorAll('.menu-nav ul li a');
const menuSections = document.querySelectorAll('.menu-items');

// Function to hide all sections
function hideAllSections() {
    menuSections.forEach(section => {
        section.style.display = 'none';
    });
}

// Initially hide all sections except the first one (optional)
hideAllSections();
document.getElementById('starters').style.display = 'flex'; // show starters initially

// Add click event to each menu link
menuLinks.forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault(); // prevent default link behavior
        const targetId = this.getAttribute('href').replace('#', ''); // get target ID

        hideAllSections(); // hide all sections

        // Show the clicked section
        if (document.getElementById(targetId)) {
            document.getElementById(targetId).style.display = 'flex';
        }

        // Optional: remove 'active' class from all links
        menuLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active'); // add active class to clicked link
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


