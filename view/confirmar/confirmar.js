$(document).ready(function(){
    /*TODO: proceso para extraer el id encriptado que se encuentra en la url de la vista de confirmar */
    const url = window.location.href;
    const params = new URLSearchParams(new URL(url).search);
    const confirmar = params.get("id");
    const decoded_id = decodeURIComponent(confirmar);
    const id = decoded_id.replace(/\s/g, '+');

    console.log(id);
});