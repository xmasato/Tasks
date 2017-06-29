"use strict";

let preview = document.querySelector('#preview');

let fileReader = new FileReader();
let photo = document.querySelector('#photo');

photo.addEventListener('change', function (e) {
    let file = e.target.files[0];

    fileReader.readAsDataURL(file);
})

fileReader.addEventListener('load', function () {
    let image = document.querySelector('#image');
    image.src = this.result;
})

preview.addEventListener('click', Preview);

function Preview() {
    let form = document.forms.form_task;
    let user_name = form.user_name.value;
    let user_email = form.user_email.value;
    let user_text = form.user_text.value;


    let user_name_popup = document.querySelector('.user_name_popup');
    let user_email_popup = document.querySelector('.user_email_popup');
    let user_text_popup = document.querySelector('.user_task_popup');

    user_name_popup.textContent = user_name;
    user_email_popup.textContent = user_email;
    user_text_popup.textContent = user_text;

}