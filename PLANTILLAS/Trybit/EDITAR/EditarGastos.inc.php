<main id="main" class="main">

    <div class="pagetitle">
        <h1>Agregar Elementos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php SERVIDOR?>.name=">Home</a></li>
                <li class="breadcrumb-item">Editar</li>
                <li class="breadcrumb-item active">Gastos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Gastos</h5>

                        <!-- General Form Elements -->
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" novalidat>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Fecha de gasto</label>
                                <div class="col-sm-10">
                                    <input type="date" name="fecha_gasto" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Concepto</label>
                                <div class="col-sm-10">
                                    <input type="text" name="concepto_gasto" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Valor $</label>
                                <div class="col-sm-10">
                                    <input type="number" name="valor_gasto" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-sm-10">
                                    <input type="text" name="categoria_gasto" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="editar_EDIGastos">Editar Gasto</button>
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