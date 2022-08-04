
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SISTEMA - USUARIOS </title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="<?php echo base_url();?>assets/images/logo-dark.svg" alt="logo">
              </div>
              <h4>Bienvenido de Regreso!</h4>
              <h6 class="font-weight-light">Feliz de verte nuevamente!</h6>
              <form class="pt-3" action="<?php echo site_url();?>/seguridades/validarAcceso" method= "post">
                <div class="form-group">
                  <label for="exampleInputEmail">Usuario</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" name="email_usu" id="email_usu" value="" placeholder="Ingrese su correo electronico" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="password_usu" id="password_usu" value="" placeholder="Ingrese su contraseña" required>                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Recordar mis datos
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black" data-toggle="modal" data-target="#modalRecuperarUsuario">Olvidaste tu contraseña?</a>
                </div>
                <div class="my-3">
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  INGRESAR
                </button>
                </div>
                <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>
                    Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>
                    Google
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  No estas registrado? <a href="#"
                  data-toggle="modal" data-target="#modalNuevoUsuario" class="text-primary">Registrarse</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- Modal -->
 <div id="modalRecuperarUsuario"
 style="z-index:9999 !important;"
  class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fa fa-users"></i> Recuperar Usuario</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
       <form class="" action="<?php echo site_url("seguridades/recuperarPassword"); ?>" method="post">
       <div class="form-group">
                  <label for="exampleInputEmail">Ingrese correo de recuperacion:</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <br>

                    <input type="email" class="form-control form-control-lg border-left-0" name="email" value="" placeholder="Ingrese su correo electronico de recuperacion" required>
                  </div>
                </div>

              <button type="submit" class="btn btn-primary btn-block mb-3">Enviar Correo</button>

              </button>
              </form>
       </div>
       <div class="modal-footer">
         <button type="submit" class="btn btn-default" data-dismiss="modal">Cerrar Ventana</button>
       </div>
     </div>

   </div>
 </div>
 <!-- /. final modal -->
 <!-- Modal -->
 <div id="modalNuevoUsuario"
 style="z-index:9999 !important;"
  class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fa fa-users"></i> Nuevo Usuario</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
         <form class=""
         action="<?php echo site_url('usuarios/insertarUsuario'); ?>"
         method="post"
         id="frm_nuevo_usuario">
         <label for="">APELLIDO:</label>
         <br>
         <input type="text" name="apellido_usu"
         id="apellido_usu" class="form-control"> <br>

         <label for="">NOMBRE:</label>
         <br>
         <input type="text" name="nombre_usu"
         id="nombre_usu" class="form-control"> <br>

         <label for="">EMAIL:</label>
         <br>
         <input type="text" name="email_usu"
         id="email_usu" class="form-control"> <br>

         <label for="">CONTRASEÑA:</label>
         <br>
         <input type="password" name="password_usu"
         id="password_usu" class="form-control"> <br>

         <label for="">CONFIRME LA CONTRASEÑA:</label>
         <br>
         <input type="password" name="password_confirmada"
         id="password_confirmada" class="form-control"> <br>

         <label for="">PERFIL:</label>
         <br>
         <select class="form-control" name="perfil_usu"
         id="perfil_usu">
          <option value="">Seleccione una opción</option>
          <option value="ADMINISTRADOR">ADMINISTRADOR</option>
          <option value="VENDEDOR">VENDEDOR</option>
         </select>
         <br>
         <button type="submit" name="button"
         class="btn btn-success">
           <i class="fa fa-save"></i> Guardar
         </button>

         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
     </div>

   </div>
 </div>

 <!-- /. modal-final -->
 <?php if ($this->session->flashdata("error")):?>
<script type="text/javascript">
alert("<?php echo $this->session->flashdata("error");?>");
</script>
<?php endif;?>
  <!-- base:js -->
  <script src="<?php echo base_url();?>assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>assets/js/template.js"></script>
  <!-- endinject -->
  <script type="text/javascript">
    $("#frm_nuevo_usuario").validate({
      rules:{
        apellido_usu:{
          required:true,
        },
        password_usu:{
          required:true
        },
        password_confirmada:{
          required:true,
          equalTo:"#password_usu"
        }
      },
      messages:{
        apellido_usu:{
          required:"Por favor ingrese el apellido",
        }
      },
      submitHandler:function(form){//funcion para peticiones AJAX
          $.ajax({
            url:$(form).prop("action"),
            type:"post",
            data:$(form).serialize(),
            success:function(data){
                $("#modalNuevoUsuario").modal("hide");
                var objetoJson=JSON.parse(data);
                  if(objetoJson.respuesta=="ok"||objetoJson.respuesta=="OK"){
                    iziToast.success({
                         title: 'CONFIRMACIÓN',
                         message: 'Usuario Insertado con exito',
                         position: 'topRight',
                       });
                  }else{
                    iziToast.error({
                         title: 'ERROR',
                         message: 'ERROR',
                         position: 'topRight',
                       });
                  }
                //backdrop
                alert(data);
            }
          });
      }
    });
</script>

</body>

</html>
