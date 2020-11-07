<div class="tab-pane fade mb-5 p-4" style="background-color: white;" id="v-pills-profile-3" role="tabpanel" aria-labelledby="v-pills-profile-tab">
<h2 class="text-center p-5 mt-3">Acreditacion boleto</h2>
    <table class="table table-striped rounded-lg" id="tabla4">
      <thead>
        <tr class='text-center'>
          <th scope="col">#</th>
          <th scope="col">Nombre de Usuario</th>
          <th scope="col">Correo electronico</th>
          <th scope="col">Destino</th>
          <th scope="col" style="text-align: center;">Estado</th>
        </tr>
      </thead>
      <tbody>
  <?php
  $usuario=EstadoPg();
      foreach($usuario as $li){
        echo "
              <tr class='text-center'>
                <th scope='row'>".$li['id_user']."</th>
                <td>".$li['username']."</td>
                <td>".$li['email']."</td>
                <td>".$li['nombre']."</td>
                <td style='text-align: center;''>
                  <a href='borrar.php?id_acepta=".$li['id']."&id_usuario=".$li['id_user']."&id_destino=".$li['id_destino']."&boletos=".$li['boletos']."&costo=".$li['costo']."' class='btn btn-primary ml-2 mb-1 p-1'>Aprobar</a><br>
                  <a href='borrar.php?id_rechaza=".$li['id']."' class='btn btn-danger ml-2 mb-1 p-1'>Rechazar</a><br>
                </td>
              </tr>        
              ";
      }
    ?>
      </tbody>
    </table>
  </div>
