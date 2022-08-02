<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="production/images/garuda.jpg" type="image/ico" />
		<title>SPK MOORA</title>
		<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="build/css/custom.min.css" rel="stylesheet">
	</head>
	<body class="login">
		<div>
			<a class="hiddenanchor" id="signup"></a>
			<a class="hiddenanchor" id="signin"></a>
			<div class="login_wrapper">
				<div class="animate form login_form">
					<section class="login_content">
						<form id="isiuser" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="masuk.php">
							<h1>Login Form</h1>
							<div>
								<input id="username" name="username" type="text" class="form-control" placeholder="Username" required />
							</div>
							<div>
								<input id="pass" name="pass" type="password" class="form-control" placeholder="Password" required />
							</div>
							<div>
								<button type="submit"> <a class="btn btn-default">Log in</a></button>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</body>
</html>
