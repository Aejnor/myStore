function gestionErrores(input, errores) {
    let noSendForm = false;
    input = $(input);
    if (typeof errores !== typeof undefined) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        for (let error of errores) {
            input.after(`<div class="invalid-feedback">
                <strong> ${error} </strong>
            </div>`);
        }
        noSendForm = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    return noSendForm;
}

function validateTarget(target) {
    let formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("loader");
    axios.post('/profile/edit/account/validar', formData)
        .then(function (response) {
            $(target).parent().next(".spinner").removeClass("loader");
            switch (target.id) {
                case "name":
                    gestionErrores(target, response.data.name);
                    break;
                case "surname":
                    gestionErrores(target, response.data.surname);
                    break;
                case "username":
                    gestionErrores(target, response.data.username);
                    break;
                case "phone":
                    gestionErrores(target, response.data.phone);
                    break;
                case "address":
                    gestionErrores(target, response.data.address);
                    break;
                case "about":
                    gestionErrores(target, response.data.about);
                    break;
                case "email":
                    gestionErrores(target, response.data.email);
                    break;
            }
        }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#name,#surname,#username,#email,#phone,#website,#address").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonEditarUsuario").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('name', $("#name").val());
        formData.append('surname', $("#surname").val());
        formData.append('username', $("#username").val());
        formData.append('email', $("#email").val());
        formData.append('address', $("#address").val());
        formData.append('website', $("#website").val());
        formData.append('phone', $("#phone").val());
        formData.append('about', $("#about").val());


        axios.post('/profile/edit/account/validar', formData)
            .then(function (response) {
                if (gestionErrores("#name", response.data.name)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#surname", response.data.surname)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#username", response.data.username)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#email", response.data.email)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#adress", response.data.adress)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#website", response.data.website)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#about", response.data.about)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#phone", response.data.phone)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true) {
                    $("#formularioEditarUser").submit();
                }
            });
    });
});