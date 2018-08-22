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
	'ALL'								=> 'Tous',

	'CLICK_TO_SELECT'					=> 'Cliquer dans la boite pour sélectionner une couleur',

	'COOKIE_BOX_BDR_COLOUR'				=> 'Couleur de bordure de la boite des cookies',
	'COOKIE_BOX_BDR_COLOUR_EXPLAIN'		=> 'Permet de choisir la couleur de bordure de la boite d’acceptation des cookies.<br />La couleur par défaut est : « <strong>#FFFF8A</strong> ».',
	'COOKIE_BOX_BDR_WIDTH'				=> 'Largeur de bordure de la boite des cookies',
	'COOKIE_BOX_BDR_WIDTH_EXPLAIN'		=> 'Permet de choisir la largeur de bordure de la boite d’acceptation des cookies.<br />La largeur par défaut est : « <strong>1</strong> ».',
	'COOKIE_BOX_BG_COLOUR'				=> 'Couleur de l’arrière-plan de la boite des cookies',
	'COOKIE_BOX_BG_COLOUR_EXPLAIN'		=> 'Permet de choisir la couleur d’arrière-plan pour la boite d’acceptation des cookies.',
	'COOKIE_BOX_HREF_COLOUR'			=> 'Couleur du lien de la boite des cookies',
	'COOKIE_BOX_HREF_COLOUR_EXPLAIN'	=> 'Permet de choisir la couleur du lien d’acceptation pour la boite d’acceptation des cookies.',
	'COOKIE_BOX_TXT_COLOUR'				=> 'Couleur du texte de la boite des cookies',
	'COOKIE_BOX_TXT_COLOUR_EXPLAIN'		=> 'Permet de choisir la couleur du texte pour la boite d’acceptation des cookies.',
	'COOKIE_BOX_POSITION'				=> 'Position de la boite des cookies',
	'COOKIE_BOX_POSITION_EXPLAIN'		=> 'Permet de choisir la position de la boite d’acceptation des cookies sur la gauche ou la droite.',

	'COOKIE_CUSTOM_PAGE'				=> 'Couleurs pour la page des cookies',
	'COOKIE_CUSTOM_PAGE_EXPLAIN'		=> 'Permet de choisir les couleurs personnalisées pour la page de la politique des cookies.<br />Paramétrer sur <strong>Non</strong> pour utiliser les couleurs par défaut.',

	'COOKIE_DETECT'						=> 'Détection de cookie est nécessaire',
	'COOKIE_DETECT_EXPLAIN'				=> 'Tente de détecter si l’utilisateur est situé dans un état de l’UE et implique l’acceptation des cookies pour cet utilisateur.<br /><strong>Note :</strong> la détection peut ne pas être exacte et elle n’est pas recommandée pour les forums où la majorité des utilisateurs proviennent de l’UE.',

	'COOKIE_EXPIRE'						=> 'Expiration du cookie',
	'COOKIE_EXPIRE_EXPLAIN'				=> 'Permet d’obliger l’utilisateur à accepter la politique des cookies chaque année.',

	'COOKIE_LEFT'						=> 'Gauche',
	'COOKIE_LOG_ERRORS'					=> 'Journal des erreurs',
	'COOKIE_LOG_ERRORS_EXPLAIN'			=> 'Fournit au journal la liste des erreurs détectées par adresse IP de l’utilisateur.',

	'COOKIE_PAGE_BG_COLOUR'				=> 'Couleur de l’arrière-plan de la page des cookies',
	'COOKIE_PAGE_BG_COLOUR_EXPLAIN'		=> 'Permet de choisir la couleur d’arrière-plan pour la page de la politique des cookies.',
	'COOKIE_PAGE_TXT_COLOUR'			=> 'Couleur du texte de la page des cookies',
	'COOKIE_PAGE_TXT_COLOUR_EXPLAIN'	=> 'Permet de choisir la couleur du texte pour la page de la politique des cookies.',

	'COOKIE_POLICY'						=> 'Politique des cookies',
	'COOKIE_POLICY_ENABLE'				=> 'Activer la politique des cookies',
	'COOKIE_POLICY_ENABLE_EXPLAIN'		=> 'Active / désactive sur le forum la boite d’acceptation des cookies aux utilisateurs concernés par la directive EU Cookie (2012).',
	'COOKIE_POLICY_EXPLAIN'				=> 'Permet de définir les options de la politique des cookies.',
	'COOKIE_POLICY_LOG'					=> '<strong>Les paramètres de la politique des cookies ont été mis à jour</strong>',
	'COOKIE_POLICY_MANAGE'				=> 'Gestion des paramètres',
	'COOKIE_POLICY_ON_INDEX'			=> 'Afficher uniquement sur l’index du forum',
	'COOKIE_POLICY_ON_INDEX_EXPLAIN'	=> 'Affiche la boite d’acceptation de la politique des cookies sur toutes les pages ou seulement sur la page de l’index.',
	'COOKIE_POLICY_OPTIONS'				=> 'Options de la politique des cookies',

	'COOKIE_RIGHT'						=> 'Droite',

	'COOKIE_SHOW_POLICY'				=> 'Afficher la politique des cookies',
	'COOKIE_SHOW_POLICY_EXPLAIN'		=> 'Affiche le lien de la politique des cookies dans la barre de navigation lorsque la boite d’acceptation des cookies est désactivée, permettant ainsi d’avoir une politique des cookies sans avoir la boite d’acceptation des cookies.',

	'CUSTOM_BOX_COLOURS'				=> 'Couleurs de la boite des cookies',
	'CUSTOM_BOX_COLOURS_EXPLAIN'		=> '<strong>Permet de modifier les couleurs selon votre style pour la boite d’acceptation des cookies.</strong>',
	'CUSTOM_PAGE_COLOURS'				=> 'Couleurs de la page des cookies',
	'CUSTOM_PAGE_COLOURS_EXPLAIN'		=> '<strong>Permet de modifier les couleurs selon votre style pour la page de la politique des cookies.</strong>',

	'LOG_COOKIE_ERROR'					=> '<strong>Échec de la recherche d’IP</strong>',
	'LOG_CURL_ERROR'					=> '<strong>cURL n’est pas disponible sur ce serveur</strong>',
	'LOG_SERVER_ERROR'					=> '<strong>Impossible de se connecter à l’IP du serveur</strong>',

	'PIXELS'							=> 'px',

	'UNBAN_IP'							=> 'Lever l’interdiction de l’adresse IP',
	'UNBAN_IP_EXPLAIN'					=> 'Le système va automatiquement bannir toute adresse IP effectuant plus de 250 requêtes par minute. Si votre adresse IP a été bannie, <a href="http://ip-api.com/docs/unban">cliquer ici</a> pour accéder au formulaire de levée d’interdiction.',

	'YOUR_IP'							=> 'L’adresse IP de votre serveur semble être',
));
