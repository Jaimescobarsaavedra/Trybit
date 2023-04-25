<div class="col-12">
    <label for="yourName" class="form-label">Tú nombre</label>
    <input type="text" name="nombre" class="form-control" id="yourName" <?php $validador->Mostrar_nombre() ?> required>
    <?php $validador->Mostrar_error_nombre() ?>
</div>

<div class="col-12">
    <label for="yourEmail" class="form-label">Tú correo</label>
    <input type="email" name="correo" class="form-control" id="yourEmail" <?php $validador->Mostrar_correo() ?>required>
    <?php $validador-> Mostrar_error_correo()?>
</div>

<div class="col-12">
    <label for="yourPassword" class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control" id="yourPassword" required>
    <?php $validador -> Mostrar_error_password()?>
</div>

<div class="col-12">
    <label for="yourPassword" class="form-label">Repite la contraseña</label>
    <input type="password" name="password2" class="form-control" id="yourPassword2" required>
    <?php $validador -> Mostrar_error_password2()?>
</div>

<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
        <label class="form-check-label" for="acceptTerms">Estoy de acuerdo y acepto los
            <a href="#">terminos y condiciones</a></label>
        <div class="invalid-feedback">Debe estar de acuerdo antes de enviar.</div>
    </div>
</div>
<div class="col-12">
    <button class="btn btn-primary w-100" type="submit" name="enviar">Crear una cuenta</button>
</div>
<div class="col-12">
    <p class="small mb-0"><a href="../../InicioSesion.inc.php">¿Ya tienes una cuenta?</a></p>
</div>