<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

  <h2 class='p-2'>Insertar Conductores</h2>
    <form method="POST"  action="admin-1.php" style="border: 1, solid, #cdcdcd;">
        <div class="form-group row mb-4">
        <div class="col-4">
          <label for="exampleFormControlSelect2">Cedula:</label>
          <input type="number" placeholder='Numero de identificacion' class="form-control" name="cedula" id="">
          </div>

          <div class="col-4">
          <label for="exampleFormControlSelect2">Nombre:</label>
          <input type="text" placeholder='Ingresa los nombres' class="form-control" name="nombre_emp" id="">
          </div>
        
        
          <div class="col-4">
          <label for="exampleFormControlSelect2">Apellido:</label>
          <input type="text" placeholder='Ingresa los apelldios' class="form-control" name="apellido" id="">
          </div>
          </div>

          <div class="form-group row">
          <div class="col-4">
            <label for="exampleFormControlSelect2">edad:</label>
            <input type="number" placeholder='Ingrese edad' class="form-control" name="edad" id="">
          </div>
          <div class="col-4">
            <label for="exampleFormControlSelect2">sexo:</label>
            <select name="sexo" id="" class="form-control">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
          </div>
          <div class="col-4">
            <label for="exampleFormControlSelect2">Numero de celular:</label>
            <input type="text" placeholder='Numero de telefono' class="form-control" name="numeroCel" id="">
          </div>
          
        </div>
        
        <input type="submit" value="Guardar" class="btn btn-primary" name="guardar2">
        
      </form>
      <?php 
      if(isset($_POST['guardar2'])){
        $cedula=$_POST['cedula'];
        $nombre_emp=$_POST['nombre_emp'];
        $apellido=$_POST['apellido'];
        $edad=$_POST['edad'];
        $sexo=$_POST['sexo'];
        $numeroCel=$_POST['numeroCel'];
        
        
        InsertaEmp($cedula,$nombre_emp,$apellido,$edad,$sexo,$numeroCel);
        
      }
      
      ?>
      <div>

      <h2 class="text-center mt-5 p-3">Tabla de Conductores</h2>
      <table class="table table-striped rounded-lg" id="tabla7">
        <thead>
          <tr class='text-center'>
            <th scope="col">cedula</th>
            <th scope="col">nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">edad</th>
            <th scope="col" style="text-align: center;">Accion</th>
          </tr>
        </thead>
        <tbody>
    <?php
    $usuario=ActEmple();
        foreach($usuario as $li){
          echo "
                <tr class='text-center'>
                  <th scope='row'>".$li['cedula']."</th>
                  <td>".$li['nombre_emp']."</td>
                  <td>".$li['apellido']."</td>
                  <td>".$li['edad']."</td>
                  <td style='text-align: center;''>
                    <a href='borrar.php?ced=".$li['cedula']."' class='btn btn-danger ml-2 mb-1 p-2'>Eliminar</a><br>
                  </td>
                </tr>        
              ";
        }
        ?>
        </tbody>
      </table>
  </div>
</div>
                      
                
                
                    