<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Manager</title>
</head>
<body>
    <?php
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
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM post";
        $result = $conn->query($sql);
        $totalnum = mysqli_num_rows($result);
        $rowperpage = 3;
        $totalpage = ceil($totalnum/$rowperpage);
    ?>
    <div class="container" style="padding-top: 50px;">
        <div class="container" id="result">

        </div>
        <div class="container">
            <ul class="pagination">
                <li><button class="btn btn-primary" id="pre">Previous</button></li>
                <?php for($i=1 ; $i<=$totalpage ; $i++){?>
                    <li><button class="btn btn-default page-link"><?php echo $i; ?></button></li>
                <?php  } ?>
                <li><button class="btn btn-primary" id="next">Next</button></li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#result').load("ManagerPagination.php?p="+1);
            $(".page-link").click(function(){
                var p = $(this).text();
                $('#result').load("ManagerPagination.php?p="+p);
            });
            $('#pre').click(function () {
                var index = $('#pageindex').text();
                var totalpage = $('#totalpage').text();
                index = parseInt(index);
                totalpage = parseInt(totalpage);
                if(index  > 1){
                    index--;
                    $('#result').load("ManagerPagination.php?p="+index);
                }
            });
            $('#next').click(function () {
                var index = $('#pageindex').text();
                var totalpage = $('#totalpage').text();
                index = parseInt(index);
                totalpage = parseInt(totalpage);
                if(index < totalpage){
                    index++;
                    $('#result').load("ManagerPagination.php?p="+index);
                }
            });
        });
    </script>
</body>
</html>