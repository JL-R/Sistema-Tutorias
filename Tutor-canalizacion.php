<?php include("template/cabeceraCoordi-MostrarCambioTutor.php"); 

include('config/conexion.php');
$tmp = array();
$res = array();
$sel = $con->query("SELECT * FROM `canalizacion` Join tutorados  WHERE canalizacion.IdTutorado = tutorados.IdTutorado AND tutorados.IdTutor = $idtutor ");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);
}
?>
<div class="container">
    <br><br>
    <h4>Canalizaciones</h4>
    <br><br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">      
        <table class="table table-bordered table-striped mb-0">    
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Tipo</th>
                    <th>Motivos</th>
                    <th>Fecha</th>
                    <th>Accion</th>  
                </tr>
            </thead>
            <tbody>
            <?php foreach ($res as $val) { ?>
                                <tr>
                                    <td><?php echo $val['IdTutorado'].' - '.$val['NombreTutorado'] ?> </td>
                                    <td><?php echo $val['Tipo'] ?> </td>
                                    <td><?php echo $val['Comentarios'] ?></td>
                                    <td><?php echo $val['Fecha'] ?></td>  
                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $val['IdCanal']; ?>">
                                  Eliminar
                              </button> </td>
                                </tr>   
                             <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('config/ModalEliCanal.php'); ?>  
                            <?php } ?>
             
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
    <br>
    <div class="container">
        <a href="menuTutor.php">
            <div class="row align-items-start" >
                <div class="col" >
                    <button type="button" class="btn btn-primary btn-lg" id="botones">Regresar</button>
                </div>
            </div>
</a>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>



<script type="text/javascript">
    $(document).ready(function() {

        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });

//Ocultar mensaje
    setTimeout(function () {
        $("#contenMsjs").fadeOut(1000);
    }, 3000);



    $('.btnBorrar').click(function(e){
        e.preventDefault();
        var IdMensaje = $(this).attr("id");

        var dataString = 'IdMensaje='+ IdMensaje;
        url = "config/CanalRecib_delete.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="Tutor-canalizacion.php";
                  $('#respuesta').html(data);
                }
            });
    return false;

    });


});
</script>
<?php include("template/pie.php"); ?>