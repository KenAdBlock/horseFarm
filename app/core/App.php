<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 06/09/15
 * Time: 17:36
 */

namespace Core;


use Core\Database\MysqlDatabase;
use Core\Helper\Html;
use Core\Router\Router;

use Content\Autoloader;
use Content\Table;
use Content\Controller;

use Plugins\Twig\TwigHelpers;
use Plugins\Twig\TwigMaterialize;


class App {

	private static $title = 'Untitled';

	private static $_App;

	private static $db_instance;

	private static $time;

	private static $twig;


	/**
	 * Permet de charger l'application
	 */
	public static function load() {

		// Temps execution
		self::$time = microtime( true );

		// Permet d'utiliser les sessions
		session_start();

		// Chargement automatique des classes de Core
		require_once ROOT . CORE . 'Autoloader.php';
		\Core\Autoloader::register();

		// Chargement automatique des classes de Content
		require_once ROOT . CONTENT . 'Autoloader.php';
		Autoloader::register();


		// Chargement automatique des plugins
		require_once ROOT . PLUGINS . 'Autoloader.php';
		\Plugins\Autoloader::register();

		// Twig autoloader
		require_once VENDOR . 'autoload.php';


	}

	public function getTime() {
		return self::$time;
	}

	public function getExecutionTime() {
		return microtime( true ) - self::$time;
	}

	// Renvoie le titre de l'application
	public static function getTitle() {
		return self::$title;
	}


	// Permet de modifer le titre de l'application
	public static function setTitle( $title ) {
		self::$title = $title;
	}


	// Renvoie une instance unique de l'application
	public static function getInstance() {

		if ( self::$_App == null ) {
			self::$_App = new App();
		}

		return self::$_App;
	}


	// Renvoie une instance unique de la BD
	public static function getDBInstance() {

		$config = Config::getInstance();

		$db_engine   = $config->get( 'db_engine' );
		$db_name     = $config->get( 'db_name' );
		$db_host     = $config->get( 'db_host' );
		$db_user     = $config->get( 'db_user' );
		$db_password = $config->get( 'db_password' );
		$db_port     = $config->get( 'db_port' );

		if ( self::$db_instance == null ) {
			self::$db_instance = new MysqlDatabase(
				$db_name,
				$db_host,
				$db_user,
				$db_password
			);
		}

		return self::$db_instance;
	}


	public function getTable( $tablename ) {

		$classname = 'Content\Table\\' . ucfirst( $tablename ) . 'Table';

		return new $classname( $this->getDBInstance() );
	}


	/**
	 * Function findController()
	 *
	 * @param string $p : page à afficher
	 *
	 * @return int
	 */
	public function findController( $p = 'home' ) {

		$page = str_replace( '.', '/', $p );


		if ( ! file_exists( VIEW . "{$page}.twig" ) || $page == 'home' ) {
			$twigEngine = App::getInstance()->getTwig();

			$layout          = $twigEngine->loadTemplate( "default" . '.twig' );
			$vars['_layout'] = $layout;

			echo $twigEngine->render( "statics/home" . '.twig', $vars );

			return 0;
		} else {
			$parts = explode( '/', $page );

			// Nom de l'action
			$action = end( $parts );

			// Nom du Modèle
			$modelName = substr( ucfirst( prev( $parts ) ), 0, - 1 );

			// On ajoute un eventuel prefix (ex: le prefix Admin)
			if ( sizeof( $parts ) > 2 ) {
				$prefix = ucfirst( $parts[0] ) . '\\';
			} else {
				$prefix = '';
			}

			// Nom du controller
			$controllerName = "Content\\Controller\\$prefix" . $modelName . 'sController';

			// Nouvelle instance du Controller appelé
			$controller = new $controllerName();

			// Appel de l'action demandée
			$controller->$action();


		}

	}

	/**
	 * Function run()
	 * Gère le routage automatique
	 */
	public function run() {

		// Url GET
		if ( isset( $_GET['p'] ) ) {
			$p = htmlspecialchars( $_GET['p'] );
		} else {
			$p = 'home';
		}

		// Récupération de l'instance du Router
		$router = Router::getInstance( $p );

		// Inclusion des éventuels préfix et routes de l'utilisateur
		include_once CONTENT . 'connect.php';

		/* Définition automatique des routes GET */
		$router->autoget( $p );

		/* Définition automatique des routes POST */
		if ( isset( $_POST ) && ! empty( $_POST ) ) {
			$router->autopost( $p );
		}

		/* Lancement du router */
		$router->run();
	}


	/**
	 * Function redirect()
	 * Redirige vers la page spécifiée
	 *
	 * @param $page
	 */
	public function redirect( $page ) {

		header( 'Location: ' . Html::link( $page ) );
	}

	public function getTwig() {
		$config = Config::getInstance();
		$paths  = $config->get( 'twig_template_path' );

		if ( is_array( $paths ) ) {
			array_walk( $paths, function ( &$value ) {
				$value = ROOT . $value;
			} );
		}

		$loader = new \Twig_Loader_Filesystem( $paths );

		if ( empty( $this->twig ) ) {
			self::$twig = new \Twig_Environment( $loader );
			self::$twig->addExtension( new TwigMaterialize() );
			self::$twig->addExtension( new TwigHelpers() );
		}

		return self::$twig;
	}


	public static function getBaseUrl() {
		return BASE_URL;
	}

}