<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
    body {
	padding-top: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
	}

	fieldset{
		background-color: #3F3E39;
		padding-bottom: 50px;
		border-color: #CCAC02;
	}
	input{
		border-radius: 5px;
		font-weight: bold;
		padding-left: 15px;
		border-color: #CCAC02;
	}

	h1 {
	font-size: 12;
    color: #CCAC02;
	text-align: center;
	}  

	button{
	font-weight: bold;
	background-color: #CCAC02;
	padding-left: 20px;
	padding-right: 20px;
	text-align: center;
	margin: auto;
	display: flex;
	border-radius: 5px;
	border-color: #CCAC02;
	}
	.center{
	padding-left: 75px;
	padding-right: 75px;
	}
	span{
	position: absolute;
	top: 323px;
	margin-left: -25px;
	}
    </style>
</head>
<body>
<fieldset>
	<div>
		<h1>Sign to start your session </h1>
	</div>
	<br><br>
	<div id="container_login" class="center">
				<input type="text" name="Username" id="Username" placeholder="Username" >
				<br><br>
				<input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
				<span>
				<i class="fa fa-eye" aria-hidden="true" id="eye" oneclick="toggle()"></i>
				</span>
				<br><br>
				<button type="submit" id="tombol-login" value="Login">Sign in </button>
				
			</form>
			
			<!-- <?= form_error('username'); ?> -->
			<!-- <?= form_error('password'); ?> -->
	</div>
</fieldset>
<script>
		var state=false;
		function toggle(){
			if(state){
			document.getElementById("password").
			setAttribute("type","password");
			state = false;
			}
			else{
			document.getElementById("password").
			setAttribute("type","text");
			state = true;
			}
		}
	</script>
</body>
</html>
