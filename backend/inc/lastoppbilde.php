<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
        <head>
            <!-- Add Dropzone -->
            <link rel="stylesheet" type="text/css" href="style/dropzone.css"/>
            <script type="text/javascript" src="script/dropzone.min.js"></script>
            <script type="text/javascript" src="script/jquery.min.js"></script>
            <script type="text/javascript" src="functions/validate.js"></script>
        </head>
        <body>
            <p id="txt"></p>
            <div class="row">
                <div class="col-5">
                    <h1>Drag&amp;Drop opplasting</h1>
                </div>
            </div>
            <div class="col-7">
                <form action="target.php" method="post" class="dropzone" id="myForm" enctype="multipart/form-data">
                    <!-- Drag and drop felt med knapp som henter opp uforsker -->
                    <h4>Drag Files here to upload or <span class="btn btn-success fileinput-button dz-clickable"/> push this button!</h4>
                </form>
            </div>
            <!--Område som enkeltbilder vises-->
            <div class="row">
                <div class="col-8">
                    <div class="table table-striped files" id="previews">
                        <div id="template" class="file-row" style="border: solid 1px #f9f9f9; position: relative; top: 10px; left: 10px; padding: 10px; background-color: #f9f9f9">
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
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
                </div>
            </div>


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
                    clickable:".fileinput-button"
                });

                //Registrerer knappentrykk og kjører kode
                $('#upload').click(function () {
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
                    timeoutID = window.setTimeout(removeAllFilesAfterDelay,2000);
                }
                // Fuksjon som tømmer køen etter perdefinert tid i funksjonen removeContentDelay
                function removeAllFilesAfterDelay(responseText){
                    var txt = document.getElementById("txt");
                    txt.innerHTML = ("<h3 style='position: relative;'>Successfully uploaded</h3>");
                    myDropzone.removeAllFiles();
                }
            </script>
        </body>
    </html>