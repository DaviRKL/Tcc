document.addEventListener("DOMContentLoaded", function() {
    $("#fotoUser").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#imgPreviewUser").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);

        }
    });
});
