<!-- Innholdet på siden -->
<h1 class="page-header">Last opp bilder</h1>

<pre>
    <form  method="post" action="" class="dropzone" id="myform" name="myform" enctype="multipart/form-data">
        <!-- Drag and drop felt med knapp som henter opp uforsker -->
        <h4>Slipp bildene her eller <span class="btn btn-success fileinput-button dz-clickable"/> trykk her for å velge bilder!</h4>
    </form>
</pre>


<div class="table table-striped files" id="previews">
    <div id="template" class="file-row" style="border: solid 1px #CCCCCC; position: relative; top: 10px; padding: 10px; background-color: #f9f9f9">
        <!-- This is used as the file preview template -->
        <!--Div-tag som styler hele thumbnail-preview visningen-->
        <span class="preview" style="float: left;"><img data-dz-thumbnail/></span>
        <!--div-tag som styler 'name' til filen som lastes opp-->
        <p class="name" style="float: left; margin: 10px 50px 0 50px;" data-dz-name></p>
        <!-- Henter ut filstørrelsen på bilde -->
        <p class="size" style="float: left; margin-top: 10px;" data-dz-size></p>
        <!--Knapp som sletter enkeltbilde i køen-->
        <button style="margin: 10px 0 0 70px;" data-dz-remove id="cancel2" class="btn btn-warning cancel">
            <i class="glyphicon glyphicon-ban-circle"></i>
            Cancel
        </button>
        <br>
        <!-- Selve progressbaren-->
        <div class="progress" style="float: left; margin-left: 50px; width: 20%;">
            <div class="progress-bar progress-bar-success" id="test" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
        </div>
        <strong class="error text-danger" data-dz-errormessage></strong>
        <br style="clear: both;">
        <input type="text" name="photographer" id="photographer">
    </div>
</div>

<div id="actions" class="row">
    <!-- Knappene -->
    <!-- Legg til filer -->
    <span class="btn btn-success fileinput-button dz-clickable"/>
    <i class="glyphicon glyphicon-plus"></i>
    <span>Legg til filer</span>
    </span>
    <!-- Denne knappen starter selve opplastningsfunksjonen-->
    <button type="submit" name="submit" id="upload" class="btn btn-primary start">
        <i class="glyphicon glyphicon-upload"></i>
        Last opp
    </button>

    <!-- Denne knappen fjerner elementer i køen-->
    <button data-dz-remove id="cancel" class="btn btn-warning cancel">
        <i class="glyphicon glyphicon-ban-circle"></i>
        Cancel
    </button>
</div>

<p id="txt"></p>
<p id="fotograf"></p>

<script>
    // Deklarerer variabel som plukker opp div-taggen template som skal brukes i visning av opplastende filer
    var previewNode = document.querySelector("div#template");
    previewNode.id = "";

    // Ting som jeg ikke helt forstår
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    //Sørger for at ikke queue'n blir kjørt automatisk før 'go'-knappen er trykket
    Dropzone.autoDiscover = false;
    //Sperre som gjør at opplastningsfunksjonen kun tar imot bilder og ikke dokumenter.. Btw .svg filer fungerer også
    var acceptedFileTypes = "image/*";
    var myForm= document.querySelector('form');
    formData = new FormData(myForm);
    //Deklarerer selve dropzonen og definerer noen variabler fra bibiloteket til dropzone
    var myDropzone = new Dropzone(document.body, {
        url: 'inc/uploads.php',
        autoProcessQueue: false,
        paramName: 'file',
        maxFiles:10,
        previewTemplate: previewTemplate,
        previewsContainer: "#previews",
        headers: {"MyAppname-Service-Type": "Dropzone"},
        acceptedFiles: acceptedFileTypes,
        clickable:".fileinput-button",
       //Sender informasjon fra inputfelter til uploads.php
        init: function() {
            this.on("sending", function(file, xhr, formData){
                formData.append("TESTFAEN", 777, formData);
            });
                this.on("success", function(file, xhr){
                    alert(file.xhr.response);
                })
        }
    });
    var formData = new FormData();

    //Registrerer knappentrykk og kjører kode
    $('#upload').click(function () {
        myDropzone.on("sending", function(file, xhr, formData) {
            var photographer = file.previewElement.querySelector("#photographer").value;
            document.getElementById("fotograf").innerHTML = photographer;
            formData.append("photographer", photographer);
        });
        //Prosesserer køen
        myDropzone.processQueue();
        //'Success'-event som kan høres på og kjøres kode etter alle filer er akseptert
        myDropzone.on("success", function(file,responseText){
            console.log(file);
            var txt = document.getElementById("txt");
            txt.innerHTML = responseText;
            removeContentDelay();
        });

    });

    //Avbyrt-knapp som sletter hele køen
    $('#cancel').click(function () {
        myDropzone.removeAllFiles();
    });

    // Funksjon som setter en forsinkelse på hendelsen removeAllFiles
    function removeContentDelay() {
        timeoutID = window.setTimeout(removeAllFilesAfterDelay,8000);
    }
    // Fuksjon som tømmer køen etter perdefinert tid i funksjonen removeContentDelay
    function removeAllFilesAfterDelay(responseText){
        myDropzone.removeAllFiles();
    }
</script>


<?php
    var_dump($_POST);
?>
