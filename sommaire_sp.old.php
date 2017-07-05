<?php
$rootdir="./DATA_SP";
$dataName="./DATA_SP";

$datadir="./DATA_SP";
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
li {
list-style-image: url(images/flecheRouge.png);

}
#menu_horizontal li {
display:inline;
list-style : none;
}
 #footer {
clear: both;
background-image:url('images/footer.jpg');
background-repeat:repeat-x;
height: 25px;
 }

.menuV {
padding:8px;
    font-variant: small-caps;
}

<style>
<?php

include 'headS_sp.php';
echo "<div style=\"min-height:300px;\">";
	$files1 = scandir($datadir);
echo "<div style=\"padding:15px;margin-left:50px;\>";
echo "<ul style=\"padding:8px;\">";
foreach ($files1 as $value) {
 if((is_dir("./DATA_SP/".$value)) && (file_exists("./DATA_SP/".$value."/".$value."_wv.xml"))){
  $xml = simplexml_load_file ("./DATA_SP/".$value."/".$value."_wv.xml");
/*
$FG = file_get_contents($value."/".$value.".htm");

 $contenu_array = explode("\n",$FG);

if (preg_match('/xml/i',$contenu_array[0])){
$FG=substr($FG,39,-1);
file_put_contents('/tmp/'.$value.'.htm',$FG);
}
*/
/* FICHIER
$FG1=file($value."/".$value.".htm");
//  eregi_replace('#ffffff', '#000000', $FG1);
//file_put_contents('/tmp/EREG'.$value.'.htm',$FG1);

if (ereg('xml',$FG1[0])){
unset($FG1[0]);

file_put_contents($value."/".$value.".htm",$FG1);
}
*/

echo "<li class=\"menuV\"><a href=\"".$dataName."/".$value."/index.php?dossier=".$value."&titre=".$xml->teiHeader->fileDesc->titleStmt->title."&lien=".$xml->teiHeader->fileDesc->publicationStmt."\">".$xml->teiHeader->fileDesc->titleStmt->title."</a></li>";
}
}
echo "</ul>";
echo "</div>";
echo "</div>";
include 'footer.php';

?>
