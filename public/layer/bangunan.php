<?php
$url=file_get_contents("http://localhost:8080/geoserver/ngoro/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ngoro%3Abangunan&outputFormat=application%2Fjson");
echo($url);
?>