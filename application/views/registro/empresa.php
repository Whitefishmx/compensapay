<div class="p-5" id="app">
    <div class="card esquinasRedondas">
        <div class="card-content">
            <h2 class="card-title">Registro de Empresa</h2>
            <form method="post" action="<?php echo base_url('registro/empresaTemporal'); ?>" class="col l12" enctype="multipart/form-data">
                <div class="row">
                    <div class="col l5 especial-p">
                        <div class="row">
                            <div class="col l12" style="margin-bottom: 30px;">
                                <p class="bold">Detalles de la empresa</p>
                            </div>
                            <div class="input-border col l12">
                                <input v-model="data['bussinesName']" @blur="checkFormat('bussinesName')" :style="colorsBorder['bussinesName'] || {}" type="text" name="bussinesName" id="bussinesName" required>
                                <label for="bussinesName">Razón Social</label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="input-border col l6">
                                <input v-model="data['nameComercial']" @blur="checkFormat('nameComercial')" :style="colorsBorder['nameComercial'] || {}" type="text" name="nameComercial" id="nameComercial" required>
                                <label for="nameComercial">Nombre Comercial</label>
                            </div>
                            <div class="input-border col l6">
                                <select name="type" id="type">
                                    <option value="perfil1">Perfil 1</option>
                                    <option value="perfil2">Perfil 2</option>
                                    <option value="perfil3">Perfil 3</option>
                                </select>
                                <label for="type">Giro</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-border col l6">
                                <input v-model="data['rfc']" @blur="checkFormat('rfc')" :style="colorsBorder['rfc'] || {}" type="text" name="rfc" id="rfc" minlength="12" maxlength="13" pattern="[A-Z0-9]{12,13}" title="Debe tener de 12 a 13 caracteres alfanuméricos" required>
                                <label for="rfc">RFC</label>
                            </div>
                            <div class="input-border col l6">
                                <select name="fiscal" id="fiscal">
                                    <option value="perfil1">Perfil 1</option>
                                    <option value="perfil2">Perfil 2</option>
                                    <option value="perfil3">Perfil 3</option>
                                </select>
                                <label for="fiscal">Regimen Fiscal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-border col l6">
                                <input v-model="data['codigoPostal']" @blur="checkFormat('codigoPostal')" :style="colorsBorder['codigoPostal'] || {}" type="text" name="codigoPostal" id="codigoPostal" maxlength="5" pattern="[0-9]{5}" required>
                                <label for="codigoPostal">Codigo Postal</label>
                            </div>
                            <div class="input-border col l6">
                                <select name="estado" id="estado">
                                    <option value="perfil1">Perfil 1</option>
                                    <option value="perfil2">Perfil 2</option>
                                    <option value="perfil3">Perfil 3</option>
                                </select>
                                <label for="estado">Estado</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-border col l12">
                                <input v-model="data['direccion']" @blur="checkFormat('direccion')" :style="colorsBorder['direccion'] || {}" type="text" name="direccion" id="direccion" required>
                                <label for="direccion">Direccion</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-border col l6">
                                <input v-model="data['telefono']" @blur="checkFormat('telefono')" :style="colorsBorder['telefono'] || {}" type="text" name="telefono" id="telefono" required>
                                <label for="telefono">telefono</label>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 line-card line-card-l especial-p">
                        <div class="row">
                            <div class="col l12" style="margin-bottom: 30px;">
                                <p class="bold">Datos Bancarios</p>
                            </div>
                            <div class="input-border col l12">
                                <input v-model="data['clabe']" @blur="checkFormat('clabe')" :style="colorsBorder['clabe'] || {}" type="text" name="clabe" id="clabe" required pattern="[0-9]{18}" maxlength="18" title="Por favor, ingresa exactamente 18 dígitos numéricos.">
                                <label for="clabe">Cuenta CLABE</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-border col l12">
                                <input v-model="data['bank']" type="text" name="bank" id="bank" disabled required>
                                <label for="bank">Banco emisor</label>
                            </div>
                        </div>
                        <div v-if="false" class="row">

                            <p class="bold p-3">
                                Soy Proveedor
                            </p>
                            <div class="input-border col l12">
                                <input type="text" name="partner" id="partner" disabled>
                                <label for="partner">Cliente</label>
                            </div>
                        </div>

                    </div>
                    <div class="col l3 center-align">
                        <div class="container">
                            <h2 class="card-title">Seleccionar logotipo</h2>
                            <img :src="imageUploadURL" alt="" style="max-width: 140px; height: 140px;">
                            <label for="imageUpload" class="custom-file-upload p-5">
                                Seleccionar Imagen
                            </label>
                            <input @change="checkFormat('imageUpload')" ref="imageUpload" name="imageUpload" id="imageUpload" type="file" accept="image/png, image/jpg, image/jpeg" maxFileSize="1048576" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l12 ">
                        <div class="col l12">
                            <p class="bold">Sube tus documentos</p><br>
                        </div>
                        <div class="col l9 input-border">
                            <input type="text" name="cSfDisabled" id="cSfDisabled" disabled :value="csfUploadName">
                            <label for="cSfDisabled"> Constancia de Situación Fiscal</label>
                        </div>
                        <div class="col l3 center-align p-5">
                            <label for="csfUpload" class="custom-file-upload">Agregar </label>
                            <input @change="checkFormat('csfUpload')" name="csfUpload" ref="csfUpload" id="csfUpload" type="file" accept="application/pdf" maxFileSize="5242880" required />
                        </div>
                        <div class="col l9 input-border">
                            <input type="text" name="actaConstitutivaDisabled" id="actaConstitutivaDisabled" disabled :value="actaConstitutivaUploadName">
                            <label for="actaConstitutivaDisabled">Acta Constitutiva</label>
                        </div>
                        <div class="col l3 center-align p-5">
                            <label for="actaConstitutivaUpload" class="custom-file-upload">Agregar</label>
                            <input @change="checkFormat('actaConstitutivaUpload')" name="actaConstitutivaUpload" ref="actaConstitutivaUpload" id="actaConstitutivaUpload" type="file" accept="application/pdf" maxFileSize="5242880" required />
                        </div>
                        <div class="col l9 input-border">
                            <input type="text" name="comprobanteDomicilioDisabled" id="comprobanteDomicilioDisabled" disabled :value="comprobanteDomicilioUploadName">
                            <label for="comprobanteDomicilioDisabled">Comprobante de Domicilio</label>
                        </div>
                        <div class="col l3 center-align p-5">
                            <label for="comprobanteDomicilioUpload" class="custom-file-upload">Agregar</label>
                            <input @change="checkFormat('comprobanteDomicilioUpload')" name="comprobanteDomicilioUpload" ref="comprobanteDomicilioUpload" id="comprobanteDomicilioUpload" type="file" accept="application/pdf" maxFileSize="5242880" required />
                        </div>
                        <div class="col l9 input-border">
                            <input type="text" name="representanteLegalDisabled" id="representanteLegalDisabled" disabled :value="representanteLegalUploadName">
                            <label for="representanteLegalDisabled">Identificacion de Representante Legal</label>
                        </div>
                        <div class="col l3 center-align p-5">
                            <label for="representanteLegalUpload" class="custom-file-upload">Agregar</label>
                            <input @change="checkFormat('representanteLegalUpload')" name="representanteLegalUpload" ref="representanteLegalUpload" id="representanteLegalUpload" type="file" accept="application/pdf" maxFileSize="5242880" required />
                        </div>
                    </div>
                    <div class="col l12 right-align p-5">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Siguiente</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const {
        createApp,
        computed,
        reactive,
        ref,
        isRef,
    } = Vue

    const app = createApp({
        setup() {
            const data = reactive({
                bussinesName: ref(''),
                nameComercial: ref(''),
                rfc: ref(''),
                clabe: ref(''),
                bank: ref(''),
                imageUpload: ref(''),
                csfUpload: ref(''),
                actaConstitutivaUpload: ref(''),
                comprobanteDomicilioUpload: ref(''),
                representanteLegalUpload: ref(''),
                codigoPostal: ref(''),
                estado: ref(''),
                codigoPostal: ref(''),
                direccion: ref(''),
                telefono: ref(''),
            });
            // partes del image
            const imageUpload = ref(null);
            const imageUploadURL = ref('https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640');
            const colorsBorder = reactive({});
            //partes del pdf
            const csfUpload = ref(null);
            const csfUploadName = ref('');
            //partes del pdf
            const actaConstitutivaUpload = ref(null);
            const actaConstitutivaUploadName = ref('');
            //partes del pdf
            const comprobanteDomicilioUpload = ref(null);
            const comprobanteDomicilioUploadName = ref('');
            //partes del pdf
            const representanteLegalUpload = ref(null);
            const representanteLegalUploadName = ref('');

            // Se pudo haber hecho con evet 
            const checkFormat = (nombreInput) => {
                if (!isRef(colorsBorder[nombreInput])) {
                    colorsBorder[nombreInput] = ref('')
                }

                switch (nombreInput) {
                    case 'telefono':
                        if (data[nombreInput] !== '') {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }

                        break;
                    case 'codigoPostal':
                        if (data[nombreInput] !== '') {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }

                        break;
                    case 'estado':
                        if (data[nombreInput] !== '') {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }

                        break;
                    case 'direccion':
                        if (data[nombreInput] !== '') {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }

                        break;
                    case 'bussinesName':
                        if (data[nombreInput] !== '') {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }

                        break;
                    case 'nameComercial':
                        if (data[nombreInput] !== '') {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }
                        break;
                    case 'rfc':
                        data[nombreInput] = data[nombreInput].toUpperCase();
                        var patron = /[^A-Z0-9]/;
                        if (data[nombreInput] != '' && (data[nombreInput].length == 12 || data[nombreInput].length == 13) && !patron.test(data[nombreInput])) {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }
                        break;
                    case 'clabe':
                        var patron = /[^0-9]/;
                        if (data[nombreInput] != '' && data[nombreInput].length == 18 && !patron.test(data[nombreInput])) {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }
                        break;
                        if (data[nombreInput] !== '') {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }

                        break;
                    case 'partner':
                        data[nombreInput] = data[nombreInput].toUpperCase();
                        var patron = /[^A-Z0-9]/;
                        if (data[nombreInput] != '' && (data[nombreInput].length == 12 || data[nombreInput].length == 13) && !patron.test(data[nombreInput])) {

                            colorsBorder[nombreInput] = {
                                border: '1px solid #03BB85!important',
                            }

                        } else {
                            colorsBorder[nombreInput] = {
                                border: '1px solid red!important',
                            }

                        }
                        break;
                    case 'imageUpload':
                        if (imageUpload.value.files[0].size <= 1024 * 1024) { // 1 MB en bytes
                            imageUploadURL.value = URL.createObjectURL(imageUpload.value.files[0])
                            data[nombreInput] = imageUpload.value
                            // El archivo es demasiado grande, muestra un mensaje de error o realiza alguna acción adecuada.
                        } else {
                            alert("El archivo es demasiado grande. Debe ser menor de 1 MB.");

                            imageUpload.value.files[0].value = null;
                        }

                        break;
                    case 'csfUpload':

                        if (csfUpload.value.files[0].size <= 1024 * 1024 * 5) { // 1 MB en bytes
                            data[nombreInput] = csfUpload.value
                            csfUploadName.value = csfUpload.value.files[0].name;

                            // El archivo es demasiado grande, muestra un mensaje de error o realiza alguna acción adecuada.
                        } else {
                            alert("El archivo es demasiado grande. Debe ser menor de 5 MB.");

                            csfUpload.value.files[0].value = null;
                            csfUploadName.value = '';
                        }

                        break;
                    case 'actaConstitutivaUpload':
                        if (actaConstitutivaUpload.value.files[0].size <= 1024 * 1024 * 5) { // 1 MB en bytes
                            data[nombreInput] = actaConstitutivaUpload.value
                            actaConstitutivaUploadName.value = actaConstitutivaUpload.value.files[0].name;

                            // El archivo es demasiado grande, muestra un mensaje de error o realiza alguna acción adecuada.
                        } else {
                            alert("El archivo es demasiado grande. Debe ser menor de 5 MB.");

                            actaConstitutivaUpload.value.files[0].value = null;
                            actaConstitutivaUploadName.value = '';
                        }
                        break;
                    case 'comprobanteDomicilioUpload':
                        if (comprobanteDomicilioUpload.value.files[0].size <= 1024 * 1024 * 5) { // 1 MB en bytes
                            data[nombreInput] = comprobanteDomicilioUpload.value
                            comprobanteDomicilioUploadName.value = comprobanteDomicilioUpload.value.files[0].name;

                            // El archivo es demasiado grande, muestra un mensaje de error o realiza alguna acción adecuada.
                        } else {
                            alert("El archivo es demasiado grande. Debe ser menor de 5 MB.");

                            comprobanteDomicilioUpload.value.files[0].value = null;
                            comprobanteDomicilioUpload.value = '';
                        }
                        break;
                    case 'representanteLegalUpload':
                        if (representanteLegalUpload.value.files[0].size <= 1024 * 1024 * 5) { // 1 MB en bytes
                            data[nombreInput] = representanteLegalUpload.value
                            console.log('hola');
                            representanteLegalUploadName.value = representanteLegalUpload.value.files[0].name;

                            // El archivo es demasiado grande, muestra un mensaje de error o realiza alguna acción adecuada.
                        } else {
                            alert("El archivo es demasiado grande. Debe ser menor de 5 MB.");

                            representanteLegalUpload.value.files[0].value = null;
                            representanteLegalUpload.value = '';
                        }
                        break;
                    default:
                        // Código a ejecutar si valor no coincide con ningún caso
                }

            }
            return {
                data,
                colorsBorder,
                checkFormat,
                imageUpload,
                imageUploadURL,
                csfUpload,
                csfUploadName,
                actaConstitutivaUpload,
                actaConstitutivaUploadName,
                comprobanteDomicilioUpload,
                comprobanteDomicilioUploadName,
                representanteLegalUpload,
                representanteLegalUploadName

            }
        }
    });
</script>
<style>
    .card-title {
        margin-bottom: 30px !important;
        font-weight: bold !important;
    }

    .btn {
        background: #444444;
    }

    .btn:hover {
        background: #e0e51d;
    }

    .especial-p {
        padding-right: 4% !important;
    }

    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        color: white;
        background: #444;
        display: inline-block;
        padding: 10px 40px;
        cursor: pointer;
        border-radius: 3px !important;
    }
</style>