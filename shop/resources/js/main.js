let obj = {
    password : document.querySelector('#password'),
    repeat_password: document.querySelector('#password_confirmation'),
    password_control : document.querySelector('.view'),
}

//------------------------------------------------------------------------------
function show_password(e) {
    let ev = window.event.srcElement,
        item = ev.parentElement,
        input = item.nextElementSibling;
    if(input)
        if (input.type === "password") {
            input.type = "text";
            item.innerHTML = '<i class="far fa-eye" aria-hidden="true">';
        } else {
            input.type = "password";
            item.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true">';
        }
}
// ------------------------------------------------------------------------------
if(obj.repeat_password){
    obj.repeat_password.addEventListener('keyup', function (e) {

        this.value != obj.password.value ? this.style.borderColor = 'red' : this.style.borderColor = 'green';
    })
}

//----------------------------------------------------------------------------
function check_passwords(){
    let password = obj.password,
        repeat_password = obj.repeat_password,
        flag = true;

    repeat_password.value === password.value ? flag = true : flag = false;
    return flag;
}
