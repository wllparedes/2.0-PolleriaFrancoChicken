/** @format */

// ? MANTENIMIENTO DE CLIENTES
import { expresiones } from "../../../../assets/js/global/exprecionesRegulares.js";
import {
  validarCampo,
  campos,
} from "../../../../assets/js/global/validarCampos.js";

$(document).ready(() => {
  //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

  let contenedor_mensaje = document.getElementById("contenedor__mensaje");
  const inputs = document.querySelectorAll("#formulario input");
  // Start Validación del formulario

  const validarFormulario = (e) => {
    switch (e.target.name) {
      case "nameCategory":
        validarCampo(expresiones.nameCategory, "nameCategory", e.target);
        break;
      case "description":
        validarCampo(expresiones.description, "description", e.target);
        break;
    }
  };

  inputs.forEach((input) => {
    input.addEventListener("keyup", validarFormulario);
    input.addEventListener("blur", validarFormulario);
  });

  // End

  // Cuando se de Submit en el Btn Registrar

  $("#formulario").submit(function (e) {
    e.preventDefault();

    if (
      campos.nameCategory &&
      campos.description
    ) {
      // Ajax
      const postData = {
        nameCategory: $("#nameCategory").val(),
        description: $("#description").val(),
      };

      $.ajax({
        url: "../models/newCategory.php",
        type: "POST",
        data: postData,
        success: function (response) {

          let respuesta = response.trim();
          console.log(respuesta);
          if (respuesta === "error") {
            no_registrado("categoria");
          } else {
            //
            document.querySelectorAll("#formulario input").forEach((i) => {
              i.classList.remove("is-valid", "is-invalid");
            });
            si_registrado();
            $("#formulario").trigger("reset");
            // redireccionar('lista-usuarios');
          }
        },
      });
    } else {
      // contenedor_mensaje.classList.add('contenedor__mensaje-activo');
    }
  });
});
