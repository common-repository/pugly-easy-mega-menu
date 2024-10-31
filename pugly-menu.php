<?php
/**
 * Plugin Name: Pugly Easy Mega Menu
 * Plugin URI: 
 * Description: Easily create a responsive custom menu with multi-column dropdowns, buttons, centered logos and more.
 * Version: 1.0.0
 * Author: Pugly Team
 * Author URI:
 */

function pugly_menu_create_menu() {
	add_menu_page('Pugly Menu', 'Pugly Menu', 'administrator', __FILE__, 'pugly_menu_settings_page' , 'dashicons-pets', 10);
	add_action( 'admin_init', 'register_pugly_menu_settings' );
}
add_action('admin_menu', 'pugly_menu_create_menu');

function register_pugly_menu_settings() {
	register_setting( 'pugly-menu-settings-group', 'pugly_menucodehtml');
	register_setting( 'pugly-menu-settings-group', 'pugly_menubreakpoint');
}

function pugly_menu_front_enqueue()
{
	wp_register_script( 'pugly-menu-front-script', plugin_dir_url( __FILE__ ) . '/js/menu-frontend.js', array('jquery'), '3.5.1', true );
	wp_enqueue_script( 'pugly-menu-front-script' );
	
    wp_register_style( 'pugly-menu-front-styles', plugin_dir_url( __FILE__ ) . '/css/styles.css' );
	wp_enqueue_style( 'pugly-menu-front-styles' );
	
    wp_register_style( 'pugly-menu-front-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'pugly-menu-front-fontawesome' );
}
 
add_action( 'wp_enqueue_scripts', 'pugly_menu_front_enqueue' );

function pugly_menu_admin_enqueue()
{
	wp_register_script( 'pugly-menu-admin-script', plugin_dir_url( __FILE__ ) . '/js/menu-admin.js', array('jquery'), '3.5.1', true );
	wp_enqueue_script( 'pugly-menu-admin-script' );
	
    wp_register_style( 'pugly-menu-admin-stylesheet', plugin_dir_url( __FILE__ ) . '/css/styles.css' );
	wp_enqueue_style( 'pugly-menu-admin-stylesheet' );
	
    wp_register_style( 'pugly-menu-admin-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'pugly-menu-admin-fontawesome' );
}
 
add_action( 'admin_enqueue_scripts', 'pugly_menu_admin_enqueue' );

function pugly_menu_settings_page() {
	echo '<div class="pug-lightbox"><div class="pug-selectlinkbox"><div class="pug-closelightbox pug-fulltoolbtn"><i class="fa fa-close"></i> Cancel</div>';
	wp_list_pages();
	echo 'Categories';
	wp_list_categories( array('taxonomy' => 'category', 'title_li'  => '') );
	echo 'Product Categories';
	wp_list_categories( array('taxonomy' => 'product_cat', 'title_li'  => '') );
	echo '</div></div>';
?>
<style>
   	:root {
   		--puglymenubackgroundcolor: <?php $puglystylemenubackgroundcolor = get_option('pugly_stylemenubackgroundcolor'); if (empty($puglystylemenubackgroundcolor)) { echo '#ffffff'; } else { echo esc_attr($puglystylemenubackgroundcolor); } ?> !important;
   		--puglymenutextcolor: <?php $puglystylemenutextcolor = get_option('pugly_stylemenutextcolor'); if (empty($puglystylemenutextcolor)) { echo '#000000'; } else { echo esc_attr($puglystylemenutextcolor); } ?> !important;
   		--puglycontainermaxwidth: <?php $puglystylemenumaxwidth = get_option('pugly_stylemenumaxwidth'); if (empty($puglystylemenumaxwidth)) { echo '1200'; } else { echo esc_attr($puglystylemenumaxwidth); } ?><?php $puglystylemenumaxwidthtype = get_option('pugly_stylemenumaxwidthtype'); if (empty($puglystylemenumaxwidthtype)) { echo 'px'; } else { echo esc_attr($puglystylemenumaxwidthtype); } ?> !important;
   		--puglydropdownbackgroundcolor: <?php $puglystylebarbackgroundcolor = get_option('pugly_stylebarbackgroundcolor'); if (empty($puglystylebarbackgroundcolor)) { echo '#005ba1'; } else { echo esc_attr($puglystylebarbackgroundcolor); } ?> !important;
   		--puglydropdowntextcolor: <?php $puglystylebartextcolor = get_option('pugly_stylebartextcolor'); if (empty($puglystylebartextcolor)) { echo '#ffffff'; } else { echo esc_attr($puglystylebartextcolor); } ?> !important;
   		--puglydropdownwidth: <?php $puglystyledropdownwidth = get_option('pugly_styledropdownwidth'); if (empty($puglystyledropdownwidth)) { echo '200'; } else { echo esc_attr($puglystyledropdownwidth); } ?>px !important;
   		--puglypaddingsmall: <?php $puglystylepadding = get_option('pugly_stylepadding'); if (empty($puglystylepadding)) { echo '5'; } else { echo esc_attr($puglystylepadding); } ?>px !important;
   		--puglypaddinglarge: calc( var(--puglypaddingsmall) * 2 );
   		--puglyfontsize: <?php $puglystylefontsize = get_option('pugly_stylefontsize'); if (empty($puglystylefontsize)) { echo '16'; } else { echo esc_attr($puglystylefontsize); } ?>px !important;
   		--puglyfont: <?php $puglystylefont = get_option('pugly_stylefont'); if (empty($puglystylefont)) { echo 'Open Sans'; } else { echo esc_attr($puglystylefont); } ?> !important;
   		--puglylogowidth: <?php $puglystylelogowidth = get_option('pugly_stylelogowidth'); if (empty($puglystylelogowidth)) { echo '150'; } else { echo esc_attr($puglystylelogowidth); } ?>px !important;
   	}
</style>

<form method="post" action="options.php">
    <?php settings_fields( 'pugly-menu-settings-group' ); ?>
    <?php do_settings_sections( 'pugly-menu-settings-group' ); ?>
	<textarea name="pugly_menucodehtml" id="pugly_menucode" style="display:none;">
		<?php $puglymenusource = get_option('pugly_menucodehtml');
					$arr = array(
					'div' => array(
						'class' => array(),
						'style'  => array(),
						'data-show'  => array(),
						'data-url'  => array(),
						'data-target'  => array(),
						'data-style'  => array(),
						'data-pin'  => array(),
					),
					'i' => array(
						'class' => array(),
						'style'  => array(),
					),
					'img' => array(
						'class' => array(),
						'style'  => array(),
						'data-show'  => array(),
						'data-url'  => array(),
						'data-target'  => array(),
						'data-style'  => array(),
						'data-pin'  => array(),
						'src'  => array(),
					),
				);
			echo wp_kses( $puglymenusource, $arr ); ?>
	</textarea>
	<div class="pug-submitbutton">
		<label style="display:block;">Breakpoint (px)</label>
		<input name="pugly_menubreakpoint" type="number" style="width:107px; margin-bottom:5px;" value="<?php $puglybreakpoint = get_option('pugly_menubreakpoint'); if (empty($puglybreakpoint)) { echo '800'; } else { echo esc_attr($puglybreakpoint); } ?>">
		<?php submit_button(); ?>
	</div>
	<div class="pug-menusize"></div>
</form>

<div class="pug-messagebox">
	<div class="pug-message"><img style="width:100%;" src="<?php echo plugin_dir_url( __FILE__ ).'images/logo.png'; ?>"><h3 style="color:#000000; text-align:center;">Please Resize Browser.</h3><p style="color:#000000; text-align:center;">Editor is for large screens only.</p></div>
</div>

<div class="pug-wrap">
<div class="pug-main">
	<?php $puglymenusource = get_option('pugly_menucodehtml');
	if (empty($puglymenusource)) { ?>
	<div class="pug-barcontainer">
	<div class="pug-menutable pug-maxwidth-container">
		<div class="pug-menucell pug-topbar pug-leftside">
			<div class="pug-insertitem pug-inlinebtn"><i class="fa fa-plus"></i></div>
			<div class="pug-alignitems pug-inlinebtn"><i class="fa fa-align-center"></i></div>
			<div class="pug-hidetopbar pug-inlinebtn"><i class="fa fa-eye"></i></div>
		</div>
	</div>
	</div>
	<div class="pug-menucontainer">
	<div class="pug-menutable pug-maxwidth-container">
		<div class="pug-menucell pug-leftside pug-leftarea">
			<div class="pug-hidecell pug-inlinebtn"><i class="fa fa-eye"></i></div>
			<div class="pug-insertitem pug-inlinebtn"><i class="fa fa-plus"></i></div>
		</div>
		<div class="pug-menucell pug-logoarea">
			<div class="pug-menulink pug-logoitem" style="padding:0px; width:100%;" data-show="pug-show-logo" data-url="/" data-target="Same Window"><img src="<?php echo plugin_dir_url( __FILE__ ).'images/placer.jpg'; ?>"></div>
		</div>
		<div class="pug-menucell pug-rightside pug-rightarea">
			<div class="pug-insertitem pug-inlinebtn pug-hamburgerouter"><i class="fa fa-plus"></i></div>
			<div class="pug-menuitem pug-mobilemenubutton"><div class="pug-menulink pug-hamburger" data-show="pug-show-menu" data-style="Default" data-pin="No Pinning"><i class="fa fa-bars"></i> Menu</div></div>
		</div>
	</div>
	</div>
	<div class="pug-mobilemenu"></div>
	<? } else {
				$puglymenusource = get_option('pugly_menucodehtml');
					$arr = array(
					'div' => array(
						'class' => array(),
						'style'  => array(),
						'data-show'  => array(),
						'data-url'  => array(),
						'data-target'  => array(),
						'data-style'  => array(),
						'data-pin'  => array(),
					),
					'i' => array(
						'class' => array(),
						'style'  => array(),
					),
					'img' => array(
						'class' => array(),
						'style'  => array(),
						'data-show'  => array(),
						'data-url'  => array(),
						'data-target'  => array(),
						'data-style'  => array(),
						'data-pin'  => array(),
						'src'  => array(),
					),
				);
			echo wp_kses( $puglymenusource, $arr );
	}
	?>
</div>
<div class="pug-imageholder pug-hide">
	<img src="<?php echo plugin_dir_url( __FILE__ ).'images/placer.jpg'; ?>">	
</div>
<div class="pug-save-menuitem pug-hide">
	<div class="pug-menuitem">
		<div class="pug-menulink pug-parentlink" data-show="pug-show-parent" data-url="" data-target="Same Window" data-style="Default" data-pin="No Pinning">Menu Item</div><div class="pug-inlinearrow"><i class="fa fa-chevron-down"></i></div>
		<div class="pug-dropdown">
			<div class="pug-dropdowncell">
				<div class="pug-insertdropdown"><i class="fa fa-tasks"></i> Create Dropdown</div>
			</div>
		</div>
	</div>
</div>
<div class="pug-save-searchitem pug-hide">
	<div class="pug-menuitem pug-showarrow">
		<div class="pug-menulink pug-parentlink" data-show="pug-show-parent" data-url="" data-target="Same Window" data-style="Default" data-pin="No Pinning"><i class="fa fa-search"></i></div><div class="pug-inlinearrow"><i class="fa fa-chevron-down"></i></div>
		<div class="pug-dropdown">
			<div class="pug-dropdowncell">
				<div class="pug-menulink" data-show="pug-show-item" data-url="" data-target="Same Window" data-style="Default" data-pin="No Pinning"><div class="pugly-insertsearch">Search</div></div><div class="pug-menulink pug-columnedit" data-show="pug-show-columns"><i class="fa fa-edit"></i> Edit</div>
			</div>
		</div>
	</div>
</div>
<div class="pug-save-cartitem pug-hide">
	<div class="pug-menuitem">
		<div class="pug-menulink pug-parentlink" data-show="pug-show-parent" data-url="" data-target="Same Window" data-style="Default" data-pin="No Pinning"><i class="fa fa-shopping-bag"></i> <div class="pugly-insertcart">Cart</div></div><div class="pug-inlinearrow"><i class="fa fa-chevron-down"></i></div>
		<div class="pug-dropdown">
			<div class="pug-dropdowncell">
				<div class="pug-insertdropdown"><i class="fa fa-tasks"></i> Create Dropdown</div>
			</div>
		</div>
	</div>
</div>
<div class="pug-settings">
	<div class="pug-setting pug-show-parent">
		<div class="pug-parenttoolup pug-inlinetoolbtn"><i class="fa fa-long-arrow-left"></i></div>
		<div class="pug-parenttooldown pug-inlinetoolbtn"><i class="fa fa-long-arrow-right"></i></div>
		<div class="pug-parenttoolclone pug-inlinetoolbtn"><i class="fa fa-clone"></i></div>
		<div class="pug-parenttooldelete pug-inlinetoolbtn"><i class="fa fa-trash-o"></i></div>
		<label>Item Text</label>
		<textarea class="pug-setting-text"></textarea>
		<label>Link URL</label>
		<textarea class="pug-setting-url"></textarea>
		<div class="pug-selectlink pug-fulltoolbtn"><i class="fa fa-link"></i> Select Link</div>
		<label>Open link in</label>
		<select class="pug-setting-target">
			<option>Same Window</option>
			<option>New Window</option>
		</select>
		<label>Item Style</label>
		<select class="pug-setting-style">
			<option>Default</option>
			<option>Highlighted Button</option>
		</select>
		<label>Mobile Pin</label>
		<select class="pug-setting-pinning">
			<option>No Pinning</option>
			<option>Pin on Mobile</option>
		</select>
		<label>Move to</label>
		<select class="pug-setting-move">
			<option>Select...</option>
			<option>Right Side</option>
			<option>Left Side</option>
			<option>Top Bar</option>
		</select>
	</div>
	<div class="pug-setting pug-show-item">
		<div class="pug-toolup pug-inlinetoolbtn"><i class="fa fa-long-arrow-up"></i></div>
		<div class="pug-tooldown pug-inlinetoolbtn"><i class="fa fa-long-arrow-down"></i></div>
		<div class="pug-tooldelete pug-inlinetoolbtn"><i class="fa fa-trash-o"></i></div>
		<label>Item Text</label>
		<input class="pug-setting-text">
		<label>Link URL</label>
		<input class="pug-setting-url">
		<div class="pug-selectlink pug-fulltoolbtn"><i class="fa fa-link"></i> Select Link</div>
		<label>Open link in</label>
		<select class="pug-setting-target">
			<option>Same Window</option>
			<option>New Window</option>
		</select>
	</div>
	<div class="pug-setting pug-show-menu">
		<label>Item Text</label>
		<input class="pug-setting-text">
		<label>Item Style</label>
		<select class="pug-setting-style">
			<option>Default</option>
			<option>Highlighted Button</option>
		</select>
	</div>
	<div class="pug-setting pug-show-hr">
		<div class="pug-toolup pug-inlinetoolbtn"><i class="fa fa-long-arrow-up"></i></div>
		<div class="pug-tooldown pug-inlinetoolbtn"><i class="fa fa-long-arrow-down"></i></div>
		<div class="pug-tooldelete pug-inlinetoolbtn"><i class="fa fa-trash-o"></i></div>
	</div>
	<div class="pug-setting pug-show-image">
		<div class="pug-toolup pug-inlinetoolbtn"><i class="fa fa-long-arrow-up"></i></div>
		<div class="pug-tooldown pug-inlinetoolbtn"><i class="fa fa-long-arrow-down"></i></div>
		<div class="pug-tooldelete pug-inlinetoolbtn"><i class="fa fa-trash-o"></i></div>
		<label>Image</label>
		<div class="pug-selectimage pug-fulltoolbtn"><i class="fa fa-image"></i> Select Image</div>
		<label>Link URL</label>
		<input class="pug-setting-url">
		<div class="pug-selectlink pug-fulltoolbtn"><i class="fa fa-link"></i> Select Link</div>
		<label>Open link in</label>
		<select class="pug-setting-target">
			<option>Same Window</option>
			<option>New Window</option>
		</select>
	</div>
	<div class="pug-setting pug-show-logo">
		<label>Image</label>
		<div class="pug-selectimage pug-fulltoolbtn"><i class="fa fa-image"></i> Select Image</div>
	</div>
	<div class="pug-setting pug-show-columns">
		<div class="pug-parenttoolup pug-inlinetoolbtn"><i class="fa fa-long-arrow-left"></i></div>
		<div class="pug-parenttooldown pug-inlinetoolbtn"><i class="fa fa-long-arrow-right"></i></div>
		<div class="pug-parenttooldelete pug-inlinetoolbtn"><i class="fa fa-trash-o"></i></div>
		<div class="pug-inserttext pug-fulltoolbtn pug-addmargin pug-btninsertitems"><i class="fa fa-align-justify"></i> Insert Text</div>
		<div class="pug-insertimage pug-fulltoolbtn pug-addmargin pug-btninsertitems"><i class="fa fa-image"></i> Insert Image</div>
		<div class="pug-insertseparator pug-fulltoolbtn pug-addmargin pug-btninsertitems"><i class="fa fa-ellipsis-h"></i> Insert Separator</div>
		<div class="pug-insertcolumn pug-fulltoolbtn pug-addmargin pug-btninsertitems"><i class="fa fa-columns"></i> Insert Column</div>
	</div>
	<div class="pug-setting pug-show-inserts">
		<div class="pug-insertmenuparent pug-fulltoolbtn pug-addmargin pug-btninsertitems"><i class="fa fa-cube"></i> Insert Item</div>
		<div class="pug-insertcartitem pug-fulltoolbtn pug-addmargin pug-btninsertitems"><i class="fa fa-shopping-cart"></i> Insert Cart</div>
		<div class="pug-insertsearchitem pug-fulltoolbtn pug-addmargin pug-btninsertitems"><i class="fa fa-search"></i> Insert Search</div>
	</div>
</div>
</div>
<?php }

function pugly_media() {
	wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'pugly_media');

function puglymenuheader() {
?>
<style>
	@media only screen and (max-width: <?php $puglybreakpoint = get_option('pugly_menubreakpoint'); if (empty($puglybreakpoint)) { echo '800'; } else { echo esc_attr($puglybreakpoint); } ?>px) {
		.pug-topbar, .pug-menucell .pug-menuitem {
			display: none !important;
		}
		.pug-menucell .pug-logoitem, .pug-menucell .pug-mobilemenubutton, .pug-menucell .pug-hamburger {
			display: inline-block !important;
		}
		.pug-menucell .pug-pinonmobile {
			display: inline-block !important;
		}
	}
</style>
<?php
$puglymenusource = get_option('pugly_menucodehtml');
if (empty($puglymenusource)) { ?>
<div class="pug-barcontainer">
	<div class="pug-menutable pug-maxwidth-container">
		<div class="pug-menucell pug-topbar" style="text-align:center;">
			Please build your Pugly Menu in the Dashbaord.
		</div>
	</div>
</div>
<?php } else {
	echo '<div class="pug-menufrontend">';
				$puglymenusource = get_option('pugly_menucodehtml');
					$arr = array(
					'div' => array(
						'class' => array(),
						'style'  => array(),
						'data-show'  => array(),
						'data-url'  => array(),
						'data-target'  => array(),
						'data-style'  => array(),
						'data-pin'  => array(),
					),
					'i' => array(
						'class' => array(),
						'style'  => array(),
					),
					'img' => array(
						'class' => array(),
						'style'  => array(),
						'data-show'  => array(),
						'data-url'  => array(),
						'data-target'  => array(),
						'data-style'  => array(),
						'data-pin'  => array(),
						'src'  => array(),
					),
				);
			echo wp_kses( $puglymenusource, $arr );
		echo '</div>';
}
}
add_action('wp_head', 'puglymenuheader');

require_once(dirname(__FILE__) . '/pugly-style.php');

function pugly_menu_head() {
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	global $woocommerce;
	echo '<div class="pugly-cart-content" style="display:none;">'.$woocommerce->cart->get_cart_total().'</div>';
}
$search_form = '<form method="get" class="pugly-search-container" action="'. esc_url(home_url('/')) .'"><input type="text" name="s" id="s" placeholder="Search..."></form>';
echo '<div class="pugly-search-content" style="display:none;">'.$search_form.'</div>';
}
add_action('wp_head', 'pugly_menu_head');
?>