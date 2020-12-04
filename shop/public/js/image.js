const image = document.getElementById('image'),
     form_crop = document.forms.crop;

const cropper = new Cropper(image, {
    // aspectRatio: 16 / 9,
    crop(event) {
        console.log(event.detail.x);
        console.log(event.detail.y);
        console.log('Width: ' + event.detail.width);
        console.log('Height: ' + event.detail.height);
        console.log(event.detail.rotate);
        console.log(event.detail.scaleX);
        console.log(event.detail.scaleY);
        form_crop.elements.width.value = event.detail.width;
        form_crop.elements.height.value = event.detail.height;
    },
})


