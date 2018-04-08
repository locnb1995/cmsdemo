<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <title>Modifier Post</title>
</head>
<body>
<div class="container">
    <h1>Modifier Post</h1>
    <button onclick="goBack()" class="btn btn-primary navbar-right">Back</button>
    <br>
    <br>
    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="../contrôleurs/UpdateController.php" >
        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="txtId">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input name="txtTitle" value="<?php echo $_GET['title']; ?>" type="text" class="form-control" id="inputEmail3" placeholder="Title">
            </div>
        </div>
        <div class="form-group">
            <label for="comment" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea name="txtDes" class="form-control" rows="3" id="comment" placeholder="Description"><?php echo $_GET['des']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="file" class="form-control" name="upload">
                <br>
                <img src="<?php echo '../'.$_GET['img']; ?>" width="200px;" height="200px;">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <select class="form-control" id="sel1" name="status">
                    <?php if($_GET['stt'] == 1){ ?>
                    <option <?php echo "selected"; ?>>Enable</option>
                        <option>Disabled</option>
                    <?php }else{ ?>
                    <option>Enable</option>
                    <option <?php echo "selected";} ?>>Disabled</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" name="uploadclick">
            </div>
        </div>
    </form>
</div>
</body>
</html>