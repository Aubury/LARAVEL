const image = document.getElementById('image'),
     form_crop = document.forms.crop;


function getImage(arr) {
    let mass = JSON.parse(arr);

    const cropper = new Cropper(image, {
        autoCropArea: 1,

        crop(event) {
            console.log('X: ' + event.detail.x);
            console.log('Y: ' + event.detail.y);
            console.log('Width: ' + event.detail.width);
            console.log('Height: ' + event.detail.height);
            console.log('Rotate: ' + event.detail.rotate);
            console.log('ScaleX: ' + event.detail.scaleX);
            console.log('ScaleY: ' + event.detail.scaleY);
            form_crop.elements.x.value = event.detail.x;
            form_crop.elements.y.value = event.detail.y;
            form_crop.elements.width.value = event.detail.width;
            form_crop.elements.height.value = event.detail.height;
        },
    })


}




