// JavaScript for Modal Functionality
document.querySelectorAll('.product-card img').forEach(img => {
    img.addEventListener('click', function() {
        // Get product details
        const productCard = this.closest('.product-card');
        const productName = productCard.querySelector('h3').innerText;
        const productPrice = productCard.querySelector('p').innerText;
        
        // Update modal content
        document.getElementById('modal-product-name').innerText = productName;
        document.getElementById('modal-product-price').innerText = productPrice;
        document.getElementById('modal-product-image').src = this.src;

        // Show modal
        document.getElementById('product-modal').style.display = 'block';
    });
});

// Close modal functionality
document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('product-modal').style.display = 'none';
});

// Close modal when clicking outside of modal content
window.onclick = function(event) {
    const modal = document.getElementById('product-modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};
document.querySelector(".add-to-cart").onclick = function() {
    openLoginModal(); // Open login modal when Add to Cart is clicked
};

document.querySelector(".buy-now").onclick = function() {
    openLoginModal(); // Open login modal when Buy Now is clicked
};








// Function to open the login modal
function openLoginModal() {
    document.getElementById("login-modal").style.display = "block";
}

// Function to close the login modal
function closeLoginModal() {
    document.getElementById("login-modal").style.display = "none";
}

// Function to toggle between login and sign-up forms
document.getElementById("toggle-form").addEventListener("click", function() {
    const title = document.getElementById("login-title");
    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");

    if (title.innerText === "Login") {
        // Switch to sign-up
        title.innerText = "Sign Up";
        loginForm.style.display = "none";  // Hide the login form
        signupForm.style.display = "block"; // Show the sign-up form
        document.getElementById("toggle-form").innerText = "Already have an account? Login";
    } else {
        // Switch to login
        title.innerText = "Login";
        loginForm.style.display = "block";  // Show the login form
        signupForm.style.display = "none";   // Hide the sign-up form
        document.getElementById("toggle-form").innerText = "Don't have an account? Sign Up";
    }
});

// Close modal when clicking outside of it
window.onclick = function(event) {
    if (event.target === document.getElementById("login-modal")) {
        closeLoginModal();
    }
}



// for login signup model

document.getElementById('toggle-form').addEventListener('click', function() {
    window.location.href = 'signup.html';
});





document.addEventListener("DOMContentLoaded", function () {
    const cookieName = "username="; // Name of your cookie
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookies = decodedCookie.split(';');
    
    let userLoggedIn = false;

    for (let i = 0; i < cookies.length; i++) {
        const c = cookies[i].trim();
        if (c.indexOf(cookieName) === 0) {
            userLoggedIn = true; // User is logged in or signed up
            break;
        }
    }

    // If user is logged in or signed up, hide the modal
    if (userLoggedIn) {
        const loginModal = document.getElementById("login-modal");
        loginModal.style.display = "none"; // Hide modal
    } else {
        const loginModal = document.getElementById("login-modal");
        loginModal.style.display = "block"; // Show modal
    }
});












function toggleMenu() {

    const navLinks = document.querySelector('.nav-links');
    const menuToggle = document.querySelector('.menu-toggle');
    navLinks.classList.toggle('show');
    menuToggle.classList.toggle('active');

}










// hide the form








