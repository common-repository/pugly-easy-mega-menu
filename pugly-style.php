<?php
function pugly_stylemenu_create_menu() {
	add_menu_page('Pugly Style', 'Pugly Style', 'administrator', __FILE__, 'pugly_stylemenu_settings_page' , 'dashicons-admin-customizer', 11);
	add_action( 'admin_init', 'register_pugly_stylemenu_settings' );
}
add_action('admin_menu', 'pugly_stylemenu_create_menu');

function register_pugly_stylemenu_settings() {
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylemenubackgroundcolor');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylemenutextcolor');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylemenumaxwidth');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylemenumaxwidthtype');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylebarbackgroundcolor');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylebartextcolor');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_styledropdownwidth');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylepadding');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylefontsize');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylefont');
	register_setting( 'pugly-menustyle-settings-group', 'pugly_stylelogowidth');
}

function pugly_menustyles_admin_enqueue()
{
	wp_register_script( 'pugly-menustyles-admin-script', plugin_dir_url( __FILE__ ) . '/js/style-admin.js', array('jquery'), '3.5.1', true );
	wp_enqueue_script( 'pugly-menustyles-admin-script' );
	
    wp_register_style( 'pugly-menustyles-admin-stylesheet', plugin_dir_url( __FILE__ ) . '/css/styles.css' );
	wp_enqueue_style( 'pugly-menustyles-admin-stylesheet' );
	
	wp_register_script( 'pugly-reviews-admin-color', plugin_dir_url( __FILE__ ) . '/js/jscolor.js', array(), 'null', true );
	wp_enqueue_script( 'pugly-reviews-admin-color' );
}
 
add_action( 'admin_enqueue_scripts', 'pugly_menustyles_admin_enqueue' );

function pugly_stylemenu_settings_page() {
?>
<form method="post" action="options.php">
    <?php settings_fields( 'pugly-menustyle-settings-group' ); ?>
    <?php do_settings_sections( 'pugly-menustyle-settings-group' ); ?>
	<h2>Menu</h2>
	<table>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Background</td>
			<td><input name="pugly_stylemenubackgroundcolor" id="pugly_stylemenubackgroundcolor" style="width:165px; border:0px;" value="<?php $puglystylemenubackgroundcolor = get_option('pugly_stylemenubackgroundcolor'); if (empty($puglystylemenubackgroundcolor)) { echo '#ffffff'; } else { echo esc_attr($puglystylemenubackgroundcolor); } ?>" data-jscolor="{mode:'HSV', position:'right'}"></td>
		</tr>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Text</td>
			<td><input name="pugly_stylemenutextcolor" id="pugly_stylemenutextcolor" style="width:165px; border:0px;" value="<?php $puglystylemenutextcolor = get_option('pugly_stylemenutextcolor'); if (empty($puglystylemenutextcolor)) { echo '#000000'; } else { echo esc_attr($puglystylemenutextcolor); } ?>" data-jscolor="{mode:'HSV', position:'right'}"></td>
		</tr>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Max Width</td>
			<td>
				<input style="width:108px;" name="pugly_stylemenumaxwidth" id="pugly_stylemenumaxwidth" type="number" value="<?php $puglystylemenumaxwidth = get_option('pugly_stylemenumaxwidth'); if (empty($puglystylemenumaxwidth)) { echo '1200'; } else { echo esc_attr($puglystylemenumaxwidth); } ?>">
				<select style="width:50px;" name="pugly_stylemenumaxwidthtype" id="pugly_stylemenumaxwidthtype">
					<option value="px" <?php $puglystylemenumaxwidthtype = get_option('pugly_stylemenumaxwidthtype'); if ($puglystylemenumaxwidthtype == 'px') { echo "selected"; } ?>>px</option>
					<option value="%" <?php $puglystylemenumaxwidthtype = get_option('pugly_stylemenumaxwidthtype'); if ($puglystylemenumaxwidthtype == '%') { echo "selected"; } ?>>%</option>
				</select>
			</td>
		</tr>
	</table>
	<hr>
	<h2>Dropdown / Bar</h2>
	<table>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Background</td>
			<td><input name="pugly_stylebarbackgroundcolor" id="pugly_stylebarbackgroundcolor" style="width:165px; border:0px;" value="<?php $puglystylebarbackgroundcolor = get_option('pugly_stylebarbackgroundcolor'); if (empty($puglystylebarbackgroundcolor)) { echo '#005ba1'; } else { echo esc_attr($puglystylebarbackgroundcolor); } ?>" data-jscolor="{mode:'HSV', position:'right'}"></td>
		</tr>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Text</td>
			<td><input name="pugly_stylebartextcolor" id="pugly_stylebartextcolor" style="width:165px; border:0px;" value="<?php $puglystylebartextcolor = get_option('pugly_stylebartextcolor'); if (empty($puglystylebartextcolor)) { echo '#ffffff'; } else { echo esc_attr($puglystylebartextcolor); } ?>" data-jscolor="{mode:'HSV', position:'right'}"></td>
		</tr>
	</table>
	<hr>
	<h2>Dropdown</h2>
	<table>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Width (px)</td>
			<td><input name="pugly_styledropdownwidth" id="pugly_styledropdownwidth" type="number" value="<?php $puglystyledropdownwidth = get_option('pugly_styledropdownwidth'); if (empty($puglystyledropdownwidth)) { echo '200'; } else { echo esc_attr($puglystyledropdownwidth); } ?>"></td>
		</tr>
	</table>
	<hr>
	<h2>General</h2>
	<table>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Padding (px)</td>
			<td>
			<select style="width:165px;" name="pugly_stylepadding" id="pugly_stylepadding">
				<option value="5" <?php $$puglystylepadding = get_option('pugly_stylepadding'); if ($$puglystylepadding == '5') { echo "selected"; } ?>>5</option>
				<option value="7.5" <?php $$puglystylepadding = get_option('pugly_stylepadding'); if ($$puglystylepadding == '7.5') { echo "selected"; } ?>>7.5</option>
			</select>
			</td>
		</tr>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Font Size (px)</td>
			<td><input name="pugly_stylefontsize" id="pugly_stylefontsize" type="number" value="<?php $puglystylefontsize = get_option('pugly_stylefontsize'); if (empty($puglystylefontsize)) { echo '16'; } else { echo esc_attr($puglystylefontsize); } ?>"></td>
		</tr>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Font</td>
			<td>
			<select style="width:165px;" name="pugly_stylefont" id="pugly_stylefont">
				<option value="Open Sans" <?php $puglystylefont = get_option('pugly_stylefont'); if ($puglystylefont == 'Open Sans') { echo "selected"; } ?>>Open Sans</option>
				<option value="Montserrat" <?php $puglystylefont = get_option('pugly_stylefont'); if ($puglystylefont == 'Montserrat') { echo "selected"; } ?>>Montserrat</option>
				<option value="Oswald" <?php $puglystylefont = get_option('pugly_stylefont'); if ($puglystylefont == 'Oswald') { echo "selected"; } ?>>Oswald</option>
				<option value="Roboto" <?php $puglystylefont = get_option('pugly_stylefont'); if ($puglystylefont == 'Roboto') { echo "selected"; } ?>>Roboto</option>
				<option value="Merriweather" <?php $puglystylefont = get_option('pugly_stylefont'); if ($puglystylefont == 'Merriweather') { echo "selected"; } ?>>Merriweather</option>
			</select>
			</td>
		</tr>
	</table>
	<hr>
	<h2>Logo</h2>
	<table>
		<tr>
			<td style="width:95px; text-align:right; padding:5px;">Width (px)</td>
			<td><input name="pugly_stylelogowidth" id="pugly_stylelogowidth" type="number" value="<?php $puglystylelogowidth = get_option('pugly_stylelogowidth'); if (empty($puglystylelogowidth)) { echo '150'; } else { echo esc_attr($puglystylelogowidth); } ?>"></td>
		</tr>
	</table>
<div class="pug-stylebuttons">
	<?php submit_button(); ?>
	<p class="submit"><input type="submit" style="width:58px;" id="pug-resetstyles" class="button button-primary" value="Reset"></p>
</div>
</form>
<?php }

function puglystyle_rootcss() {
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
   <?php
}
add_action('wp_head', 'puglystyle_rootcss');