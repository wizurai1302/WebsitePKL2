fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
.then(response => response.json())
.then(provinces => {
    var data = provinces;
    var tampung = '<option> Pilih Provinsi </option>';
    data.forEach(element => {
        tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
    });
    document.getElementById('lokasi').innerHTML = tampung;
});

// perview foto
function previewPhoto(event) {
    var input = event.target;
    var preview = document.getElementById("photoPreview");
    var cancelButton = document.getElementById("cancelButton");

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
            cancelButton.style.display = "block";
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function cancelPhoto() {
    var input = document.getElementById("image");
    var preview = document.getElementById("photoPreview");
    var cancelButton = document.getElementById("cancelButton");

    input.value = ''; // Clear the file input
    preview.src = ''; // Clear the image preview
    preview.style.display = "none";
    cancelButton.style.display = "none";
}
