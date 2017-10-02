<script type="text/javascript">

	$(function() {
		$(document).on("click", "a", function (event) {
			event.preventDefault();
			var url = this.href;
			var element = $(this);
			if(element.hasClass("btn-modal")){
				console.log("Tienen la modal modal");

			}else if(element.hasClass("close")){
				console.log("Cierra la modal");
				$("#myModal").modal("hide");
				$("#myModal .modal-body").empty();

			}else{
				console.log("Sin clases");
			}
		});

		function datePicker() {
			$(".datepicker").datepicker({
				"format" : 'dd-mm-yyyy',
				autoclose : true
			});
		}

		function sendDatos(url, formData){
			$.ajax({
				url: urlbase + url,
				type: "POST",
				dataType: "JSON",
				data: (formData).serialize()
			})
			.done(function(response) {
				switch(response.type){
					case "success":
						$("#myModal").modal("hide");
						toastr.success(response.desc, response.id);
						location.reload();
					break;

					case "info":
						$("#myModal").modal("hide");
						toastr.info(response.desc, response.id);
						location.reload();
					break;

					case "warning":
						$("#myModal").modal("hide");
						toastr.warning(response.desc, response.id);
						location.reload();
					break;

					default:
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
				//trigger: 'focus'
				console.log("Petición completa");
			});
		}

	});

</script>