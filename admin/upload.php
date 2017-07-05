<?php
//variable de config
$rootdir = "/homez.111/desmotseo/www/auvergne"; // sans slash à la fin
 //fonction encode
   function encode($pass_str)
   {
   $pass_coder =  mcrypt_ecb(MCRYPT_TripleDES, "Secret", $pass_str, MCRYPT_ENCRYPT);
   return $pass_coder;
   }

   //fonction decode
   function decode($pass_coder)
   {
   $pass_str =  mcrypt_ecb(MCRYPT_TripleDES, "Secret", $pass_coder, MCRYPT_DECRYPT);
   return rtrim($pass_str, "\0\4");
   }


if ($_GET['rem']==1){

 	 function supprimer_repertoire($dir)  
 	 { 
 	  $current_dir = opendir($dir); 
 	  
 	  while($entryname = readdir($current_dir))  
 	  { 
 	  
 	   if(is_dir("$dir/$entryname") and ($entryname != "." and $entryname!=".."))  
 	   { 
 	   supprimer_repertoire("${dir}/${entryname}"); 
 	   }  
 	   elseif($entryname != "." and $entryname!="..") 
 	   { 
 	   unlink("${dir}/${entryname}"); 
 	   } 
 	  
 	  } //Fin tant que 
 	  
 	  closedir($current_dir); 
 	  rmdir(${dir}); 
 	 } 

supprimer_repertoire(rawurldecode(decode($_GET['dossier'])));
}
//get unique id
$up_id = uniqid(); 
//process the forms and upload the files
if ($_POST) {
//specify folder for file upload
$folder = "../tmp/"; 
//specify redirect URL
$redirect = "upload.php?success";

//upload the file
move_uploaded_file($_FILES["file"]["tmp_name"], "$folder" . $_FILES["file"]["name"]);

//do whatever else needs to be done (insert information into database, etc...)
$zip = new ZipArchive;
if ($zip->open($folder.$_FILES["file"]["name"]) === TRUE) {
$a = substr($_FILES["file"]["name"],0,-4);
    $zip->extractTo("/homez.111/desmotseo/www/auvergne/DATA/".$a);

//on copie les fichiers
copy("$rootdir/MODEL/index.php", "$rootdir/DATA/$a/index.php" );
copy("$rootdir/MODEL/index.css", "$rootdir/DATA/$a/$a.css" );

//on copie les images
copy("$rootdir/MODEL/close.gif", "$rootdir/DATA/$a/close.gif" );
copy("$rootdir/MODEL/fondboite.png", "$rootdir/DATA/$a/fondboite.png" );
copy("$rootdir/MODEL/rondfermer.png", "$rootdir/DATA/$a/rondfermer.png" );
//on supprime l'entête xml

$FG2 = file_get_contents("$rootdir/DATA/$a/$a.htm");
//on remplace le texte blanc par le gris
//$FG2=eregi_replace('000000', '646464', $FG2);
$FG2=eregi_replace('ffffff', '000000', $FG2);
$FG2=eregi_replace('Annotations',"<img onClick=\"affCache('AnnMenuContainer');\" width=\"299\" src=\"../images/header.png\" border=0>",$FG2);
file_put_contents("$rootdir/DATA/$a/$a.htm",$FG2);
//file_put_contents("/tmp/aa",$FG2);

$FG1=file("$rootdir/DATA/$a/$a.htm");

if (ereg('xml',$FG1[0])){
unset($FG1[0]);
file_put_contents("$rootdir/DATA/$a/$a.htm",$FG1);
}

//on créé le répertoire de debug et on décompresse
//mkdir($rootdir."/tmp/".$a);

$zip->extractTo($rootdir."/tmp/".$a);
$zip->close();

} else {
echo "ce n'est pas un fichier zip";
}

//redirect user
//header('Location: '.$redirect); die;
echo "<script type=\"text/javascript\">";
echo "<!--";
echo "window.location = \"../sommaire.php\"";
echo"-->";
echo "</script>";

}


//par défaut

        $files1 = scandir($rootdir.'/DATA/');
echo "<ul>";
foreach ($files1 as $value) {

 if(file_exists($rootdir."/DATA/".$value."/".$value."_wv.xml")){
  $xml = simplexml_load_file ($rootdir."/DATA/".$value."/".$value."_wv.xml");


echo "<li><a href=\"../DATA/".$value."/index.php?dossier=".$value."\" target=\"_blank\">".$xml->teiHeader->fileDesc->titleStmt->title."</a> - <a href=\"?rem=1&dossier=".rawurlencode(encode($rootdir."/DATA/".$value))."\" onclick=\"return confirm('suppression ?')\"><img src=\"http://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Nuvola_filesystems_file_broken.png/45px-Nuvola_filesystems_file_broken.png\" alt=\"SUPPRIMER\" width=\"12px\" height=\"12px\"></a></li>";
} else {
}
}
echo "</ul>";
echo "</div>";

//

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>IMT admin</title>
<SCRIPT LANGUAGE=Javascript>

function bonchoix()

{

resultat=confirm('Etes vous certain de votre choix ?');

if(resultat !="1")

window.location('upload.php');

}

</SCRIPT>

<!--Progress Bar and iframe Styling-->
<link href="style_progress.css" rel="stylesheet" type="text/css" />

<!--Get jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>

<!--display bar only if file is chosen-->
<script>

$(document).ready(function() { 
//

//show the progress bar only if a file field was clicked
	var show_bar = 0;
    $('input[type="file"]').click(function(){
		show_bar = 1;
    });

//show iframe on form submit
    $("#form1").submit(function(){

		if (show_bar === 1) { 
			$('#upload_frame').show();
			function set () {
				$('#upload_frame').attr('src','upload_frame.php?up_id=<?php echo $up_id; ?>');
			}
			setTimeout(set);
		}
    });
//

});

</script>

</head>

<body>

<div>
  <?php if (isset($_GET['success'])) { ?>
  <span class="notice">Ajout r&eacute;alis&eactute; avec succ&eagrave;s</span>
  <?php } ?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    Choisir un fichier ZIP g&eacute;n&eacute;r&eacute; par IMT<br />

<!--APC hidden field-->
    <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $up_id; ?>"/>
<!---->

    <input name="file" type="file" id="file" size="30"/>

<!--Include the iframe-->
    <br />
    <iframe id="upload_frame" name="upload_frame" frameborder="0" border="0" src="" scrolling="no" scrollbar="no" > </iframe>
    <br />
<!---->

    <input name="Submit" type="submit" id="submit" value="Submit" />
  </form>
  </div>
</body>

</html>
