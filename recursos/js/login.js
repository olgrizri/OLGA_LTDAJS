function login(correo,contrasena){
    return new Promise(function(resolve, reject){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200 && xhr.responseText.trim()=="ok") {
                    resolve("ok");
                   
                } else {
              
                    reject("usuario no encontrado", xhr.status);
                    
                }
            }
        };

        xhr.send("correo=" + correo + "&contrasena=" + contrasena+"&modulo=Login&operacion=na");
    });

}
function iniciarSesion(){
    var correo=document.getElementById("correo").value;
    var contrasena=document.getElementById("clave").value;
    if(correo=="" || contrasena==""){
        alert("los campos estan incompletos");
        return;
    }
 login(correo,contrasena).then(res=>{
    if(res=="ok"){
        location.href="vistas/CRUDUsuarios.php";

    }
 }).catch(err=>{
    alert(err);
    console.error(err);

 });
}
