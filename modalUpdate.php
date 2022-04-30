<!--MODAL UPDATE-->
<div class="modal fade" id="modalUpdate<?php echo $alist['idPersona']; ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="backend/update.php" method="post">
                    <label for="txtNombres">Nombres</label>
                    <input type="text" name="txtNombres" class="form-control mb-3" value="<?php echo $alist['Nombres'] ?>">
                    <label for="txtApellidos">Apellidos</label>
                    <input type="text" name="txtApellidos" class="form-control mb-3" value="<?php echo $alist['Apellidos'] ?>">
                    <label for="txtDNI">DNI</label>
                    <input type="text" name="txtDNI" class="form-control mb-3" value="<?php echo $alist['DNI'] ?>">
                    <label for="txtDireccion">Dirección</label>
                    <input type="text" name="txtDireccion" class="form-control mb-3" value="<?php echo $alist['Direccion'] ?>">
                    <label for="txtCelular">Celular</label>
                    <input type="text" name="txtCelular" class="form-control mb-3" value="<?php echo $alist['Celular'] ?>">
                    <label for="txtCorreo">Correo Electrónico</label>
                    <input type="email" name="txtCorreo" class="form-control mb-3" value="<?php echo $alist['CorreoElectronico'] ?>">
                    <label for="cbGenero">Género</label>
                    <select name="cbGenero" class="form-select form-control mb-3">
                        <?php
                        require 'backend/connection.php';
                        $cod = $alist['Codigo'];
                        $q = "SELECT * FROM gender WHERE Codigo NOT IN ($cod)";
                        $query = mysqli_query($connection, $q);

                        while ($array = mysqli_fetch_array($query)) { ?>
                            <option value="<?php echo $alist['Codigo'] ?>" selected> <?php echo $alist['Descripción'] ?> </option>
                            <option value="<?php echo $array['Codigo'] ?>"><?php echo $array['Descripción'] ?> </option>
                        <?php } ?>
                    </select>
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" class="btn btn-secondary form-control" value="Actualizar">
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL UPDATE-->