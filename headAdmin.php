<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style>
#AnnMenuContainer{
}
ul#menu_horizontal li { 
display : inline;
padding : 0 0.5em; /* Pour espacer les boutons entre eux */

}
ul#menu_horizontal {
list-style-type : none; /* Car sinon les puces se placent n'importe où */
}
 
img {
	border: none;
}

.menu_h{
margin-top: 5; padding-top: 5;
font-family: "Times New Roman", verdana, sans-serif;
color: #b82125 ;
font-size: 12pt ;
}

a {color: #646464 ;
}
a.menu_h {text-decoration: none;}
a.menu_h:link {text-decoration: none;}
a.menu_h:hover {text-decoration: none;}

#header {
height: 25px;
background-color:#8d6437;
}
#header2 {
text-align:right;

}

 /* hack IE */
 #minheight {
   height: 600px;
   float: right;
   width: 1px;
 }

 /* hack IE */
 #minclear {
   clear: both;
   height: 1px;
   overflow: hidden;
 }

 #footer {
clear: both;
background-image:url('../images/footer.jpg');
background-repeat:repeat-x;
height: 25px;
 }


 #ombre {
clear: both;
background-image:url('../images/ombre.png');
background-repeat:repeat-x;
 }


#titre {
margin: 5; padding: 5;
/*height: 30px;*/
text-align:center;
border-bottom : 2px dotted red ;
font-family: "Times New Roman", verdana, sans-serif;
color: #996633 ;
font-size: 22pt ;
font-variant: small-caps;

}

.lDispo {
font-family: "Times New Roman", verdana, sans-serif;
color: #996633 ;
font-size: 12pt ;


}



.lpasDispo {
font-family: "Times New Roman", verdana, sans-serif;
color: #c1b99a ;
font-size: 12pt ;


}
img { 
  vertical-align:sub; 
} 

</style>
<script>
function plus_125(){
if (document.body.style.fontSize=="250%"){
document.body.style.fontSize="100%";
} else { 
document.body.style.fontSize="250%";
}
}

function affCache(idpr)
{
	var pr = document.getElementById(idpr);
 
	if (pr.style.display == "") {
		pr.style.display = "none";
	} else {
		pr.style.display = "";
	}
}

</script>
</head>
<body style="min-width:1200px";>
<div id="header"></div>
<div id"header2" style="text-align:right;"><img src="../images/demirond.png" style="border:0;margin:0;padding:0"></div>
<div id="titre">Interface d'Admin</div>
<table  width="100%">
<tr width="100%">
<td width="70%" align="center">
</td>
<td width="100%" align="right">	
<ul id="menu_horizontal">
	<li class="lDispo">FR</li>
<li class="lpasDispo">EN</li> 
	<li class="lpasDispo">SP</li>
	</ul>
</td>
</tr>
</table>
<div id="ombre">&nbsp;</div>
