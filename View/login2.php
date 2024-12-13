  <!-- debuggin -->


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Login with Google</title>
		<link href="Style.css" rel="stylesheet" type="text/css">
        <meta name="google-signin-scope" content="profile email">
      
    
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="Style.css"> 
	</head>
	<body>

		<div class="content home">

            <a href="oauth2callback.php" class="g-signin2"data-onsuccess="onSignIn" data-theme="dark" data-width="370" data-height="50" data-longtitle="true" data-lang="pt-BR">
          
                Login with Google
            </a>

		</div>

	</body>
</html>