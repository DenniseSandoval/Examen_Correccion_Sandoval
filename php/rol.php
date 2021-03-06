<?php
    include './services/moduleService.php';
    $moduleService=new ModuleService();
    $result=$moduleService->findAllR();
    if(isset($_GET["delete"])){
        $moduleService->deleteR($_GET["delete"]);
    }else if(isset($_POST["registrar"])){
        $moduleService->insertR($_POST["rol"], $_POST["modulo"]); 
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
        <form name="rol" action="rol.php" method="POST">
            <div class="col">
                <div class="form-group row" style="justify-content: center;">

                    <div class="py-2">
                        <label id="lblCategoria" for="categoria">ROLES</label>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group mb-3">

                            <select style="color: #5D5C5C;" class="custom-select" id="rol" name="rol">
                                <?php
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()) {?>
                                <option value="<?php echo $row["COD_ROL"]?>">
                                    <?php echo $row["COD_ROL"]?></option>
                                <?php if(isset($_POST["aceptar"])){?>
                                <option hidden>
                                    <?php echo $_POST['rol']?></option>
                                <?php }} }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <input class="btn btn-primary btn-user btn-block" name="aceptar" type="submit" value="Aceptar">
                    </div>
                </div>
                <div class="card">

                    <div class="card-header border-0" style="text-align: center;">
                        <h3 class="mb-0">Modulos por rol</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Modulo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <?php
                            if(isset($_POST["aceptar"])){
                                $res=$moduleService->findAllRMA($_POST['rol']);
                            
                                if($res->num_rows>0){
                                    while($row1 = $res->fetch_assoc()) {
                            ?>
                            <tbody class="list">
                                <tr>
                                    <td><?php echo $row1["NOMBRE"]?></td>
                                    <td>
                                        <a href="rol.php?delete='<?php echo $row1["COD_ROL"]?>'" title="Eliminar"
                                            class="btn btn-danger btn-sm"><span class="far fa-trash-alt fa-lg"
                                                aria-hidden="true"></span></a>
                                    </td>
                                </tr>

                                <?php }
                                } }else{ ?>
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
                        <a href="/Examen_Correccion_Sandoval/php/registerRol.php"
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
        </form>


    </div>
    </form>

    <!-- Argon Scripts -->
    <!-- Core -->
    <?php include("../views/partials/footer.php");?>
</body>

</html>