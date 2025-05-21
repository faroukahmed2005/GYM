window.addEventListener("load", function () {
    setTimeout(function () {
        document.getElementById("ad").style.display = "block";
        document.getElementById("overlay").style.display = "block"; // تفعيل التمويه
    }, 5000);
});

// عند النقر على زر الإغلاق، يتم إخفاء الإعلان وإزالة التمويه
document.getElementById("close-btn").addEventListener("click", function (event) {
    event.stopPropagation();
    document.getElementById("ad").style.display = "none";
    document.getElementById("overlay").style.display = "none"; // إزالة التأثير
});







