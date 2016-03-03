<?php
    /**
     * Created by PhpStorm.
     * User: jonathan
     * Date: 07/09/15
     * Time: 00:49
     */

    namespace Core;


    class Config {

        private $settings = [];

        private static $_Config;


        public function __construct () {
            $this->settings = require ROOT . CONFIG . 'config.php';
        }


        /**
         * Renvoie une instance unique de la configuration
         * @return Config
         */
        public static function getInstance () {
            if (self::$_Config == null)
                self::$_Config = new Config();

            return self::$_Config;
        }


        /**
         * Récupère la valeur associée à la clef
         *
         * @param $key
         *
         * @return null | $value
         */
        public function get ($key) {

            if (!isset($this->settings[$key]))
                return null;

            return $this->settings[$key];
        }

    }