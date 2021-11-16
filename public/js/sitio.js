let base = location.protocol + '//' + location.host;
const loader = document.getElementById('loader');
const route = document.getElementsByName('routeName')[0].getAttribute('content');
const http = new XMLHttpRequest();
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content')




window.onload = function () {
    setTimeout(() => {
        loader.style.visibility = 'hidden';
        loader.style.display = 'none';
    }, 10)
}

if (route) {
    // load_product_variants();
    let inventory = document.getElementsByClassName('inventario');
    for (i = 0; i < inventory.length; i++) {
        inventory[i].addEventListener('click', load_product_variants);
    }

}



function load_product_variants() {
    document.getElementById('variantes_div').style.display = 'none';
    document.getElementById('variantes').innerHTML = "";
    document.getElementById('field_variant').value = null;
    loader.style.visibility = 'hidden';
    loader.style.display = 'flex';
    let inventory_list = document.getElementsByClassName('inventario');
    for (i = 0; i < inventory_list.length; i++) {
        inventory_list[i].classList.remove('active');
    }
    let product_id = document.getElementsByName('product_id')[0].getAttribute('content');
    let inventario = this.getAttribute('data-inventory-id');
    document.getElementById('field_invenory').value = inventario;
    this.classList.add('active');
    // console.log(`Producto ${product_id} Inventario ${inventario}`);
    let url = base + '/platillo/inventario/' + inventario;
    http.open('POST', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);

    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            loader.style.display = 'none';
            let data = this.responseText;
            data = JSON.parse(data);
            if (data.length > 0) {
                document.getElementById('variantes_div').style.display = 'block';
                data.forEach(function (element, index) {
                    variant = '';
                    variant += '<li>';
                    variant += '<a href="#" class="variante" onclick="variantes_remove(); document.getElementById(\'field_variant\').value=' + element.id + '; this.classList.add(\'active\'); return false;">';
                    variant += element.nombre;
                    variant += '</a>';
                    variant += '</li>';
                    document.getElementById('variantes').innerHTML += variant;

                });
            }
            console.log(data.length);

        }
    }

}

function variantes_remove()
{
    let variants_list = document.getElementsByClassName('variante');
    for (i = 0; i < variants_list.length; i++) {
        variants_list[i].classList.remove('active');
    }    
}


