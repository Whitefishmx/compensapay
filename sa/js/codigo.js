//definimos el modal
var modal = document.getElementById('myModal');

function limpiar(){
    document.getElementById("modal-body").innerHTML="";
}

function abrirmodal(){
	modal.style.display = "flex";
}
function cerrarmodal(){
	modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}

//funciones ajax
function dashboard(fechai, fechaf){
	$.ajax({
				type: 'POST',
				url : 'dashboard/dashboard.php',
                data: 'fechai=' + fechai + '&fechaf=' + fechaf
	}).done (function ( info ){
		$('#contenido').html(info);
	});
}

//empresas
function empresas(fechai, fechaf){
	$.ajax({
				type: 'POST',
				url : 'empresas/empresas.php',
                data: 'fechai=' + fechai + '&fechaf=' + fechaf
	}).done (function ( info ){
		$('#contenido').html(info);
	});
}

function edit_empresa(idempresa){
	limpiar(); abrirmodal();
	$.ajax({
		type: 'POST',
		url : 'empresas/empresa.php',
		data: 'idempresa=' + idempresa
}).done (function ( info ){
$('#modal-body').html(info);
});
}


//usuarios
function usuarios(fechai, fechaf){
	$.ajax({
				type: 'POST',
				url : 'usuarios/usuarios.php',
                data: 'fechai=' + fechai + '&fechaf=' + fechaf
	}).done (function ( info ){
		$('#contenido').html(info);
	});
}

function edit_usuario(idusuario){
	limpiar(); abrirmodal();
	$.ajax({
		type: 'POST',
		url : 'usuarios/usuario.php',
		data: 'idusuario=' + idusuario
	}).done (function ( info ){
		$('#modal-body').html(info);
	});
}

//tickets
function tickets(fechai, fechaf){
	$.ajax({
				type: 'POST',
				url : 'soporte/tickets.php',
                data: 'fechai=' + fechai + '&fechaf=' + fechaf
	}).done (function ( info ){
		$('#contenido').html(info);
	});
}

function ticket(idticket){
	limpiar(); abrirmodal();
	$.ajax({
		type: 'POST',
		url : 'soporte/ticket.php',
		data: 'idticket=' + idticket
	}).done (function ( info ){
		$('#modal-body').html(info);
	});
}

//operaciones
function operaciones(fechai, fechaf){
	$.ajax({
				type: 'POST',
				url : 'operaciones/operaciones.php',
                data: 'fechai=' + fechai + '&fechaf=' + fechaf
	}).done (function ( info ){
		$('#contenido').html(info);
	});
}