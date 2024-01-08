$("#especie").autocomplete({
	source: function (request, response) {
		$.ajax({
			url: 'Views/ajax.php',
			type: 'get',
			dataType: 'json',
			data: { especie: request.term },
			success: function (data) {
				response(data);
				console.log("el dato", data);

			}

		});
	},
	minLength: 1,
	select: function (event, ui) {
		$(this).val(ui.item.label);
		$("#idEspecie").val(ui.item.id);

		return false;
	}

});
//Genero
$("#genero").autocomplete({
	source: function (request, response) {
		$.ajax({
			url: 'Views/ajax.php',
			type: 'get',
			dataType: 'json',
			data: { genero: request.term },
			success: function (data) {
				response(data);
				console.log("el dato", data);

			}

		});
	},
	minLength: 1,
	select: function (event, ui) {
		$(this).val(ui.item.label);
		$("#idGenero").val(ui.item.id);

		return false;
	}

});
//Tipo consulta
/*$("#tipoConsultao").autocomplete({
	source: function(request, response){
		$.ajax({
			url: 'Views/ajax.php',
			type:'get',
			dataType:'json',
			data: {tipoConsultao: request.term},
			success: function(data){
				response(data);
				console.log("el dato" ,data);
				
			}

		});
	},
	minLength: 1,
	select: function(event, ui){
		$(this).val(ui.item.label);
		$("#idTipoConsulta").val(ui.item.id);
		
		return false;
	}

});*/
//Propietario
$("#cedula").autocomplete({
	source: function (request, response) {
		$.ajax({
			url: 'Views/ajax.php',
			type: 'get',
			dataType: 'json',
			data: { cedula: request.term },
			success: function (data) {
				response(data);
				console.log("el dato", data);

			}

		});
	},
	minLength: 1,
	select: function (event, ui) {
		$(this).val(ui.item.label);
		$("#cliente").val(ui.item.label);
		$("#cliente1").val(ui.item.label);
		$("#numeroCliente").val(ui.item.labelCC);
		$("#telefono").val(ui.item.labelNum);
		$("#idCliente").val(ui.item.id);

		return false;
	}

});
//Mascota
$("#mascota").autocomplete({
	source: function (request, response) {
		$.ajax({
			url: 'Views/ajax.php',
			type: 'get',
			dataType: 'json',
			data: { mascota: request.term },
			success: function (data) {
				response(data);
				console.log("el dato", data);

			}

		});
	},
	minLength: 1,
	select: function (event, ui) {
		$(this).val(ui.item.label);
		$("#idMascota").val(ui.item.id);
		$("#idEspecie").val(ui.item.idEspe);
		$("#especie").val(ui.item.labelEspe);
		$("#idGenero").val(ui.item.idGene);
		$("#genero").val(ui.item.labelGene);
		$("#entero").val(ui.item.ente);


		return false;
	}

});
//edad
/*$("#edad").autocomplete({
	source: function(request, response){
		$.ajax({
			url: 'Views/ajax.php',
			type:'get',
			dataType:'json',
			data: {idEdad: request.term},
			success: function(data){
				response(data);
				console.log("el dato" ,data);
				
			}

		});
	},
	minLength: 1,
	select: function(event, ui){
		$(this).val(ui.item.label);
		$("#idEdad").val(ui.item.id);

		
		return false;
	}

});*/
//Medico
$("#medico").autocomplete({
	source: function (request, response) {
		$.ajax({
			url: 'Views/ajax.php',
			type: 'get',
			dataType: 'json',
			data: { medico: request.term },
			success: function (data) {
				response(data);
				console.log("el dato", data);

			}

		});
	},
	minLength: 1,
	select: function (event, ui) {
		$(this).val(ui.item.label);
		$("#nombreMedico").val(ui.item.labelN);
		$("#mp").val(ui.item.mp);
		$("#idmedico").val(ui.item.id);


		return false;
	}

});
$('body').on('click', '#medicamento', function () {
	$(this).autocomplete({
		source: function (request, response) {
			$.ajax({
				url: 'Views/ajax.php',
				type: 'get',
				dataType: 'json',
				data: { medicamento: request.term },
				success: function (data) {
					response(data);
					console.log("el dato", data);

				}

			});
		},
		minLength: 1,
		select: function (event, ui) {
			$(this).val(ui.item.label);

			return false;
		}

	});
});

$('body').on('click', '#medicamentoCasa', function () {
	$(this).autocomplete({
		source: function (request, response) {
			$.ajax({
				url: 'Views/ajax.php',
				type: 'get',
				dataType: 'json',
				data: { medicamento: request.term },
				success: function (data) {
					response(data);
					console.log("el dato", data);

				}

			});
		},
		minLength: 1,
		select: function (event, ui) {
			$(this).val(ui.item.label);

			return false;
		}

	});
});

$('body').on('click', '#insumoPrincipio', function () {
	$(this).autocomplete({
		source: function (request, response) {
			$.ajax({
				url: 'Views/ajax.php',
				type: 'get',
				dataType: 'json',
				data: { insumo: request.term },
				success: function (data) {
					response(data);
					console.log("el dato", data);

				}

			});
		},
		minLength: 1,
		select: function (event, ui) {
			$(this).val(ui.item.label);

			return false;
		}
	});
});