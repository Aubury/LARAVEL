// // get route url with blade
// var url = "{{route('store_img')}}";

// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

// const app = new Vue({
//     el: "#app",
//     data: {
//         admins : [],
//         photos : [],
//         _token : '',
//         files : '',
//         url : '',
//         output: ''
//
//     },
//     methods:{
//         getAdmins : function (arr) {
//             this.admins = arr;
//             console.log('Vue ---> Admins:' + this.admins);
//         },
        // getUrl : function(data ){
        //     this.url = data;
        // },
        // addPhoto : function (e) {
        //     e.preventDefault();
        //     let fd = new FormData(event.target),
        //        currentObj = this;
        //     fd.forEach((key, value) => console.log(value, key));
        //     axios.post(this.url, { fd })
        //         .then(function (response) {
        //             this.photos = response.data;
        //             console.log(response.data);
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        //
        // }

//     },
// })




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
