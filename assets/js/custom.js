$(document).ready(function() {
	$('.call-r-detail').click(function(){
		$('.detail-ricko').slideDown("slow");
	});
	$('.call-m-detail').click(function(){
		$('.detail-mia').slideDown("slow");
	});
	//$('.nav').onePageNav();
	
	//datatable
	$("#table_data").DataTable();
	
	function append_cart(nama_barang, harga_rupiah, banyak, gambar)
	{
		var link_gambar = $('#link_gambar').val();
		
		var content = '<li>'+
						'<a href="#">'+
							'<div class="row">'+
								'<div class="col-xs-4">'+
									'<img src="'+link_gambar+gambar+'"/>'+
								'</div>'+
								'<div class="col-xs-6">'+
									'<p>'+nama_barang+'</p>'+
									'<p>'+harga_rupiah+' x '+banyak+' pcs</p>'+
								'</div>'+
							'</div>'+
						'</a>'+
					'</li>';
		$(".shopping-item").prepend(content);
		//console.log(content);
	}
	
	// ajax add to cart
	$("#add_cart").on("click", function(){
		var banyak_item = $("#banyak_item").val();
		var sisa = $("#stok").text() - banyak_item;
		if(sisa >= 0)
		{
			var btn_cart = $('#add_cart');
			var link_add = btn_cart.attr("link");
			link_add = link_add+'/'+sisa+'/';
			var nama_barang = btn_cart.attr("nama_barang");
			var kode_barang = btn_cart.attr("kode_barang");
			var harga_barang = btn_cart.attr("harga_barang");
			
			var harga_rupiah = $("#harga_rupiah").text();
			
			var gambar = btn_cart.attr("gambar");
			var json_data = {
				"kode_barang"	: kode_barang, 
				"nama_barang"	: nama_barang, 
				"harga_barang"	: harga_barang,
				"banyak"		: banyak_item,
				"gambar"		: gambar
			};
			
			$.ajax({
				type			: "GET",
				dataType		: "json",
				url				: link_add,
				data			: {json_data : JSON.stringify(json_data)},
				beforeSend		: function(){
					$('#add_cart_loading').show();
				},
				success	 		: function(data){
					$('#add_cart_loading').hide();
					if(data == 1)
					{
						$("#stok").text(sisa);
						$("#alert_success").fadeIn("slow",function(){
								setTimeout(function(){
									$("#alert_success").fadeOut("slow");
								},3000);
							}
						);
						append_cart(nama_barang,harga_rupiah,banyak_item, gambar);
					}
				}                                                                       
			});
		}
		else
		{
			$("#alert_warning").fadeIn("slow",function(){
					setTimeout(function(){
						$("#alert_warning").fadeOut("slow");
					},3000);
				}
			);
		}
	});
	
	$('#pass1').on("focus",function(){
		var email = {"email" : $('#email-input').val()};
		var link_valid = $('#email-input').attr("link_em_valid");
		$.ajax({
			type			: "GET",
			url				: link_valid,
			dataType		: "json",
			data			: {email : JSON.stringify(email)},
			success	 		: function(data){
				if(data > 0)
				{
					$("#email-group").addClass('has-error');
					$("#email_check").show();
					$('#success').val("0");
				}
				else
				{
					$("#email-group").removeClass('has-error');
					$("#email_check").hide();
					$('#success').val("1");
				}
			}
		});
	});
	
	function cek_customer()
	{
		var none = 0;
		$("#daftar input").each(function(){ 
			if( $.trim($(this).val()) == "" )
				none++;
		});
		return none;
	}
	
	function customer_masuk(link_masuk, data_masuk, link_sukses) {
		$.ajax({
			url: link_masuk,
			type:"POST",
			data: data_masuk,
			beforeSend: function(){
				$('#masuk_loading').show();
			},
			success: function(hasil){
				if(hasil == 0){
					$("#alert_warning").fadeIn("slow",function(){
						setTimeout(function(){
							$("#alert_warning").fadeOut("slow");
						},3000);
					});
				}else{
					window.location = link_sukses;
				}
				$('#masuk_loading').hide();
			}
		});
	}
	
	$("#signin").on("submit",function(e){
		e.preventDefault();
		var link_masuk = $(this).attr("action");
		var link_sukses = $(this).attr("link_sukses");
		var data_masuk = $(this).serialize();
		customer_masuk(link_masuk, data_masuk, link_sukses);
	});
	$("#daftar").on("submit",function(e){
		e.preventDefault();
		if(cek_customer() != 0)
		{
			$("#alert_warning").fadeIn("slow",function(){
				setTimeout(function(){
					$("#alert_warning").fadeOut("slow");
				},3000);
			});
		}
		else if($('#success').val() != 1)
		{
			$("#alert_warning").fadeIn("slow",function(){
					setTimeout(function(){
						$("#alert_warning").fadeOut("slow");
					},3000);
				}
			);
		}
		else
		{
			var link_masuk = $(this).attr("action");
			var link_sukses = $(this).attr("link_sukses");
			var data_masuk = $(this).serialize();
			customer_masuk(link_masuk, data_masuk, link_sukses);
		}
	});
	$("#profile").on("submit",function(e){
		e.preventDefault();
	});
	$('#profile input, #profile textarea').prop( "disabled", true ).addClass("profile-input-default");
	$('#ubah-profile').on("click", function(){
		$('#profile input, #profile textarea').prop( "disabled", false ).removeClass("profile-input-default");
		$('#email-input').prop( "disabled", true );
		$('#btn-perbaharui').show();
	});
	
});
// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
	if ($(".navbar").offset().top > 50) {
		$(".navbar-fixed-top").addClass("top-nav-collapse");
	} else {
		$(".navbar-fixed-top").removeClass("top-nav-collapse");
	}
});