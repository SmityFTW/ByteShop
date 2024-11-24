function inicio() {
    window.location.href = "login.php";
}

function registro() {
    window.location.href = "register.php";
}

function ini() {
    window.location.href = "login.php";
}

function regi() {
    window.location.href = "register.php";
}

// Selecciona el botón usando la clase CSS
const buttonLog = document.querySelector('.button');
const buttonReg = document.querySelector('.button-3');
const buttonIni = document.querySelector('iniciar');
const buttonRegi = document.querySelector('.register');


// Agrega el evento 'click' al botón
buttonLog.addEventListener('click', inicio);
buttonReg.addEventListener('click', registro);
buttonIni.addEventListener('click', ini);
buttonRegi.addEventListener('click', regi);
