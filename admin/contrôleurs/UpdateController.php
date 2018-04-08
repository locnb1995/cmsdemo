<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 05-Apr-18
 * Time: 3:57 PM
 */
class UpdateController{


    public function update(){

        $fileName =  $_FILES['upload']['name'];
        $fileTmpName = $_FILES['upload']['tmp_name'];
        if(isset($_POST['uploadclick'])){
            if (isset($_FILES['upload'])){
                if (empty($_FILES['upload'])){
                    $fileName = null;
                } else {
                    move_uploaded_file($fileTmpName,'../../asset/img/'.$fileName);
                }
            }
        }
        require_once ('../modèles/Update.php');
        if(isset($_REQUEST['txtTitle']) && isset($_REQUEST['txtDes']) && isset($_REQUEST['status'])){
            $up = new Update();
            $up->addPost($_POST['txtId'],$_REQUEST['txtTitle'],$_REQUEST['txtDes'],$fileName,$_REQUEST['status']);
        }else{
            echo "vui long dien day du thong tin";
        }
    }
}
$uc = new UpdateController();
$uc->update();