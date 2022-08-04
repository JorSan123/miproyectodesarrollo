<?php
class Usuario extends CI_Model {
  public function __construct(){
    parent::__construct();
  }

//consulta login usuario FUNCION
public function buscarUsuarioPorEmailPassword($email_usu, $password_usu){

    $this->db->where("email_usu",$email_usu);
    $this->db->where("password_usu",$password_usu);
    $usuarioEncontrado=$this->db->get("usuario");
    if($usuarioEncontrado->num_rows()>0){
        return $usuarioEncontrado->row();

    }else{//cuando las credenciales son incorrectas
        return false;
    }

}

public function insertarUsuario($data){
  return $this->db->insert('usuario',$data);
}

public function obtenerTodos(){
$listado=$this->db->get("usuario");
if ($listado->num_rows()>0) {
  return $listado;
} else {
  return false;

    }
  }
  public function eliminar($id_usu){
    $this->db->where("id_usu",$id_usu);
  return  $this->db->delete("usuario");
  }


  public function obtenerPorId($id_usu){
                  $this->db->where("id_usu",$id_usu);
                  $usuario=$this->db->get("usuario");
                  if($usuario->num_rows()>0){
                    return $usuario->row();
                  }else{//cuando las credenciales estan incorrectas
                    return false;
                  }
                    }

public function obtenerPorEmail($email_usu){
  $this->db->where("email_usu",$email_usu);
  $usuario=$this->db->get("usuario");
  if ($usuario->num_rows()>0) {
    return $usuario->row();
  }else{
    return false;
  }

}


  public function actualizar($data, $id_usu){
        $this->db->where("id_usu",$id_usu);
        return $this->db->update("usuario",$data);
    }

}//cierre de la clase usuario

  ?>
