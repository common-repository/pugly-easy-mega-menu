jQuery(document).ready(function($){
	/* Resize Window */
	$(window).resize(function(){
		$('.pug-mobilemenu').hide();
		$('.pug-showdropdown').removeClass('pug-showdropdown');
	});
	/* Start */
	$('.pugly-insertcart').each(function() {
		$(this).replaceWith($('.pugly-cart-content').html());
	});
	$('.pugly-insertsearch').each(function() {
		$(this).replaceWith($('.pugly-search-content').html());
	});
	/* Mobile Menu Generator */
	$(document).on('click', '.pug-hamburger', function(){
		$('.pug-mobilemenu').html('');
		$('.pug-mobilemenu').html('<div class="pug-menuitem"><div class="pug-menulink pug-closebutton"><i class="fa fa-close"></i> Close</div></div>'+$('.pug-topbar').html()+$('.pug-leftarea').html()+$('.pug-rightarea').html());
		$('.pug-mobilemenu').find('.pug-inlinebtn').remove();
		$('.pug-mobilemenu').find('.pug-hamburgerouter').remove();
		$('.pug-mobilemenu').find('.pug-columnedit').remove();
		$('.pug-showdropdown').removeClass('pug-showdropdown');
		$('.pug-mobilemenu').show();
		$('body').css('overflow','hidden');
	});
	/* Dropdown Toggle */
	$(document).on('click', '.pug-inlinearrow', function(){
		if ($(this).parent().hasClass('pug-showdropdown')) {
			$('.pug-showdropdown').removeClass('pug-showdropdown');
		} else {
			$('.pug-showdropdown').removeClass('pug-showdropdown');
			$(this).parent().addClass('pug-showdropdown');
		}
	});
	/* Close Mobile Menu */
	$(document).on('click', '.pug-closebutton', function(){
		$('.pug-mobilemenu').hide();
		$('body').css('overflow','auto');
	});
	/* Menu Link */
	$(document).on('click', '.pug-menulink', function(){
		if ($(this).attr('data-url') !== undefined) {
			var linkurl = $(this).attr('data-url');
			if ($(this).attr('data-target') == 'Same Window') {
				window.open(linkurl, '_self');
			} else {
				window.open(linkurl, '_blank');
			}
		}
	});
});