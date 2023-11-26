<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="./registroTipoCuenta.css" />
        <title>Registro Tipo De Cuenta</title>
    </head>
    <body>
        <div class="container-fluid bg-dark text-light py-3">
            <header class="text-center">
                <h1 class="display-6">Registro Tipo De Cuenta</h1>
            </header>
        </div>
        <section class="container my-2 bg-dark w-50 text-dark p-2">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Institucional</h5>
                            <p class="card-text">
                                Aca podra encontrar el formulario para registrar una cuenta institucional.
                            </p>
                            <a href="./registroInstitucion.php" class="btn btn-warning">Institucional</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Personal</h5>
                            <p class="card-text">
                            Aca podra encontrar el formulario para registrar una cuenta personal.
                            </p>
                            <a href="./registroUsuario.php" class="btn btn-warning">Personal</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
