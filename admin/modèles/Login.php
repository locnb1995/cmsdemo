<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 04-Apr-18
 * Time: 4:22 PM
 */
class Login{

    public function getUser(){
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

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn,'utf8');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        $admin = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $admin[] = $row;
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        return $admin;

    }

}