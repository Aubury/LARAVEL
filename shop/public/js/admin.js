//-------------------------------------------------------------------------------------------------------
function getAllAdmins(admins)
{
    console.log(admins);
}
//----------------------------------------------------------------------------------------------------
function formsHide() {
  let mass = document.querySelectorAll('.block-form');
  mass.forEach((el)=>{
      el.style.display = 'none';
    })
}
function showForm(id) {
    formsHide();
    document.getElementById(id).style.display = 'block';
}
//----------------------------------------------------------------------------------------------------
function fillInputsForm(arr, id){

    let form = document.getElementById(id);
     for (let key in arr) {
        for(let i = 0; i < form.length; i++){
            if(form[i].name === key){
                form[i].value = arr[key];
            }
        }
     }
}
formsHide();

