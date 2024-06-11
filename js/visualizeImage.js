const imageInput = document.getElementById('profile-image');
const imageDiv = document.getElementById('preview');

function getImagePreview(){
    let image = URL.createObjectURL(imageInput.files[0]);4
    let newImage = document.createElement('img');
    imageDiv.innerHTML = '';
    newImage.src=image;
    imageDiv.appendChild(newImage);
}