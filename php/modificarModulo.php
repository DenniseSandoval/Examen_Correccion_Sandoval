<?php
    include './services/moduleService.php';
    $moduleService=new ModuleService();
    if(isset($_GET["update"])){
      $row1=$moduleService->findByPK($_GET["update"]);
      if($row1!=null){
          $codigo=$row1["COD_MODULO"];
          $descripcion=$row1["NOMBRE"];
          $categoria=$row1["ESTADO"];
      }
    }

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
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Header -->
        <!-- Header -->
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
                                    <li class="breadcrumb-item">Modificar Producto</li>
                                </ol>
                            </nav>
                        </div>
                        <?php include("../views/partials/header.php");?>
                    </div>
                </div>
            </nav>
        </div>
        <div class="py-4"></div>
        <div style="display: flex;align-items: center;justify-content: center;">
            <div class="abs-center">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <form name="registro" action="./modulo.php" method="POST">
                        <div class="border p-4 form">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label id="lblCodigo" for="codigo">Código</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" style="color: #5D5C5C;" name="codmodulo" class="form-control"
                                        disabled value="<?php echo $row1["COD_MODULO"]?>">
                                </div>
                                <div class="col-sm-8">
                                    <input type="hidden" name="codmodulo" class="form-control"
                                        value="<?php echo $row1["COD_MODULO"]?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label id="lblDescripcion" for="descripcion">Nombre</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" style="color: #5D5C5C;" name="nombre" class="form-control"
                                        placeholder="Leche" value="<?php echo $row1["NOMBRE"]?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label id="lblCategoria" for="categoria">Categoría</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <select style="color: #5D5C5C;" class="custom-select" id="estado" name="estado">
                                            <option hidden selected><?php echo $row1["ESTADO"];?></option>
                                            <option value="ACT">Activo</option>
                                            <option value="INA">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" style="justify-content: center;">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="btn btn-primary btn-user btn-block" name="modificar" type="submit"
                                        value="Modificar">
                                </div>
                                <div class="col-sm-6">
                                    <a href="../index.php" class="btn btn-primary btn-user btn-block ">
                                        Cancelar
                                    </a>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php include("../views/partials/footer.php");?>
</body>

</html>