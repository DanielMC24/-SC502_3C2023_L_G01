<?php

Class ControladorEmpresa {

    // PRODUCTOS
    public function empresaMostrar($idperfil) {
        $bdusario = new UsuarioDAO();
        $bdempresa = new EmpresaDAO();
        $perfilusuario = $bdusario->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdempresa->EmpresaMostrar();
        $mostrarempresa = $bdempresa->EmpresaMostrar();
        require_once 'Vista/html/empresa.php';
    }

    public function EmpresaActualizar($e_id, $e_nit, $e_razonsocial, $e_direccion, $e_correo, $e_nequi, $e_bancolombia, $e_daviplata, $e_whatsaap, $idperfil) {

        $bdempresa = new EmpresaDAO();
        $empresa = new Empresa($e_id, $e_nit, $e_razonsocial, $e_direccion, $e_correo, $e_nequi, $e_bancolombia, $e_daviplata, $e_whatsaap);
        $bdempresa->EmpresaActualizar($empresa);
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Información!", "Dato Actualizado de la Empresa","success");';
        echo '}, 1000);</script>';
        $this->empresaMostrar($idperfil);
    }

}

?>