<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 07/09/15
 * Time: 00:56
 */


/**
 * Fichier config
 *
 * Permet d'effectuer la configuration de MCMS
 */


return array(

	// Si debug actif, affichage des erreurs PHP et SQL + temps execution page
	"debug"              => 1,

	// Layout par défaut du site
	"layout"             => "default",

	/**
	 * Url complémentaire du site (facultatif)
	 *
	 * Si votre application ne se trouve pas à la racine
	 * Exemple : si votre site est dans www.monsite.fr/dossier/MCMS
	 * alors "base_url" => "dossier/MCMS"
	 * Sinon laissez base_url vide.
	 * */
	"base_url"           => "projects/mine",

	// Titre du site
	"title"              => "Data Mining",

	/**
	 * Connexion à la BD
	 *
	 * db_engine : mysql,
	 *
	 * Laissez le port vide si vous utilisez une configuration par défaut
	 * de mysql (port par défaut : 3306)
	 * */
	"db_engine"          => "mysql",
	"db_name"            => "mine",
	"db_host"            => "localhost",
	"db_port"            => "",
	"db_user"            => "root",
	"db_password"        => "root",


	// Email
	"email"              => "",

	// Twig configuration
	/**
	 * Chemin du dossier des templates twig relatif à la racine du projet
	 * Possibilité de mettre un tableau de dossiers.
	 * Twig cherchera les templates dans tous les dossiers renseignés dans l'ordre.
	 */
	"twig_template_path" => [
		'app/content/Layout',
		'app/content/View',
	]
);