jQuery(document).ready(function($){
	/* Reset Styles */
	$(document).on('click', '#pug-resetstyles', function(){
		$('#pugly_stylemenubackgroundcolor')[0].jscolor.fromString('#FFFFFF');
		$('#pugly_stylemenutextcolor')[0].jscolor.fromString('#000000');
		$('#pugly_stylemenumaxwidth').val('1200');
		$('#pugly_stylemenumaxwidth').attr('readonly',false);
		$('#pugly_stylemenumaxwidthtype').val('px');
		$('#pugly_stylebarbackgroundcolor')[0].jscolor.fromString('#005BA1');
		$('#pugly_stylebartextcolor')[0].jscolor.fromString('#FFFFFF');
		$('#pugly_styledropdownwidth').val('200');
		$('#pugly_stylepadding').val('5px');
		$('#pugly_stylefontsize').val('16');
		$('#pugly_stylefont').val('Open Sans');
		$('#pugly_stylelogowidth').val('150');
	});
	$(document).on('change', '#pugly_stylemenumaxwidthtype', function(){
		if ($(this).val() == 'px') {
			$('#pugly_stylemenumaxwidth').val('1200');
			$('#pugly_stylemenumaxwidth').attr('readonly',false);
		} else {
			$('#pugly_stylemenumaxwidth').val('100');
			$('#pugly_stylemenumaxwidth').attr('readonly',true);
		}
	});
});