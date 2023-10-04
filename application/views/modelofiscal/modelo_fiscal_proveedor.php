

<div class="p-5" id="app">
    <div class="row">
        <p class="px-3">Periodo:</p>
        <div class="col l3">
            <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31" />
            <label for="start">Inicio:</label>
        </div>
        <div class="col l3">
            <input type="date" id="fin" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31" />
            <label for="fin">Fin:</label>
        </div>
        <div class="col l6 right-align p-5">
            <button @click="downloadFile" class="button-blue">Descargar</button>
        </div>
    </div>
    <div class="card esquinasRedondas">
        <div class="card-content">
            <div class="row">
                <div class="col l6 p-3">
                    <button class="button-table" :class="{ 'selected': selectedButton == 'Facturas' }" @click="selectButton('Facturas')">
                        Facturas
                    </button>
                    &nbsp;
                    <button class="button-table" :class="{ 'selected': selectedButton == 'Operaciones' }" @click="selectButton('Operaciones')">
                        Comprobantes de pago
                    </button>
                    &nbsp;
                    <button class="button-table" :class="{ 'selected': selectedButton == 'Cuenta' }" @click="selectButton('Cuenta')">
                        Estados de cuenta
                    </button>         
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table v-if="selectedButton === 'Facturas'" class="visible-table">
                    <thead>
                        <tr>
                            <th class="tabla-celda">Seleccionar</th>
                            <th class="tabla-celda">Emitido por</th>
                            <th class="tabla-celda">Factura</th>
                            <th class="tabla-celda">Fecha Factura</th>
                            <th class="tabla-celda">Fecha Alta</th>
                            <th class="tabla-celda">Fecha Transacción</th>
                            <th class="tabla-celda">Estatus</th>
                            <th class="tabla-celda">Subtotal</th>
                            <th class="tabla-celda">IVA</th>
                            <th class="tabla-celda">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($facturas as $row) : ?>
                            <tr>
                                <td class="tabla-celda"><input type="checkbox"></td>
                                <td class="tabla-celda"><?= $row->o_idPersona ?></td><!--aqui deberia estar usuario -->
                                <td class="tabla-celda"><?= $row->o_NumOperacion ?></td><!--aqui deberia estar row -->
                                <td class="tabla-celda"><?= $row->o_FechaEmision ?></td><!--aqui deberia estar las fechas bien -->
                                <td class="tabla-celda"><?= $row->o_FechaUpload ?></td>
                                <td class="tabla-celda"><?= $row->o_FechaEmision ?></td>
                                <td class="tabla-celda">Cargada</td>
                                <td class="tabla-celda"><?= $row->o_SubTotal ?></td>
                                <td class="tabla-celda"><?= $row->o_Impuesto ?></td>
                                <td class="tabla-celda"><?= $row->o_Total ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <table v-if="selectedButton === 'Operaciones'" class="visible-table">       
                    <thead>
                        <tr>
                            <th class="tabla-celda">Seleccionar</th>
                            <th class="tabla-celda">Institucion emisora</th>
                            <th class="tabla-celda">Clave de rastreo</th>
                            <th class="tabla-celda">Numero de referencia</th>
                            <th class="tabla-celda">Fecha de pago</th>
                            <th class="tabla-celda">Institución receptora</th>
                            <th class="tabla-celda">Monto del pago</th>
                            <th class="tabla-celda">Cuenta beneficiaria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($facturas as $row) : ?>
                            <tr>
                                <td class="tabla-celda"><input type="checkbox"></td>
                                <td class="tabla-celda">BBVA</td><!--aqui deberia estar usuario -->
                                <td class="tabla-celda"><?= $row->o_NumOperacion ?></td><!--aqui deberia estar row -->
                                <td class="tabla-celda">REF-<?= $row->o_UUID ?></td><!--aqui deberia estar las fechas bien -->
                                <td class="tabla-celda"><?= $row->o_FechaUpload ?></td>
                                <td class="tabla-celda">Banregio</td>
                                <td class="tabla-celda">$<?= $row->o_Total ?></td>
                                <td class="tabla-celda"><?= $row->o_NumOperacion ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <table v-if="selectedButton === 'Cuenta'" class="visible-table">       
                    <thead>
                        <th class="tabla-celda">Seleccionar</th>
                        <th class="tabla-celda">Mes</th>
                        <th class="tabla-celda">Días del periodo</th>
                        <th class="tabla-celda">Depósitos</th>
                        <th class="tabla-celda">Retiros</th>
                        <th class="tabla-celda">Depósitos</th>
                        <th class="tabla-celda">Retiros</th>
                        <th class="tabla-celda">Saldo inicial</th>
                        <th class="tabla-celda">Saldo final</th>
                        <th class="tabla-celda">Movimientos</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tabla-celda"><input type="checkbox"></td>
                            <td class="tabla-celda">Noviembre</td>
                            <td class="tabla-celda">30</td>
                            <td class="tabla-celda">3</td>
                            <td class="tabla-celda">1</td>
                            <td class="tabla-celda">$3,452.16</td>
                            <td class="tabla-celda">$25,028</td>
                            <td class="tabla-celda">$254,339</td>
                            <td class="tabla-celda">$21,576</td>
                            <td class="tabla-celda"><a href="#">Ver detalles</a></td>
                        </tr>
                        <tr>
                            <td class="tabla-celda"><input type="checkbox"></td>
                            <td class="tabla-celda">Octubre</td>
                            <td class="tabla-celda">31</td>
                            <td class="tabla-celda">5</td>
                            <td class="tabla-celda">5</td>
                            <td class="tabla-celda">$5,599.68</td>
                            <td class="tabla-celda">$40,589</td>
                            <td class="tabla-celda">$149,993</td>
                            <td class="tabla-celda">$34,998</td>
                            <td class="tabla-celda"><a href="#">Ver detalles</a></td>
                        </tr>
                        <tr>
                            <td class="tabla-celda"><input type="checkbox"></td>
                            <td class="tabla-celda">Noviembre</td>
                            <td class="tabla-celda">30</td>
                            <td class="tabla-celda">3</td>
                            <td class="tabla-celda">1</td>
                            <td class="tabla-celda">$3,452.16</td>
                            <td class="tabla-celda">$25,028</td>
                            <td class="tabla-celda">$254,339</td>
                            <td class="tabla-celda">$21,576</td>
                            <td class="tabla-celda"><a href="#">Ver detalles</a></td>
                        </tr>
                        <tr>
                            <td class="tabla-celda"><input type="checkbox"></td>
                            <td class="tabla-celda">Octubre</td>
                            <td class="tabla-celda">31</td>
                            <td class="tabla-celda">5</td>
                            <td class="tabla-celda">5</td>
                            <td class="tabla-celda">$5,599.68</td>
                            <td class="tabla-celda">$40,589</td>
                            <td class="tabla-celda">$149,993</td>
                            <td class="tabla-celda">$34,998</td>
                            <td class="tabla-celda"><a href="#">Ver detalles</a></td>
                        </tr>
                        <tr>
                            <td class="tabla-celda"><input type="checkbox"></td>
                            <td class="tabla-celda">Septiembre</td>
                            <td class="tabla-celda">30</td>
                            <td class="tabla-celda">2</td>
                            <td class="tabla-celda">2</td>
                            <td class="tabla-celda">$15,232.16</td>
                            <td class="tabla-celda">$110,433</td>
                            <td class="tabla-celda">$145,990</td>
                            <td class="tabla-celda">$95,201</td>
                            <td class="tabla-celda"><a href="#">Ver detalles</a></td>
                        </tr>
                        <tr>
                            <td class="tabla-celda"><input type="checkbox"></td>
                            <td class="tabla-celda">Agosto</td>
                            <td class="tabla-celda">31</td>
                            <td class="tabla-celda">8</td>
                            <td class="tabla-celda">4</td>
                            <td class="tabla-celda">$6,544.32</td>
                            <td class="tabla-celda">$47,446</td>
                            <td class="tabla-celda">$124,990</td>
                            <td class="tabla-celda">$40,902</td>
                            <td class="tabla-celda"><a href="#">Ver detalles</a></td>
                        </tr>
                        <tr>
                            <td class="tabla-celda"><input type="checkbox"></td>
                            <td class="tabla-celda">Julio</td>
                            <td class="tabla-celda">31</td>
                            <td class="tabla-celda">4</td>
                            <td class="tabla-celda">3</td>
                            <td class="tabla-celda">$11,351.22</td>
                            <td class="tabla-celda">$82,296</td>
                            <td class="tabla-celda">$98,259</td>
                            <td class="tabla-celda">$70,945</td>
                            <td class="tabla-celda"><a href="#">Ver detalles</a></td>
                        </tr>
                        <tr>
                            <td class="tabla-celda"><input type="checkbox"></td>
                            <td class="tabla-celda">Junio</td>
                            <td class="tabla-celda">30</td>
                            <td class="tabla-celda">3</td>
                            <td class="tabla-celda">3</td>
                            <td class="tabla-celda">$15,873.44</td>
                            <td class="tabla-celda">$115,082</td>
                            <td class="tabla-celda">$56,998</td>
                            <td class="tabla-celda">$99,209</td>
                            <td class="tabla-celda"><a href="#">Ver detalles</a></td>
                        </tr>
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    .text-modal{
        font-size: 10px;
    }
    .modal {
        max-height: 83% !important;
        width: 80% !important;
    }

    .input-border input[type=search] {
        border: 3px solid #ddd;
        border-radius: 30px !important;
        padding: 0 8px !important;
        margin: 15px 0 10px 0 !important;
        height: 35px !important;
        width: 180px !important;
    }

    .input-border input[type=search]:focus{
        border-color: #444 !important;
        border-bottom: 1px solid #444 !important;
        box-shadow: 0 1px 0 0 #444 !important;
    }

    .input-border label {
        color: black;
        top: -75px;
        position: relative;
        font-weight: bold !important;
    }

    .input-border input[type=search]:focus + label {
        color: #111 !important;
    }
    .tabla-celda {
        min-width: 100px;
        max-width: 150px; 
        padding: 5px; 
        text-align: center; 
        font-size: 13px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .selected {
        background-color: black !important;
        color: white;
        height: 50px;
        border: 2px solid black !important;
        border-radius: 10px;
    }

    .button-table {
        background-color: white;
        border: 2px solid white;
        height: 50px;
        width: 180px
    }

    .button-table:focus {
        background-color: black !important;
        color: white;
        height: 50px;
        border: 2px solid black !important;
        border-radius: 10px;
    }
    
    [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
        opacity: 1;
        position: relative;
        pointer-events: auto;
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

            const downloadFile = () => {
                const archivoPrueba = "Este es el contenido del archivo de prueba.";
                const nombreArchivo = "archivos.zip";
                const blob = new Blob([archivoPrueba], { type: "text/plain" });
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement("a");
                a.href = url;
                a.download = nombreArchivo;
                a.click();
                window.URL.revokeObjectURL(url);
            };

            return {
                invoiceUploadName,
                selectedButton,
                checkFormatInvoice,
                selectButton,
                downloadFile,
            };
        },
    }).mount("#app");
</script>

