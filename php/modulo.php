<?php
    include './services/moduleService.php';
    $moduleService=new ModuleService();
    if(isset($_POST["registrar"])){
       $moduleService->insert($_POST["codmodulo"],$_POST["nombre"],$_POST["estado"]);
        
    }else if(isset($_POST["modificar"])){
        $moduleService->update($_POST["nombre"],$_POST["estado"], $_POST["codmodulo"]);

    }else if(isset($_GET["delete"])){
      $moduleService->delete($_GET["delete"]);
  }
  $result=$moduleService->findAll();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Modulos</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/product.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    <?php include("../views/partials/menu.php");?>
    <div class="main-content" id="panel">

        <div class="main-content" id="panel">
            <!-- Header -->
            <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Search form -->
                        <div class="col-lg-6 col-7"><br>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="../index.html"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Lista Registros</li>
                                </ol>
                            </nav>
                        </div>
                        <?php include("../views/partials/header.php");?>
                    </div>
                </div>
            </nav>
        </div>
        <div class="py-4"></div>
        <div class="col">
            <div class="card">
                <div class="card-header border-0" style="text-align: center;">
                    <h3 class="mb-0">MODULOS</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <?php
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()) {
                            ?>
                        <tbody class="list">
                            <tr>
                                <td><?php echo $row["COD_MODULO"]?></td>
                                <td><?php echo $row["NOMBRE"]?></td>
                                <td><?php echo $row["ESTADO"]?></td>
                                <td>
                                    <a href="modificarModulo.php?update='<?php echo $row["COD_MODULO"]?>'"
                                        title="Editar datos" class="btn btn-primary btn-sm"><span
                                            class="far fa-edit fa-lg" aria-hidden="true"></span></a>
                                    <a href="modulo.php?delete='<?php echo $row["COD_MODULO"]?>'" title="Eliminar"
                                        class="btn btn-danger btn-sm"><span class="far fa-trash-alt fa-lg"
                                            aria-hidden="true"></span></a>
                                </td>
                            </tr>
                            <?php }
                                } else{ ?>
                            <tr>
                                <td colspan="4">No hay datos</td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="py-2"></div>
            <div class="form-group row" style="justify-content: center;">
                <div class="col-sm-2">
                    <a href="/Examen_Correccion_Sandoval/php/registerModule.php"
                        class="btn btn-primary btn-user btn-block ">
                        Registrar
                    </a>
                </div>
                <div class="col-sm-2">
                    <a href="../index.php" class="btn btn-primary btn-user btn-block ">
                        Cancelar
                    </a>
                </div>

            </div>
        </div>

    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <?php include("../views/partials/footer.php");?>
</body>

</html>