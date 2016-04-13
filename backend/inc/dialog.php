<!---->
<!---->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <title>jQuery UI Dialog - Modal message</title>-->
<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
<!--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!--    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>-->
<!---->
<!--    <div class="dialogBox" style="border:1px solid gray;">-->
<!--        <a href="DataGrip.JPG" class="slideshow_zoom">Test</a>-->
<!---->
<!--        <!-- TODO: Change above href -->
<!--        <!-- NOTE: Must be a local url, not cross domain -->
<!--    </div>-->
<!---->
<!--    <script type="text/javascript">-->
<!--        $('.slideshow_zoom').each(function() {-->
<!--            var $link = $(this);-->
<!---->
<!--            var $dialog = $('<img src="' + $link.attr('href') + '" />')-->
<!--                .dialog({-->
<!--                    autoOpen: false,-->
<!--                    resizeable: false,-->
<!--                    modal: true,-->
<!--                    width: 1000,-->
<!--                    closeOnEscape: true,-->
<!--                    dialogClass: 'zoom'-->
<!--                });-->
<!--            $link.click(function() {-->
<!--                $dialog.dialog('open');-->
<!---->
<!--                return false;-->
<!--            });-->
<!--        });-->
<!---->
<!--    </script>-->
<!--</head>-->
<!--<body>-->
<!---->
<!---->
<!---->
<!--</body>-->
<!--</html>-->

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

<body>
<button type="button" class="mdl-button show-modal">Show Modal</button>
<dialog class="mdl-dialog">
    <div class="mdl-dialog__content">
        <p>
            Allow this site to collect usage data to improve your experience?
        </p>
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
        <button type="button" class="mdl-button">Agree</button>
        <button type="button" class="mdl-button close">Disagree</button>
    </div>
</dialog>
<script>
    var dialog = document.querySelector('dialog');
    var showModalButton = document.querySelector('.show-modal');
    if (! dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    showModalButton.addEventListener('click', function() {
        dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
        dialog.close();
    });
</script>
</body>