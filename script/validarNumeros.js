// Validar que solo acepte la entrada de numeros
function ValidarNumeros(event){
    let charCode  = (event.which) ?event.which : event.keyCode;
        if(charCode <48 || charCode > 57){
            event.preventDefault();
            return false;
        }
        return true;
   } 