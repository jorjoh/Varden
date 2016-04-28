<?php
require_once('../../frontend/inc/functions/dbcon.php');

$sql = "SELECT * FROM images LIMIT 0,2;";
$count = "SELECT * FROM images;";
$result = mysqli_query($connect, $sql);
$numresult = mysqli_query($connect, $count);
$nbr = mysqli_num_rows($numresult);
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Infinite scroll - test</title>
        <style>
            .loader {
                position: fixed;
                bottom: 0;
                left: 450px;
            }
        </style>
    </head>
    <body>
        <div class="images">
            <?php
                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <p><img src="../../frontend/uploads/<?php echo $row['filename']; ?>.jpg" height="500" width="500"></p>
                <?php
                }
            ?>
        </div>
        <div class="loader">
            <img src="../../frontend/uploads/loader.gif">
        </div>
        <div class="messages"></div>
        <script src="../../frontend/js/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.loader').hide();
                var load = 0;
                var nbr = <?php echo $nbr; ?>;
                $(window).scroll(function() {
                    if($(window).scrollTop() == $(document).height() - $(window).height()) {
                        $('.loader').show();
                        load++;
                        if(load * 2 > nbr) {
                            $('.messages').text = "Ingen flere bilder";
                            $('.loader').hide();
                        }
                        else {
                            $.post("ajax.php", {load:load}, function(data) {
                                $('.images').append(data);
                                $('.loader').hide();
                            });
                        }
                    }
                });
            });
        </script>
    </body>
</html>
