<?php
    /**
     * Created by PhpStorm.
     * User: jonathan
     * Date: 07/09/15
     * Time: 11:09
     */

    namespace Content\Controller;


    use Core\App;
    use Core\Auth\DBAuth;

    class UsersController extends AppController {


        public function index () {

            $users = $this->User->all ();

            $this->render ('users.index', compact ('users', 'model'));
        }


        public function login () {

            //echo hash("sha512", 'toto' . '123');

            $auth = new DBAuth(App::getDBInstance ());

            if ($auth->logged ()) {
                App::getInstance ()->redirect ('admin.posts.index');
            }

            if (isset($_POST['data']) && !empty($_POST['data'])) {

                if (!$this->check_csrf ($_POST['data']['User']['token'])) {
                    return false;
                }

                if ($auth->login ($_POST['data']['User']['email'], $_POST['data']['User']['password']))
                    App::getInstance ()->redirect ($_GET['p']);

            }

            $this->render ('users.login');
        }


        public function logout () {

            $app = App::getInstance ();

            $auth = new DBAuth($app->getDBInstance ());
            $auth->logout ();

            return $app->redirect ('users.login');
        }

    }