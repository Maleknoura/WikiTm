const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});





let form = document.querySelector("#signupForm");

// Add event listeners to input fields
form
    .querySelector("#validateFirstNameInput")
    .addEventListener("change", function () {
        validateFirstName(this);
    });

form
    .querySelector("#validateLastNameInput")
    .addEventListener("change", function () {
        validateLastName(this);
    });

form
    .querySelector("#validateEmailInput")
    .addEventListener("change", function () {
        validateEmail(this);
    });

form
    .querySelector("#validatePasswordInput")
    .addEventListener("change", function () {
        validatePassword(this);
    });

// Validation functions for each input
// Validation function for first name
const validateFirstName = function (inputElement) {
    validateInput(
        inputElement,
        /^[A-Za-z]+$/,
        "<b>First Name is not valid</b>"
    );
};

// Validation function for last name
const validateLastName = function (inputElement) {
    validateInput(
        inputElement,
        /^[A-Za-z]+$/,
        "<b>Last Name is not valid</b>"
    );
};

// Validation function for email
const validateEmail = function (inputElement) {
    validateInput(
        inputElement,
        /^[a-zA-Z0-9.-]+[@]{1}[a-zA-Z0-9.-]+[.]{1}[a-z]{2,10}$/,
        "<b>Email is not valid</b>"
    );
};

// Validation function for password
const validatePassword = function (inputElement) {
    validateInput(
        inputElement,
        /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/,
        "<b>Password must be at least 8 characters and include at least one letter and one number.</b>"
    );
};
