
<!DOCTYPE html>
<html>
<head>
<title>The Start-Up Networking</title>
<link href="web/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- //end-smoth-scrolling -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,600italic,700,300italic' rel='stylesheet' type='text/css'>
</head>
<body>

     <h1>The Start-Up Networking</h1>
		<div class="message warning">
			<div class="inset agile">
							<div class="sap_tabs w3ls-tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Sign in</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><label>/</label><span>Sign up</span></li>
					</ul>
					<div class="clear"> </div>
					<div class="alert-close"> </div>
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
							<div class="login-agileits-top">
								<form action="{{ route('signin')}}" method="post">
									<p>Email </p>
									<input class="form-control" type="text" name="email" id="email" value=" {{Request::old('email')}}">
									<p>Password</p>
									<input class="form-control" type="password" name="password" id="password">
									<input type="checkbox" id="brand" value="">
									<input type="submit" value="SIGN IN">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
								</form>
							</div>
							<div class="login-agileits-bottom">
								<h2><a href="shubham/1">Connect With Admin?</a></h2>
							</div>
						</div>
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
							<div class="login-agileits-top sign-up">
								<form action="{{ route('signup')}}" method="post">
                  <p>Name</p>
									<input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name')}}">
									<p>User Name </p>
									<input class="form-control" type="text" name="username" id="username" value="{{ Request::old('username')}}">
									<p>Email </p>
									<input class="form-control" type="text" name="email" id="email" value=" {{Request::old('email')}}">
									<p>Password</p>
									<input class="form-control" type="password" name="password" id="password">

									<input type="submit" value="SIGN UP">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
								</form>
							</div>
						</div>
					</div>
				</div>
	</div>
	<div class="right-section-w3ls"></div>
			<div class="clear"> </div>

				</div>
		</div>

	<div class="clear"> </div>
     <div class="copy-right w3l-agile">
		<p> © 2017 All Rights Reserved | Design by <a href="http://shubhamsarda.com">Shubham Sarda </a></p>
	</div>
<script type="text/javascript" src="web/js/jquery-2.1.4.min.js"></script>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});
});
</script>
<script src="web/js/easyResponsiveTabs.js" type="text/javascript"></script>
<!-- ResponsiveTabs js -->
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
			<!-- //ResponsiveTabs js -->

</body>
</html>
