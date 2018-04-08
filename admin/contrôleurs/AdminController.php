<?php

class AdminController{
    public function add(){
        if(isset($_POST['uploadclick'])){
            if (isset($_FILES['upload'])){
                if ($_FILES['upload']['error'] > 0){
                    echo 'File Upload Bị Lỗi';
                } else {
                    $fileName =  $_FILES['upload']['name'];
                    $fileTmpName = $_FILES['upload']['tmp_name'];

                    move_uploaded_file($fileTmpName,'../../asset/img/'.$fileName);
                }
            }
        }
        require_once ('../modèles/Admin.php');
        if(isset($_REQUEST['txtTitle']) && isset($_REQUEST['txtDes']) && isset($fileName) && isset($_REQUEST['status'])){
            $ad = new Admin();
            $ad->addPost($_REQUEST['txtTitle'],$_REQUEST['txtDes'],$fileName,$_REQUEST['status']);
        }else{
            echo "vui long dien day du thong tin";
        }



    }

}

$adc = new AdminController();
$adc->add();
?>


