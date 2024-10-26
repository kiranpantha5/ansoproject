// Rating functionality
document.querySelector(".rate-button").addEventListener("click", function() {
    document.querySelector(".rating-modal").classList.add("visible");
});

document.querySelector(".close-rating").addEventListener("click", function() {
    document.querySelector(".rating-modal").classList.remove("visible");
});

document.querySelectorAll(".star").forEach(star => {
    star.addEventListener("click", function() {
        document.querySelectorAll(".star").forEach(s => s.classList.remove("selected"));
        this.classList.add("selected");
    });
});

document.querySelector(".submit-rating").addEventListener("click", function() {
    document.querySelector(".rating-modal").classList.remove("visible");
    alert("Thank you for rating this product!");
});
