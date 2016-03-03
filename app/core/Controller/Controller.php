<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 07/09/15
 * Time: 11:05
 */

namespace Core\Controller;

use Core\App;
use Core\Config;
use Core\Router\Router;
use Core\Tools\HtmLawed;

class Controller {

	protected $viewPath;

	protected $layout;

	protected $Model;


	public function __construct( $static = false ) {

		$config = Config::getInstance();

		$this->viewPath = ROOT . VIEW;

		$this->layout = $config->get( 'layout' );


		if ( ! $static ) {
			if ( is_null( $this->Model ) ) {
				$classname   = explode( '\\', get_class( $this ) );
				$this->Model = str_replace( 'sController', '', end( $classname ) );
			}


			$this->loadModel( $this->Model );
		}

	}


	/**
	 * Function Render()
	 * Transmet les informations du controller à la vue et l'intègre dans le Layout
	 *
	 * @param String $view : Vue à récupérer
	 * @param array $vars : Variables passées à la vue
	 * @param string $engine : Moteur de rendu (twig par défaut)
	 */
	public function render( $view, $vars = [ ], $engine = 'twig' ) {

		$view = str_replace( '.', '/', $view );
		switch ( $engine ) {
			case 'twig':
				$this->renderTwig( $view, $vars );
				break;
			case 'php':
				$this->renderPhp( $view, $vars );
				break;
			default:
				$this->renderTwig( $view, $vars );
		}
	}

	public function renderPhp( $view, $vars ) {
		/*$preview = str_replace('Content\Controller\\', '', get_class($this));
		$preview = strtolower(str_replace('Controller', '', $preview));*/

		ob_start();

		extract( $vars );

		$filePath = $view . '.php';

		$twigEngine = App::getInstance()->getTwig();
		echo $twigEngine->render( $filePath, $vars );

		$content = ob_get_clean();

		require_once ROOT . LAYOUT . $this->layout . '.php';
	}

	public function renderTwig( $view, $vars ) {
		$twigEngine = App::getInstance()->getTwig();

		$layout          = $twigEngine->loadTemplate( $this->layout . '.twig' );
		$vars['_layout'] = $layout;

		echo $twigEngine->render( $view . '.twig', $vars );
	}


	// Charge un Model et permet de l'utiliser sous la forme : $this->ModelName
	public function loadModel( $modelName ) {
		$app                = App::getInstance();
		$this->{$modelName} = $app->getTable( $modelName );
	}


	/**
	 * Vérifie le token passé en paramètre
	 *
	 * @param string $token
	 * @param int $duration temps avant expiration (defaut 15min)
	 *
	 * @return bool
	 */
	protected function check_csrf( $token, $duration = 15 ) {

		if ( isset( $_SESSION['csrf'] ) && isset( $_SESSION['csrfTime'] ) ) {

			if ( $_SESSION['csrf'] == $token ) {
				$expired = time() - ( $duration * 60 );

				if ( $_SESSION['csrfTime'] >= $expired ) {
					return true;
				}

			}

		}

		return false;
	}

}