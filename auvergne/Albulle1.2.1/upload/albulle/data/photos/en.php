<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
$exif = exif_read_data("Chapiteau_Mozac_Jonas_1.JPG", 0, true);
echo "alors, avec ou sans...:<br />\n";
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        echo "$key.$name: $val<br />\n";
    }
}
?>
