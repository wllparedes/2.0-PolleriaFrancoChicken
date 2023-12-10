/** @format */
import { validarCampo } from './validarCampos.js';


/**
 * @class ValidarFormulario
* @description Clase para validar los formularios. Esta clase tiene dos métodos.
* @method validarFormulario - Este método recibe dos parámetros, el primero es un HTMLCollectionOfInputs y el segundo es un objeto con expresiones regulares. Ejem: { name: expresiones.name, surnames: expresiones.surnames }
* @method estadoFormulario - Este método retorna un booleano, true si todos los campos del formulario son válidos y false si no lo son.
 */
export class ValidarFormulario {


	constructor() {
		this._estado = false;
		this._campos = {};
	}

    /**
     * 
     * @param {HTMLCollectionOfInputs} inputs - Todos los inputs del formulario para validarlos
     * @param {Dictionarity} expresiones - Expreciones regulares para validar los inputs. Ejem: { name: expresiones.name, surnames: expresiones.surnames }
     */
    validarFormulario = (inputs, expresiones) => {
    
		inputs.forEach((input) => {
            let type = input.getAttribute('name');
            
            this._campos[type] = false;

			input.addEventListener('keyup', (e) =>
				validarFormulario(e, type, expresiones[type])
			);
			input.addEventListener('blur', (e) =>
				validarFormulario(e, type, expresiones[type])
			);
		});

		const validarFormulario = (e, type, expresion) => {
            this._campos[type] = validarCampo(expresion, e.target);
        };
        

    };


    estadoFormulario = () => {

        let condicional = 0;

        for (const key in this._campos) {
			this._campos[key] == false ? (condicional = 0) : (condicional = 1);
		}

        return this._estado = condicional === 1 ? true : false;
    }



}
