/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 54);
/******/ })
/************************************************************************/
/******/ ({

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(55);


/***/ }),

/***/ 55:
/***/ (function(module, exports, __webpack_require__) {

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function gestionErrores(input, errores) {
    var noSendForm = false;
    input = $(input);
    if ((typeof errores === "undefined" ? "undefined" : _typeof(errores)) !== ( true ? "undefined" : _typeof(undefined))) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                input.after("<div class=\"invalid-feedback\">\n                <strong> " + error + " </strong>\n            </div>");
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
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
    var formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("loader");
    axios.post('/profile/edit/account/validar', formData).then(function (response) {
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
        validateTarget(e.target);
    });

    $("#botonEditarUsuario").click(function (e) {
        e.preventDefault();
        var enviarFormulario = true;
        var formData = new FormData();
        formData.append('name', $("#name").val());
        formData.append('surname', $("#surname").val());
        formData.append('username', $("#username").val());
        formData.append('email', $("#email").val());
        formData.append('address', $("#address").val());
        formData.append('website', $("#website").val());
        formData.append('phone', $("#phone").val());
        formData.append('about', $("#about").val());

        axios.post('/profile/edit/account/validar', formData).then(function (response) {
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

/***/ })

/******/ });