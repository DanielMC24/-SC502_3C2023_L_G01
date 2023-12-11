<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?accion=inicio">Inicio</a>
                </li> 
                <?php if ($roles == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=categoria">Categoria</a>
                    </li> 

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cursos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?accion=cursos">Mis Cursos</a></li>
                            <li><a class="dropdown-item" href="index.php?accion=reportecursosempresa">Reporte de Cursos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=ayudas">Ayudas</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=empleos">Empleos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=usuarios">Usuarios</a>
                    </li>
                <?php } ?>
                <?php if ($roles == 2) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=miayuda">Mis Ayuda</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=miempleo">Mis Empleos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Registros
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?accion=postulacionempleosempresa">Empleos</a></li>
                            <li><a class="dropdown-item" href="index.php?accion=postulacionayudasempresa">Ayudas</a></li>

                        </ul>
                    </li>

                <?php } ?>

                <?php if ($roles == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=empleoscatalogo">Empleos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=ayudascatalogo">Ayudas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=cursoscatalogo">Cursos</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Postulaciones
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?accion=postulacionempleos">Empleos</a></li>
                            <li><a class="dropdown-item" href="index.php?accion=postulacionayudas">Ayudas</a></li>
                            <li><a class="dropdown-item" href="index.php?accion=postulacioncursos">Cursos</a></li>

                        </ul>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#perfil">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?accion=salir">Salir</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

<!--LOGIN-->

<div class="modal fade" id="perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">ACTUALIZACIÓN DE CUENTA</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=usuarioactualizar">
                    <div class="mb-3">
                        <label for="data" class="form-label">Identificación:</label>
                        <input type="hidden" class="form-control form-control-sm" id="u_id" name="u_id" value="<?php echo $perfil["u_id"]; ?>" placeholder="Ingrese información" required>
                        <input type="number" class="form-control form-control-sm" id="u_identificacion" name="u_identificacion" value="<?php echo $perfil["u_identificacion"]; ?>" placeholder="Ingrese información" required>
                        <input type="hidden" class="form-control form-control-sm" id="u_identificacionvieja" name="u_identificacionvieja" value="<?php echo $perfil["u_identificacion"]; ?>" placeholder="Ingrese información" required>
                        <input type="hidden" class="form-control form-control-sm" id="u_rol" name="u_rol" value="<?php echo $perfil["u_rol"]; ?>" placeholder="Ingrese información" required>

                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Nombres y apellidos o Razon Social (Empresa):</label>
                        <input type="text" class="form-control form-control-sm" id="u_nombresrazon" name="u_nombresrazon" value="<?php echo $perfil["u_nombresrazon"]; ?>" placeholder="Ingrese información" required>
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Celular:</label>
                        <input type="number" class="form-control form-control-sm" id="u_celular" name="u_celular" value="<?php echo $perfil["u_celular"]; ?>" placeholder="Ingrese información" required>
                    </div>

                    <div class="mb-3">
                        <label for="data" class="form-label">Email:</label>
                        <input type="email" class="form-control form-control-sm" id="u_correo" name="u_correo" value="<?php echo $perfil["u_correo"]; ?>" placeholder="Ingrese información" required>
                    </div>

                    <div class="mb-3">
                        <label for="data" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control form-control-sm" id="u_contrasena" name="u_contrasena" value="<?php echo $perfil["u_contrasena"]; ?>" placeholder="Ingrese información" required>
                    </div>

                    <center><button type="submit" class="btn btn-danger btn-sm">Actualizar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="titulo">
    Bienvenido (a): <?php echo strtoupper($perfil["u_nombresrazon"]); ?>
</div>
<br>
