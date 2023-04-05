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
                                <label for="inputNumber" class="col-sm-2 col-form-label">Cantidad</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">fecha</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Modo Pago</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione Modo Pago</option>
                                        <option value="1">Crédito</option>
                                        <option value="2">Débito</option>
                                        <option value="3">Efectivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Estatus</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione Estatus</option>
                                        <option value="1">Aprovado</option>
                                        <option value="2">En revisión</option>
                                        <option value="3">Denegado</option>
                                        <option value="4">Cancelado</option>
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

