{>header}

		<div id="albulle" style="background-color:#646464;"><!-- cadre principal -->


			<div class="droite"><div class="contenu"><!-- cadre droite -->

				<h3>{$lien_retour_site}{$fil_ariane}</h3>

				{>menu_galerie}
				{>texte}
				{>diapositive}
				{>galerie}
				{?dossier_vide}
				<div class="texte">
					<p class="puceNoPhoto">Il n'y a pas de photos dans ce dossier.</p>
				</div>
				{dossier_vide?}

			<!--	<div class="spacer_post_float"></div> -->

				<!--{>sous_dossiers} -->

			</div></div><!-- cadre droite -->

			<div class="gauche"><!-- cadre gauche -->

				<div class="dossiers"><!-- cadre dossiers photos -->
<div style="witdh:100%;	background-color:white;text-align:left; background-repeat: no-repeat;height:19px;"><img width="295px" src="./albulle/themes/albulle/images/fondboiteAlbulle.png" border="0"/></div>

<div style="text-align:left; margin-left:20pt;"><font style="border-width:100%;border-bottom : 1px dotted #B82125;color: #B82125;font-size: 13pt ;  font-variant: small-caps; font-weight: 400;">Photos des chapiteaux</font></div>

					{?arborescence}
					<ul class="menu">
						{$arborescence}
					</ul>
					{or arborescence}
					<p>Aucun dossier pour l'instant.</p>
					{arborescence?}

					<!--<div class="spacer"></div>-->
<div style="witdh:100%;background-color:white;text-align:left; vertical-align: bottom;height:30px;"><img width="295px" height="30px" src="./albulle/themes/albulle/images/fondboitebas.png" border="0"/></div>

				</div><!-- cadre dossiers photos -->

				{?panier_actif}

				<div class="panier"><!-- cadre gestion du panier -->
<div style="witdh:100%;background-color:white;text-align:left; background-repeat: no-repeat;height:19px;"><img width="295px" src="./albulle/themes/albulle/images/fondboiteAlbulle.png" border="0"/></div>

					<div style="text-align:left; margin-left:20pt;"><font style="border-width:100%;border-bottom : 1px dotted #B82125;color: #B82125;font-size: 13pt ;  font-variant: small-caps; font-weight: 400;">Photos dans le panier</font></div>

					<p style="text-align:left; margin-left:20pt;"> Fichiers dans le panier : <strong style="color:#B82125;">{$nombre_fichiers_panier}</strong><br />
					Estimation poids final de l'archive : <strong style="color:#B82125;">{$poids_estime}</strong><br />
					<em>(Capacité du panier : {$panier_capacite})</em></p>

					{>menu_panier}

					<!--<p class="asterisque">(*) Ces informations sont celles de l'image qui sera téléchargée et non de celle affichée.</p>-->
					
					<!--<div class="spacer"></div>-->
<div style="witdh:100%;background-color:white;text-align:left; vertical-align: bottom;height:30px;"><img width="295px" height="30px" src="./albulle/themes/albulle/images/fondboitebas.png" border="0"/></div>				
</div><!-- cadre gestion du panier -->
				{panier_actif?}


			</div><!-- cadre gauche -->

		</div><!-- cadre principal -->

{?non_integre}
	</body>

</html>
{non_integre?}
