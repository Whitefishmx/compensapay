<div class="p-5" id="app">


    <div class="row">
        <p class="px-3">Periodo:</p>
        <div class="col l3">
            <input type="date" id="start" name="trip-start" value="2023-07-22" min="2023-01-01" max="2040-12-31" />
            <label for="start">Inicio:</label>
        </div>
        <div class="col l3">
            <input type="date" id="fin" name="trip-start" value="2023-07-22" min="2023-01-01" max="2040-12-31" />
            <label for="fin">Fin:</label>
        </div>
        <div class="col l6 right-align p-5">
            <a class="modal-trigger button-blue" href="#modal-factura" v-if="selectedButton === 'Facturas'">
            Añadir Facturas
            </a>
            <a class="modal-trigger button-blue" href="#modal-operacion" v-if="selectedButton === 'Operaciones'">
            Crear Operaciones
            </a>
        </div>
    </div>


    
    <div class="card esquinasRedondas">
        <div class="card-content">
            <div class="row">
                <div class="col l3 p-3">
                    <button class="button-table" :class="{ 'selected': selectedButton == 'Operaciones' }" @click="selectButton('Operaciones')">
                        Operaciones
                    </button>
                    &nbsp;
                    <button class="button-table" :class="{ 'selected': selectedButton == 'Facturas' }" @click="selectButton('Facturas')">
                        Facturas
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
                            <th >Crear Operación</th>
                            <th >Proveedor</th>
                            <th >Factura</th>
                            <th >Fecha Factura</th>
                            <th >Fecha Alta</th>
                            <th >Fecha Transacción</th>
                            <th >Estatus</th>
                            <th >Subtotal</th>
                            <th >IVA</th>
                            <th >Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="factura in facturas.reverse()" :key="facturas.o_idPersona">

                            <td class="tabla-celda center-align">
                                <i v-if="factura.o_Activo == 1"  class="small material-icons" style="color: green;">check_circle</i>
                                <a v-if="factura.o_Activo == 0" class="modal-trigger " href="#modal-operacion-unico">Crear Operación</a>
                            </td>             
                            <td><a href="#">Frontier</a></td>
                            <td>{{factura.o_NumOperacion}}</td>
                            <td>{{modificarFecha(factura.o_FechaEmision)}}</td>
                            <td>{{modificarFecha(factura.o_FechaUpload)}}</td>
                            <td>{{modificarFecha(factura.o_FechaEmision)}}</td>
                            <td>
                                <p v-if="factura.o_Activo == 1" >Pendiente</p>
                                <p v-if="factura.o_Activo == 0" >Cargada</p>
                            </td>   
                            <td >${{factura.o_SubTotal}}</td>
                            <td >${{factura.o_Impuesto}}</td>
                            <td >${{factura.o_Total}}</td>
                        </tr>
                    </tbody>
                </table>
                <table v-if="selectedButton === 'Operaciones'" class="visible-table striped">       
                    <thead>
                        <tr>
                            <th >Aprobacion</th>
                            <th >ID Operacion</th>
                            <th >Proveedor</th>
                            <th >Fecha Factura</th>
                            <th >Fecha Alta</th>
                            <th >Factura</th>
                            <th >Nota de Débito</th>
                            <th >Fecha Nota de Débito</th>
                            <th >Fecha Transacción</th>
                            <th >Estatus</th>
                            <th >Monto Ingreso</th>
                            <th >Monto Egreso</th>
                            <!-- <th >Adelanta tu pago</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="operacion in operaciones.reverse()" :key="operacion.ID_Operacion">
                            <td class="tabla-celda center-align">
                                <i v-if="operacion.Aprobacion == 1"  class="small material-icons" style="color: green;">check_circle</i>
                                <a v-if="operacion.Aprobacion == 0" class="modal-trigger " href="#modal-cargar-factura">Cargar Factura</a>
                            </td>
                            <td>{{ operacion.ID_Operacion }}</td>
                            <td>{{ operacion.Proveedor }}</td>
                            <td>{{ operacion.Fecha_Factura }}</td>
                            <td>{{ operacion.Fecha_Alta }}</td>
                            <td>{{ operacion.Factura }}</td>
                            <td>{{ operacion.Nota_Debito_Factura_Proveedor !== null ? operacion.Nota_Debito_Factura_Proveedor : 'N/A' }}</td>
                            <td>{{ operacion.Nota_Debito_Factura_Proveedor !== null ? operacion.Nota_Debito_Factura_Proveedor : 'N/A' }}</td>
                            <td>{{ operacion.Fecha_Transaccion }}</td>
                            <td>{{ operacion.Estatus }}</td>
                            <td>${{operacion.Monto_Ingreso}}</td>
                            <td>${{operacion.Monto_Egreso}}</td>
                        </tr>
                        <!-- <?php $operaciones = array_reverse($operaciones);
                            foreach ($operaciones as $operacion) : ?>
                            <tr>
                                <td class="tabla-celda center-align">
                                    <?php
                                    if ($operacion->Aprobacion == 0) {
                                        echo '';
                                    } elseif ($operacion->Aprobacion == 1) {
                                        echo '<i class="small material-icons" style="color: green;">check_circle</i>';
                                    }
                                    ?>
                                </td>
                                <td ><?php echo $operacion->ID_Operacion; ?></td>
                                <td ><a><?php echo $operacion->Proveedor; ?></a></td>
                                <td ><?php echo $operacion->Fecha_Factura; ?></td>
                                <td ><?php echo $operacion->Fecha_Alta; ?></td>
                                <td ><?php echo $operacion->Factura; ?></td>
                                <td ><?php echo $operacion->Nota_Debito_Factura_Proveedor !== null ? $operacion->Nota_Debito_Factura_Proveedor : 'N/A'; ?></td>
                                <td ><?php echo $operacion->Nota_Debito_Factura_Proveedor !== null ? $operacion->Nota_Debito_Factura_Proveedor : 'N/A'; ?></td>
                                <td ><?php echo $operacion->Fecha_Transaccion; ?></td>
                                <td ><?php echo $operacion->Estatus; ?></td>
                                <td >$<?php echo number_format($operacion->Monto_Ingreso); ?></td>
                                <td >$<?php echo number_format( $operacion->Monto_Egreso); ?></td>
                                <td >
                                    <?php
                                    if ($operacion->Aprobacion == 0) {
                                        echo '<a href="#modal-unica-operacion">Adelantar pago</a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div id="modal-factura" class="modal">
        <div class="modal-content">
            <h5>Carga tus facturas</h5>
            <div class="card esquinasRedondas">
                <div class="card-content">
                    <h6 class="p-3">Carga tu factura en formato .xml o múltiples facturas en un archivo .zip</h6>
                    <form id="uploadForm" enctype="multipart/form-data">
                        <div class="row">

                            <div class="row">
                                <div class="col l9 input-border">
                                    <input
                                    type="text"
                                    name="invoiceDisabled"
                                    id="invoiceDisabled"
                                    disabled
                                    v-model="invoiceUploadName"
                                    />
                                    <label for="invoiceDisabled">Una factura en xml o múltiples en .zip</label>
                                </div>
                                <div class="col l3 center-align p-5">
                                    <label for="invoiceUpload" class="custom-file-upload button-blue">Seleccionar</label>
                                    <input @change="checkFormatInvoice" name="invoiceUpload" ref="invoiceUpload" id="invoiceUpload" type="file" accept="application/xml" maxFileSize="5242880" required />
                                </div>
                            </div>

                            <div class="row">
                                <div class="row">
                                <div class="col l12 d-flex">
                                    <div class="p-5">
                                        <input class="p-5" type="checkbox" v-model="checkboxChecked" required>
                                    </div>
                                    <p class="text-modal">
                                        El Proveedor acepta y otorga su consentimiento en este momento para que una vez recibido el pago por la presente factura, Compensa Pay descuente y transfiere de manera automática a nombre y cuenta del Proveedor, el monto debido por el Proveedor en relación con dicha factura en favor del Cliente.
                                        Los términos utilizados en mayúscula tendrán el significado que se le atribuye dicho término en los <a href="terminosycondiciones">Términos y Condiciones</a>.
                                    </p><br>
                                </div>
                            </div>
                            </div>
                            <div class="col l12 center-align">
                                <a class="modal-close button-gray" style="color: #fff; color:hover: #"
                                >Cancelar</a
                                >
                                &nbsp;
                                <button onclick="M.toast({html: 'Se ha subido la factura'})" class="button-blue modal-close" type="button" name="action" @click="uploadFile">Siguiente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div id="modal-operacion" class="modal">
        <div class="modal-content">
            <h5>Crear Operación</h5>
            <div class="card esquinasRedondas">
                <div class="card-content">
                    <h6 class="p-3">Carga tu factura y selecciona una factura del proveedor o busca un proveedor y selecciona una factura</h6>
                    <form method="post" action="<?php echo base_url('facturas/carga'); ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col l3 input-border">
                                <input type="text" name="operationDisabled" id="operationDisabled" disabled v-model="operationUploadName">
                                <label for="operationDisabled">Tu factura XML</label>
                            </div>
                            <div class="col l4 left-align p-5">
                                <label for="operationUpload" class="custom-file-upload button-blue">Seleccionar</label>
                                <input @change="checkFormatOperation" name="operationUpload" ref="operationUpload" id="operationUpload" type="file" accept="application/xml" maxFileSize="5242880" />
                            </div>
                            <div class="col l5 input-border select-white">
                                <input type="text" name="providerDisabled" id="providerDisabled" disabled v-model="providerUploadName">
                                <label for="providerDisabled">Proveedor</label>
                            </div>
                            <div>
                                <table class="striped">
                                    <thead>
                                        <tr>
                                            <th >Crear Operación</th>
                                            <th >Proveedor</th>
                                            <th >Factura</th>
                                            <th >Fecha Factura</th>
                                            <th >Fecha Alta</th>
                                            <th >Fecha Transacción</th>
                                            <th >Estatus</th>
                                            <th >Subtotal</th>
                                            <th >IVA</th>
                                            <th >Total</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="providerUploadName == 'Frontier'" class="visible-table striped">
                                        <tr v-for="factura in facturas.reverse()" :key="factura.o_idPersona">
                                            <template v-if="factura.o_Activo == 1">
                                            <td class="tabla-celda center-align">
                                                <i class="small material-icons" style="color: green;">check_circle</i>
                                            </td>
                                            <td><a href="#">Frontier</a></td>
                                            <td>{{factura.o_NumOperacion}}</td>
                                            <td>{{modificarFecha(factura.o_FechaEmision)}}</td>
                                            <td>{{modificarFecha(factura.o_FechaUpload)}}</td>
                                            <td>{{modificarFecha(factura.o_FechaEmision)}}</td>
                                            <td>
                                                <p>Pendiente</p>
                                            </td>   
                                            <td>${{factura.o_SubTotal}}</td>
                                            <td>${{factura.o_Impuesto}}</td>
                                            <td>${{factura.o_Total}}</td>
                                            </template>
                                        </tr>
                                    </tbody>

                                </table>
                            </div><br>
                            <div class="col l8">
                                <a onclick="M.toast({html: 'Se ha solicitado la factura'})" class="button-blue modal-close" v-if="providerUploadName == 'Frontier'">Solicitar Factura</a>
                            </div>
                            <div class="col l4 center-align">
                                <a class="modal-close button-gray" style="color:#fff; color:hover:#">Cancelar</a>
                                &nbsp;
                                <button onclick="M.toast({html: 'Se ha subido la factura'})" class="button-blue modal-close" type="submit" name="action">Siguiente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <div id="modal-operacion-unico" class="modal">
        <div class="modal-content">
            <h5>Crear Operación</h5>
            <div class="card esquinasRedondas">
                <div class="card-content">
                    <h6 class="p-3">Carga tu nota de debito y selecciona una factura del proveedor</h6>
                    <form method="post" action="<?php echo base_url('facturas/carga'); ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col l3 input-border">
                                <input type="text" placeholder="92387278.xml">
                                <label for="invoiceDisabled">Tu factura XML</label>
                            </div>
                            <div class="col l4 left-align p-5">
                            </div>
                            <div class="col l5 input-border select-white">
                                <input type="text" placeholder="Frontier">
                                <label for="providerDisabled">Proveedor</label>
                            </div>
                            <div>
                                <table class="striped">
                                    <thead>
                                        <tr>
                                            <th >Crear Operación</th>
                                            <th >Proveedor</th>
                                            <th >Factura</th>
                                            <th >Fecha Factura</th>
                                            <th >Fecha Alta</th>
                                            <th >Fecha Transacción</th>
                                            <th >Estatus</th>
                                            <th >Subtotal</th>
                                            <th >IVA</th>
                                            <th >Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="striped">
                                        <tr v-for="factura in facturas" :key="facturas.o_idPersona">
                                            <td class="tabla-celda center-align">
                                                <i v-if="factura.o_Activo == 1"  class="small material-icons" style="color: green;">check_circle</i>
                                                <a v-if="factura.o_Activo == 0" class="modal-trigger " href="#modal-operacion-unico">Crear Operación</a>
                                            </td>             
                                            <td><a href="#">Frontier</a></td>
                                            <td>{{factura.o_NumOperacion}}</td>
                                            <td>{{modificarFecha(factura.o_FechaEmision)}}</td>
                                            <td>{{modificarFecha(factura.o_FechaUpload)}}</td>
                                            <td>{{modificarFecha(factura.o_FechaEmision)}}</td>
                                            <td>
                                                <p v-if="factura.o_Activo == 1" >Pendiente</p>
                                                <p v-if="factura.o_Activo == 0" >Cargada</p>
                                            </td>   
                                            <td >${{factura.o_SubTotal}}</td>
                                            <td >${{factura.o_Impuesto}}</td>
                                            <td >${{factura.o_Total}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="col l8">
                                <a onclick="M.toast({html: 'Se ha solicitado la factura'})" class="button-blue modal-close" v-if="providerUploadName != ''">Solicitar Factura</a>
                            </div>
                            <div class="col l4 center-align">
                                <a class="modal-close button-gray" style="color:#fff; color:hover:#">Cancelar</a>
                                &nbsp;
                                <button onclick="M.toast({html: 'Se ha subido la factura'})" class="button-blue modal-close" type="submit" name="action">Siguiente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <div id="modal-cargar-factura" class="modal">
        <div class="modal-content">
            <h5>Porfavor, autoriza la transacción</h5>
            <div class="card esquinasRedondas">
                <div class="card-content">
                    <h6 class="p-3">Carga tu factura en formato .xml o múltiples facturas en un archivo .zip</h6>
                    <form id="uploadForm" enctype="multipart/form-data">
                        <div class="row">

                            <div class="row">
                                <div class="col l4 input-border">
                                    <input type="text" placeholder="Frontier" disabled/>
                                    <label for="invoiceDisabled">Provedor</label>
                                </div>
                                <div class="col l4 input-border">
                                    <input type="text" placeholder="XYZ832HS" disabled/>
                                    <label for="invoiceDisabled">Factura</label>
                                </div>
                                <div class="col l4 input-border">
                                    <input type="text" placeholder="XYZ832HS" disabled/>
                                    <label for="invoiceDisabled">Nota de debito</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col l4 input-border">
                                    <input type="text" placeholder="TRA10035904" disabled/>
                                    <label for="invoiceDisabled">ID Transaccion</label>
                                </div>
                                <div class="col l4 input-border">
                                    <input type="text" placeholder="$ 21,576.00" disabled/>
                                    <label for="invoiceDisabled">Monto Factura</label>
                                </div>
                                <div class="col l4 input-border">
                                    <input type="text" placeholder="$10,501.00" disabled/>
                                    <label for="invoiceDisabled">Monto Nota de Débito (ingreso):</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col l4 input-border">
                                <input type="date" id="start" name="trip-start" value="2023-07-22" min="2023-01-01" max="2040-12-31" />
                                <label for="start">Inicio:</label>
                                </div>
                                <div class="col l4 input-border P-5">
                                    <input type="text" placeholder="123456789098745612" disabled/>
                                    <label for="invoiceDisabled">Cuenta CLABE del proveedor</label>
                                </div>
                            </div>
                            <div class="col l12">
                                <div class="col l8">
                                    <a class="button-gray modal-close">Solicitar Factura</a>
                                </div>
                                <div class="col l4 center-align">
                                    <a onclick="M.toast({html: 'Se ha cancelado'})" class="button-white modal-close">Cancelar</a>
                                    &nbsp;
                                    <button onclick="M.toast({html: 'Se ha autorizado'})" class="button-blue modal-close">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

<style>

    /* Modal */

    .text-modal{
        font-size: 13px;
    }

    .modal {
        max-height: 83% !important;
        width: 80% !important;
    }

    /* Fix show checkbox and radiobuttons*/

    [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
        opacity: 1;
        position: relative;
        pointer-events: auto;
    }

    [type="radio"]:not(:checked), [type="radio"]:checked {
        opacity: 1;
        position: relative;
        pointer-events: auto;
    }

    /* Fix button selected but all class selected afect */

    .selected {
        background-color: black !important;
        color: white !important;
        height: 50px;
        border: 2px solid black !important;
        border-radius: 10px;
    }  
   
</style>

<script>
    const app = Vue.createApp({
        setup() {
            const invoiceUploadName = Vue.ref('');
            const operationUploadName = Vue.ref('');
            const providerUploadName = Vue.ref('');
            const selectedButton = Vue.ref('Operaciones');
            const checkboxChecked = Vue.ref(false);
            const operaciones = Vue.ref([]); 
            const facturas = Vue.ref([]); 
            
            const checkFormatInvoice = (event) => {
                const fileInput = event.target;
                if (fileInput.files.length > 0) {
                    invoiceUploadName.value = fileInput.files[0].name;
                } else {
                    invoiceUploadName.value = '';
                }
            };

            const uploadFile = async () => {
                if (selectedButton.value === 'Facturas' && checkboxChecked.value) {
                    const fileInput = document.getElementById('invoiceUpload');
                    const formData = new FormData();
                    formData.append('user', 6);
                    formData.append('invoiceUpload', fileInput.files[0]);

                    const response = await fetch("<?= base_url('facturas/subida') ?>", {
                        method: 'POST',
                        body: formData,
                        redirect: 'follow'
                    });

                    if (response.ok) {
                        getFacturas();
                    } else {
                        console.error('Error');
                    }
                }else{
                    alert('Ingresa una factura y acepta los terminos');
                }
            };

            const getOperations = () => {
                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };

                fetch("<?= base_url("facturas/tablaOperaciones")?>", requestOptions)
                .then(response => response.json())
                .then(result => { operaciones.value = result.operaciones; console.log(operaciones.value);})
                .catch(error => console.log('error', error));
            };

            const getFacturas = () => {
                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };

                fetch("<?= base_url("facturas/tablaFacturas")?>", requestOptions)
                .then(response => response.json())
                .then(result => { facturas.value = result.facturas; console.log(facturas.value);})
                .catch(error => console.log('error', error));
            };

            const checkFormatOperation = (event) => {
                const fileInput = event.target;
                if (fileInput.files.length > 0) {
                    operationUploadName.value = fileInput.files[0].name; 
                    providerUploadName.value = 'Frontier';
                } else {
                    operationUploadName.value = '';
                    providerUploadName.value = '';
                }
            };

            const uploadOperation = async () => {
                if (selectedButton.value === 'operation') {
                    const fileInput = document.getElementById('operationUpload');
                    const formData = new FormData();
                    formData.append('user', 6);
                    formData.append('operationUpload', fileInput.files[0]);

                    const response = await fetch("<?= base_url('facturas/subida') ?>", {
                        method: 'POST',
                        body: formData,
                        redirect: 'follow'
                    });

                    if (response.ok) {
                        getOperations();
                    } else {
                        console.error('Error');
                    }
                }else{
                    alert('Ingresa una factura y acepta los terminos')
                }
            };

            const modificarFecha = (fecha) =>{
                    fecha = fecha.split(' ');

                    fecha[1] = '';
                    fecha = fecha.join(' ');
                    return fecha;
                };

            const selectButton = (buttonName) => {
                if (selectedButton.value == buttonName) {
                    selectedButton.value = null;
                } else {
                    selectedButton.value = buttonName;
                }
            };
            Vue.onMounted (
                () => {
                    getOperations();
                    getFacturas();
                }
            )


            return {
                invoiceUploadName,
                operationUploadName,
                providerUploadName,
                selectedButton,
                checkFormatInvoice,
                checkFormatOperation,
                checkboxChecked,
                uploadFile,
                modificarFecha,
                selectButton,
                operaciones,
                facturas,
            };
        }
    }); 
</script>
