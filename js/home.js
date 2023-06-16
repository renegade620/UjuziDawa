const header = document.querySelector('.header');
const navLink = document.querySelectorAll('.nav-link');
const navList = document.querySelector('.nav-list');
const loader = document.querySelector('.loader-overlay');
var modal = document.getElementById("signup-modal"); // Get the modal
var btn = document.getElementById("signup-btn"); // Get the button that opens the modal
var span = document.getElementsByClassName("close")[0]; // Get the <span> element that closes the modal
// Get the modals
var signupModal = document.getElementById("signup-modal");
var loginModal = document.getElementById("login-modal");
// Get the close buttons
var signupClose = document.getElementsByClassName("close")[0];
var loginClose = document.getElementsByClassName("close")[1];
// Get the login link
var loginLink = document.getElementById("login-link");

// REMOVE LOADER WHEN PAGE LOADED
window.addEventListener('load', () => {
    loader.classList.add('loaded');
    document.body.style.overflowY = 'scroll';
}, 3000)


// ADD SMOOTH SCROLLING WHEN SELECT THE NAV LINK
// FIRST ADD CLICK EVENT TO ALL LINKS
navLink.forEach((link) => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const href = e.target.getAttribute('href');
        const offsetTop = document.querySelector(href).offsetTop - 80;
        scroll({
            top: offsetTop,
            behavior: "smooth"
        })
        // REMOVE "OPEN-MENU" WHEN TARGET A LINK
        header.classList.remove('menu-open');
        navList.querySelector('.active').classList.remove('active');
        link.classList.add('active');
    })

})

// SIGN UP
// When the user clicks the button, open the modal
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// LOGIN
// When the user clicks on the login link, show the login modal and hide the signup modal
loginLink.onclick = function () {
    signupModal.style.display = "none";
    loginModal.style.display = "block";
}

// When the user clicks on the close button in the signup modal, hide the modal
signupClose.onclick = function () {
    signupModal.style.display = "none";
}

// When the user clicks anywhere outside of the signup modal, hide the modal
window.onclick = function (event) {
    if (event.target == signupModal) {
        signupModal.style.display = "none";
    }
}

// When the user clicks on the close button in the login modal, hide the modal
loginClose.onclick = function () {
    loginModal.style.display = "none";
}

// When the user clicks anywhere outside of the login modal, hide the modal
window.onclick = function (event) {
    if (event.target == loginModal) {
        loginModal.style.display = "none";
    }
}


