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
    let amount_action = document.getElementsByClassName('amount_action');
    for (i = 0; i < amount_action.length; i++) {
        amount_action[i].addEventListener('click', function (e) {
            e.preventDefault();
            product_sigle_amount(this.getAttribute('data-action'));
        });
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

function variantes_remove() {
    let variants_list = document.getElementsByClassName('variante');
    for (i = 0; i < variants_list.length; i++) {
        variants_list[i].classList.remove('active');
    }
}

function product_sigle_amount(action) {
    var cantidad = document.getElementById('add_to_cart');
    var nueva_cantidad;
    if (action == "plus") {
        nueva_cantidad = parseInt(cantidad.value) + parseInt(1);
        cantidad.value = nueva_cantidad;
    } else if (action == 'minus') {
        if (parseInt(cantidad.value) > 1) {
            nueva_cantidad = parseInt(cantidad.value) - parseInt(1);
            cantidad.value = nueva_cantidad;
        }
    }


}
if (route == 'usuario.address') {
    let state = document.getElementById('state');

    if (state) {
        state.addEventListener('change', load_cities);
    }
    load_cities();

}
function load_cities() {
    let state_id = document.getElementById('state');
    let cities_select = document.getElementById('address_city');
    cities_select.innerHTML = '';
    let url = base + '/usuario/address/cities/' + state_id.value;
    http.open('POST', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let data = this.responseText;
            data = JSON.parse(data);

            if (data.length > 0) {
                data.forEach(function (element, index) {
                    cities_select.innerHTML += '<option value="' + element.id + '">' + element.nombre + '</option>';
                });
            }


        }
    }


}



let btn_paymet_metho = document.getElementsByClassName('btn_paymet');
let payment_method_transfer_file = document.getElementById('payment_method_transfer_file');
    if (payment_method_transfer_file) {
        payment_method_transfer_file.addEventListener('change', function(e){
             imageprew(this,'payment_method_transfer_img');
             document.getElementById('btn-complete').classList.remove('disabled');
        });
    }
if (btn_paymet_metho) {
    let btn_paymet_metho_select = null;
    for (i = 0; i < btn_paymet_metho.length; i++) {
        btn_paymet_metho[i].addEventListener('click', function (e) {
            e.preventDefault();
            if (btn_paymet_metho_select) {
                document.getElementById(btn_paymet_metho_select).classList.remove('active');
            }
            this.classList.add('active');
            document.getElementById('file_payment_method_id').value = this.getAttribute('data_payment_method_id');
            // document.getElementById('btn-complete').classList.remove('disabled');
            btn_paymet_metho_select = this.getAttribute('id');

            //Metodo de transferencia bancaria 
            if (this.getAttribute('data_payment_method_id') == "1") {
                document.getElementById('payment_method_transfer_info').style.display = 'block';
                document.getElementById('btn-complete').classList.add('disabled');
            } else {
                payment_method_transfer_file.value = '';
                document.getElementById('payment_method_transfer_img').setAttribute('src','');
                document.getElementById('payment_method_transfer_info').style.display = 'none';
                document.getElementById('btn-complete').classList.remove('disabled');
            }

        });

    }
}

    let payment_method_transfer_select_file = document.getElementById('payment_method_transfer_select_file');
    if(payment_method_transfer_select_file){
        payment_method_transfer_select_file.addEventListener('click',function(e){   
            e.preventDefault();
            document.getElementById('payment_method_transfer_file').click();
        });

    }
    



function imageprew(input, toprew)
{
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e){
            document.getElementById(toprew).setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}