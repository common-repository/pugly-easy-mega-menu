jQuery(document).ready(function($){
	/* Load */
	if ($('.pug-wrap').length) {
		$('body').addClass('folded');
		$('.pug-menusize').html('<b>Menu Width:</b> '+$('.pug-barcontainer').css('width'));
	}
	/* Resize Window */
	$(window).resize(function(){
		$('.pug-menusize').html('<b>Menu Width:</b> '+$('.pug-barcontainer').css('width'));
	});
	/* Click Hamburger */
	$(document).on('click', '.pug-hamburger', function(){
		$('.pug-showdropdown').removeClass('pug-showdropdown');
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
	/* Remove Class */
	$(document).on('click', '.pug-inlinebtn', function(){
		$('.pug-showdropdown').removeClass('pug-showdropdown');
		$('.pug-settings').hide();
		$('.pug-active').removeClass('pug-active');
	});
	/* Insert */
	$(document).on('click', '.pug-insertitem', function(){
		$('.pug-settings').show();
		$('.pug-setting').hide();
		$('.pug-show-inserts').show();
		$('.pug-insertactive').removeClass('pug-insertactive');
		$(this).addClass('pug-insertactive');
	});
	$(document).on('click', '.pug-insertmenuparent', function(){
		$('.pug-settings').hide();
		$('.pug-setting').hide();
		$($('.pug-save-menuitem').html()).insertBefore('.pug-insertactive');
		$('.pug-insertactive').removeClass('pug-insertactive');
	});
	$(document).on('click', '.pug-insertcartitem', function(){
		$('.pug-settings').hide();
		$('.pug-setting').hide();
		$($('.pug-save-cartitem').html()).insertBefore('.pug-insertactive');
		$('.pug-insertactive').removeClass('pug-insertactive');
	});
	$(document).on('click', '.pug-insertsearchitem', function(){
		$('.pug-settings').hide();
		$('.pug-setting').hide();
		$($('.pug-save-searchitem').html()).insertBefore('.pug-insertactive');
		$('.pug-insertactive').removeClass('pug-insertactive');
	});
	/* First Cell Toggle */
	$(document).on('click', '.pug-hidecell', function(){
		if ($(this).parent().hasClass('pug-hidethis')) {
			$(this).parent().removeClass('pug-hidethis');
		} else {
			$(this).parent().addClass('pug-hidethis');
		}
	});
	/* Top Bar Tools */
	$(document).on('click', '.pug-hidetopbar', function(){
		if ($(this).parent().parent().parent().hasClass('pug-hidebar')) {
			$(this).parent().parent().parent().removeClass('pug-hidebar');
		} else {
			$(this).parent().parent().parent().addClass('pug-hidebar');
		}
	});
	$(document).on('click', '.pug-alignitems', function(){
		if ($(this).parent().hasClass('pug-leftside')) {
			$(this).parent().removeClass('pug-leftside');
			$(this).parent().addClass('pug-rightside');
		} else {
			$(this).parent().removeClass('pug-rightside');
			$(this).parent().addClass('pug-leftside');
		}
	});
	/* Edit Menu Item */
	$(document).on('click', '.pug-menulink', function(){
		$('.pug-settings').show();
		$('.pug-setting').hide();
		$('.'+$(this).attr('data-show')).show();
		$('.pug-active').removeClass('pug-active');
		$(this).addClass('pug-active');
		/* Load Settings */
		if ($(this).attr('data-show') == 'pug-show-image') {
			$('.pug-setting-url').val($(this).attr('data-url'));
			$('.pug-setting-target').val($(this).attr('data-target'));
		}
		if ($(this).attr('data-show') == 'pug-show-menu') {
			$('.pug-setting-text').val($(this).html());
			$('.pug-setting-style').val($(this).attr('data-style'));
		}
		if ($(this).attr('data-show') == 'pug-show-item') {
			$('.pug-setting-text').val($(this).html());
			$('.pug-setting-url').val($(this).attr('data-url'));
			$('.pug-setting-target').val($(this).attr('data-target'));
		}
		if ($(this).attr('data-show') == 'pug-show-parent') {
			$('.pug-setting-text').val($(this).html());
			$('.pug-setting-url').val($(this).attr('data-url'));
			$('.pug-setting-target').val($(this).attr('data-target'));
			$('.pug-setting-style').val($(this).attr('data-style'));
			$('.pug-setting-pinning').val($(this).attr('data-pin'));
		}
	});
	$(document).on('click', '.pug-parentlink', function(){
		$('.pug-showdropdown').removeClass('pug-showdropdown');
		$(this).parent().addClass('pug-showdropdown');
	});
	/* Edit Logo Item */
	$(document).on('click', '.pug-logoitem', function(){
		$('.pug-settings').show();
		$('.pug-setting').hide();
		$('.pug-show-logo').show();
		$('.pug-active').removeClass('pug-active');
		$(this).addClass('pug-active');
		$('.pug-showdropdown').removeClass('pug-showdropdown');
	});
	/* Edit Settings */
	$(document).on('input change keyup', '.pug-setting-text', function(){
		if ($(this).val() == '') {
			$('.pug-active').html('Item');
		} else {
			$('.pug-active').html($(this).val());
		}
	});
	$(document).on('input change keyup', '.pug-setting-url', function(){
		$('.pug-active').attr('data-url',$(this).val());
	});
	$(document).on('change', '.pug-setting-target', function(){
		$('.pug-active').attr('data-target',$(this).val());
	});
	$(document).on('change', '.pug-setting-style', function(){
		$('.pug-active').attr('data-style',$(this).val());
		if ($('.pug-active').parent().hasClass('pug-highlight')) {
			$('.pug-active').parent().removeClass('pug-highlight');
		} else {
			$('.pug-active').parent().addClass('pug-highlight');
		}
	});
	$(document).on('change', '.pug-setting-pinning', function(){
		$('.pug-active').attr('data-pin',$(this).val());
		if ($('.pug-active').parent().hasClass('pug-pinonmobile')) {
			$('.pug-active').parent().removeClass('pug-pinonmobile');
		} else {
			$('.pug-active').parent().addClass('pug-pinonmobile');
		}
	});
	$(document).on('change', '.pug-setting-move', function(){
		if ($(this).val() == 'Right Side') {
			$($('.pug-active').parent()).insertBefore('.pug-rightarea .pug-insertitem');
		}
		if ($(this).val() == 'Left Side') {
			$($('.pug-active').parent()).insertBefore('.pug-leftarea .pug-insertitem');
		}
		if ($(this).val() == 'Top Bar') {
			$($('.pug-active').parent()).insertBefore('.pug-topbar .pug-insertitem');
		}
		$('.pug-showdropdown').removeClass('pug-showdropdown');
		$('.pug-active').removeClass('pug-active');
		$('.pug-settings').hide();
		$(this).val('Select...');
	});
	/* Tools */
	$(document).on('click', '.pug-toolup', function(){
		$('.pug-active').insertBefore($('.pug-active').prev());
	});
	$(document).on('click', '.pug-tooldown', function(){
		if (!$('.pug-active').next().hasClass('pug-columnedit')) {
			$('.pug-active').insertAfter($('.pug-active').next());
		}
	});
	$(document).on('click', '.pug-tooldelete', function(){
		$('.pug-active').remove();
		$('.pug-settings').hide();
	});
	$(document).on('click', '.pug-selectimage', function(){
		var upload = wp.media({
			title:'Choose Image',
			multiple:false
			})
			.on('select', function(){
			var select = upload.state().get('selection');
			var attach = select.first().toJSON();
			$('.pug-active').find('img').attr('src',attach.url);
	       })
		   .open();
	});
	/* Parent Tools */
	$(document).on('click', '.pug-parenttoolup', function(){
		if (!$('.pug-active').parent().prev().hasClass('pug-inlinebtn')) {
			$($('.pug-active').parent()).insertBefore($('.pug-active').parent().prev());
		}
	});
	$(document).on('click', '.pug-parenttooldown', function(){
		if (!$('.pug-active').parent().next().hasClass('pug-inlinebtn')) {
			$($('.pug-active').parent()).insertAfter($('.pug-active').parent().next());
		}
	});
	$(document).on('click', '.pug-parenttooldelete', function(){
		if ($('.pug-active').parent().hasClass('pug-dropdowncell')) {
			if ($('.pug-active').parent().parent().children().length == 1) {
				$('.pug-active').parent().parent().parent().removeClass('pug-showarrow');
				$('.pug-active').parent().replaceWith('<div class="pug-dropdowncell"><div class="pug-insertdropdown"><i class="fa fa-tasks"></i> Create Dropdown</div></div>');
				$('.pug-settings').hide();
			} else {
				$('.pug-active').parent().remove();
				$('.pug-settings').hide();
			}
		} else {
			$('.pug-active').parent().remove();
			$('.pug-settings').hide();
		}
	});
	$(document).on('click', '.pug-parenttoolclone', function(){
		$($('.pug-active').parent().clone()).insertAfter($('.pug-active').parent());
		$('.pug-showdropdown').removeClass('pug-showdropdown');
		$('.pug-active').removeClass('pug-active');
		$('.pug-settings').hide();
	});
	/* Insert Items */
	$(document).on('click', '.pug-inserttext', function(){
		$('<div class="pug-menulink" data-show="pug-show-item" data-url="" data-target="Same Window" data-style="Default">Menu Item</div>').insertBefore('.pug-active');
	});
	$(document).on('click', '.pug-insertseparator', function(){
		$('<div class="pug-menulink" data-show="pug-show-hr"><hr></div>').insertBefore('.pug-active');
	});
	$(document).on('click', '.pug-insertimage', function(){
		$('<div class="pug-menulink" data-show="pug-show-image" data-url="" data-target="Same Window">'+$('.pug-imageholder').html()+'</div>').insertBefore('.pug-active');
	});
	$(document).on('click', '.pug-insertcolumn', function(){
		$('<div class="pug-dropdowncell"><div class="pug-menulink pug-columnedit" data-show="pug-show-columns"><i class="fa fa-edit"></i> Edit</div></div>').insertAfter($('.pug-active').parent());
	});
	/* Link Box */
	$('.pug-selectlinkbox a').click(function(e) {
    	e.stopPropagation();
    	e.preventDefault();
		$('.pug-setting-url').val($(this).attr('href'));
		$('.pug-active').attr('data-url',$(this).attr('href'));
		if ($('.pug-active').attr('data-show') == 'pug-show-item' || $('.pug-active').attr('data-show') == 'pug-show-parent') {
			$('.pug-setting-text').val($(this).html());
			$('.pug-active').html($(this).html());
		}
		$('.pug-lightbox').hide();
	});
	/* Open Link Box */
	$(document).on('click', '.pug-selectlink', function(){
		$('.pug-lightbox').show();
	});
	/* Close Link Box */
	$(document).on('click', '.pug-closelightbox', function(){
		$('.pug-lightbox').hide();
	});
	/* Insert Dropdown */
	$(document).on('click', '.pug-insertdropdown', function(){
		$('.pug-active').removeClass('pug-active');
		$(this).parent().parent().parent().removeClass('pug-showarrow');
		$(this).parent().parent().parent().addClass('pug-showarrow');
		$(this).replaceWith('<div class="pug-menulink pug-columnedit pug-active" data-show="pug-show-columns"><i class="fa fa-edit"></i> Edit</div>');
		$('.pug-settings').show();
		$('.pug-setting').hide();
		$('.pug-show-columns').show();
	});
	/* Save */
	$(document).on('click', '#submit', function(){
    	if ($('.pug-wrap').length) {
			$('#pugly_menucode').val('');
			$('.pug-active').removeClass('pug-active');
			$('.pug-showdropdown').removeClass('pug-showdropdown');
			$('#pugly_menucode').val($('.pug-main').html());
			$('.pug-settings').hide();
		}
	});
});