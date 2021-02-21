/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import route from "./route";
import {asset} from '@codinglabs/laravel-asset';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor';
import TinyMCE from 'tinymce';

const Vue = window.Vue,
      VueRouter = window.VueRouter,
      Copper = window.Cropper;



Vue.mixin({
    methods: {
        asset: asset
    }
})
// console.log(route('store_img'));
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/* Register our new component: */
Vue.component('add_main_image_form', require('./components/Add_Main_Image.vue').default);
Vue.component('add_array_images_form',require('./components/Add_Array_Images').default);
Vue.component('change_main_image_form', require('./components/Change_main_image.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    components:{
        },
    data(){
        return {
            count: 4,
            admins : [],
            token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            short_description: null,
            full_description: null,
        }
    },
    methods: {
        getAdmins: function (arr) {
            this.admins = arr;
            console.log('Vue ---> Admins:' + this.admins);
        },
        getInputsValue: function (value_1, value_2) {
            this.short_description = value_1;
            this.full_description = value_2;
        }
    }

});


// console.log(app.count);

// ClassicEditor
//     .create( document.querySelector( '#short_description' ))
//     .catch( error => {
//         console.error( error );
//     } );
// ClassicEditor
//     .create( document.querySelector( '#full_description' ))
//     .catch( error => {
//         console.error( error );
//     } );

TinyMCE.init({
    selector: '#short_description',
    language: 'ru',
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code wordcount'
    ],
    toolbar: 'undo redo | formatselect | '+
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_css: '//www.tiny.cloud/css/codepen.min.css',
    setup: function (editor) {
        editor.on('init', function (e) {
            if(app.short_description){
                editor.setContent(app.short_description);
            }
        })
    }
})
TinyMCE.init({
    selector: '#full_description',
    language: 'ru',
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code wordcount'
    ],
    toolbar: 'undo redo | formatselect | '+
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_css: '//www.tiny.cloud/css/codepen.min.css',
    setup: function (editor) {
     editor.on('init', function (e) {
         if(app.full_description){
             editor.setContent(app.full_description);
         }
     })
    }
})

