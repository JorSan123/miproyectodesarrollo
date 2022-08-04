
<form class=""
action="<?php echo site_url('usuarios/actualizarUsuarioAjax'); ?>"
method="post"
id="frm_actualizar_usuario">

    <input type="hidden" name="id_usu" id="id_usu"
    value="<?php echo $usuario->id_usu; ?>">

    <label for="">APELLIDO:</label><br>
    <input type="text" name="apellido_usu"
    value="<?php echo $usuario->apellido_usu; ?>"
    id="apellido_usu_editar" class="form-control" required> <br>

    <label for="">NOMBRE:</label><br>
    <input type="text" name="nombre_usu"
    value="<?php echo $usuario->nombre_usu; ?>"
    id="nombre_usu_editar" class="form-control"> <br>

    <label for="">EMAIL:</label><br>
    <input type="text" name="email_usu"
    value="<?php echo $usuario->email_usu; ?>"
    id="email_usu_editar" class="form-control"> <br>

    <label for="">CONTRASEÑA:</label><br>
    <input type="password" name="password_usu"
    value="<?php echo $usuario->password_usu; ?>"
    id="password_usu_editar" class="form-control"> <br>

    <label for="">CONFIRME LA CONTRASEÑA:</label><br>
    <input type="password" name="password_usu"
    value="<?php echo $usuario->password_usu; ?>"
    id="password_usu_editar" class="form-control"> <br>

    <label for="">PERFIL:</label>
    <br>
    <select class="form-control" name="perfil_usu"
    id="perfil_usu_editar"> <br>




     <option value="">Seleccione una opción</option>
     <option value="ADMINISTRADOR">ADMINISTRADOR</option>
     <option value="VENDEDOR">VENDEDOR</option>
    </select>
    <script type="text/javascript">
        $("#perfil_usu_editar").val("<?php echo $usuario->perfil_usu; ?>");
    </script>
    <br>
    <button type="button" onclick="actualizar();" name="button"
    class="btn btn-success">
      <i class="fa fa-pen"></i> Actualizar
    </button>
</form>


<script type="text/javascript">

function actualizar(){

    $.ajax({
      url:$("#frm_actualizar_usuario").prop("action"),
      data:$("#frm_actualizar_usuario").serialize(),
      type:"post",
      success:function(data){
        cargarListadoUsuarios();
        $("#modalEditarUsuario").modal("hide");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        var objetoJson=JSON.parse(data);
        if(objetoJson.respuesta=="ok" || objetoJson.respuesta=="OK"){
          iziToast.success({
               title: 'CONFIRMACIÓN',
               message: 'Actualización Exitosa',
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
