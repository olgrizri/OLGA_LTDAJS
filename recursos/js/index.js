function agregarCarrito(codigo){
    return new Promise(function(resolve, reject){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/agregar_carrito.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200 && xhr.responseText=="ok") {
                    resolve("Producto agregado");
                   
                } else {
                    
                    reject("Error al agregar producto: ", xhr.status);
                    
                }
            }
        };

        xhr.send("codigo=" + codigo);
    });

}
function agregarCarritoPromesa(codigo){
 agregarCarrito(codigo).then(res=>{
    mostrarAlerta('ok', 'Exito', res);
consultarProductos(4);
 }).catch(err=>{
    mostrarAlerta('error', 'Error', err);
    console.error(err);

 });
}

function lista_productos(usuario_id){
    return new Promise(function(resolve, reject){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/consultar_carrito.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                  
                    resolve(xhr.responseText);
                   
                } else {
                    
                    reject("Error al consultar productos: ", xhr.status);
                    
                }
            }
        };

       xhr.send("usuario_id=" + usuario_id);
    });

}
function consultarProductos(usuario_id){
    lista_productos(usuario_id).then(res=>{
        console.log(res);
        var response = JSON.parse(res);
        document.getElementById("lista_productos").innerHTML="";
        var total=0;
        response.forEach(function (product) {
            total= parseInt(product.ValorVenta)+parseInt(total);
            document.getElementById("lista_productos").innerHTML += `
                
                    
                    <td>${product.Nombre}</td>
                    <td>${product.ValorVenta}</td>
                    <td><button class="btn btn-danger" onclick="eliminarProductoCarrito(${product.CodigoProducto},4)">Eliminar</button></td>
                    
        
               
        `;
        });
        document.getElementById("total").innerHTML = total; 
     }).catch(err=>{
        mostrarAlerta('error', 'Error', err);   

        console.error(err);
    
     });

    }
    function eliminarProductoCarrito(codigo,usuario){

        Swal.fire({   
        title: "¿Deseas eliminar el producto?", 
        showCancelButton: true,   
        confirmButtonText: "Confirmar",   
        cancelButtonText: "Cancelar",   

        }).
        then((result) => {    
        if (result.isConfirmed) {      
            eliminarProducto(codigo,usuario).then(res=>{
                if(res=="ok"){
                    mostrarAlerta('ok', 'Exito', "Producto eliminado");   
                    consultarProductos(4);
                }
                
             }).catch(err=>{
                mostrarAlerta('error', 'Error', err);  
                console.error(err);
            
             });
        } });
    }
    
function eliminarProducto(codigo,usuario){
    return new Promise(function(resolve, reject){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/OLGA_LTDAJS/controllers/eliminar_carrito.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    resolve(xhr.responseText);
                   
                } else {
                    reject("Error al eliminar producto: ", xhr.status);
                    
                }
            }
        };

        xhr.send("codigo=" + codigo + "&usuario=" + usuario);
    });

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
 