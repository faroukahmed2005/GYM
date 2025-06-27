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
});







