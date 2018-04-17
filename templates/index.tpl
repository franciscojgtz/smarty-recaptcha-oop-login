<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8" />
<title>Login</title>

<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/forms-nr-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/buttons-min.css">

<script type="text/javascript" src="javascript/recaptcha-theme.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


</head>

<body id="index-page">

<div class="wrapper">

<p class="errormsg">{$user_error}</p>

<p class="errormsg">{$captcha_error}</p>
  
   {foreach item=error from=$errors}
      <p class="errormsg">       
      {$error}
      </p>
   {/foreach}

  <form method='post' action='' accept-charset='UTF-8'>
  
  		<h1>Login Form</h1>
		<p>login with the following credentials: <br/>
		username: demo@gutierrezfrancisco.net<br/>
		password: DemoPass1 (make sure to use the capital letters)</p>
		<p>If you would like to see this code in action, <br />
		please visit <a href="http://myleaguestats.gutierrezfrancisco.net/">myleaguestats.gutierrezfrancisco.net</a></p>
  
    	<div>    
    		<p><label for="memberuseremail">email</label> <input type="email" name="memberuseremail" id="memberuseremail" value="{$memberuser}" placeholder="email" required/> </p>
    		<p><label for="memberpassword">password</label> <input type="password" name="memberpassword" id="memberpassword" placeholder="password" required/> <br /></p>
    	</div>
    
    	<div>   
    		{$recaptcha} 
    		
    		<p ><input type="submit" name="submit" id="submit" value="Submit" class="pure-button pure-button-primary"/>

	 	</div>
	 	
	 	<div class="clear"></div>

  </form>
  
  <div class="clear"></div>

</div>

</body>
</html>