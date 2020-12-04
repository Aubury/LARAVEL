

const app = Vue.createApp({
    data: {
        admins : [],
    },
    methods:{
        getAdmins : function (arr) {
            this.admins = arr;
            console.log('Vue ---> Admins:' + this.admins);
        }

    },
}).mount("#app");




//-------------------------------------------------------
function getAllMass(item) {
    console.log(item);
}
//---------------------------------------------------------
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
//----------------------------------------------------------
function hideForms() {
    let mass = document.querySelectorAll('.block-form');

    mass.forEach( (el)=>{
        el.style.display ='none';
    })

}
//------------------------------------------------------------
function showForm(id) {
    hideForms();
    let form = document.getElementById(id);
    form.style.display = 'block';

}
//-------------------------------------------------------------
hideForms();
