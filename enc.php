<?php
echo $str="Blabla, ceci est un test de lÂ?gende.a, ceci est un test de lÂ?gende. Blabla, ceci est un test de lÂ?gende. Blabla, ceci est un test de lÂ?gende. Blabla, ceci est un test de lÂ?gende. Blabla, ceci est un test de lÂ?gende. Blabla, ceci est un test de lÂ?gende. Blabla, ceci est un test de lÂ?gende. Blabla, ceci est un test de lÂ?gende.
";
echo mb_detect_encoding($str, 'UTF-8', true); 

?>
