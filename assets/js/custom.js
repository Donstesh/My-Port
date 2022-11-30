(function($){

    "use strict";

	$('#confirm-delete').on('show.bs.modal', function(e) {
	    $(this).find('.btn-primary').attr('href', $(e.relatedTarget).data('href'));
	});

	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	$(document).ready( function () {
		$(".dataTable").DataTable({
			responsive: true
		});
		
		
	} );

})(jQuery);

function previewFile(input){
	var file = $("input[type=file]").get(0).files[0];

	if(file){
	    var reader = new FileReader();

	    reader.onload = function(){
	        $("#profileImg").attr("src", reader.result);
	    }

	    reader.readAsDataURL(file);
	}
}