/** @format */

export const getBtnSelected = (select) => {
	return document
		.querySelector(select)
		.parentElement.parentElement.parentElement.nextElementSibling.querySelector(
			'.selected'
		);
};
