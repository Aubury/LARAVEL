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

const ex = {
    link :  'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5',
    curs : document.querySelector('#exchange'),
    arr : []
}
function  getExchange() {
     let link = ex.link,
         mass = ex.arr;

     fetch(link,
         { method:'GET'})
         .then(data => data.json())
                .then( data => {
                    for (let i = 0; i < data.length; i++){
                        mass.push(data[i]);
                    }
                    printExchange();
                 });
}
//---------------------------------------------------------------------
function  getCurrent(name, item) {
    let mass = ex.arr;

    for (let i = 0; i < mass.length; i++){

        if(mass[i].ccy === name) {

            return Math.round(parseFloat(mass[i][item])*100)/100;
            // return mass[i][item]
        }
}
//--------------------------------------------------------------------
}
function printExchange() {

    let block = ex.curs,
        info  = '';

    info += `<ul class="f-row justify-evenly">
               <li>USA : ${getCurrent('USD', 'buy')} / ${getCurrent('USD', 'sale')}</li>
               <li>EUR : ${getCurrent('EUR', 'buy')} / ${getCurrent('EUR', 'sale')}</li>
               <li>RUR : ${getCurrent('RUR', 'buy')} / ${getCurrent('RUR', 'sale')}</li>
             </ul>`;

    block.innerHTML = info;

}
getExchange()

