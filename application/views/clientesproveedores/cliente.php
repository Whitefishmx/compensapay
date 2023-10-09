
<div class="p-5" id="app">
    <div class="row">
        <div class="col l12 right-align p-5">
            <a class="modal-trigger button-blue">Invitar Cliente</a>
        </div>
    </div>
    <div class="card esquinasRedondas">
        <div class="card-content">
            <div class="row">
                <div class="col l3 p-3">
                    <button class="button-table" :class="{ 'selected': selectedButton == 'Facturas' }" @click="selectButton('Facturas')">
                        Clientes
                    </button>
                    &nbsp;
                    <button class="button-table" :class="{ 'selected': selectedButton == 'Operaciones' }" @click="selectButton('Operaciones')">
                        Proveedores
                    </button>
                </div>
                <div class="col 9">
                    <form class="input-border" action="#" method="post" style="display: flex;">
                        <input type="search" placeholder="Buscar" >
                    </form>
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table v-if="selectedButton === 'Facturas'" class="visible-table striped">
                    <thead>
                        <tr>
                            <th >RFC</th>
                            <th >Alias</th>
                            <th >Razón Social</th>
                            <th >Dirección</th>
                            <th >Contacto</th>
                            <th >Teléfono</th>
                            <th >Correo electrónico</th>
                            <th >Fecha de alta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >ABC123456</td>
                            <td >Empresa1</td>
                            <td >Nombre Empresa 1</td>
                            <td >Dirección Empresa 1</td>
                            <td >Contacto Empresa 1</td>
                            <td >123-456-7890</td>
                            <td >correo1@example.com</td>
                            <td >2023-01-15</td>
                        </tr>
                        <tr>
                            <td >DEF789012</td>
                            <td >Empresa2</td>
                            <td >Nombre Empresa 2</td>
                            <td >Dirección Empresa 2</td>
                            <td >Contacto Empresa 2</td>
                            <td >987-654-3210</td>
                            <td >correo2@example.com</td>
                            <td >2022-08-20</td>
                        </tr>
                        <tr>
                            <td >ABC123456</td>
                            <td >Empresa3</td>
                            <td >Nombre Empresa 3</td>
                            <td >Dirección Empresa 3</td>
                            <td >Contacto Empresa 3</td>
                            <td >123-456-7890</td>
                            <td >correo3@example.com</td>
                            <td >2022-09-15</td>
                        </tr>

                        <tr>
                            <td >XYZ789012</td>
                            <td >Empresa4</td>
                            <td >Nombre Empresa 4</td>
                            <td >Dirección Empresa 4</td>
                            <td >Contacto Empresa 4</td>
                            <td >345-678-9012</td>
                            <td >correo4@example.com</td>
                            <td >2022-10-05</td>
                        </tr>

                        <tr>
                            <td >GHI345678</td>
                            <td >Empresa5</td>
                            <td >Nombre Empresa 5</td>
                            <td >Dirección Empresa 5</td>
                            <td >Contacto Empresa 5</td>
                            <td >567-890-1234</td>
                            <td >correo5@example.com</td>
                            <td >2022-11-12</td>
                        </tr>

                        <tr>
                            <td >JKL678901</td>
                            <td >Empresa6</td>
                            <td >Nombre Empresa 6</td>
                            <td >Dirección Empresa 6</td>
                            <td >Contacto Empresa 6</td>
                            <td >678-901-2345</td>
                            <td >correo6@example.com</td>
                            <td >2022-12-20</td>
                        </tr>

                        <tr>
                            <td >MNO901234</td>
                            <td >Empresa7</td>
                            <td >Nombre Empresa 7</td>
                            <td >Dirección Empresa 7</td>
                            <td >Contacto Empresa 7</td>
                            <td >789-012-3456</td>
                            <td >correo7@example.com</td>
                            <td >2023-01-25</td>
                        </tr>

                        <tr>
                            <td >PQR567890</td>
                            <td >Empresa8</td>
                            <td >Nombre Empresa 8</td>
                            <td >Dirección Empresa 8</td>
                            <td >Contacto Empresa 8</td>
                            <td >890-123-4567</td>
                            <td >correo8@example.com</td>
                            <td >2023-02-18</td>
                        </tr>

                        <tr>
                            <td >STU678901</td>
                            <td >Empresa9</td>
                            <td >Nombre Empresa 9</td>
                            <td >Dirección Empresa 9</td>
                            <td >Contacto Empresa 9</td>
                            <td >901-234-5678</td>
                            <td >correo9@example.com</td>
                            <td >2023-03-10</td>
                        </tr>

                        <tr>
                            <td >VWX789012</td>
                            <td >Empresa10</td>
                            <td >Nombre Empresa 10</td>
                            <td >Dirección Empresa 10</td>
                            <td >Contacto Empresa 10</td>
                            <td >012-345-6789</td>
                            <td >correo10@example.com</td>
                            <td >2023-04-05</td>
                        </tr>
                    </tbody>
                </table>
                <table v-if="selectedButton === 'Operaciones'" class="visible-table striped">       
                <thead>
                        <tr>
                            <th >RFC</th>
                            <th >Alias</th>
                            <th >Razón Social</th>
                            <th >Dirección</th>
                            <th >Contacto</th>
                            <th >Teléfono</th>
                            <th >Correo electrónico</th>
                            <th >Fecha de alta</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td >ABC123456</td>
                            <td >Empresa1</td>
                            <td >Nombre Empresa 1</td>
                            <td >Dirección Empresa 1</td>
                            <td >Contacto Empresa 1</td>
                            <td >123-456-7890</td>
                            <td >correo1@example.com</td>
                            <td >2023-01-15</td>
                        </tr>
                        <tr>
                            <td >DEF789012</td>
                            <td >Empresa2</td>
                            <td >Nombre Empresa 2</td>
                            <td >Dirección Empresa 2</td>
                            <td >Contacto Empresa 2</td>
                            <td >987-654-3210</td>
                            <td >correo2@example.com</td>
                            <td >2022-08-20</td>
                        </tr>
                        <tr>
                            <td >ABC123456</td>
                            <td >Empresa3</td>
                            <td >Nombre Empresa 3</td>
                            <td >Dirección Empresa 3</td>
                            <td >Contacto Empresa 3</td>
                            <td >123-456-7890</td>
                            <td >correo3@example.com</td>
                            <td >2022-09-15</td>
                        </tr>

                        <tr>
                            <td >XYZ789012</td>
                            <td >Empresa4</td>
                            <td >Nombre Empresa 4</td>
                            <td >Dirección Empresa 4</td>
                            <td >Contacto Empresa 4</td>
                            <td >345-678-9012</td>
                            <td >correo4@example.com</td>
                            <td >2022-10-05</td>
                        </tr>

                        <tr>
                            <td >GHI345678</td>
                            <td >Empresa5</td>
                            <td >Nombre Empresa 5</td>
                            <td >Dirección Empresa 5</td>
                            <td >Contacto Empresa 5</td>
                            <td >567-890-1234</td>
                            <td >correo5@example.com</td>
                            <td >2022-11-12</td>
                        </tr>

                        <tr>
                            <td >JKL678901</td>
                            <td >Empresa6</td>
                            <td >Nombre Empresa 6</td>
                            <td >Dirección Empresa 6</td>
                            <td >Contacto Empresa 6</td>
                            <td >678-901-2345</td>
                            <td >correo6@example.com</td>
                            <td >2022-12-20</td>
                        </tr>

                        <tr>
                            <td >MNO901234</td>
                            <td >Empresa7</td>
                            <td >Nombre Empresa 7</td>
                            <td >Dirección Empresa 7</td>
                            <td >Contacto Empresa 7</td>
                            <td >789-012-3456</td>
                            <td >correo7@example.com</td>
                            <td >2023-01-25</td>
                        </tr>

                        <tr>
                            <td >PQR567890</td>
                            <td >Empresa8</td>
                            <td >Nombre Empresa 8</td>
                            <td >Dirección Empresa 8</td>
                            <td >Contacto Empresa 8</td>
                            <td >890-123-4567</td>
                            <td >correo8@example.com</td>
                            <td >2023-02-18</td>
                        </tr>

                        <tr>
                            <td >STU678901</td>
                            <td >Empresa9</td>
                            <td >Nombre Empresa 9</td>
                            <td >Dirección Empresa 9</td>
                            <td >Contacto Empresa 9</td>
                            <td >901-234-5678</td>
                            <td >correo9@example.com</td>
                            <td >2023-03-10</td>
                        </tr>

                        <tr>
                            <td >VWX789012</td>
                            <td >Empresa10</td>
                            <td >Nombre Empresa 10</td>
                            <td >Dirección Empresa 10</td>
                            <td >Contacto Empresa 10</td>
                            <td >012-345-6789</td>
                            <td >correo10@example.com</td>
                            <td >2023-04-05</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>

    /* Fix button selected but all class selected afect */

    .selected {
        background-color: black !important;
        color: white;
        height: 50px;
        border: 2px solid black !important;
        border-radius: 10px;
    }

</style>

<script>
    const app = Vue.createApp({
        setup() {
            const invoiceUploadName = Vue.ref('');
            const selectedButton = Vue.ref('Facturas');

            const checkFormatInvoice = (event) => {
                const fileInput = event.target;
                if (fileInput.files.length > 0) {
                    invoiceUploadName.value = fileInput.files[0].name;
                } else {
                    invoiceUploadName.value = '';
                }
            };

            const selectButton = (buttonName) => {
                if (selectedButton.value == buttonName) {
                    selectedButton.value = null;
                } else {
                    selectedButton.value = buttonName;
                }
            };

            return {
                invoiceUploadName,
                selectedButton,
                checkFormatInvoice,
                selectButton,
            };
        }
    });
</script>
