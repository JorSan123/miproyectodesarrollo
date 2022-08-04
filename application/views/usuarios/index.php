
<h1 class="text-center">GESTION DE USUARIOS</h1>
<br><br><br><br>
<center>

  <button type="button" name="button" class="btn btn-primary"
   onclick="cargarListadoUsuarios();"><i class="fa fa-refresh" title="Actualizar"></i> </button>


   <!-- Trigger the modal with a button -->
   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalNuevoUsuario"><i class="fa fa-plus-circle"></i> Agregar Usuario</button>
<div class="row">
  <div class="col-md-12"
  id="contenedor-listado-usuarios">
    <i class="fa fa-spin fa-lg fa-spinner"></i>
    Consultando Datos
  </div>
</div>


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
 <div id="modalEditarUsuario"
 style="z-index:9999 !important;"
  class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fa fa-users"></i> EDITAR USUARIO</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body"id="contenedor-formulario-editar">

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
     </div>

   </div>
 </div>


<script type="text/javascript">
    function cargarListadoUsuarios(){
      $("#contenedor-listado-usuarios")
      .html('<i class="fa fa-spin fa-lg fa-spinner"></i>');
      $("#contenedor-listado-usuarios")
      .load("<?php echo site_url(); ?>/usuarios/listado");
    }
    cargarListadoUsuarios();
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
                cargarListadoUsuarios();
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
<script type="text/javascript">
  function abrirFormularioEditar(id_usu){
    //alert("ok....");
    $("#contenedor-formulario-editar")
    .html('<i class="fa fa-spin fa-lg fa-spinner"></i>');
    $("#contenedor-formulario-editar").load("<?php echo site_url('usuarios/editar'); ?>/"+id_usu);
    $("#modalEditarUsuario").modal("show");
  }

</script>




<!--  -->
