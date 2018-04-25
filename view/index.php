<html>
<head>
<title>CV. Putra Elektronik &rsaquo; Log In</title>
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>

<link href="templates/login.css" rel="stylesheet" type="text/css" />
</head>
<body OnLoad="document.login.username.focus();">
<div id="login">
	<h1>LOGIN USER</h1>
		<div class="fieldContainer">
			<form name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)">
        <div class="formRow">
		Username :
            <div class="field">
                <input type="text" name="id_user">
				<input type="hidden" name="level" value='manager'>
            </div>
        </div>
        <div class="formRow">    
		Password :
            <div class="field">
                <input type="password" name="password">
            </div>
        </div>
		</div>
		
	<div class="signupButton">
        <br/><input type="submit" name="submit" id="submit" value="Login" />
    </div>
			</form>
			
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>