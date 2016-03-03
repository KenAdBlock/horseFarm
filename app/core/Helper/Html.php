<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 07/09/15
 * Time: 09:49
 */

namespace Core\Helper;


class Html extends Helper {


    /**
     * Permet de charger facilement un fichier CSS
     * @param $filename
     * @return null|string
     */
    public static function css($filename) {

        if(file_exists(ROOT . CSS . $filename . '.css'))
            return BASE_URL . CSS . $filename . '.css';

        return null;
    }


    /**
     * Permet de charger facilement un fichier JS
     * @param $filename
     * @return null|string
     */
    public static function js($filename) {

        if(file_exists(ROOT . JS . $filename . '.js'))
            return BASE_URL . JS . $filename . '.js';

        return null;
    }


    /**
     * Function img()
     * Permet de charger facilement une image
     * @param $filename
     *
     * @return null|string
     */
    public static function img($filename) {

        if(file_exists(ROOT . IMG . $filename))
            return BASE_URL . IMG . $filename;

        return null;
    }


    /**
     * Function link()
     * Génère un lien
     * @param String $link
     *
     * @return string
     */
    public static function link($link) {
        $link = str_replace('.', '/', $link);
        return BASE_URL . $link;
    }

}