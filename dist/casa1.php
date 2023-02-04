<?php
$a = "a";
var_dump($a);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inmobiliaria</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-1 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Inmobiliaria</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Encuentra TU casa al mejor precio</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">

                <h2 class="fw-bolder">Piso Amplio en el Centro</h2> <br></br>

                <h4 class="fw-bolder">Precio: 209.900€</h4><br></br>

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                       
                    <?php
                    echo "conectas o no?";
                    ?>
                    
                </div>
  
                            <img class="card-img-top" src="img/casa 1/bloque.jpg" alt="..." /></div>
                            <!-- Product details-->
                            <br></br>
                            <br></br>

                            <h4>Descripción de la vivienda:</h4><br></br>
                            <!-- <h6>Chalet construido en el año 2004, de altas calidades, cuatro plantas incluida garaje.</h6> -->
                                
                                <br></br>
                                <br></br>

                            <h4>Características de la vivienda</h4>

                            <h6 class="fw-bolder">
                                - 100 m² construidos, 94 m² útiles<br></br>
                                - 4 habitaciones<br></br>
                                - 2 baños<br></br>
                                - Terraza<br></br>
                                - Balcón<br></br>
                                - Plaza de garaje incluida en el precio<br></br>
                                - Segunda mano/para reformar<br></br>
                                - Trastero<br></br>
                                - Orientación sur, este<br></br>
                                - Construido en 1975<br></br>
                                - Calefacción individual: Gas natural<br></br></h6>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <? if ($row['RESERVADA'] === 0): ?>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Comprar</a></div> <br></br>
                                <? else: ?>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Reservada</a></div> <br></br>
                                <? endif; ?>
                                
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="general.html">Seguir navegando</a></div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Creado por Sofía Corral Caballero y Jesús Fernando Franciso de Granada</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
