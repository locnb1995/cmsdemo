<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 05-Apr-18
 * Time: 9:55 AM
 */
class Admin{

    public function addPost($title,$des,$img,$status){
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
        $image = '../asset/img/'.$img;
        $statusdb = 0;
        if($status === 'Enable'){
            $statusdb = 1;
        }

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO post (title, description, image, status)
        VALUES ('".$title."', '".$des."', '".$image."', '".$statusdb."')";

        if ($conn->query($sql) === TRUE) {
            echo $title." created!";
            echo "<br>";
            echo '<a href="../vues/Manager.php?p=1">back</a>' ;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

}
