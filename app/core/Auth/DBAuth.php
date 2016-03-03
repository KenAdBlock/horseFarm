<?php
    /**
     * Created by PhpStorm.
     * User: jonathan
     * Date: 09/09/15
     * Time: 22:52
     */

    namespace Core\Auth;


    use Core\Database\Database;

    /**
     * Class DBAuth
     * @package Core\Auth
     *
     * Permet de gérer l'authentification par les sessions
     */
    class DBAuth {

        protected $db;


        public function __construct (Database $db) {
            $this->db = $db;
        }


        /**
         * Function login()
         * Cherche un utilisateur en BD et le connecte s'il existe et que le mot de passe correspond
         *
         * @param $email
         * @param $password
         *
         * @return bool
         */
        public function login ($email, $password) {

            $query = "SELECT * FROM users where email = ?";

            $user = $this->db->prepare ($query, [$email], null, true);

            if (empty($user)) {
                return false;
            }

            if ($this->checkPassword ($password, $user->salt, $user->password)) {
                return $this->authenticate ($user->id);
            }

            return false;
        }


        /**
         * Function checkPassword()
         * Vérifie que password entré par l'utilisateur correspond au password hashé en BD concernant cet utilisateur.
         *
         * @param String $password     : mot de passe à tester
         * @param String $salt         : salt de l'utilisateur enregistré en BD ($user->salt)
         * @param String $userPassword : mot de passe hashé en BD de l'utilisateur ($user->password)
         *
         * @return bool
         */
        private function checkPassword ($password, $salt, $userPassword) {

            $sha512Password = hash ("sha512", $password . $salt);

            return $sha512Password === $userPassword;
        }


        /**
         * Function authenticate()
         * Enregistre l'utilisateur en session
         *
         * @param $id
         *
         * @return mixed
         */
        private function authenticate ($id) {
            return $_SESSION['Auth'] = $id;
        }


        /**
         * function logged()
         * Vérifie si un utilisateur est connecté
         *
         * Renvoie faux ou l'id de l'utilisateur connecté
         * @return bool || user_id
         */
        public function logged () {

            if (isset($_SESSION['Auth'])) {
                return $_SESSION['Auth'];
            }
            
            return false;
        }


        /**
         * Function logout()
         * Déconnecte un utilisateur
         *
         */
        public function logout () {

            $_SESSION = [];
            session_destroy ();

        }

    }