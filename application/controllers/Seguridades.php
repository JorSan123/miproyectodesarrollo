<?php
    class Seguridades extends CI_Controller{
        public function __construct(){
          parent::__construct();
          $this->load->model('usuario');
        }

        public function formularioLogin(){
            $this->load->view("seguridades/formularioLogin");
        }

     public function validarAcceso(){
     $email_usu=$this->input->post("email_usu");
     $password_usu=$this->input->post("password_usu");
     $usuario= $this->usuario->buscarUsuarioPorEmailPassword($email_usu, $password_usu);
     if($usuario){
        if($usuario->estado_usu>0){
            $this->session->set_userdata("c0nectadoUTC", $usuario);
            $this->session->set_flashdata("bienvenida", "Usuario Conectado");
            redirect("usuarios/index");

        }else{
            $this->session->set_flashdata("error", "Usuario Bloqueado");
            redirect("seguridades/formularioLogin");

        }
        //cuando el email y contraseña son correctos
     }
     else{//cuando el email y contraseña son incorrectos
        $this->session->set_flashdata("error", "Email o contraseña incorrecta");
        redirect("seguridades/formularioLogin");

     }
     }
     public function cerrarSesion(){
     $this->session->set_flashdata("salir","Salir, ");
   $this->session->sess_destroy();//Matando la sesiones

   redirect("seguridades/formularioLogin");
 }



 public function pruebaEmail(){
      enviarEmail("jordy.sanipatin3188@utc.edu.ec","PRUEBA","<h1>HOLA</h1><i>MUNDO</i>");
      }

      public function recuperarPassword(){
          $email=$this->input->post("email");
          $usuario=$this->usuario->obtenerPorEmail($email);
          if($usuario){
            $password_aleatorio=rand(111111,999999);
            $asunto="RECUPERAR PASSWORD";
            $contenido="Su contraseña temporal es: <b> $password_aleatorio</b>";
            enviarEmail($email,$asunto,$contenido);
            $data=array(
              "password_usu"=>$password_aleatorio
            );
            $this->usuario->actualizar($data,$usuario->id_usu);
            $this->session->set_flashdata("confirmacion","Hemos enviado una clave temporal a su direccion de email");

          } else{

              $this->session->set_flashdata("error","El email ingresado no existe");

          }

          redirect("seguridades/formularioLogin");

        }



}//cier