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
         <input type="text" name="perfil_usu"
         id="perfil_usu" class="form-control" value="CLIENTE"> <br>
         <br>
         <button type="submit" name="button"
         class="btn btn-success">
           <i class="fa fa-save"></i> Guardar
         </button>

         </form>

<script type="text/javascript">

function insertarUsuario(){

    $.ajax({
      url:$("#frm_nuevo_usuario").prop("action"),
      data:$("#frm_nuevo_usuario").serialize(),
      type:"post",
      success:function(data){
        $("#modalNuevoUsuario").modal("hide");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        var objetoJson=JSON.parse(data);
        if(objetoJson.respuesta=="ok" || objetoJson.respuesta=="OK"){
          iziToast.success({
               title: 'CONFIRMACIÓN',
               message: 'Usuario Insertado Exitosamente',
               position: 'topRight',
             });
        }else{
          iziToast.error({
               title: 'ERROR',
               message: 'Error al procesar',
               position: 'topRight',
             });
        }

      }
    });
}

</script>
