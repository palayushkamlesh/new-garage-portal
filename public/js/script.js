const wrapper = document.querySelector('.wrapper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');

registerLink.onclick = () => {
    wrapper.classList.add('active'); // Show Register form and hide Login form
}

loginLink.onclick = () => {
    wrapper.classList.remove('active'); // Show Login form and hide Register form
}
