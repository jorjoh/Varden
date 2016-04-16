<?php
include "dbcon.php";

$sql = "SELECT latitude, longitude FROM place WHERE id = 1141";
$result = mysqli_query($connect, $sql) or die('Kunne ikke hente bildet fra DB'); // resultatet fra spørringen over
$rows = mysqli_num_rows($result); // Teller antall rader som returneres fra resultatet
$row = mysqli_fetch_array($result); // Henter kolonnene inn i egne array
$latitude = $row['latitude'];
$longitude = $row['longitude'];

echo "<p id='lat'>$latitude</p><br/>";
echo "<p id='lon'>$longitude</p><br/>";

?>


<!DOCTYPE PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBcTYUrPeY0gc7yupyDrETlmhNI2KEQ5Mo"></script>

    <script>
        var lat = document.getElementById("lat").value;
        var lon = document.getElementById("lon").value;
        document.write(lat);
        document.write(lon);

        var myCenter=new google.maps.LatLng((<?php echo $latitude?>),(<?php echo $longitude?>));

        function initialize()
        {
            var mapProp = {
                center:myCenter,
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker=new google.maps.Marker({
                position:myCenter,
            });

            marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body>
<div id="googleMap" style="width:500px;height:380px;"></div>
</body>
</html>