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


const form_main_img = document.forms.store_main_img;
     form_mass_img = document.getElementById('store_mass_img');
let link = '',
    mass = [];

function get_url(url) {
  link = url;
}
// if(form_main_img){
//     form_main_img.addEventListener('submit',(ev)=>{
//         ev.preventDefault();
//         let formData = new FormData(),
//             url  = link,
//             fileField = form_main_img.querySelector('input[type="file"]'),
//             token = form_main_img._token.value;
//         formData.append('_token', token);
//         formData.append('file', fileField.files[0]);
//
//
//
//         fetch(url,{
//             method: 'post',
//             body: formData,
//         }).then(data => data.json())
//             .then(data =>{ mass = data;
//                 for (let i = 0; i < data.length; i++){
//                     // console.log('DATA' + JSON.stringify(data[i]));
//                     console.log('MASS' + mass[i]);
//                 }
//
//             })
//     })
// }



// $('form').on('submit', function (e) {
//     e.preventDefault(); // prevent the form submit
//     var url = route('store_img');
//     // create the FormData object from the form context (this),
//     // that will be present, since it is a form event
//     var formData = new FormData(this);
//     // build the ajax call
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         url: url,
//         type: 'POST',
//         data: formData,
//         success: function (response) {
//             // handle success response
//             console.log(response.data);
//         },
//         error: function (response) {
//             // handle error response
//             console.log(response.data);
//         },
//         contentType: false,
//         processData: false
//     });
// })
