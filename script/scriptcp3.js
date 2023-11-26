let carrito = []
let cantidad = []
let total = 0;
// const carrito = document.getElementById("carrito");
// const boton = document. getElementsByClassName


function agregarAlCarrito(id) {
    const productoAux = productos.find((producto) => producto.id === id);
    const producto = Object.entries(productoAux);

    if (!cantidad[id - 1]) {
        cantidad[id - 1] = 1;
        producto.push(cantidad[id - 1]);
        carrito.push(producto);
        mostrarCarrito();
        total_a_pagar(carrito);
        console.log(carrito);
        console.log(cantidad[id - 1]);
    } else {
        cantidad[id-1]++;
        carrito[id-1][5] = cantidad[id-1];
        console.log(carrito[id-1][5]);
        console.log(carrito);
        
        mostrarCarrito();
        total_a_pagar(carrito);
        console.log(carrito[id-1][5]);
        console.log(carrito);
    }
}

function total_a_pagar(carrito){
    const pagar = document.getElementById("pagar");
    pagar.innerHTML = '';
    total = 0;

    carrito.forEach((producto) => {
        total+= producto[4][1] * producto[5];
    });

    pagar.innerHTML = `$${total}`;
    
    
}

function mostrarCarrito() {
    const carritoItems = document.getElementById('carrito');
    carritoItems.innerHTML = '';
    
    carrito.forEach((producto) => {
        carritoItems.innerHTML += `
            <div class="row mt-3">
                <div class="col">
                    <img src="${producto[2][1]}" alt="${producto[3][1]}" style="width: 100px; height: 100px;" />
                </div>
                <div class="col">
                    ${producto[1][1]}
                </div>
                <div class="col">
                    ${producto[3][1]}
                </div>
                <div class="col">
                    ${producto[4][1]}
                </div>
                <div class="col">
                    ${producto[5]}
                </div>
                <div class="col">
                    <button class="btn btn-danger" onclick="removerDelCarrito(${producto[0][1]})">Remover</button>
                </div>
            </div>`;
    });
}

function removerDelCarrito(id) {
    cantidad[id-1]--;
    carrito[id-1][5] = cantidad[id-1];
    total -= carrito[id-1][4][1];
    console.log(carrito[id-1][5]);
    if (cantidad[id-1] === 0){
        carrito = carrito.filter((producto) => producto[0][1] !== id);
        mostrarCarrito();
        total_a_pagar(carrito);
    } else {
        mostrarCarrito();
        total_a_pagar(carrito);
    }
    
}