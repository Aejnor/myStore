{{ method_field('PATCH') }}
<div class="card-header text-center">Actualizacion del perfil</div>
<div class="card-body justify-content-center bg-primary">
    <ul class="list-group list-group-flush ">
        <div class="list-group-item">
            <label class="{{ $errors->has('name') ? 'is-invalid-label' : ''}}" for="name">Nombre</label>
            <br>
            <input type="text" name="name" id="name" placeholder="{{ $user->name }}"
                   class="{{ $errors->has('name') ? 'is-invalid-input' : ''}} form-control">
            @if( $errors->has('name') )
                <p class="validation-error">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class=" list-group-item form-group">
            <label class="{{ $errors->has('surname') ? 'is-invalid-label' : ''}}"
                   for="surname">Apellidos</label>
            <br>
            <input type="text" name="surname" id="surname" placeholder="{{ $user->surname }}"
                   class="{{ $errors->has('surname') ? 'is-invalid-input' : ''}} form-control">
            @if( $errors->has('surname') )
                <p class="validation-error">{{ $errors->first('surname') }}</p>
            @endif
        </div>
        <div class=" list-group-item">
            <label class="{{ $errors->has('address') ? 'is-invalid-label' : ''}}" for="address">Direccion</label>
            <br>
            <input type="text" name="address" id="address" placeholder="{{ $user->address }}"
                   class="{{ $errors->has('address') ? 'is-invalid-input' : ''}} form-control">
            @if( $errors->has('address') )
                <p class="validation-error">{{ $errors->first('address') }}</p>
            @endif
        </div>

        <div class=" list-group-item">
            <label class="{{ $errors->has('website') ? 'is-invalid-label' : ''}}" for="website">Pagina web</label>
            <br>
            <input type="text" name="website" id="website" placeholder="{{ $user->website }}"
                   class="{{ $errors->has('website') ? 'is-invalid-input' : ''}} form-control">
            @if( $errors->has('website') )
                <p class="validation-error">{{ $errors->first('website') }}</p>
            @endif
        </div>

        <div class=" list-group-item">
            <label class="{{ $errors->has('phone') ? 'is-invalid-label' : ''}}" for="phone">Telefono</label>
            <br>
            <input type="text" name="phone" id="phone" placeholder="{{ $user->website }}"
                   class="{{ $errors->has('phone') ? 'is-invalid-input' : ''}} form-control">
            @if( $errors->has('phone') )
                <p class="validation-error">{{ $errors->first('phone') }}</p>
            @endif
        </div>

        <div class=" list-group-item">
            <label class="{{ $errors->has('about') ? 'is-invalid-label' : ''}}" for="about">Descripcion</label>
            <br>
            <input type="textarea" name="phone" id="phone" placeholder="{{ $user->about }}"
                   class="{{ $errors->has('about') ? 'is-invalid-input' : ''}} form-control">
            @if( $errors->has('about') )
                <p class="validation-error">{{ $errors->first('about') }}</p>
            @endif
        </div>


        <div class=" list-group-item">
            <label class="{{ $errors->has('email') ? 'is-invalid-label' : ''}}" for="email">Email</label>
            <br>
            <input type="text" id="email" name="email" placeholder="{{ $user->email }}"
                   class="{{ $errors->has('email') ? 'is-invalid-input' : ''}} form-control">
            @if( $errors->has('email') )
                <p class="validation-error">{{ $errors->first('email') }}</p>
            @endif
        </div>
    </ul>
    <br>
    <div class="align-content-center">
        <button type="submit" class="button">Actualizar</button>
    </div>

</div>