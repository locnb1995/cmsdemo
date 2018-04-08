<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 05-Apr-18
 * Time: 3:57 PM
 */
class Update{

    public function addPost($id,$title,$des,$img,$status){
        $string = '';
        $file = fopen("../../check.txt",'r');
        while(!feof($file))
        {
            $string =  fgets($file);
        }
        $data = explode(' ', $string);
        $servername = $data[0];
        $username = $data[1];
        $password = $data[2];
        $dbname = $data[3];
        $statusdb = 0;
        if($status === 'Enable'){
            $statusdb = 1;
        }

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = '';
        if(empty($img)){
            $sql = "UPDATE post SET title='".$title."', description='".$des."', status='".$statusdb."' WHERE id=".$id;
        } else{
            $image = '../asset/img/'.$img;
            $sql = "UPDATE post SET title='".$title."', description='".$des."', image='".$image."', status='".$statusdb."' WHERE id=".$id;
        }

        if ($conn->query($sql) === TRUE) {
            echo $title." changed!";
            echo "<br>";
            echo '<a href="../vues/Manager.php?p=1">back</a>' ;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}