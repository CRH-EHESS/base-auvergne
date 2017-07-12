# Introduction

Ce dépôt contient les sources du site web de la Base Auvergne du GAHOM-ALHOMA.

# Structure

Le site contient deux grandes parties :

- Le plan des églises est généré à partir de documents XML au format TEI utilisables par [Image Markup Tool](https://tapor.uvic.ca/~mholmes/image_markup).
- La gallerie des miniatures est elle générée avec Albulle.

# Développement

## Lancer le site en local

```shell
cd base-auvergne
php -S localhost:8000
```

## Régénérer les templates HTML produits par Image Markup Tool

En théorie, Image Markup Tool peut importer les fichiers `DATA/plan.xml`, et ré-générer les fichiers `.html` à partir de la feuille de style XML.

En pratique, les fichiers `.xsl` ont été modifié manuellement, pour insérer
le code spécifique d'affichage des miniatures. Il n'est donc plus possible de
régénérer les templates HTML à partir des sources en XML.

Il est en revanche possible d'éditer les fichiers HTML directement.

# Mettre à jour le site

## Téléchargement vers une machine locale

```shell
rsync --progress --recursive auvergne@auvergne.huma-num.fr:/sites/auvergne/www/web_main ./web_main
```

## Envoi vers le serveur distant

```shell
rsync --progress --recursive ./web_main auvergne@auvergne.huma-num.fr:/sites/auvergne/www/web_main
```
