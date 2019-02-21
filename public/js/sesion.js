function IniciarSesion(form)
{
	var x = new XMLHttpRequest()
	x.open("POST", form.action, true)
	x.onload = function() 
	{
		var res = JSON.parse(this.responseText)
	
		if (res.exito) {
			window.location.href = res.url
		} else {
			$("#show_error").html('<b>'+res.mensaje+'</b>')
		}
	}
	x.send(new FormData(form))

	return false
}

$(document).on("click","#view_icheck",function() {
	var check = document.getElementById("tpassword")

	if (this.checked) {
		check.setAttribute('type','text')
	} else {
		check.setAttribute('type','password')
	}
})