<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 07/09/15
 * Time: 11:09
 */

namespace Content\Controller;


use Core\App;

class PostsController extends AppController {

    public function index() {

        $posts = $this->Post->all();

        $this->render('posts.index', compact('posts'));
    }


    /**
     * @param int $id
     * @param string $fuck
     */
    public function show($id){

        $post = $this->Post->find($id);

        $this->render('posts.show', compact('post'));
    }

}