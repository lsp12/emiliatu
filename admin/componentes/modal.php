<!-- Button trigger modal -->

<?php
$noti=notificaciones();
$cont=0;
$aux=0;
foreach($noti as $conta){
    $aux=1+$aux;

}
?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Notificaciones <span class="badge badge-light badg"><?php echo $aux; ?></span>
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notificaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div><p><b style='color: royalblue;'>No leidos</b></p></div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Asunto</th>
      <th scope="col">Descriptcion</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody class="visi">
      <?php
        foreach ($noti as $notifi) {
            echo '
            <tr>
            <th scope="row">'.$notifi["id"].'</th>
            <td>'.$notifi["asunto"].'</td>
            <td>'.$notifi["descripcion"].'</td>
            <td>'.$notifi["fecha"].'</td>
          </tr>        
            ';
        }
        
      ?>
  </tbody>
</table>
<div><p><b style='color: royalblue;'>Leidos</b></p></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Asunto</th>
      <th scope="col">Descriptcion</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody class="visie">
      <?php
      $visto=leidos();
        foreach ($visto as $vistos) {
            echo '
            <tr>
            <th scope="row">'.$vistos["id"].'</th>
            <td>'.$vistos["asunto"].'</td>
            <td>'.$vistos["descripcion"].'</td>
            <td>'.$vistos["fecha"].'</td>
          </tr>        
            ';
        }
        
      ?>
  </tbody>
</table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="act.php" class="btn btn-primary" >Marcar como leido</a>
        
      </div>
    </div>
  </div>
</div>
<script>
    
    function myFunct() {
    document.querySelector(".badg").innerHTML=0;
    var top = document.querySelector("table");
    var num = document.querySelector(".badg").textContent;
     alert(num);
    
    var nested=document.querySelector(".visi");
    var garbage = top.removeChild(nested);
if(num=="0"){
    alert ("cambio");

    <?php
    
    ?>
}
}

  </script>