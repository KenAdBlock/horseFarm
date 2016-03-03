<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 15/09/15
 * Time: 11:36
 */

namespace Content\Controller;


class CategoriesController extends AppController {

    protected $Model = 'Category';


    public function index() {

        $categories = 'test';

        $this->render('categories.index', compact('categories'));
    }

}