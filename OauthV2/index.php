<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Sign in to E-Bengkel</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
</head>
<body>
	<div class="row gmailStyle">
		<div class="container-fluid">
			<div class="valign-wrapper screenHeight">
					<div class="col card s12 m8 l6 xl4 autoMargin setMaxWidth overflowHidden">
						<div class="row hidden" id="progress-bar">
					    <div class="progress mar-no">
					      <div class="indeterminate"></div>
					    </div>
						</div>
						<div class="clearfix mar-all pad-all"></div>

						<img src="images/Googlelogo.png" class="logoImage" />
						<h5 class="center-align mar-top mar-bottom formTitle">Sign in</h5>
						<p class="center-align pad-no mar-no">to E-Bengkel</p>

						<div class="clearfix mar-all pad-all"></div>

						<div id="formContainer" class="goRight">

							<form class="loginForm" action="#" method="POST">
								<div class="input-fields-div autoMargin">
									<div class="input-field">
					          <input id="user_name" name="email" type="text" class="validate" style="border-radius: 5px; border-width: 2px;">
					          <label for="user_name" id="imel">Email or Phone</label>
					        </div>
					        <div class="input-field">
					          <input id="pass_word" name="password" type="password" class="validate" style="border-radius: 5px; border-width: 2px;">
					          <label for="pass_word" id="pas">Password</label>
										<a href="javascript:void(0)" class="showPassword" onclick="showPassword()"><i class="material-icons md-18">visibility</i></a>
					        </div>
								</div>
								<div class="input-fields-div autoMargin right-align">
									<button type="submit" style="background-color: #4285F4;margin-top: 12px;" class="loginBtn waves-effect waves-light btn">Sign in</button>
								</div>
							</form>
						</div>
						<div class="clearfix mar-all pad-all"></div>
					</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/cash.min.js"></script>
	<script type="text/javascript" src="js/routie.min.js"></script>
	<script type="text/javascript" src="js/loginScript.js"></script>
</body>
</html>
