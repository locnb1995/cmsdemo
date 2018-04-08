<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>User</title>
</head>
<body>

    <div class="container">
        <div class="container">
            <h2>List Post</h2>
            <br>
            <form id="submit_form" method="post" action="indicePagination.php?p=1">
                <input type="number" id="rowp" name="rowp">
                <input type="submit" id="submit" name="submit">
            </form>
            <br>
        </div>
        <div class="container" id="result">

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#result').load("indicePagination.php?p="+1);
            $('#submit_form').submit(function (e) {
                e.preventDefault();
                var that = $(this);

                $.ajax({
                    url : that.attr('action'),
                    type : that.attr('method'),
                    data : that.serialize(),
                    success : function (res) {
                        $('#result').html(res);
                    }
                })
            });
        });

    </script>
</body>
</html>
