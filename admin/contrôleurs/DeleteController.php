<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 05-Apr-18
 * Time: 5:02 PM
 */
class DeleteController{

    public function del(){
        require_once ('../modèles/Delete.php');
        $delpost = new Delete();
        $delpost->delPost($_GET['id']);
    }

}
$dc = new DeleteController();
$dc->del();