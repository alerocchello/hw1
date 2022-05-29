function checkForm() {
    Object.keys(formStatus).length !== 6 || 
    Object.values(formStatus).includes(false);
}

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}



function checkUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,20}$/.test(input.value)) {
        input.parentNode.querySelector('p').textContent = "Username non valido: usare massimo 20 caratteri";
        input.parentNode.classList.add('error');
        formStatus.username = false;
        checkForm();
    } else {
        fetch("check_username.php?q="+encodeURIComponent(input.value)).then(onResponse).then(jsonCheckUsername);
        input.parentNode.querySelector('p').textContent = "";
    }
}

function jsonCheckUsername(json){
    //Controllo il campo exists ritornato dal JSON
    if (formStatus.username = !json.exists) {
        document.querySelector('.email').classList.remove('error');
    } else {
        document.querySelector('.email p').textContent = "Email già in uso";
        document.querySelector('.email').classList.add('error');
    }
    checkForm();
}



function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email p').textContent = "Email non valida";
        document.querySelector('.email').classList.add('error');
        formStatus.email = false;
        checkForm();
    } else {
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(onResponse).then(jsonCheckEmail);
        document.querySelector('.email p').textContent = "";
    }
}

function jsonCheckEmail(json) {
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('error');
    } else {
        document.querySelector('.email p').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('error');
    }
    checkForm();
}



function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('error');
        document.querySelector('.password p').textContent = "";
    } else {
        document.querySelector('.password').classList.add('error');
        document.querySelector('.password p').textContent = "Password non valida: usare minimo 8 caratteri";
    }
    checkForm();
}

function checkConfirmPassword(event) {
    const confermaPasswordInput = document.querySelector('.conferma_password input');
    if (formStatus.confermaPassord = confermaPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.conferma_password').classList.remove('error');
        document.querySelector('.conferma_password p').textContent = "";
    } else {
        document.querySelector('.conferma_password').classList.add('error');
        document.querySelector('.conferma_password p').textContent = "Le password non coincidono";
    }
    checkForm();
}



const formStatus = {'upload': true};
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.conf_password input').addEventListener('blur', checkConfirmPassword);

if (document.querySelector('.error') !== null) {
    checkUsername();
    checkEmail();
    checkPassword();
    checkConfirmPassword();
}