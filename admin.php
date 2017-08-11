<html lang="en">
	<head>
		<title>William Hatcher | Calendar | Admin</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src='/js/jquery.min.js'></script>
		<link rel='stylesheet' type='text/css' href='/bootstrap/css/bootstrap.min.css' >
	</head>
	<body>
		<div class="container">
			<form action="addEvent.php" autocomplete="off" method="get">
				<div class="form-group">
					<label for="id">ID</label>
					<input type="number" class="form-control" id="id">
				</div>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" required>
				</div>
				<div class="form-group">
					<label for="start">Start</label>
					<input type="text" class="form-control" id="start" required>
				</div>
				<div class="form-group">
					<label for="end">End</label>
					<input type="text" class="form-control" id="end">
				</div>
				<div class="from-group">
					<label for="color">Color</label>
					<input type="color" class="form-control" id="color">
				</div>
				<div class="from-group">
					<lavel for="pass">Pass</lavel>
					<input type="password" class="form-control" id="pass" required>
				</div>
				<button type="submit" class="btn btn-default btn-block">Add</button>
			</form>
		</div>
	</body>
</html>