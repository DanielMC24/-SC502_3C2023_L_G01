<?php
    require_once '../models/Usuario.php';
    switch ($_GET["op"]) {
        case 'listar_para_tabla':
            $user_login = new Usuario();
            $usuarios = $user_login->listarTodosDb();
            $data = array();
            foreach ($usuarios as $reg) {
              //  $modulos_activos = '<ul>';
              // $modulos_activos.= '</ul>';
              if ($reg->getImagen()!= '' && $reg->getImagen() != null) {
                $imagen='./assets/images/profiles/'.$reg->getImagen();
            }else{
                $imagen='./assets/images/profiles/'.'user-160x160.jpg';
            }
                $data[] = array(
                    "0" => $reg->getId(),
                    "1" => $reg->getEmail(),
                    "2" => $reg->getNombre(),
                    "3" => '<img src="'. $imagen.'" width="50px" heigth="50px"/>',
                    "4" => $reg->getTelefono(),   
                    "5" => ($reg->getEstado()==1)?'<span class="label bg-success"> Activado </span>':'<span class="label bg-danger"> Desactivado </span>',
                    "6" => ($reg->getEstado())?'<button class="btn btn-warning" id="modificarUsuario">Modificar</button> '.
                        '<button class="btn btn-danger" onclick="desactivar(\''.$reg->getId().'\')">Desactivar</button>': '</button> <button class="btn btn-warning" id="modificarUsuario">Modificar</button> '.
                        '<button class="btn btn-success" onclick="activar(\''.$reg->getId().'\')">Activar</button> '
                );
            }
            $resultados = array(
                "sEcho" => 1, ##informacion para datatables
                "iTotalRecords" =>count($data), ## total de registros al datatable
                "iTotalDisplayRecords" => count($data), ## enviamos el total de registros a visualizar
                "aaData" => $data
            );
            echo json_encode($resultados);
        break;
        case 'insertar':
              $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
              $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
              $imagen = isset($_POST["imagen"]) ? trim($_POST["imagen"]) : "";
              $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
              $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
              $estado = isset($_POST["estado"]) ? trim($_POST["estado"]) : 1;
              //$clave=randomPassword();
              $clavehash = hash('SHA256', trim($password));
                  $usuario = new Usuario();
                  $usuario->setEmail($email);
                  $encontrado = $usuario->verificarExistenciaDb();
                  if ($encontrado == false) {
                      $usuario->setEmail($email);
                      $usuario->setNombre($nombre);
                      $usuario->setClave($clavehash);
                      $usuario->setImagen($imagen);
                      $usuario->setTelefono($telefono);
                      $usuario->setEstado($estado);
                      $usuario->setCambioContrasena(1);
                      $usuario->guardarEnDb();
                      if($usuario->verificarExistenciaDb()){
                          //if(enviarCorreo($email,$clave,$nombre)){
                              echo 1; //usuario registrado y envio de correo exitos
                          //}else{
                            //  echo 4; //usuario registrado y envio de correo fallido
                          //}
                      }else{
                          echo 3; //Fallo al realizar el registro
                      }
                  } else {
                      echo 2; //el usuario ya existe
                  }
        break;
        case 'existeUsuario':
            $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
            $user_login = new Usuario();
            $user_login->setUsuario($usuario);
            $encontrado = $user_login->verificarExistenciaDb();
            if ($encontrado != null) {
                echo 1;
            }else{
                echo 0;
            }
        break;
        case 'activar':
            $ul = new Usuario();
            $ul->setId(trim($_POST['idUser']));
            $rspta = $ul->activar();
            echo $rspta;
        break;
        case 'desactivar':
            $ul = new Usuario();
            $ul->setId(trim($_POST['idUser']));
            $rspta = $ul->desactivar();
            echo $rspta;
        break;
        case 'mostrar':
            $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
            $user = new Usuario();
            $user->setUsuario($usuario);
            $encontrado = $user->mostrar($usuario);
            if ($encontrado != null) {
                $arr = Array();
                $arr[] = [
                    "usuario" => $encontrado->getUsuario(),
                    "nombre" => $encontrado->getNombre(),
                    "correo" => $encontrado->getCorreo()
                ];
    
                echo json_encode($arr);
            }else{
                echo 0;
            }
        break;
        case 'editar':
              $id = isset($_POST["id"]) ? trim($_POST["id"]) : "";
              $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
              $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
              $image = isset($_POST["imagen"]) ? trim($_POST["imagen"]) : "";
              $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
              $usuario = new usuario();
              $usuario->setEmail($email);
              $encontrado = $usuario->verificarExistenciaDb();
              if ($encontrado == 1) {
                $usuario->llenarCampos($id);
                //$modulo->setNombre($nombreModif);
              $usuario->setId($id);
              $usuario->setEmail($email);
              $usuario->setNombre($nombre);
              $usuario->setImagen($image);
              $usuario->setTelefono($telefono);
                $modificados = $usuario->actualizarUsuario();
                if ($modificados > 0) {
                  echo 1;
                } else {
                  echo 0;
                }
              }else{
                echo 2;	
              }
        break;
      }
?>