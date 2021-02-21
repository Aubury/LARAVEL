<template>
    <div>
        <form v-on:submit="submitFile" :id="id">
            <input type="hidden" name="_token" :value="csrf">
            <div class="example-1">
                <div class="form-group">
                    <label class="label_input-file">
                        <i class="material-icons">attach_file</i>
                        <span class="title" data-multiple-caption="Вы выбрали {count} файла!">Добавить файл</span>
                        <input type="file" name="files[]" ref="file" multiple="multiple" onchange="change_lable_text(event.target)" v-on:change="handleFileUpload()">
                    </label>
                </div>
            </div>
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
        <div class="f-row justify-center align-center mt-3"></div>
        <div v-if="error"  class="alert alert-danger mt-3">
            {{ warning }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "Add_Array_Images",
        mounted() {
            this.form = document.getElementById(String(this.id));
            this.sibling = this.form.nextElementSibling;
            // console.log(this.form);
            // console.log(this.sibling);
        },
        data(){
            return {
                photos: {},
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                id: this.randomNumber(1, 99),
                form: null,
                sibling: null,
                files: null,
                formData: new FormData(),
                url: '/products/store_img_with_js',
                errors: {},
                output: '',
                error: false,
                loaded: true,
                text : 'Файлы отправлены!',
                warning: 'Файлы не выбраны!',
                // extra_photos: document.getElementById('mass_img'),
                // input_value : '',
            }
        },

        methods: {
            randomNumber(min, max) {
                return Math.floor(Math.random() * (max - min) + min);
            },
            handleFileUpload() {
                this.files = this.$refs.file.files;
                // let object = this.$refs.file.files;
                for (let i = 0; i < this.files.length; i++){
                    this.formData.append('files[]', this.files[i]);
                }
                this.error = false;
            },
            submitFile(e) {
                e.preventDefault();
                if (this.files === null) {
                    this.error = true;
                    return;
                }else if(!this.check_file_type(this.files)){
                    this.warning = this.check_file_type(this.files);
                    this.error = true;
                    return;
                } else {
                    axios.post(this.url, this.formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-TOKEN': this.csrf,
                        }
                    })
                        .then((response)=>{
                            let data = response.data,
                                sibling = this.sibling,
                                extra_photos = document.getElementById('mass_img'),
                                width = sibling.offsetWidth,
                                array_to_json = '',
                                mass_id = [];

                            data.forEach( value=> {
                                mass_id.push(value.id);
                                let img = document.createElement('img');
                                img.src = value.url;
                                img.alt = value.name;
                                img.style.width = ((width / data.length)-10)+'px';
                                img.style.height = 'auto';
                                sibling.appendChild(img);
                            });
                            // array_to_json = JSON.stringify(mass_id);
                            // extra_photos.value = array_to_json;
                            extra_photos.value = mass_id;
                            input_value = array_to_json;
                            console.log(extra_photos);
                            console.log(extra_photos.value);

                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            },
            check_file_type(array){
                let flag = true;

                let types = ['image/jpeg','image/jpg','image/png','image/gif'];
                for (let i = 0; i < array.length; i++){
                    types.indexOf(array[i].type) > -1 ? flag = true : flag = false;
                }
                if(!flag){
                    return 'Файлы должны иметь разрешение: jpeg, jpg, png, gif';
                }else{
                    return flag;
                }
            }
        }
    }
</script>

<style scoped>

</style>
