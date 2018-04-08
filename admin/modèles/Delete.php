<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 05-Apr-18
 * Time: 5:02 PM
 */
class Delete{

    public function delPost($id){
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
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "DELETE FROM post WHERE id=".$id;
        if ($conn->query($sql) === TRUE) {
            echo "Post Deleted successfully";
            echo "<br>";
            echo '<a href="../vues/Manager.php?p=1">back</a>' ;
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }

}