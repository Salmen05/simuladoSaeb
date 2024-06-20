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
            <h5 class="card-header text-center">Registre-se gratuitamente!</h5>
            <div class="card-body">
                <div class="row">
                    <form method="POST" id="formReg">
                        <div class="col-md-12">
                            <label for="regNome">Nome</label>
                            <input type="text" class="form-control" id="regNome" name="regNome">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="regEmail">Email</label>
                            <input type="text" class="form-control" id="regEmail" name="regEmail">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="logSenha">Senha</label>
                            <input type="password" class="form-control" id="regSenha" name="regSenha">
                        </div>
                        <div class="col-md-12 d-flex mt-3 mb-3" style="justify-content: end">
                            <a href="./index.php" class="btn btn-warning me-2">Entrar</a>
                            <button type="button" class="btn btn-primary" onclick="registrar();">Registrar</button>
                        </div>
                        <div class="alert alert-warning col-md-12" role="alert" id="regAlert" style="display: none">
                            asdasd
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>