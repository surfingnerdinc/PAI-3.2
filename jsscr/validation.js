const form = document.getElementById('form')
const password = document.getElementById('password')
const password2 = document.getElementById('passwordconf')

form.addEventListener('submit', e =>{
    checkPassword()
    e.preventDefault()
});



function checkPassword(){
    const passwordValue = password.value.trim()
    const password2Value = password2.value.trim()

    if (passwordValue === '' || passwordValue.length < 8 || passwordValue.length > 20){
        alert("Invalid password")
    }
    if(password2Value !== passwordValue) {
        alert ("passwords have to be the same")
    }
}