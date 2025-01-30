$(document).ready(function () {
    $('#usuario').DataTable();
});
function previewImage1(nb) {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
    reader.onload = function (e) {
        document.getElementById('uploadPreview' + nb).src = e.target.result;
    };

}

function previewImage(nb) {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
    reader.onload = function (e) {
        document.getElementById('uploadPreview' + nb).src = e.target.result;
    };
}

function openModelPDF(url) {
    $('#modalPdf').modal('show');
    $('#iframePDF').attr('src', url);
}
