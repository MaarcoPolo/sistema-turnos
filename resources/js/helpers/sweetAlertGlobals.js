/**
 * Muestra un mensaje general de exito con sweet alert
 * @param {*} mensaje - Mensaje que se mostrara en el sweetalert
 */
 export function successSweetAlert(mensaje) {
    return Swal.fire(
        '¡Éxito!',
        `${mensaje}`,
        'success'
    )
}

/**
 * Muestra un mensaje general de error con sweet alert
 * @param {*} mensaje - Mensaje que se mostrara en el sweetalert
 */
export function errorSweetAlert(mensaje) {
    Swal.fire(
        '¡Error!',
        `${mensaje}`,
        'error'
    )
}

/**
 * Muestra un mensaje general de informacion con sweet alert
 * @param {*} mensaje - Mensaje que se mostrara en el sweetalert
 */
export function infoSweetAlert(mensaje) {
    Swal.fire(
        '¡Información!',
        `${mensaje}`,
        'info'
    )
}

export function warningSweetAlert(mensaje) {
    Swal.fire(
        '¡Advertencia!',
        `${mensaje}`,
        'warning'
    )
}