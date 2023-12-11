/** @format */

import { firstCharUpper } from './../../js/global/firstCharUpper.js';

/**
 * @class RenderTable
    * @param {boolean} estado - estado para que recorra los inputs price
    * @method _createMessageEmpty - Crea un mensaje cuando no se selecciona ningun item sel select
    * @method _createTable - Crea la tabla con los valores que se le pasen por parametro. (values)
    * @method _addItemsOnTable - Agrega los items en la tabla
    * @method renderTable - Renderiza la tabla con los items seleccionados
    * @method obtenerCantidadYProducto - Obtiene la cantidad y el producto seleccionado
 */
export class RenderTable {

	constructor(estado = false) {
		this._estado = estado;
	}

	_createMessageEmpty = (idDivRender) => {
		let message = document.createElement('h6');
		let strongMessage = document.createElement('strong');
		let divRender = document.querySelector(idDivRender);

		message.classList.add(
			'text-center',
			'p-4',
			'text-muted',
			'messageEmptyWallace'
		);
		strongMessage.innerText = 'Selecciona al menos un item';

		message.append(strongMessage);
		divRender.append(message);
	};

	_createTable = (idDivRender, values) => {
		let divRender = document.querySelector(idDivRender);
		let table = document.createElement('table');
		let thead = document.createElement('thead');
		let tbody = document.createElement('tbody');
		let tr = document.createElement('tr');

		table.classList.add(
			'table',
			'table-striped',
			'tableRenderWallace',
            'mt-4',
            'mb-5',
            'table-responsive'
		);

		table.append(thead);
        table.append(tbody);
        tbody.classList.add('itemsOnTable');
		thead.append(tr);

		values.forEach((value) => {
			let th = document.createElement('th');
			th.innerText = firstCharUpper(value);
			tr.append(th);
		});

		divRender.append(table);
        $('.tableRenderWallace').hide();
    };
    

    _addItemsOnTable = (items, values) => {
        
        let template = '';
        let tbody = $('.itemsOnTable');

        items.forEach(item => {

            template += `
                <tr>
                
                    ${
                        values.map(value => { 
                            if (value === 'cantidad') {
								return `<td><input type="number" class="form-control" name="quantity" pattern="[0-9\.]+" value="1" data-id="${item.id}" required></td>`;
							} else {
								return `<td>${item[value]}</td>`;
							}
                        })
                    }

                </tr>
            `
            
        });

        tbody.html(template);
    }

    /**
    * 
    * @param {Dictionarity} param0 - Parametros para renderizar la tabla
    * @param {string} param0.url - Url del modelo que se encarga de obtener los items
    * @param {string} param0.select - Id del select que se encarga de que el usuario seleccione los items
    * @param {string} param0.divRender - Id del div donde se renderizara la tabla con los items seleccionados
    * @param {Array} param0.values - Valores que se renderizaran en la tabla, osea los campos de la tabla en el thead
    */
    renderTable = ({url, select, divRender, values}) => {

        this._createMessageEmpty(divRender);
        this._createTable(divRender, values);

		$('.selectedProducts').on('click', (e) => {
			let IdsProducts = $(select).val();

			if (IdsProducts.length <= 0) {
				$('.messageEmptyWallace').show();
				$('.tableRenderWallace').hide();
                
            } else {

                $('.messageEmptyWallace').hide();
				$('.tableRenderWallace').show();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: { IdsProducts },
                    dataType: 'JSON',
                    success: (response) => {                        
                        
                        this._addItemsOnTable(response, values);
                    },
                });
                
            }
		});
    };

    /**
     * 
     * @returns {Dictionarity} - Retorna un diccionario con la cantidad y el producto seleccionado
     */
    obtenerCantidadYProducto = () => { 
        
        if (!this._estado) {
            console.error('No se ha inicializado el estado para verificar la cantidad de productos. Ejemplo: new RenderTable(true)');
            return;
        }
        
        let quantityForProduct = {};

        let quantityProducts = document.querySelectorAll('input[name="quantity"]');
        quantityProducts.forEach((element) => {
            quantityForProduct[element.getAttribute('data-id')] = element.value;
        });

        return quantityForProduct;
    }
    
    /**
    * 
    * @param {*} param0 
    * @param {string} param0.select - Id del select que se encarga de que el usuario seleccione los items
    * @param {string} param0.divRender - Id del div donde se renderizara la tabla con los items seleccionados
    */
    limpiarTabla = ({ select, divRender }) => {
        $(`${divRender} .tableRenderWallace`).hide();
        $(`${divRender} .messageEmptyWallace`).show();
        $(`${divRender} .itemsOnTable`).html('');
        document.querySelector(select).reset();
    }


}
