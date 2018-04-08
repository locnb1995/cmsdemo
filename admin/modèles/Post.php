<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 03-Apr-18
 * Time: 12:00 PM
 */
class Post{
    public function allPost(){
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

        $sql = "SELECT * FROM post";
        $result = $conn->query($sql);
        $totalnum = mysqli_num_rows($result);
        $rowperpage = 3;
        $totalpage = ceil($totalnum/$rowperpage);

        $page = $_GET['p'];
        if($page == 1){
            $page = $page - 1;
        }else{
            $page = ($page*3)-3;
        }
        $sql2 ="SELECT * FROM post LIMIT ".$page.",".$rowperpage;
        $result2 = $conn->query($sql2);
        $posts = array();
        if ($result2->num_rows > 0) {
            // output data of each row
            while($row = $result2->fetch_assoc()) {
                $posts[] = $row;
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        return $posts;
    }
}