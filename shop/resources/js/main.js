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
//-------------------------------------------------------------------
function Delete(ev, url){

    let  data = '',
        fD = new FormData();

    if(ev.target.hasAttribute('id'))
    {
        data = ev.target.id.slice(ev.target.id.indexOf('_')+1);
    }

    fD.append('id', data);

    fetch(url,{
        method: "POST",
        body: fD
    }).then( response => response.text())
        .then( text => {
            // console.log(text);
            window.location.reload();
        });

}
//-----------------------------------------------------------------
function createTable(arr, _table, table_str){

    const table = _table;
    //   Удаляю всех детей!!!
    while(table.hasChildNodes()){
        table.removeChild(table.firstChild);
    }

    table.innerHTML = table_str;

}
//--------------------------------------------------------------------------------------------------
// function getMassIndexById(ev, arr, form)
// {
//     let data = '';
//     if(ev.target.hasAttribute('id')){
//
//         data = ev.target.id.slice(ev.target.id.indexOf('_')+1);
//         arr.forEach( el => {
//             if(el.id === data){
//                 fillInputsForm(el, form);
//             }
//
//         });
//     }
// }
//----------------------------------------------------------------------------------------------------
// function fillInputsForm(arr, form){
//
//     const inpArr = form;
//
//     for(let i = 0; i < inpArr.length; i++){
//         for (let key in arr) {
//             if(inpArr[i].name === key){
//                 if(inpArr[i].inp.nodeName === "INPUT"){
//                     inpArr[i].inp.value = arr[key];
//                 }else{
//                     inpArr[i].inp.innerHTML = arr[key];
//                 }
//             }
//         }
//     }
// }
//----------------------------------------------------------------------------------------------------

function change_lable_text(el) {
    console.log(el.value);
    let title = el.parentNode.querySelector('.title'),
        fileName = '';

    if( el.files && el.files.length > 1 ) {
        fileName = (title.getAttribute('data-multiple-caption') || '').replace('{count}', el.files.length);
    }else{
        fileName = el.value.split( '\\' ).pop();
    }
    if( fileName ) {
        title.innerHTML = fileName;
    }
}
function input_focus(input) {
    input.classList.add( 'has-focus' );
}
function input_blur(input) {
   input.classList.remove( 'has-focus' );
}
