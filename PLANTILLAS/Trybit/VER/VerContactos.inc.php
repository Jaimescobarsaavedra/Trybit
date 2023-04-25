<?php
include_once 'APP/ControlSesion.inc.php';
include_once 'APP/Redireccion.inc.php';
if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN);
}
include_once 'PLANTILLAS/Trybit/Default/HeadYMenu.inc.php';
?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Ver Elementos</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo RUTA_TRYBIT?>">Home</a></li>
                    <li class="breadcrumb-item">Ver</li>
                    <li class="breadcrumb-item active">Contactos</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mis Contactos</h5>
                            <!-- Table with stripped rows -->
                            <div class="datatable-wrapper fixed-columns">
                                <div class="datatable-container">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                        <tr>
                                            <th data-sortable="true">
                                                <a href="#" class="datatable-sorter">#</a>
                                            </th>
                                            <th data-sortable="true">
                                                <a href="#" class="datatable-sorter">Nombre</a>
                                            </th>
                                            <th data-sortable="true">
                                                <a href="#" class="datatable-sorter">Teléfono</a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        RepoEscribirDatos::escribir_mis_contactos();
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
        </section>
    </main>
<?php include_once 'PLANTILLAS/Trybit/Default/FooterMenu.inc.php'?>