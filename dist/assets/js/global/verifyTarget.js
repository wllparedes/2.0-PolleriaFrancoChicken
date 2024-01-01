
/**
 * 
 * @param {*} e Elemento del DOM donde se hizo click
 * @returns {HTMLElement} Retorna el elemento padre del elemento donde se hizo click
 */
export const verifyTarget = (e) => {

    switch (e.target.nodeName) {
        case 'path':
            return e.target.parentElement.parentElement;
        case 'svg':
            return e.target.parentElement;
        default:
            return e.target;
    }

}



