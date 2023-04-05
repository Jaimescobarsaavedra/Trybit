<main id="main" class="main">

    <div class="pagetitle">
        <h1>Agregar Elementos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php SERVIDOR?>.name=">Home</a></li>
                <li class="breadcrumb-item">Agregar</li>
                <li class="breadcrumb-item active">Contactos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Contactos</h5>

                        <!-- General Form Elements -->
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Producto</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione Producto</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Proveedor</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Es Proveedor?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="">Agregar Contacto</button>
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