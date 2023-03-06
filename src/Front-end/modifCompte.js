const inputPhoto = document.querySelector('#photo-profil');
const apercuPhoto = document.querySelector('#aperçu-photo');

inputPhoto.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
            apercuPhoto.setAttribute('src', this.result);
            apercuPhoto.style.display = 'block';
        });

        reader.readAsDataURL(file);
    } else {
        apercuPhoto.setAttribute('src', '#');
        apercuPhoto.style.display = 'none';
    }
});
