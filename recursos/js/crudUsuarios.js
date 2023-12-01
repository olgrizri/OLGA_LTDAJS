

function mostrarCrearUsuario() {
    document.getElementById("user-buttons").style.display = "none";
    document.getElementById("user-form").style.display = "block";
    document.getElementById("user-list").style.display = "none";
    document.getElementById("user-identification").removeAttribute("readonly"); 

     limpiarCampos();
    


}

function limpiarCampos(){
    document.getElementById("user-name").value = "";
    document.getElementById("user-identification").value = "";
    document.getElementById("user-phone").value = "";
    document.getElementById("user-email").value = "";
    document.getElementById("user-role").value = "";
}

function mostrarBuscar() {
    document.getElementById("user-buttons").style.display = "none";
    document.getElementById("user-form").style.display = "none";
    document.getElementById("user-list").style.display = "block";

    leerUsuario();
}

function crearUsuario() {
    var nombre = document.getElementById("user-name").value;
    var identificacion = document.getElementById("user-identification").value;
    var telefono = document.getElementById("user-phone").value;
    var correo = document.getElementById("user-email").value;
    var rol = document.getElementById("user-role").value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
               mostrarAlerta('ok', 'Exito', xhr.responseText);

                
            } else {
               mostrarAlerta('error', 'Error', "Error al crear usuario. Estado:", xhr.status);

                console.error("Error al crear usuario. Estado:", xhr.status);
            }
        }
    };

    xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/crear_usuario.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("nombre=" + nombre + "&identificacion=" + identificacion + "&telefono=" + telefono + "&correo=" + correo + "&rol=" + rol);
}

function volverAlCRUD() {
    document.getElementById("user-buttons").style.display = "none";
    document.getElementById("user-form").style.display = "none";
    document.getElementById("user-list").style.display = "block";
    consultarTodo();
}

function leerUsuario() {
    var codigoUsuario = document.getElementById("search-user-code").value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            console.log("Respuesta del servidor:", xhr.responseText);

            if (xhr.status == 200) {
                var userDetails = JSON.parse(xhr.responseText);
                console.log("Detalles del usuario:", userDetails);

                if (Array.isArray(userDetails) && userDetails.length > 0) {
                    
                    renderizarTablaUsuarios(userDetails);
                } else if (userDetails) {
                   
                    renderizarTablaUsuarios([userDetails]);
                } else {
                    
                    document.getElementById("user-table-body").innerHTML = "";

                }
            } else {
                console.error("Error en la solicitud AJAX. Estado:", xhr.status);
               mostrarAlerta('error', 'Error', "Error en la solicitud AJAX. Estado:"+xhr.status);

            }
        }
    };

    xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("codigoUsuario="+codigoUsuario+"&modulo=Usuarios&operacion=consultar");

}

function consultarTodo(){
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            console.log("Respuesta del servidor:", xhr.responseText);

            if (xhr.status == 200) {
                var userDetails = JSON.parse(xhr.responseText);
                console.log("Detalles del usuario:", userDetails);

                if (Array.isArray(userDetails) && userDetails.length > 0) {
                    
                    renderizarTablaUsuarios(userDetails);
                } else if (userDetails) {
                    
                    renderizarTablaUsuarios([userDetails]);
                } else {
                    
                    document.getElementById("user-table-body").innerHTML = "";
                }
            } else {
                console.error("Error en la solicitud AJAX. Estado:", xhr.status);
            }
        }
    };

    xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("codigoUsuario=Todos&modulo=Usuarios&operacion=consultar");
}

function renderizarTablaUsuarios(users) {
    var tableBody = document.getElementById("user-table-body");
    tableBody.innerHTML = "";

    users.forEach(function (user) {
        var row = document.createElement("tr");

        row.innerHTML = `
            <td>${user.Codigo}</td>
            <td>${user.Nombre}</td>
            <td>${user.Identificacion}</td>
            <td>${user.Telefono}</td>
            <td>${user.Correo}</td>
            <td>${user.Rol}</td>
            <td><button onclick="mostrarEditarUsuario(${user.Codigo})">Editar</button></td>
            <td><button onclick="eliminarUsuarioPromesa(${user.Codigo})">Eliminar</button></td>
        `;

        tableBody.appendChild(row);
    });
}


function mostrarEditarUsuario(codigoUsuario) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var userDetails = JSON.parse(xhr.responseText);

                console.log("USUARIO: "+userDetails);

                if (userDetails) {
                    document.getElementById("user-form").style.display = "block";
                    document.getElementById("user-list").style.display = "none";

                    document.getElementById("user-code").value = userDetails[0].Codigo;
                    document.getElementById("user-name").value = userDetails[0].Nombre;
                    document.getElementById("user-identification").setAttribute("readonly", true); 
                    document.getElementById("user-identification").value = userDetails[0].Identificacion;
                    document.getElementById("user-phone").value = userDetails[0].Telefono;
                    document.getElementById("user-email").value = userDetails[0].Correo;
                    document.getElementById("user-role").value = userDetails[0].Rol;
                } else {
                    mostrarAlerta('error', 'Error', 'Error al obtener detalles del usaurio');

                }
            } else {
                console.error("Error en la solicitud AJAX. Estado:", xhr.status);
            }
        }
    };

    xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("codigoUsuario="+codigoUsuario+"&modulo=Usuarios&operacion=consultar");

}

function mostrarEdicionConUsuarioSeleccionado(event) {
    
    var e = event || window.event;

    var target = e.target || e.srcElement;

    var row = target.parentNode.parentNode;

    var codigoUsuario = row.cells[0].textContent;

    document.getElementById("selected-user-code").value = codigoUsuario;

    
    document.getElementById("user-code").value = codigoUsuario;
    document.getElementById("user-name").value = row.cells[1].textContent;
    document.getElementById("user-identification").value = row.cells[2].textContent;
    document.getElementById("user-phone").value = row.cells[3].textContent;
    document.getElementById("user-email").value = row.cells[4].textContent;
    document.getElementById("user-role").value = row.cells[5].textContent;

    document.getElementById("user-buttons").style.display = "none";
    document.getElementById("user-form").style.display = "block";
    document.getElementById("user-list").style.display = "none";
}

function eliminarUsuarioPromesa(codigo){
      
    Swal.fire({   
        title: "¿Deseas eliminar el usuario?", 
        showCancelButton: true,   
        confirmButtonText: "Confirmar",   
        cancelButtonText: "Cancelar",   
        }).
        then((result) => {   
            if (result.isConfirmed) {  

                
                cargando('Eliminando usuario...', 2000);

                setTimeout(() => {

                    eliminarUsuario(codigo).then(resp=>{
                        console.log(resp);
                        mostrarAlerta('ok', 'Exito', resp);
                
                        leerUsuario();
                        }).catch(err=>{
                            console.log(err);
                            console.error("Error al eliminar usuario. Estado:", err);
                        });

                 }, 2000);

        }
    });


}

function eliminarUsuario(codigoUsuario) {
   
        return new Promise(function(resolve, reject){
            var xhr = new XMLHttpRequest();
           
            xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        
                        resolve("usuario eliminado");
                       
                    } else {
                        
                        reject("Error al eliminar usuario. Estado:", xhr.status);
                        
                    }
                }
            };
    
            xhr.send("codigoUsuario=" + codigoUsuario+ "&modulo=Usuarios"+ "&operacion=eliminar");
        });


    }

function seleccionarUsuario() {
    var table = document.getElementById("user-table-body");

    for (var i = 0; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            var codigoUsuario = this.cells[0].innerHTML;
            document.getElementById("selected-user-code").value = codigoUsuario;
            
        };
    }
}

function guardarEdicion() {
    
    var nombre = document.getElementById("user-name").value;
    var identificacion = document.getElementById("user-identification").value;
    var telefono = document.getElementById("user-phone").value;
    var correo = document.getElementById("user-email").value;
    var rol = document.getElementById("user-role").value;
   
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
               
                if(xhr.responseText=="campos incompletos"){
                   mostrarAlerta('error', 'Error', xhr.responseText);
 
                    return;
                }
               mostrarAlerta('ok', 'Exito', xhr.responseText);

                volverAlCRUD();
            } else {
                console.error("Error al guardar la edición. Estado:", xhr.status);
            }
        }
    };

    xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("nombre=" + nombre + "&identificacion=" + identificacion + "&telefono=" + telefono + "&correo=" + correo + "&rol=" + rol+ "&modulo=Usuarios&operacion=na");
}


function mostrarAlerta(tipo, titulo, msj)
{
 
    
    switch (tipo) {
        case 'ok':
   
            Swal.fire({
                title: titulo,
                text: msj,
                icon: "success"
        });
           
        break;
   
        case 'error':
   
            Swal.fire({
                title: titulo,
                text: msj,
                icon: "error",
            });
        break;
    }
 
}
 
 
function cargando(titulo, tiempo)
{
    let timerInterval;
        Swal.fire({
        title: titulo,
        timer: tiempo,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
        }).then((result) => {
       
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer");
        }
        });
}
 
