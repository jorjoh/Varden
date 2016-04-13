

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Dialog - Modal message</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

    <div class="dialogBox" style="border:1px solid gray;">
        <a href="DataGrip.JPG" class="slideshow_zoom">Test</a>

        <!-- TODO: Change above href -->
        <!-- NOTE: Must be a local url, not cross domain -->
    </div>

    <script type="text/javascript">
        $('.slideshow_zoom').each(function() {
            var $link = $(this);

            var $dialog = $('<img src="' + $link.attr('href') + '" />')
                .dialog({
                    autoOpen: false,
                    resizeable: false,
                    modal: true,
                    width: 1000,
                    closeOnEscape: true,
                    dialogClass: 'zoom'
                });
            $link.click(function() {
                $dialog.dialog('open');

                return false;
            });
        });

    </script>
</head>
<body>



</body>
</html>