<main id="main" class="main">

    <div class="pagetitle">
        <h1>Agregar Elementos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php SERVIDOR?>">Home</a></li>
                <li class="breadcrumb-item">Editar</li>
                <li class="breadcrumb-item active">Contactos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <?php
    echo $_SESSION['NIT'];
    ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Contactos</h5>

                        <!-- General Form Elements -->
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" novalidat>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombre_contacto" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input type="number" name="telefono_Contacto" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="editar_EDIContactos">Editar Contacto</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
            <div class="col-lg-2"></div>
        </div>
    </section>

</main><!-- End #main -->