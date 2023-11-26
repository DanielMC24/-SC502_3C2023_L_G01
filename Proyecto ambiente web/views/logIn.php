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
        <link rel="stylesheet" href="./logIn.css" />
        <title>LogIn</title>
    </head>
    <body>
        <section>
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12-sm-8 col-md-6 m-auto">
                        <div class="card border-0">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3 row">
                                        <label
                                            for="email"
                                            class="col-sm-2 col-form-label"
                                            >Email</label
                                        >
                                        <div class="col-sm-10">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label
                                            for="clave"
                                            class="col-sm-2 col-form-label"
                                            >Password</label
                                        >
                                        <div class="col-sm-10">
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="clave"
                                                name="clave"
                                            />
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button
                                            type="submit"
                                            class="btn btn-warning"
                                        >
                                            Log In
                                        </button>
                                        <a href="#"
                                            >Ha olvidado su contraseña?</a
                                        ><!-- ACA FALTA PONER EL ENLACE PARA CAMBIAR CONTRASENNA -->
                                    </div>
                                </form>
                                <div class="text-center mt-3">
                                    <p>No tiene una cuenta?</p>
                                    <!-- ACA FALTA PONER EL ENLACE PARA CAMBIAR CONTRASENNA -->
                                    <a
                                        href="./registroTipoCuenta.php"
                                        class="btn btn-info"
                                        >Crear Cuenta</a
                                    >
                                </div>
                            </div>
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
