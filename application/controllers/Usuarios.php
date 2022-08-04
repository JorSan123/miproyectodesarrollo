<?php
class Usuarios extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("usuario");
        //validando si alguien esta conectado ESTO ES LO PRIMORDIAL
        if ($this->session->userdata("c0nectadoUTC")) {
          // si esta conectado
          if ($this->session->userdata("c0nectadoUTC")->perfil_usu=="ADMINISTRADOR")
          {
            // SI ES ADMINISTRADOR
          } else {
            redirect("/");
          }
        } else {
          redirect("seguridades/formularioLogin");
        }
    }

  public function index(){
    $this->load->view("header");
    $this->load->view("usuarios/index");
    $this->load->view("footer");
  }
  //funcion para frenderizar la vista listado.php
  public function listado(){
    $data["listadoUsuarios"]=$this->usuario->obtenerTodos();
    $this->load->view("usuarios/listado",$data);

  }
  ///Inserciion Asincrona
  public function insertarUsuario(){
    $data=array(
"apellido_usu"=>$this->input->post("apellido_usu"),
"nombre_usu"=>$this->input->post("nombre_usu"),
"email_usu"=>$this->input->post("email_usu"),
"password_usu"=>$this->input->post("password_usu"),
"perfil_usu"=>$this->input->post("perfil_usu")

    );
    if($this->usuario->insertarUsuario($data)){
      echo json_encode(array("respuesta"=>"ok"));
    }else{
      echo json_encode(array("respuesta"=>"error"));

    }
  }
  public function eliminarUsuario(){
    $id_usu=$this->input->post("id_usu");
    if ($this->usuario->eliminar($id_usu)) {
      echo json_encode(array("respuesta"=>"ok"));
    } else{
      echo json_encode(array("respuesta"=>"error"));
    }
  }

  public function editar($ide_usu){
      $data["usuario"]=$this->usuario->obtenerPorId($ide_usu);
      $this->load->view("usuarios/editar",$data);
      }

      public function actualizarUsuarioAjax(){
              $id_usu=$this->input->post("id_usu");
              $data=array(
                  "apellido_usu"=>$this->input->post("apellido_usu"),
                  "nombre_usu"=>$this->input->post("nombre_usu"),
                  "email_usu"=>$this->input->post("email_usu"),
                  "perfil_usu"=>$this->input->post("perfil_usu")
              );
              if($this->usuario->actualizar($data,$id_usu)){
                  echo json_encode(array("respuesta"=>"ok"));
              }else{
                  echo json_encode(array("respuesta"=>"error"));
              }
          }

  }//cierre de la clase
