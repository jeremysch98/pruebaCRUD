<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <title>CRUD Persona</title>
</head>

<body>
    <!--NAVBAR-->
    <section id="navbar">
        <nav class="navbar navbar-expand-lg bg-white navbar-light">
            <div class="container-fluid justify-content-center">
                <h3>Personas</h3>
            </div>
        </nav>
    </section>
    <!--FIN NAVBAR-->
    <!--TOOLBAR-->
    <section id="toolbar">
        <div class="container">
            <div class="row pt-2">
                <div class="col-md-3 toolbar">
                    <a class="add-btn" href="" data-bs-toggle="modal" data-bs-target="#modalAdd">
                        <div class="card card-add">
                            <div class="card-body text-center">
                                <i class="bi bi-shop-window me-2"></i>Añadir Persona
                            </div>
                        </div>
                    </a>

                </div>
            </div>
    </section>
    <!--FIN TOOLBAR-->

    <section id="personas">
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table text-center table-personas">
                                <thead>
                                    <tr>
                                        <th>
                                            <p class="header-table">Nombres</p>
                                        </th>
                                        <th>
                                            <p class="header-table">Apellidos</p>
                                        </th>
                                        <th>
                                            <p class="header-table">DNI</p>
                                        </th>
                                        <th>
                                            <p class="header-table">Dirección</p>
                                        </th>
                                        <th>
                                            <p class="header-table">Celular</p>
                                        </th>
                                        <th>
                                            <p class="header-table">Correo Electrónico</p>
                                        </th>
                                        <th>
                                            <p class="header-table">Género</p>
                                        </th>
                                        <th>
                                            <p class="header-table">Acciones</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'backend/connection.php';

                                    $qlist = "SELECT p.idPersona, p.Nombres, p.Apellidos, p.DNI, p.Direccion, p.Celular, p.CorreoElectronico, g.Codigo, g.Descripción FROM person p 
                                    INNER JOIN gender g ON p.Genero = g.Codigo";
                                    $qulist = mysqli_query($connection, $qlist);
                                    while ($alist = mysqli_fetch_array($qulist)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $alist['Nombres'] ?>
                                            </td>
                                            <td>
                                                <?php echo $alist['Apellidos'] ?>
                                            </td>
                                            <td>
                                                <?php echo $alist['DNI'] ?>
                                            </td>
                                            <td>
                                                <?php echo $alist['Direccion'] ?>
                                            </td>
                                            <td>
                                                <?php echo $alist['Celular'] ?>
                                            </td>
                                            <td>
                                                <?php echo $alist['CorreoElectronico'] ?>
                                            </td>
                                            <td>
                                                <?php echo $alist['Descripción'] ?>
                                            </td>
                                            <td>
                                                <a class="m-1" href="" data-bs-toggle="modal" data-bs-target="#modalUpdate<?php echo $alist['idPersona']; ?>"><i class="bi bi-pencil-fill"></i></a>
                                                <a class="m-1" href="backend/delete.php?id=<?php echo $alist['idPersona'] ?>"><i class="bi bi-trash2-fill"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    include("modalUpdate.php");
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--FIN TRANSACTIONS-->

    <!--MODAL ADD-->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="backend/add.php" method="post">
                        <label for="txtNombres">Nombres</label>
                        <input type="text" name="txtNombres" class="form-control mb-3" required>
                        <label for="txtApellidos">Apellidos</label>
                        <input type="text" name="txtApellidos" class="form-control mb-3" required>
                        <label for="txtDNI">DNI</label>
                        <input type="text" name="txtDNI" class="form-control mb-3" required>
                        <label for="txtDireccion">Dirección</label>
                        <input type="text" name="txtDireccion" class="form-control mb-3" required>
                        <label for="txtCelular">Celular</label>
                        <input type="text" name="txtCelular" class="form-control mb-3" required>
                        <label for="txtCorreo">Correo Electrónico</label>
                        <input type="email" name="txtCorreo" class="form-control mb-3" required>
                        <label for="cbGenero">Género</label>
                        <select name="cbGenero" class="form-select form-control mb-3">
                            <?php
                            require 'backend/connection.php';
                            $q = "SELECT * FROM gender";
                            $query = mysqli_query($connection, $q);

                            while ($array = mysqli_fetch_array($query)) { ?>
                                <option value="<?php echo $array['Codigo'] ?>"><?php echo $array['Descripción'] ?> </option>
                            <?php } ?>
                        </select>
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" class="btn btn-secondary form-control" value="Añadir">
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
    <!--FIN MODAL ADD-->
    <?php if(isset($_GET['alert'])) { ?>
        <div class="flash-data" data-flashdata="<?= $_GET['alert'] ?>"></div>
    <?php } ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/alerts.js"></script>
</body>

</html>