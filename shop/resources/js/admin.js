//-------------------------------------------------------------------------------------------------------
function getAllAdmins(admins)
{
    console.log(admins);
}
//----------------------------------------------------------------------------------------------------
function fillInputsForm(arr){

    let form = document.getElementById('formAddAdmins');
     for (let key in arr) {
        for(let i = 0; i < form.length; i++){
            if(form[i].id === key){
                form[i].value = arr[key];
            }
        }
     }
}

