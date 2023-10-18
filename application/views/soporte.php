<script type="text/javascript" src="/assets/js/jquery-git.js"></script>
<script type="text/javascript" src="/assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery-ui.min.js"></script>

<div class="p-5" id="app">
    <div class="row">
        <div class="col l12">
            <p>Te sugerimos consultar las guias que hemos desarrollado y/o videos de procesos, aqui podras encontrar respuesta a las dudas y procesos mas frecuentes.</p>
            <p>Si tienes alguna otra duda o algun proceso no responde de la manera correcta, puedes enviarnos un ticket y nuestro departamento de soporte te apoyara para resolverlo</p>

        </div>
        <div class="col l12">
            <h5><i class="material-icons iconoSetting">help_outline</i> Preguntas Frecuentes</h5>
        </div>
        <div class="col l12">
            <ul class="collapsible">
                <li>
                    <!-- este es el modelo para el for de vue o php -->
                    <div class="collapsible-header d-flex space-between bold">Cuantas facturas puedo cargar <i class="material-icons">expand_more</i></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header d-flex space-between bold">Cuantas operaciones puedo hacer al mes <i class="material-icons">expand_more</i></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header d-flex space-between bold">Cual es el monto máximo por factura<i class="material-icons">expand_more</i></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header d-flex space-between bold">Puedo sustituir facturas<i class="material-icons">expand_more</i></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>
        </div>
        <div class="col l12">
            <h5><i class="material-icons iconoSetting">ondemand_video</i> Tutoriales</h5>
        </div>
        <div class="col l12 ">

            <div class="row">
                <!-- este es el modelo para el for de vue o php -->
                <div class="col l3">
                    <div class="card">
                        <!-- Este es el video original -->
                        <!-- <iframe width="853" height="480" src="https://www.youtube.com/embed/J8GeNdT9pLk" title="Orión - Lenguas Muertas (eris) / [Videoclip Oficial]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        <iframe class="video" src="https://www.youtube.com/embed/J8GeNdT9pL" title="Orión - Lenguas Muertas (eris) / [Videoclip Oficial]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <hr>
                        <div class="card-content">
                            <p class="textoCard">Como invitar a un proveedor</p>
                        </div>
                    </div>
                </div>
                <div class="col l3">
                    <div class="card">
                        <!-- Este es el video original -->
                        <!-- <iframe width="853" height="480" src="https://www.youtube.com/embed/J8GeNdT9pLk" title="Orión - Lenguas Muertas (eris) / [Videoclip Oficial]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        <iframe class="video" src="https://www.youtube.com/embed/J8GeNdT9pL" title="Orión - Lenguas Muertas (eris) / [Videoclip Oficial]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <hr>
                        <div class="card-content">
                            <p class="textoCard">Como crear una conciliasión</p>
                        </div>
                    </div>
                </div>
                <div class="col l3">
                    <div class="card">
                        <!-- Este es el video original -->
                        <!-- <iframe width="853" height="480" src="https://www.youtube.com/embed/J8GeNdT9pLk" title="Orión - Lenguas Muertas (eris) / [Videoclip Oficial]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        <iframe class="video" src="https://www.youtube.com/embed/J8GeNdT9pL" title="Orión - Lenguas Muertas (eris) / [Videoclip Oficial]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <hr>
                        <div class="card-content">
                            <p class="textoCard">Como invitar a mis colaboradores o equipo</p>
                        </div>
                    </div>
                </div>
                <div class="col l3">
                    <div class="card">
                        <!-- Este es el video original -->
                        <!-- <iframe width="853" height="480" src="https://www.youtube.com/embed/J8GeNdT9pLk" title="Orión - Lenguas Muertas (eris) / [Videoclip Oficial]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        <iframe class="video" src="https://www.youtube.com/embed/J8GeNdT9pL" title="Orión - Lenguas Muertas (eris) / [Videoclip Oficial]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <hr>
                        <div class="card-content">
                            <p class="textoCard">Como retiro los fondos de mi balance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col l12">
            <h5><i class="material-icons iconoSetting">chat</i> Levantar Ticket</h5>
        </div>
        <div class="col l12">

			<div class="row">
				<div class="col l5 input-border" >
					<select name="modulo" id="modulo" >
						<option value="0" default>---------------</option>
						<?php
						if (!empty($modules)) {
							foreach ($modules as $value => $key){
								echo '<option value="'.$key.'">'.$value.'</option>';
							}
						}
						?>
					</select>
					<label for="modulo">Modulo</label>
				</div>
				<div class="col l1"></div>
				<div class="col l5 input-border" >
					<select name="tema" id="tema">
					</select>
					<label for="tema">Tema</label>
				</div>
			</div>
			<div class="row">
                <div class="col l6 input-border">
                    <input type="text" name="asunto" id="asunto" required>
                    <label for="asunto">Asunto</label>
                </div>
                <div class="col l1"></div>
                <div class="col l5 input-border">
                    <select name="regimen" id="regimen" disabled>
                        <option value="0" default>Cliente</option>

                    </select>
                    <label for="regimen">Regimen Fiscal *</label>
                </div>
            </div>
            <div class="row">
                <div class="col l12 input-border">
                    <label style="top: 0!important;" for="descripcion">Descripcion</label>
                    <textarea  id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
                </div>
            </div>
			<div class="row">
				<div class="col l12 input-border">
					<button class="btn waves-effect waves-light grey right" type="submit" id="btn-envio" name="btn-envio">Enviar
						<i class="material-icons right">send</i>
					</button>
				</div>
            </div>
        </div>
		<div class="row" id="tck_dashboard">
		</div>

		<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
		<div id="modal1" class="modal">
			<div class="modal-content">
				<h4 id="tck_title_modal">Folio: 13000011697652569</h4>
				<h5 id="tck_title_modal">Asunto: Prueba</h5>
				<p>Esto es una prueba</p>
				<div id="content_chat" class="content" style="padding-bottom: 25px">
					<div class="row">
						<div class="col red right " ><p>s12 m4</p></div>
					</div>
					<div class="row">
						<div class="col blue left"><p>s12 m4dsadasdasd</p></div>
					</div>
					<div class="row">
						<div class="col red right "><p>lorem ipdsadasd</p></div>
					</div>
					<div class="row">
						<div class="col blue left"><p>s12 m4dsadasdasd</p></div>
					</div>
				</div>
				<div class="row">
					<textarea class="materialize-textarea" id="tckComentsChat" name="tckComentsChat"></textarea>
					<button class="btn waves-effect waves-light right grey" type="submit" name="action" >Enviar
						<i class="material-icons right">send</i>
					</button>

				</div>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
			</div>
		</div>

    </div>
</div>
<style>
    .iconoSetting {
        position: relative;
        top: 3px;
    }

    .video {
        width: 100%;
    }

    .card .card-content {
        /* padding: 24px; */
        padding: 0;
        border-radius: 0 0 2px 2px;
    }

    .card {
        padding: 10px;
        min-height: 300px;
        border-radius: 15px !important;

    }

    .textoCard {
        font-size: 18px;
    }
</style>
<script>
	$(document).ready(function() {
		getTickets();
		$('#modulo').change();
		$('#modulo').on('change', function() {
			var idModule = $(this).val();
			$.ajax({
				url: 'Soporte/getTopics',
				data: {
					id: idModule
				},
				dataType: 'json',
				method: 'post',
				beforeSend: function () {
				},
				success: function (data) {
					$('#tema').formSelect().empty();
					$.each(data, function(index, value) {
						// $('#tema').append('<option value="'+value.id+'" >'+value.topic+'</option>');
						$('#tema').formSelect().append('<option value="'+value.id+'" >'+value.topic+'</option>');
					});
				},
				complete: function () {
				}
			});
		});
		$('#btn-envio').on('click', function() {
			var idModule = $(this).val();
			$.ajax({
				url: '/Soporte/newTicket',
				data: {
					topic: $('#tema').val(),
					issue: $('#asunto').val(),
					description: $('#descripcion').val(),
					status: 1
				},
				dataType: 'json',
				method: 'post',
				beforeSend: function () {
				},
				success: function (data) {
					alert('Su numero de folio es: #'+data.folio);
				},
				complete: function () {
					alert('Ticket enviado con exito!');
				}
			});
		}).change;
	});

	function getTickets(){
		$.ajax({
			url: '/Soporte/getTickets',
			data: {
			},
			dataType: 'json',
			method: 'post',
			beforeSend: function () {
			},
			success: function (data) {
				console.log(data);
				$.each(data, function(index, value)	{
					var color='red';
					var status='Cerrado';
					switch (value.status) {
						case 1:
							color = 'green';
							status = 'Abierto';
							break;
						case 2:
							color = 'yellow';
							status = 'En revisión';
                            break;
						default:
							color = 'red';
							status = 'Cerrado';
							break;
					}
					var span = $('<a class="btn-floating pulse right white">'
						+'<i class="material-icons right" style="rotate: 90deg; color: '+color+';">radio_button_checked</i></a>');
					span.click(function (){

					});
					var div = '<div class="col s3">'
					+'<div class="card grey lighten-3" style="border-radius: 15px;">'
					+'<div class="card-content"><div id="spn'+value.folio+'"></div>'
					+'<span class="card-title flow-text">'
					+'<p class="flow-text"><strong >Folio: </strong>'+value.folio+'</p></span>'
					+'<p class="flow-text" style="font-size: 18px"><strong>Asunto: </strong>'+value.issue+'</p>'
					+'<p class="flow-text" style="font-size: 18px"><strong>Estatus: </strong>'+status+'</p>'
					+'<p class="right flow-text" style="font-size: 12px">'+value.date+'</p>'
					+'</div></div></div>';

					$('#tck_dashboard').append(div);
				});

			},
			complete: function () {
			}
		});

	}
</script>
