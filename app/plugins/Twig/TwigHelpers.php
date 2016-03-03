<?php
/**
 * Created by PhpStorm.
 * User: crozet
 * Date: 28/01/2016
 * Time: 19:42
 */

namespace Plugins\Twig;


use Core\App;
use Core\Config;

class TwigHelpers extends \Twig_Extension
{

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'TwigHelpers';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('call_static',  [$this, 'callStatic']),
            new \Twig_SimpleFunction('app_function', [$this, 'appFunction']),
            new \Twig_SimpleFunction('config_get',   [$this, 'configGet']),
        ];
    }

    public function callStatic($class, $func, $args = []){
        return call_user_func_array([$class, $func], $args);
    }

    public function appFunction($func, $args = []){
        $app = App::getInstance();
        return call_user_func_array([$app, $func], $args);
    }

    public function configGet($key){
        $config = Config::getInstance();
        return $config->get($key);
    }
}