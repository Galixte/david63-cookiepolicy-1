<?php
/**
*
* Cookie Policy extension for the phpBB Forum Software package.
* French translation by Galixte (http://www.galixte.com)
*
* @copyright (c) 2016 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ALL'									=> 'Toutes les pages',

	'CLICK_TO_SELECT'						=> 'Cliquer dans la boite pour sélectionner une couleur',

	'COOKIE_BLOCK_LINKS'					=> 'Bloquer tous les liens',
	'COOKIE_BLOCK_LINKS_EXPLAIN'			=> 'Interdit l’utilisateur d’accéder à tous liens sur le forum jusqu’à son acceptation de la politique des cookies.',
	'COOKIE_BOX_BDR_COLOUR'					=> 'Couleur de bordure de la boite des cookies',
	'COOKIE_BOX_BDR_COLOUR_EXPLAIN'			=> 'Permet de choisir la couleur de bordure de la boite d’acceptation des cookies.<br />La couleur par défaut est : « <strong>#FFFF8A</strong> ».',
	'COOKIE_BOX_BDR_WIDTH'					=> 'Largeur de bordure de la boite des cookies',
	'COOKIE_BOX_BDR_WIDTH_EXPLAIN'			=> 'Permet de choisir la largeur de bordure de la boite d’acceptation des cookies.<br />La largeur par défaut est : « <strong>1</strong> ».',
	'COOKIE_BOX_BG_COLOUR'					=> 'Couleur de l’arrière-plan de la boite des cookies',
	'COOKIE_BOX_BG_COLOUR_EXPLAIN'			=> 'Permet de choisir la couleur d’arrière-plan pour la boite d’acceptation des cookies.',
	'COOKIE_BOX_HREF_COLOUR'				=> 'Couleur du lien de la boite des cookies',
	'COOKIE_BOX_HREF_COLOUR_EXPLAIN'		=> 'Permet de choisir la couleur du lien d’acceptation pour la boite d’acceptation des cookies.',
	'COOKIE_BOX_TXT_COLOUR'					=> 'Couleur du texte de la boite des cookies',
	'COOKIE_BOX_TXT_COLOUR_EXPLAIN'			=> 'Permet de choisir la couleur du texte pour la boite d’acceptation des cookies.',
	'COOKIE_BOX_POSITION'					=> 'Position de la boite des cookies',
	'COOKIE_BOX_POSITION_EXPLAIN'			=> 'Permet de choisir la position de la boite d’acceptation des cookies sur la gauche ou la droite.',

	'COOKIE_CUSTOM_PAGE'					=> 'Couleurs pour la page des cookies',
	'COOKIE_CUSTOM_PAGE_CORNERS'			=> 'Utiliser les bords arrondis',
	'COOKIE_CUSTOM_PAGE_CORNERS_EXPLAIN'	=> 'Permet d’utiliser des bords arrondis sur la page de la politique des cookies.<br />Paramétrer sur : <strong>Non</strong> afin que la page ait des coins carrés.',
	'COOKIE_CUSTOM_PAGE_EXPLAIN'			=> 'Permet de choisir les couleurs personnalisées pour la page de la politique des cookies.<br />Paramétrer sur <strong>Non</strong> pour utiliser les couleurs par défaut.',
	'COOKIE_CUSTOM_PAGE_RADIUS'				=> 'Arrondis personnalisés de la page',
	'COOKIE_CUSTOM_PAGE_RADIUS_EXPLAIN'		=> 'Permet de définir l’arrondi personnalisé en pixels des coins de la page des cookies. Paramétrer sur 0 afin que la page ait des coins carrés.<br /><em>Le paramètre par défaut sur le style prosilver est 7 pixels.</em>',

	'COOKIE_EXPIRE'							=> 'Expiration du cookie',
	'COOKIE_EXPIRE_EXPLAIN'					=> 'Permet d’obliger l’utilisateur à accepter la politique des cookies chaque année.',

	'COOKIE_LEFT'							=> 'Gauche',

	'COOKIE_PAGE_BG_COLOUR'					=> 'Couleur de l’arrière-plan de la page des cookies',
	'COOKIE_PAGE_BG_COLOUR_EXPLAIN'			=> 'Permet de choisir la couleur d’arrière-plan pour la page de la politique des cookies.',
	'COOKIE_PAGE_TXT_COLOUR'				=> 'Couleur du texte de la page des cookies',
	'COOKIE_PAGE_TXT_COLOUR_EXPLAIN'		=> 'Permet de choisir la couleur du texte pour la page de la politique des cookies.',

	'COOKIE_POLICY_ENABLE'					=> 'Activer la politique des cookies',
	'COOKIE_POLICY_ENABLE_EXPLAIN'			=> 'Active / désactive sur le forum la boite d’acceptation des cookies aux utilisateurs concernés par la directive EU Cookie (2012).',
	'COOKIE_POLICY_EXPLAIN'					=> 'Permet de définir les options de la politique des cookies.',
	'COOKIE_POLICY_ON_INDEX'				=> 'Afficher uniquement sur l’index du forum',
	'COOKIE_POLICY_ON_INDEX_EXPLAIN'		=> 'Affiche la boite d’acceptation de la politique des cookies sur toutes les pages ou seulement sur la page de l’index.',
	'COOKIE_POLICY_OPTIONS'					=> 'Options de la politique des cookies',

	'COOKIE_REQUIRE'						=> 'Acceptation des cookies requis',
	'COOKIE_REQUIRE_EXPLAIN'				=> 'Oblige l’acceptation des cookies du forum avant qu’un membre ne puisse s’enregistrer et se connecter.<br />Néanmoins, paramétrée sur : « Oui » cette option permettra à l’utilisateur de consulter le forum (sous réserve des permissions nécessaires).',
	'COOKIE_RIGHT'					   		=> 'Droite',

	'COOKIE_SHOW_POLICY'					=> 'Afficher la politique des cookies',
	'COOKIE_SHOW_POLICY_EXPLAIN'			=> 'Affiche le lien de la politique des cookies dans la barre de navigation lorsque la boite d’acceptation des cookies est désactivée, permettant ainsi d’avoir une politique des cookies sans avoir la boite d’acceptation des cookies.',

	'CUSTOM_BOX_COLOURS'					=> 'Couleurs de la boite des cookies',
	'CUSTOM_BOX_COLOURS_EXPLAIN'			=> '<strong>Permet de modifier les couleurs selon votre style pour la boite d’acceptation des cookies.</strong>',
	'CUSTOM_PAGE_COLOURS'					=> 'Couleurs de la page des cookies',
	'CUSTOM_PAGE_COLOURS_EXPLAIN'			=> '<strong>Permet de modifier les couleurs selon votre style pour la page de la politique des cookies.</strong>',

	'PIXELS'								=> 'px',
));
