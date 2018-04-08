<?php
    require_once ('../contrôleurs/PostController.php');
    $postController = new PostController();
    $posts = $postController->getPost();
    $page = $_REQUEST['p'];

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

<p class=" navbar-left">Manager</p>
<a class="btn btn-primary navbar-right" href="FormulaireAjouter.php">New</a>
<br>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Thumb</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $item){ ?>
        <tr>

            <td><?php echo $item["id"];?></td>
            <td><img src="<?php echo '../'.$item["image"]?>" height="100" width="200"></td>
            <td><?php echo $item["title"];?></td>
            <td><?php
                if($item["status"] == 1){
                    echo "enabled";
                } else{
                    echo "diasbled";
                }
                ?></td>
            <td>
                <a href="../vues/montrer.php?title=<?php echo $item["title"]; ?>&img=<?php echo $item["image"];?>&des=<?php echo $item["description"];?>">Show</a> |
                <a href="../vues/FormulaireModifier.php?title=<?php echo $item["title"]; ?>&img=<?php echo $item["image"];?>&des=<?php echo $item["description"];?>&stt=<?php echo $item["status"];?>&id=<?php echo $item["id"];?>">Edit</a> |
                <a href="../contrôleurs/DeleteController.php?id=<?php echo $item["id"];?>">Delete</a>
            </td>

        </tr>
    <?php }?>
    </tbody>
</table>
<button id="pageindex" hidden><?php echo $page; ?></button>
<button id="totalpage" hidden><?php echo $totalpage; ?></button>