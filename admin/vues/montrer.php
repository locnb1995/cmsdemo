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
    <title>Détails</title>
</head>
<body>
<div class="container" style="padding-top: 100px;">
    <div class="container">
        <div class="col-md-10">
            <h1><?php echo $_GET['title']; ?></h1>
        </div>
        <div class="col-md-2" style="padding-top: 30px;">
            <button onclick="goBack()" class="btn btn-primary">Back</button>
        </div>
    </div>
    <div class="container" style="border: 1px  solid black">
        <div class="col-md-4" style="padding: 10px;">
            <img src="<?php echo '../'. $_GET['img'] ?>" height="100" width="200">
        </div>
        <div class="col-md-8">
            <p>Description</p>
            <h3><?php echo $_GET['des'] ?></h3>
        </div>
    </div>
</div>
</body>
</html>
