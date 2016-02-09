<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <!-- Add Dropzone -->
    <link rel="stylesheet" type="text/css" href="css/dropzone.css"/>
    <script type="text/javascript" src="js/dropzone.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<h1>Drag&amp;Drop opplasting</h1>
<form action="" class="dropzone" id="myForm" enctype="multipart/form-data"></form>
<button id="upload">Last opp</button>
<script>
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#myForm", {
        autoProcessQueue: false
    });

    $('#upload').click(function () {
        myDropzone.processQueue();
    });
</script>
</body>
</html>


    

    
    
    
    
    

