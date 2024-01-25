$(document).ready(function () {
    $('#form-login').submit(function(e) {
        e.preventDefault(); 
        let email = $('#email').val();
        let password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: 'dist/php/verificar_login.php',
            data: { email, password },
            success: function (response) {
                let respuesta = response.trim();
                let divMensaje = document.getElementById('mensaje');
                let btnIngresar = document.getElementById('btnIngresar')
                switch (respuesta) {
                    case 'error':
                        divMensaje.innerHTML = '<span>Correo o contraseña incorrectas. Vuelva a digitarlos</span>';
                        
                        divMensaje.classList.add('mensaje-error');
                        divMensaje.classList.remove('mensaje-success');
                        divMensaje.classList.remove('mensaje-warning');
                        divMensaje.classList.remove('mensaje-primary');
                        divMensaje.style.opacity = 1 // ? cambiar
                        break;
                    case 'incompleto':
                        divMensaje.innerHTML = '<span>Datos incompletos, rellene todos los campos por favor</span>';
                        
                        divMensaje.classList.add('mensaje-warning');
                        divMensaje.classList.remove('mensaje-success');
                        divMensaje.classList.remove('mensaje-error');
                        divMensaje.classList.remove('mensaje-primary');
                        
                        divMensaje.style.opacity = 1 // ? cambiar
                        break;  
                    default:
                        if (respuesta.includes('Usted no cuenta con los permisos necesarios')) {
                            // Aquí puedes personalizar el manejo del mensaje para Mesero o Recepcionista
                            divMensaje.innerHTML = '<span>' + respuesta + '</span>';
                            // Puedes cambiar el estilo o realizar otras acciones según tu necesidad
                            divMensaje.classList.add('mensaje-primary');
                            divMensaje.classList.remove('mensaje-success');
                            divMensaje.classList.remove('mensaje-warning');
                            divMensaje.classList.remove('mensaje-error');
                            divMensaje.style.opacity = 1;
                          } else {
                            divMensaje.innerHTML = '<span>Datos correctamente digitados, tenga un buen día</span>';
                            btnIngresar.innerText = 'Ingresando...';
                            divMensaje.classList.add('mensaje-success');
                            divMensaje.classList.remove('mensaje-warning');
                            divMensaje.classList.remove('mensaje-error');
                            divMensaje.style.opacity = 1;
                            redireccionar(respuesta);
                          }
                          break;
                };
            }
        });
    });
});