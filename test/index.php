<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <!-- Add Dropzone -->
    <link rel="stylesheet" type="text/css" href="css/dropzone.css"/>
    <script type="text/javascript" src="js/dropzone.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>

<p id="txt"></p>

<h1>Drag&amp;Drop opplasting</h1>
<form action="" method="post" class="dropzone" id="myForm" enctype="multipart/form-data">
    <h4>Drag Files here to upload or <span class="btn btn-success fileinput-button dz-clickable"/> push this button!</h4>
</form>

    <div id="actions" class="row">
    <!-- Knappene -->
    <span class="btn btn-success fileinput-button dz-clickable"/>
    <i class="glyphicon glyphicon-plus"></i>
    <span>Legg til filer</span>
    </span>

    <button type="submit" id="upload" class="btn btn-primary start">
        <i class="glyphicon glyphicon-upload"></i>
        Last opp
    </button>


    <button data-dz-remove id="cancel" class="btn btn-warning cancel">
        <i class="glyphicon glyphicon-ban-circle"></i>
        Cancel</button>
</div>


<!--Område som enkeltbilder vises-->
<div class="table table-striped files" id="previews">

    <div id="template" class="file-row">

        <!-- This is used as the file preview template -->
        <!--Div-tag som styler hele thumbnail-preview visningen-->
        <div style="position:relative; top: 15px; height: 130px ">
            <div style="border: solid 1px black; width: 300px; position: relative; left: 90px;">
            <span class="preview"><img data-dz-thumbnail/></span>
        </div>
            <!--div-tag som styler 'name' til filen som lastes opp-->
        <div style="border: solid 1px black; width: 300px; left: 300px; bottom: 120px; position: relative;">
            <p class="name" data-dz-name></p>
            <strong class="error text-danger" data-dz-errormessage></strong>
        </div>
            <!--Progressbar -->
        <div style="border: solid 1px black; width: 150px; left: 700px; bottom: 150px; position: relative;">
            <p class="size" data-dz-size></p>

           <!-- <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
            </div>-->


        </div>
            <div class="progress">
                <div class="progress-bar progress-bar-success" id="test" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress>
                </div>
            </div>

            <!--Knapper med funksjonalitet som legges til hvert enkeltbilde-->

                <button data-dz-remove id="cancel2" class="btn btn-warning cancel" style="left: 773px;bottom: 223px; position: relative;">
                <i class="glyphicon glyphicon-ban-circle"></i>
                Cancel</button>
        </div>
    </div>

</div>


<script>

    var previewNode = document.querySelector("div#template");
    previewNode.id = "";

    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    Dropzone.autoDiscover = false;
    var acceptedFileTypes = "image/*";

    var myDropzone = new Dropzone(document.body, {
        url: 'uploads.php',
        autoProcessQueue: false,
        paramName: 'file',
        maxFiles:10,
        previewTemplate: previewTemplate,
        previewsContainer: "#previews",
        headers: {"MyAppname-Service-Type": "Dropzone"},
        acceptedFiles: acceptedFileTypes,
        clickable:".fileinput-button"

    });



    $('#upload').click(function () {
        myDropzone.processQueue();
        myDropzone.on("success", function(file,responseText){
            console.log(file);
            var txt = document.getElementById("txt");
            txt.innerHTML = responseText;

            this.on("queuecomplete", function (file) {
                alert("Alle filer er lastet opp");
                myDropzone.removeAllFiles();
            });


        });
    });

    $('#cancel').click(function () {
        myDropzone.removeAllFiles();
    });
 </script>
</body>
</html>
