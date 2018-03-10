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
    axios.post('/productos/validar', formData)
        .then(function (response) {
            $(target).parent().next(".spinner").removeClass("loader");
            switch (target.id) {
                case "nombre":
                    gestionErrores(target, response.data.nombre);
                    break;
                case "marca":
                    gestionErrores(target, response.data.marca);
                    break;
                case "categoria":
                    gestionErrores(target, response.data.categoria);
                    break;
                case "precio":
                    gestionErrores(target, response.data.precio);
                    break;
                case "detalle":
                    gestionErrores(target, response.data.detalle);
                    break;
            }
        }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#nombre,#precio,#categoria,#marca,#detalle").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonCreacionProducto").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('nombre', $("#nombre").val());
        formData.append('marca', $("#marca").val());
        formData.append('precio', $("#precio").val());
        formData.append('categoria', $("#categoria").val());
        formData.append('detalle', $("#detalle").val());

        axios.post('/productos/validar', formData)
            .then(function (response) {
                if (gestionErrores("#nombre", response.data.nombre)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#marca", response.data.marca)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#precio", response.data.precio)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#categoria", response.data.categoria)) {
                    enviarFormulario = false;
                }

                if (gestionErrores("#detalle", response.data.detalle)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true) {
                    $("#formularioCreateProducto").submit();
                }
            });
    });
});