/** @format */

'use strict';


const si_registrado = () => {
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Se ha registrado exitosamente!',
		showConfirmButton: false,
		timer: 1500,
	});
};

//
const no_registrado = (tabla) => {
	Swal.fire({
		position: 'center',
		icon: 'warning',
		title: 'No se ha podido registrar',
		text: `Datos anteriormente añadidos, asegúrese de no repetir datos. Usted podría editar el ${tabla}.`,
		showConfirmButton: false,
		timer: 5000,
	});
};

const sizeError = (tabla) => {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});
	Toast.fire({
		icon: 'warning',
		title: `Imagen del ${tabla} demasiado grande.`,
	});
};

//
const alerta_confirmacion = () => {
	return new Promise((resolve) => {
		Swal.fire({
			title: '¿Estás seguro de eliminar el registro?',
			text: 'Ya no podrás recuperarlo',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#fc424a',
			cancelButtonColor: '#0090e7',
			confirmButtonText: 'Eliminar',
			cancelButtonText: 'Cancelar',
		}).then((result) => {
			resolve(result.isConfirmed);
		});
	});
};

//
const si_eliminado = () => {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});
	Toast.fire({
		icon: 'success',
		title: 'Eliminación satisfactoria.',
	});
};

//
const no_eliminado = () => {
	Swal.fire({
		position: 'center',
		icon: 'error',
		title: 'No se ha podido eliminar',
		text: 'Parece que este registro está enlazado en otro registro, verífiquelo.',
		showConfirmButton: false,
		timer: 2500,
	});
};

//
const error = () => {
	Swal.fire({
		position: 'center',
		icon: 'error',
		title: 'Error',
		text: 'Ha ocurrido un error, intentelo más tarde.',
		showConfirmButton: false,
		timer: 2500,
	});
};


const si_actualizado = () => {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});
	Toast.fire({
		icon: 'success',
		title: 'Actualización satisfactoria.',
	});
};

const usuario_now = () => {
	Swal.fire({
		position: 'center',
		icon: 'warning',
		title: 'No se ha podido eliminar',
		text: `Usted no puede eliminarse a si mismo, por favor consulte con sus superiores.`,
		showConfirmButton: false,
		timer: 5000,
	});
};


export {
	si_registrado,
	no_registrado,
	sizeError,
	alerta_confirmacion,
	si_eliminado,
	no_eliminado,
	error,
	si_actualizado,
	usuario_now,
};