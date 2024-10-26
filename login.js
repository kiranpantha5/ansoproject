document.getElementById('login-form').onsubmit = function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Collect the form data
    const formData = new FormData(this);

    // Send an AJAX request to the login PHP file
    fetch('login.php', { // Change to your login PHP file name
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const loginErrorElement = document.getElementById('login-error');
        if (data.success) {
            // If successful, redirect or perform necessary actions
            alert(data.message); // Show success message
            window.location.href = 'product.html'; // Redirect to product page
        } else {
            // Show error message
            loginErrorElement.textContent = data.message;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
};








document.addEventListener("DOMContentLoaded", function() {
    const cookieName = "username=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookies = decodedCookie.split(';');
    
    let user = null;

    for (let i = 0; i < cookies.length; i++) {
        const c = cookies[i].trim();
        if (c.indexOf(cookieName) == 0) {
            user = c.substring(cookieName.length, c.length);
            break;
        }
    }

    if (user) {
        // Automatically redirect to product page if cookie is found
        window.location.href = 'product.html';
    }
});
