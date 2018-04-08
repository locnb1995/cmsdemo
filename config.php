<!DOCTYPE html>
<html>
<head>
	<title>Config</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="padding-top: 50px;">
		<div class="container" style="background-color: #6666ff; text-align: center;">
			<h4>Database Config</h4>
		</div>
		<div class="container" style="padding-top: 20px; border: 1px solid black;">
			<form class="form-horizontal" method="POST" action="installer.php">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Hostname</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" placeholder="Hostname" name="txthost">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Username" name="txtuser">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="txtpass">
			  </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Database name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Database name" name="txtdbname">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-success">Save</button>
			    </div>
			  </div>
		</form>
		</div>
	</div>
</body>
</html>