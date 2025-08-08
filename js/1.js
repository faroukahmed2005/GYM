// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Elements
    const adElement = document.getElementById("ad");
    const overlayElement = document.getElementById("overlay");
    const closeBtnElement = document.getElementById("close-btn");

    // Only show ad if the elements exist
    if (adElement && overlayElement) {
        setTimeout(function () {
            adElement.style.display = "block";
            overlayElement.style.display = "block";
        }, 5000);
    }

    // Only add click listener if close button exists
    if (closeBtnElement) {
        closeBtnElement.addEventListener("click", function (event) {
            event.stopPropagation();
            if (adElement) adElement.style.display = "none";
            if (overlayElement) overlayElement.style.display = "none";
        });
    }

    // Mobile Menu Toggle
    const toggleMenu = document.querySelector('.toggle-menu');
    const navMenu = document.querySelector('header nav ul');
    
    if (toggleMenu && navMenu) {
        toggleMenu.addEventListener('click', function(e) {
            e.preventDefault();
            navMenu.classList.toggle('show-menu');
        });

        // Close menu when clicking on a link
        const menuLinks = navMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('show-menu');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!toggleMenu.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('show-menu');
            }
        });
    }
});







