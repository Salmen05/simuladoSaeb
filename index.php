<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js"></script>
    <script src="./js/jQuery.js"></script>
    <script src="./js/sweetAlert.js"></script>
    <script src="./js/script.js"></script>
</head>

<body>
    <div style="margin-top: 300px; margin-left: 700px;">
        <div class="card" style="width: 500px;">
            <h5 class="card-header text-center">Faça seu login!</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="logEmail">Email</label>
                        <input type="text" class="form-control" id="logEmail" name="logEmail">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="logSenha">Senha</label>
                        <input type="password" class="form-control" id="logSenha" name="logSenha">
                    </div>
                    <div class="d-flex mt-3" style="justify-content: end">
                        <a href="./registrar.php" class="btn btn-warning me-2">Registrar</a>
                        <button type="button" class="btn btn-primary">Entrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>