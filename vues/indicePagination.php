
<?php
    require_once ('../contrôleurs/PostController.php');
    $rowperpage = 3;
    if(isset($_POST['rowp'])){
        $rowperpage = $_POST['rowp'];
    }

    $pc = new PostController();
    $posts = $pc->getPost($rowperpage);
    $page = $_REQUEST['p'];
    $string = '';
    $file = fopen("../check.txt",'r');
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
    $sql = "SELECT * FROM post WHERE status=1";
    $result = $conn->query($sql);
    $totalnum = mysqli_num_rows($result);
    $totalpage = ceil($totalnum/$rowperpage);
?>



<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Thumb</th>
        <th>Title</th>
        <th><?php echo $rowperpage; ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $item){ ?>
    <tr>
        <td><?php echo $item['id'] ?></td>
        <td><img src="<?php echo $item['image'] ?>" width="200px;" height="100px;"></td>
        <td><?php echo $item['title'] ?></td>
        <td><a href="montrer.php?title=<?php echo $item['title'] ?>&img=<?php echo $item['image'] ?>&des=<?php echo $item['description'] ?>">Show Post</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>


<ul class="pagination">
    <li><button class="btn btn-primary" id="pre">Previous</button></li>
    <?php for($i=1 ; $i<=$totalpage ; $i++){?>
        <li>
            <button class="btn btn-default page-link"><?php echo $i; ?></button>
        </li>
    <?php  } ?>
    <li><button class="btn btn-primary" id="next">Next</button></li>
</ul>

<button id="pageindex" hidden><?php echo $page; ?></button>
<button id="totalpage" hidden><?php echo $totalpage; ?></button>
<script>
    $(document).ready(function () {
        $(".page-link").click(function(){
            var p = $(this).text();
            $('#result').load("indicePagination.php?p="+p);
        });
        $('#pre').click(function () {
            var index = $('#pageindex').text();
            var totalpage = $('#totalpage').text();
            index = parseInt(index);
            totalpage = parseInt(totalpage);
            if(index  > 1){
                index--;
                $('#result').load("indicePagination.php?p="+index);
            }
        });
        $('#next').click(function () {
            var index = $('#pageindex').text();
            var totalpage = $('#totalpage').text();
            index = parseInt(index);
            totalpage = parseInt(totalpage);
            if(index < totalpage){
                index++;
                $('#result').load("indicePagination.php?p="+index);
            }
        });
    });

</script>


