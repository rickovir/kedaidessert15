$(document).ready(function(){
	//datepicker
	$('#datepicker').datepicker({
		format: "yyyy/mm/dd"
	});
	//bootstrapwysihtml5
    $(".textarea").wysihtml5();
	
	//form update
    $(".textareaup").wysihtml5();
	var upd = $(".hideup").val();
	$('.textareaup').html(upd);
	$(".sgup").hover(function(){
		var a = $(".textareaup").val();
		$(".hideup").val(a);
	});
	//form input
	$(".sg").hover(function(){
		var a = $(".textarea").val();
		$(".hide").val(a);
	});
	
	//datatable
	$("#table_data").DataTable();
	// form barang
	$('#form_barang').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama_barang: {
                validators: {
                    notEmpty: {
                        message: 'Nama Barang tidak boleh kosong'
                    }
                }
            },
			harga: {
                validators: {
                    notEmpty: {
                        message: 'Harga tidak boleh kosong'
                    }
                },
				numeric: {
					message: 'Harga harus dengan angka'
				}
            },
			stok: {
                validators: {
                    notEmpty: {
                        message: 'Stok tidak boleh kosong'
                    }
                },
				numeric: {
					message: 'Stok harus dengan angka'
				}
            },
			kategori: {
                validators: {
                    notEmpty: {
                        message: 'Kategori tidak boleh kosong'
                    }
                }
            }
		}
	});
	
	// form kategori
	$('#form_kategori').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama_kategori: {
                validators: {
                    notEmpty: {
                        message: 'Nama Kategori tidak boleh kosong'
                    }
                }
            }
		}
	});
	
	// form kota
	$('#form_kota').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama_kota: {
                validators: {
                    notEmpty: {
                        message: 'Nama Kota tidak boleh kosong'
                    }
                }
            },
            biaya_pengiriman: {
                validators: {
                    notEmpty: {
                        message: 'Biaya Pengiriman tidak boleh kosong'
                    }
                },
				numeric: {
					message: 'Biaya harus dengan angka'
				}
            }
		}
	});
	
	$('#del_modal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		 var recipient = button.data('whatever') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this);
		  modal.find('.del').val(recipient);
	});
	
	$(".del").on("click",function(){
		id = $(this).val();
		link = $('.link').val();
		window.location.href= link+id;
	});
  });