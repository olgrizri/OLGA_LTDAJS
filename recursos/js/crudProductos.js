function mostrarCrearProducto(codigo, opcion) {
    
    document.getElementById("product-buttons").style.display = "none";
    document.getElementById("product-create-form").style.display = "block";
    document.getElementById("product-list").style.display = "none";

    if(opcion == 1)
    {
        
        leerUnProducto(codigo);
        document.getElementById("btnEliminarForm").style.display = "block";
        document.getElementById("campoCodigo").style.display = "block";


    }else{
        
        limpiarCampos();
        document.getElementById("btnEliminarForm").style.display = "none";
        document.getElementById("campoCodigo").style.display = "none";
        document.getElementById("product-codigo").value = "0";



    }

}

function mostrarBuscarProducto() {
    
    document.getElementById("product-buttons").style.display = "none";
    document.getElementById("product-create-form").style.display = "none";
    document.getElementById("product-list").style.display = "block";

    
    var codigoProducto = document.getElementById("search-product-code").value;
    
    leerProductos(codigoProducto === "Todos" ? "Todos" : codigoProducto);
}


function volverAlCRUDProductos() {
   
    document.getElementById("product-buttons").style.display = "none";
    document.getElementById("product-create-form").style.display = "none";
    document.getElementById("product-list").style.display = "block";
    leerProductos("Todos");
}



function leerProductos(codigoProducto) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            console.log("Respuesta del servidor:", xhr.responseText);

            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                
                if ("error" in response) {
                    
                    console.error("Error en la respuesta del servidor:", response.error);
                    mostrarAlerta('error', 'Error', response.error);

                } else {
                    
                    document.getElementById("product-table-body").innerHTML = "";

                    
                    response.forEach(function (product) {
                        document.getElementById("product-table-body").innerHTML += `
                            <tr>
                                <td>${product.CodigoProducto}</td>
                                <td>${product.Nombre}</td>
                                <td>${product.Marca}</td>
                                <td>${product.TipoProducto}</td>
                                <td>${product.OrigenProducto}</td>
                                <td>${product.Cantidad}</td>
                                <td>${product.ValorCosto}</td>
                                <td>${product.ValorVenta}</td>
                                <td>${product.FechaFabricacion}</td>
                                <td>${product.Proveedor}</td>
                                <td>${product.GarantiaProveedor}</td>
                                <td><button onclick='eliminarProducto(${product.CodigoProducto})'>Eliminar</button></td>
                                <td><button onclick='mostrarCrearProducto(${product.CodigoProducto}, 1)'>Editar</button></td>



                                
                                
                            </tr>
                    `;
                    });
                }
            } else {
                
                console.error("Error en la solicitud AJAX. Estado:", xhr.status);
                mostrarAlerta('error', 'Error', xhr.status);

            }
        }
    };

    xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    if (codigoProducto !== undefined) {
        xhr.send("codigoProducto=" + codigoProducto+"&modulo=Productos&operacion=consultar");
    } else {
        xhr.send();
    }
}


function mostrarProductos(products) {
    var productTableBody = document.getElementById("product-table-body");

    if (products && products.length > 0) {
        
        productTableBody.innerHTML = "";

        
        products.forEach(function (product) {
            productTableBody.innerHTML += `
                <tr>
                    <td>${product.CodigoProducto}</td>
                    <td>${product.Nombre}</td>
                    <td>${product.ValorVenta}</td>
                    <td>${product.Cantidad}</td>
                    <!-- Agrega otras columnas según sea necesario -->
                    //<td><button onclick="mostrarEditarProducto(${product.CodigoProducto})">Editar</button></td>
                    //<td><button onclick="eliminarProducto(${product.CodigoProducto})">Eliminar</button></td>
                </tr>
            `;
        });
    } else {
        productTableBody.innerHTML = "<tr><td colspan='6'>No se encontraron productos.</td></tr>";
    }
}


function crearProducto() {
    var codigoProducto = document.getElementById("product-codigo").value;
    var nombre = document.getElementById("product-nombre").value;
    var marca = document.getElementById("product-marca").value;
    var tipoProducto = document.getElementById("product-tipoProducto").value;
    var origenProducto = document.getElementById("product-origenP").value;
    var cantidad = document.getElementById("product-Cantidad").value;
    var Costo = document.getElementById("product-Valorcosto").value;
    var ValorVenta = document.getElementById("product-ValorVenta").value;    
    var FechaFabricacion = document.getElementById("product-FechaF").value; 
    var proveedor = document.getElementById("product-proveedor").value; 
    var Garantia = document.getElementById("product-Garantia").value; 


    

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                mostrarAlerta('ok', 'Exito', xhr.responseText);

                
                
            } else {
                console.error("Error al crear producto. Estado:", xhr.status);
            }
        }
    };

    xhr.open("POST", "crear_producto.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(
    "codigoProducto=" + codigoProducto +
    "&nombre=" + nombre +
    "&marca=" + marca +
    "&tipoProducto=" + tipoProducto +
    "&origenProducto=" + origenProducto +
    "&cantidad=" + cantidad +
    "&Costo=" + Costo +
    "&ValorVenta=" + ValorVenta +
    "&FechaFabricacion=" + FechaFabricacion +
    "&proveedor=" + proveedor +
    "&Garantia=" + Garantia
);

}


function mostrarEditarProductov1(codigoProducto) {
 console.log("Código del producto a editar:", codigoProducto);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var product = JSON.parse(xhr.responseText);

                if ("error" in product) {
                    console.error("Error en la respuesta del servidor:", product.error);
                    mostrarAlerta('error', 'Error', product.error);

                } else {
                    
                    document.getElementById("product-codigo").value = product.CodigoProducto;
                    document.getElementById("product-nombre").value = product.Nombre;
                    document.getElementById("product-marca").value = product.Marca;
                    document.getElementById("product-tipoProducto").value = product.TipoProducto;
                    document.getElementById("product-origenP").value = product.OrigenProducto;
                    document.getElementById("product-Cantidad").value = product.Cantidad;
                    document.getElementById("product-Valorcosto").value = product.ValorCosto;
                    document.getElementById("product-ValorVenta").value = product.ValorVenta;
                    document.getElementById("product-FechaF").value = product.FechaFabricacion;
                    document.getElementById("product-proveedor").value = product.Proveedor;
                    document.getElementById("product-Garantia").value = product.GarantiaProveedor;

                 
                }
            } else {
                console.error("Error en la solicitud AJAX. Estado:", xhr.status);
                mostrarAlerta('error', 'Error', "Error en la solicitud AJAX. Estado:" + xhr.status);

            }
        }
    };

    xhr.open("POST", "peticiones.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("codigoProducto=" + codigoProducto+"modulo=Productos&operacion=consultar");
}


function mostrarEditarProducto(codigoProducto) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var product = JSON.parse(xhr.responseText);

                if (product && product.CodigoProducto) {
                    
                    var productCodigoElement = document.getElementById("product-codigo");
                    if (productCodigoElement) {
                        productCodigoElement.innerText = product.CodigoProducto;
                    }

                    
                } else {
                    console.error("Error al obtener detalles del producto.");
                }
            } else {
                console.error("Error en la solicitud AJAX. Estado:", xhr.status);
            }
        }
    };

    xhr.open("POST", "peticiones.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("codigoProducto=" + codigoProducto+"&modulo=Productos&operacion=consultar");
}


function buscarProductoPorCodigo(codigoProducto) {
    
    leerProducto(codigoProducto);
}


function leerUnProducto(codigoProducto) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            console.log("Respuesta del servidor:", xhr.responseText);

            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);

                if ("error" in response) {
                    
                    console.error("Error en la respuesta del servidor:", response.error);
                    mostrarAlerta('error', 'Error', response.error);
                } else {
                    
                    var product = response[0]; 
                    mostrarDetallesProducto(product);
                }
            } else {
                
                console.error("Error en la solicitud AJAX. Estado:", xhr.status);
                mostrarAlerta('error', 'Error', "Error en la solicitud AJAX. Estado:" + xhr.status);

            }
        }
    };

    xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("codigoProducto=" + codigoProducto+"&modulo=Productos&operacion=consultar");

  
}

function mostrarDetallesProducto(product) {
    
    document.getElementById("product-codigo").value = product.CodigoProducto;
    document.getElementById("product-nombre").value = product.Nombre;
    document.getElementById("product-marca").value = product.Marca;
    document.getElementById("product-tipoProducto").value = product.TipoProducto;
    document.getElementById("product-origenP").value = product.OrigenProducto;
    document.getElementById("product-Cantidad").value = product.Cantidad;
    document.getElementById("product-Valorcosto").value = product.ValorCosto;
    document.getElementById("product-ValorVenta").value = product.ValorVenta;
    document.getElementById("product-FechaF").value = product.FechaFabricacion;
    document.getElementById("product-proveedor").value = product.Proveedor;
    document.getElementById("product-Garantia").value = product.GarantiaProveedor;
}

function guardarCambios() {
    var codigoProducto = document.getElementById("product-codigo").value;
    var nombre = document.getElementById("product-nombre").value;
    var marca = document.getElementById("product-marca").value;
    var tipoProducto = document.getElementById("product-tipoProducto").value;
    var origenProducto = document.getElementById("product-origenP").value;
    var cantidad = document.getElementById("product-Cantidad").value;
    var costo = document.getElementById("product-Valorcosto").value;
    var valorVenta = document.getElementById("product-ValorVenta").value;
    var fechaFabricacion = document.getElementById("product-FechaF").value;
    var proveedor = document.getElementById("product-proveedor").value;
    var garantia = document.getElementById("product-Garantia").value;

    if(codigoProducto == "" ||
        nombre == "" ||
        marca == "" ||
        tipoProducto == "" ||
        origenProducto == "" ||
        cantidad == "" ||
        costo == "" ||
        valorVenta == "" ||
        fechaFabricacion == "" ||
        proveedor == "" ||
        garantia == "")
    {
    
        mostrarAlerta('error', 'Error', "Campos Incompleto");
        return;
    }


    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                mostrarAlerta('ok', 'Exito', xhr.responseText);

                

                if(xhr.responseText.trim() == "producto registrado con exito" || xhr.responseText.trim() == "producto actualizado con exito")
                {
                  
                }
            } else {
                console.error("Error al guardar cambios. Estado:", xhr.status);
            }
        }
    };

    for(var i = 0; i < 60; i++){

        xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
        xhr.send(
            "codigoProducto=" + codigoProducto +
            "&nombre=" + nombre +
            "&marca=" + marca +
            "&tipoProducto=" + tipoProducto +
            "&origenProducto=" + origenProducto +
            "&cantidad=" + cantidad +
            "&costo=" + costo +
            "&valorVenta=" + valorVenta +
            "&fechaFabricacion=" + fechaFabricacion +
            "&proveedor=" + proveedor +
            "&garantia=" + garantia+
            "&modulo=Productos"+
            "&operacion=na"
        );
    }
}

function eliminarProducto(codigo) {

    if(codigo == undefined || codigo == ""){

          codigo = document.getElementById("product-codigo").value;
    }

       
    Swal.fire({   
        title: "¿Deseas eliminar el producto?", 
        showCancelButton: true,   
        confirmButtonText: "Confirmar",   
        cancelButtonText: "Cancelar",   
        }).
        then((result) => {   
            if (result.isConfirmed) {  

                
                cargando('Eliminando producto...', 2000);

                
                setTimeout(() => {
                    
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                mostrarAlerta('ok', 'Exito', xhr.responseText);
                                volverAlCRUDProductos();
                                
                            } else {
                                mostrarAlerta('error', 'Error', "Error al eliminar producto. Estado:", xhr.status);
                                console.error("Error al eliminar producto. Estado:", xhr.status);
                            }
                        }
                    };
            
                    xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/peticiones.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
                    xhr.send("codigoProducto=" + codigo+"&operacion=eliminar&modulo=Productos");
            
                }, 2000); 

            } 
        });

   
}

function limpiarCampos()
{
    document.getElementById("product-codigo").value = "";
    document.getElementById("product-nombre").value = "";
    document.getElementById("product-marca").value = "";
    document.getElementById("product-tipoProducto").value = "";
    document.getElementById("product-origenP").value = "";
    document.getElementById("product-Cantidad").value = "";
    document.getElementById("product-Valorcosto").value = "";
    document.getElementById("product-ValorVenta").value = "";
    document.getElementById("product-FechaF").value = "";
    document.getElementById("product-proveedor").value = "";
    document.getElementById("product-Garantia").value = "";
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
 
