<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 03-Apr-18
 * Time: 11:38 AM
 */
class PostController{

    public function getPost(){
        require_once ('../modèles/Post.php');
        $post = new Post();
        $posts = $post->allPost();
        return $posts;
    }

}