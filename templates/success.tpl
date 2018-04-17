<!DOCTYPE html>
<html >
<head>
<meta charset=utf-8" />
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div class="wrapper">
   <h1>You are logged in with the username: {$userLoggedIn->getName()}</h1>
   <h3>User Id: {$userLoggedIn->getUserID()}</h3>
   <p><a href="logout.php">Log Out</a></p>

</div>
</body>
</html>