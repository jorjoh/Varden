<script src="dropzone.js"></script>
<form action="upload.php" enctype="multipart/form-data" method="POST">
    <input type="text" id ="firstname" name ="firstname" />
    <input type="text" id ="lastname" name ="lastname" />
    <div class="dropzone" id="myDropzone"></div>
    <button type="submit" id="submit-all"> upload </button>
</form>

<script>
    Dropzone.options.myDropzone= {
        url: 'upload.php',
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 5,
        maxFilesize: 1,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        init: function() {
            dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

            // for Dropzone to process the queue (instead of default form behavior):
            document.getElementById("submit-all").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                dzClosure.processQueue();
            });

            //send all the form data along with the files:
            this.on("sendingmultiple", function(data, xhr, formData) {
                formData.append("firstname", $("#firstname").val());
                formData.append("lastname", $("#lastname").val());
            });
        }
    }
</script>