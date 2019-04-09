function cargarBoton(id,texto)
{
	$("#"+id).attr('data-loading-text', texto)
	$("#"+id).button('loading')
}

function base_url(url)
{
	var link = window.location.origin+"/vips/vecom/"
	if (url) { link = link +'/'+ url }

	return link
}

function Cargando(id,tipo) 
{
	var img = ''
	var gif = base_url("public/img/cargando.gif")

	switch(tipo) {
		case 1:
			img = "<p class='text-center'><img src='"+gif+"' alt='Cargando'></p>"
		break
		case 2:
			img = "<tr><td class='text-center' colspan='100%'><img src='"+gif+"' alt='Cargando'></td></tr>"
		break
		default:
			return false
		break
	}

	$("#"+id).html(img)
}

function notificar(texto, tipo)
{
	var alerta = ''
	var iconox = ''

	switch(tipo){
		case 1:
			alerta = 'info'
			iconox = 'glyphicon glyphicon-ok'
		break
		case 2:
			alerta = 'success'
			iconox = 'glyphicon glyphicon-ok'
		break
		case 3:
			alerta = 'warning'
			iconox = 'glyphicon glyphicon-warning-sign'
		break
		default:
			alerta = 'danger'
			iconox = 'glyphicon glyphicon-warning-sign'
		break
	}

	$.notify(
		{ icon: iconox, title: 'Vips <br>', message: texto},
		{ type: alerta}
	)
}

function abrirPagina(args)
{
	var url = ''

	switch(args.tipo) {
		case 1:
			url = base_url('index.php/mante/usuario/form')
		break
		case 2:
			url = base_url('index.php/mante/usuario/ver_lista')
		break
		case 3:
			url = base_url('index.php/mante/empresa/form') 
		break
		case 4:
			url = base_url('index.php/mante/empresa/ver_lista') 
		break
	}

	if (args.registro) { url = url +'/'+ args.registro }

	cerrarPestania({mostrar: true, mdiv:args.div})
	Cargando(args.div, args.ccarga)

	var xhr = new XMLHttpRequest()
	xhr.open("POST", url, true)
	xhr.onload = function() {
		document.getElementById(args.div).innerHTML = this.responseText
	}
	xhr.send()
}

function cerrarPestania(args)
{
	if (args.mostrar) {
		$("#"+args.mdiv).show()
	}

	if (args.ocultar) {
		$("#"+args.odiv).hide()
	}
}

$(document).on("submit", "#formGuardar", function(e) {
	e.preventDefault()

	cargarBoton('btnGuardar', 'Guardando...')

	var xhr = new XMLHttpRequest()
	xhr.open("POST", this.action, true)
	xhr.onload = function() {
		var res = JSON.parse(this.responseText)
		notificar(res.mensaje, res.exito);

		if (res.exito) {
			if (res.form == 1) {
				abrirPagina({tipo: res.lista, div:'ListaManteUsuario'})
				abrirPagina({tipo: res.form, div:'contenidoManteUsuario'})
			}

			if (res.form == 3) {
				abrirPagina({tipo: res.lista, div:'ListaManteEmpresa'})
				abrirPagina({tipo: res.form, div:'contenidoManteEmpresa'})
			}

		} else {
			$("#btnGuardar").button('reset')
		}
	}
	xhr.send(new FormData(this))
})

