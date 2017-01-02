$(document).ready(function(){
	//datepicker
	$('#modal_about').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		 var recipient = button.data('whatever') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this);
		  modal.find('.del').val(recipient);
	});
	//Datemask dd/mm/yyyy
	$("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
	
	$('#form_ubah_siswa').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama: {
                validators: {
                    notEmpty: {
                        message: 'Nama tidak boleh kosong'
                    }
                }
            },
			tanggal_lahir: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal Lahir harus diisi'
                    }
                }
            },
			hobi: {
                validators: {
                    notEmpty: {
                        message: 'Hobi harus diisi'
                    }
                }
            },
			alamat: {
                validators: {
                    notEmpty: {
                        message: 'Alamat harus diisi'
                    }
                }
            }
		}
	});
	
	$(".foto-ganti").click(function(){
		$(".ganti-file").fadeIn("fast");
		$(this).hide();
		$(".ganti-submit").fadeIn("fast");
	});
	$(".hd").click(function(){
		$(this).fadeOut("fast");
		$(".waktu-detail").animate({
			width:0
		});
		$(".waktu-detail").hide();
	});
});