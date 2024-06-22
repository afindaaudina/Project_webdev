document.addEventListener("DOMContentLoaded", function() { 
    // Carousel Functionality
    const carousel = document.querySelector(".recipesGallery"); 
    const arrowBtns = document.querySelectorAll(".Recipes-Section i"); 
    const wrapper = document.querySelector(".Recipes-Section"); 

    const firstCard = carousel.querySelector(".food-image"); 
    const firstCardWidth = firstCard.offsetWidth; 

    let isDragging = false, 
        startX, 
        startScrollLeft, 
        timeoutId; 

    const dragStart = (e) => { 
        isDragging = true; 
        carousel.classList.add("dragging"); 
        startX = e.pageX; 
        startScrollLeft = carousel.scrollLeft; 
    }; 

    const dragging = (e) => { 
        if (!isDragging) return; 
    
        const newScrollLeft = startScrollLeft - (e.pageX - startX); 
        if (newScrollLeft <= 0 || newScrollLeft >= 
            carousel.scrollWidth - carousel.offsetWidth) { 
            isDragging = false; 
            return; 
        } 
        carousel.scrollLeft = newScrollLeft; 
    }; 

    const dragStop = () => { 
        isDragging = false; 
        carousel.classList.remove("dragging"); 
    }; 

    const autoPlay = () => { 
        if (window.innerWidth < 800) return; 
        const totalCardWidth = carousel.scrollWidth; 
        const maxScrollLeft = totalCardWidth - carousel.offsetWidth; 
        if (carousel.scrollLeft >= maxScrollLeft) return; 
        timeoutId = setTimeout(() => 
            carousel.scrollLeft += firstCardWidth, 2500); 
    }; 

    carousel.addEventListener("mousedown", dragStart); 
    carousel.addEventListener("mousemove", dragging); 
    document.addEventListener("mouseup", dragStop); 
    wrapper.addEventListener("mouseenter", () => 
        clearTimeout(timeoutId)); 
    wrapper.addEventListener("mouseleave", autoPlay); 

    arrowBtns.forEach(btn => { 
        btn.addEventListener("click", () => { 
            carousel.scrollLeft += btn.id === "left" ? 
                -firstCardWidth : firstCardWidth; 
        }); 
    }); 

    autoPlay();

    // Section Highlighting on Scroll
    let sections = document.querySelectorAll('section');
    let navlinks = document.querySelectorAll('.navbar a');

    window.onscroll = () => {
        sections.forEach(sec => {
            let top = window.scrollY;
            let offset = sec.offsetTop - 150;
            let height = sec.offsetHeight;
            let id = sec.getAttribute('id');

            if (top > offset && top < offset + height) {
                navlinks.forEach(link => {
                    link.classList.remove('active');
                    document.querySelector('.navbar a[href*=' + id + ']').classList.add('active');
                });
            }
        });
    };
});
