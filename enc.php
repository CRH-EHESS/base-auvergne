<?php
echo $str="Blabla, ceci est un test de l�?gende.a, ceci est un test de l�?gende. Blabla, ceci est un test de l�?gende. Blabla, ceci est un test de l�?gende. Blabla, ceci est un test de l�?gende. Blabla, ceci est un test de l�?gende. Blabla, ceci est un test de l�?gende. Blabla, ceci est un test de l�?gende. Blabla, ceci est un test de l�?gende.
";
echo mb_detect_encoding($str, 'UTF-8', true); 

?>
