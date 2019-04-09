var lista = document.getElementById('ListaManteUsuario')
if (lista) {
	abrirPagina({
		div: 'ListaManteUsuario',
		tipo: 2,
		ccarga : 1
	})
}

var lista = document.getElementById('ListaManteEmpresas')
if (lista) {
	abrirPagina({
		div: 'ListaManteEmpresas',
		tipo: 4,
		ccarga : 1
	})
}


var lista = document.getElementById('ListaManteCliente')
if (lista) {
	abrirPagina({
		div: 'ListaManteCliente',
		tipo: 6,
		ccarga : 1
	})
}

function anularUsuario(usuario)
{
	if (confirm('¿Esta seguro de eliminar el usuario?')) {
		var xhr   = new XMLHttpRequest()
		var datos = new FormData()
		datos.append('usuario', usuario)

		xhr.open("POST", base_url("index.php/mante/usuario/anularusuario"), true)
		xhr.onload = function() {
			var res = JSON.parse(this.responseText)
			notificar(res.mensaje, res.exito);

			if (res.exito) {
				abrirPagina({tipo: res.lista, div:'ListaManteUsuario'})
			}
		}
		xhr.send(datos)
	}
}

function anularEmpresa(empresa)
{	
	if (confirm('¿Esta seguro de eliminar la empresa?')) {
		var xhr   = new XMLHttpRequest()
		var datos = new FormData()
		datos.append('empresa', empresa)

		xhr.open("POST", base_url("index.php/mante/empresa/anularempresa"), true)
		xhr.onload = function() {
			var res = JSON.parse(this.responseText)
			notificar(res.mensaje, res.exito);

			if (res.exito) {
				abrirPagina({tipo: res.lista, div:'ListaManteEmpresas'})
			}
		}
		xhr.send(datos)
	}
}

function anularCliente(cliente)
{	
	if (confirm('¿Esta seguro de eliminar el cliente?')) {
		var xhr   = new XMLHttpRequest()
		var datos = new FormData()
		datos.append('cliente', cliente)

		xhr.open("POST", base_url("index.php/mante/cliente/anularcliente"), true)
		xhr.onload = function() {
			var res = JSON.parse(this.responseText)
			notificar(res.mensaje, res.exito);

			if (res.exito) {
				abrirPagina({tipo: res.lista, div:'ListaManteCliente'})
			}
		}
		xhr.send(datos)
	}
}