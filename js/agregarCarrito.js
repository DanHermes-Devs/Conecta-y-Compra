
// var inlinecartbody = document.querySelector('#inlinecartbody');
// var gridProductos = document.querySelector('#grid-productos');
// var tableProducts = document.querySelector('#table-products tbody');
// var vaciarCarrito = document.querySelector('#vaciar-carrito');
// var articulosCarritos = [];

// cargarEventListeners();
// function cargarEventListeners() {
//     // Cuando agregas un curso presionando agregar al carrito
//     gridProductos.addEventListener('click', agregarCurso);
//     console.log(gridProductos);
// }


// // FUnciones
// function agregarCurso(e){
//     // e.preventDefault();
//     if(e.target.classList.contains("agregar-carrito")){
//         const producto = e.target.parentElement.parentElement;

//         console.log(producto);
//         leerDatos(producto);
//     }
// }

// function leerDatos(producto){
//     const infoProduct = {
//         id: producto.querySelector('.agregar-carrito').getAttribute('data-idp'),
//         imagen: producto.querySelector('.imgprod').src,
//         titulo: producto.querySelector('.prod-desc').textContent,
//         precio: producto.querySelector('.precio').textContent,
//     }

//     console.log(infoProduct);
    
//     articulosCarritos = [...articulosCarritos, infoProduct];
//     // Agrega elementos al carrito
//     console.log(articulosCarritos);
//     carritoHTML();
// }

// // Muestra el carrito en el html
// function carritoHTML(){
//     // Limpiar html
//     limpiarHTML();
    
//     // Recorre el arreglo y crea el html
//     articulosCarritos.forEach( producto => {
//         const row = document.createElement('tr');
//         row.innerHTML = `
//             <td>
//                 <img src="${producto.imagen}" class="img-fluid w-50">
//             </td>
//             <td>
//                 ${producto.titulo}
//             </td>
//             <td>
//                 ${producto.precio}
//             </td>
//         `;
        
//         // Agrega el html del carrito en el tbody
//         tableProducts.appendChild(row);
//     });
// }

// // Elimina los cursos del tbody 
// function limpiarHTML(){
//     // Forma lenta
//     tableProducts.innerHTML = '';
    
//     // Forma Rapida
// //     while(tableProducts.firstChild){
// //         tableProducts.removeChild(tableProducts.firstChild);
// //     }
// }