<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 07/09/15
 * Time: 11:09
 */

namespace Content\Controller;


use Core\App;

class StaticsController extends AppController {

    /**
     * StaticsController constructor.
     * Sending $static = true param
     */
    public final function __construct(){
        parent::__construct(true);
    }


    public function home() {

        $this->render('statics.home');
    }


    public function contact() {

        $this->render('statics.contact');
    }


}