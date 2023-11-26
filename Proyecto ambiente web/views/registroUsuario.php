<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./registroUsuario.css">
        <title>Registro Usuario</title>
    </head>
    <body>
        <div class="container-fluid bg-dark text-light py-3">
            <header class="text-center">
                <h1 class="display-6">Registro Usuario</h1>
            </header>
        </div>
        <section class="container my-2 bg-dark w-50 text-light p-2">
            <form class="row g-3 p-3" name="modulos_add" id="usuario_add" method="POST">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="col-md-4">
                    <label for="id" class="form-label">Identificacion</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                <div class="col-md-2">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="text" class="form-control" id="edad" name="edad">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6">
                    <label for="clave" class="form-label">Password</label>
                    <input type="password" class="form-control" id="clave" name="clave">
                </div>
                <div class="col-md-6">
                    <label for="ocupacion" class="form-label">Ocupacion</label>
                    <input type="text" class="form-control" id="ocupacion" placeholder="Ocupacion" name="ocupacion">
                </div>
                <div class="col-md-6">
                    <label for="residencia" class="form-label">Residencia</label>
                    <input type="text" class="form-control" id="residencia" placeholder="Residencia" name="residencia">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning" value="registrar">Registrarse</button>
                </div>
            </form>
        </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>