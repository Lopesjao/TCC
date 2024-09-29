document.getElementById('getToken').addEventListener('click', async () => {
    const url = 'https://accounts.google.com/o/oauth2/token'; // Substitua pela URL do servidor de autorização
    const data = {
        client_secret: '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', // Substitua pelo seu client secret
        grant_type: 'refresh_token',
        refresh_token: '1//04yHQTOrefRwcCgYIARAAGAQSNwF-L9IrRI9jLCKUx2o8Pq8Dnyeso8tdknIO2a5iCLD24Kcr9nD8LNtGA-3EDwya5aiy8rujXcE', // Substitua pelo seu refresh token
        client_id: '86253102357-ijmvsljshi43vq4qc5fhmjsepdf1c9e4.apps.googleusercontent.com' // Substitua pelo seu client id
    };

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        document.getElementById('response').innerText = JSON.stringify(result, null, 2);
    } catch (error) {
        console.error('Erro:', error);
        document.getElementById('response').innerText = 'Erro ao obter o token.';
    }
});
