<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js" defer></script>
    <script src="./js/sweetAlert.js" defer></script>
    <script src="./js/jQuery.js" defer></script>
    <script src="./js/script.js" defer></script>
</head>

<body>
    <div class="card" style="margin-top: 300px; margin-left: 700px; width: 500px;">
        <h5 class="card-header text-center">Login</h5>
        <div class="card-body">
            <div class="row">
                <form id="logForm" name="logForm">
                    <div class="col-md-12">
                        <label for="logEmail">Email</label>
                        <input type="text" class="form-control" id="logEmail" name="logEmail">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="logSenha">Senha</label>
                        <input type="password" class="form-control" id="logSenha" name="logSenha">
                    </div>
                </form>
                <div class="d-flex mt-3" style="justify-content: end;">
                    <button class="btn btn-primary" type="button" id="logBtn" onclick="login()">Entrar</button>
                </div>
                <div class="alert alert-warning mt-3" id="logAlert" style="display: none;">

                </div>
            </div>
        </div>
    </div>
</body>

</html>