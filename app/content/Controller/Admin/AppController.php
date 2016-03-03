<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 09/09/15
 * Time: 21:51
 */

namespace Content\Controller\Admin;


use Core\App;
use Core\Auth\DBAuth;

class AppController extends \Content\Controller\AppController{

    public function __construct(){

        parent::__construct();

        $app = App::getInstance();

        $auth = new DBAuth($app->getDBInstance());

        if(!$auth->logged()) {
            header('HTTP/1.0 403 Forbidden');
            //$app->findController('users.login');
            $app->redirect('login');
            exit;
        }


    }

}