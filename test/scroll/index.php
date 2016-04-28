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
            <button id="more">Click me</button>
        </div>
        <div class="messages"></div>
        <script src="../../frontend/js/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                var load = 0;
                var nbr = <?php echo $nbr; ?>;
                if (load * 2 > nbr) {
                    $('.messages').text = "Ingen flere bilder";
                    $('.loader').hide();
                } else {
                    $('#more').click(function () {
                        load++;
                        $.ajax({
                                method: 'POST',
                                url: 'ajax.php',
                                data: {
                                    load: load,
                                }
                            })
                            .done(function (data) {
                                $('.images').append(data);
                            });
                    });
                }
            });
        </script>
    </body>
</html>
