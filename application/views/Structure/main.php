<!-- Cargamos la API para el Mapa -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6VBEfhHWNZKNUoJbw5YqazrU83u59sbc"></script>

<script type="text/javascript">

	$(function() {
		var iniciar =1;

		$("#myModal").modal({
			backdrop: 'static',
			keyboard: false,
			show: false
		});

		$(document).off("click", "btn-modal").on("click", ".btn-modal", function(event){
			event.preventDefault();
			iniciar = 2;
			if(iniciar == 1){
				iniciar = 2;
			}else{
				cleanModal();
				$(".modal-content").load(this.href);
			}
			$( ".btn-modal").unbind( "click" );
		});
	});

	function datePicker() {
		$(".datepicker").datepicker({
			"format" : 'dd-mm-yyyy',
			autoclose : true
		});
	}

	function cleanModal() {
		$("#myModal .modal-header").empty();
		$("#myModal .modal-body").empty();
		$("#myModal .modal-footer").empty();
	}

	function sendDatos(url, formData){
		$.ajax({
			url: urlbase + url,
			type: "POST",
			dataType: "JSON",
			data: (formData).serializeArray()
		})
		.done(function(response) {
			switch(response.type){
				case "success":
					cleanModal();
					$("#myModal").modal("hide");
					toastr.success(response.desc, response.id);
					location.reload();
				break;

				case "info":
					cleanModal();
					$("#myModal").modal("hide");
					toastr.info(response.desc, response.id);
					location.reload();
				break;

				case "warning":
					cleanModal();
					$("#myModal").modal("hide");
					toastr.warning(response.desc, response.id);
					location.reload();
				break;

				default:
					cleanModal();
					$("#myModal").modal("hide");
					toastr.error(response.desc, response.id);
					location.reload();
			}
			$("#notifications").html(response);
		})
		.fail(function(response) {
			console.log("Error en la respuesta");
		})
		.always(function(response) {
			$("#myModal .modal-content").empty();
			$("#myModal .modal-body").empty();
			console.log("Petición completa");
		});
	}

	//Para cargar el mapa
	function startMap(selector, latitud, longitud) {
		var mapa = new google.maps.Map(document.getElementById(selector),{
			center:{
				lat:(latitud.value != '') ? parseFloat(latitud.value) : 29.5333,
				lng:(longitud.value != '') ? parseFloat(longitud.value) :-111.2333
			},
			zoom:15
		});

		var marker = new google.maps.Marker({
			position:{
				lat:(latitud.value != '') ? parseFloat(latitud.value) : 29.5333,
				lng:(longitud.value != '') ? parseFloat(longitud.value) :-111.2333
			},
			map:mapa,
			draggable:true,
			title:"Estás aqui"
		});

		google.maps.event.addListener(marker, "dragend", function(){
			latitud.value = marker.getPosition().lat();
			longitud.value = marker.getPosition().lng();
			console.log("Latitud =",marker.getPosition().lat(), "	Longitud =",marker.getPosition().lng());
		});
	}

</script>
