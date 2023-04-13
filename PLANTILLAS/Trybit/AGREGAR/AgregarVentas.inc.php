<main id="main" class="main">

    <div class="pagetitle">
        <h1>Agregar Elementos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php SERVIDOR?>.name=">Home</a></li>
                <li class="breadcrumb-item">Agregar</li>
                <li class="breadcrumb-item active">Ventas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Ventas</h5>

                        <!-- General Form Elements -->
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" novalidat>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Producto</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="producto_venta" aria-label="Default select example">
                                        <option selected>Seleccione Producto</option>
                                        <option value="1">One</option>
                                        <option value="02dad74d8ee47c86c1b9acc44bbdcee2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Cantidad</label>
                                <div class="col-sm-10">
                                    <input type="number" name="cantidad_venta" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">fecha</label>
                                <div class="col-sm-10">
                                    <input type="date" name="fecha_venta" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Modo Pago</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="modo_pago_venta" aria-label="Default select example">
                                        <option selected>Seleccione Modo Pago</option>
                                        <option value="Crédito">Crédito</option>
                                        <option value="Débito">Débito</option>
                                        <option value="Efectivo">Efectivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Estatus</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="estatus_venta" aria-label="Default select example">
                                        <option selected>Seleccione Estatus</option>
                                        <option value="Aprovado">Aprovado</option>
                                        <option value="En revisión">En revisión</option>
                                        <option value="Denegado">Denegado</option>
                                        <option value="Cancelado">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="enviar_AGRVentas">Agregar Venta</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>

