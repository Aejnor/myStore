
{{ method_field('PATCH') }}
<div class="card-header text-center text-white bg-dark"><strong>Contraseña</strong></div>
<div class=" text-lg-center">
    <label for="current_password" class="{{ $errors->has('current_password') ? 'is-invalid-label' : ''}}">
        Contraseña Actual</label>
    <br>
    <input type="password" id="current_password" name="current_password"
           class="{{ $errors->has('current_password') ? 'is-invalid-input' : ''}} form-control"></div>
@if( $errors->has('current_password') )
    <p class="validation-error ">{{ $errors->first('current_password') }}</p>
@endif

<div class=" text-lg-center">
    <label for="password" class="{{ $errors->has('password') ? 'is-invalid-label' : ''}} ">Contraseña nueva</label>
    <br>
    <input type="password" id="password" name="password"
           class="{{ $errors->has('password') ? 'is-invalid-input' : ''}} form-control"></div>
@if( $errors->has('password') )
    <p class="validation-error">{{ $errors->first('password') }}</p>
@endif

<div class=" text-lg-center">
    <label for="password_confirmation">Repetir Contraseña nueva</label>
    <br>
    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
    @if( $errors->has('password_confirmation') )
        <p class="validation-error">{{ $errors->first('password_confirmation') }}</p>
    @endif
</div>
<div class="text-lg-center bs-popover-bottom bs-popover-top">
    <button type="submit" class="btn btn-success">Actualizar</button>
</div>