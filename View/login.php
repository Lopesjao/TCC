<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com Google</title>
    <meta name="google-signin-client_id" content="86253102357-79vcqcejk9ud6qp684lagut2917pcjbq.apps.googleusercontent.com"> <!-- Substitua pelo seu Client ID -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <style>
        body { font-family: Arial, sans-serif; }
        #user-info { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Login com Google</h1>
    <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline" data-text="sign_in_with" data-size="large" data-logo_alignment="left"></div>
    <div id="user-info"></div>

    <script>
        function onSignIn(googleUser) {
            const profile = googleUser.getBasicProfile();
            document.getElementById('user-info').innerHTML = `
                <p>Nome: ${profile.getName()}</p>
                <p>Email: ${profile.getEmail()}</p>
                <img src="${profile.getImageUrl()}" alt="Imagem de perfil">
            `;
        }

        function signOut() {
            const auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(() => {
                document.getElementById('user-info').innerHTML = '<p>Usuário desconectado.</p>';
            });
        }
    </script>
</body>
</html>
