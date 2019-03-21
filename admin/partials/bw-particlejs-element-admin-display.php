<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Bw_Particlejs_Element
 * @subpackage Bw_Particlejs_Element/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap particlesjs-settings">

	<div class="layout-half">

		<form action="options.php" method="post">

			<?php

			settings_fields( 'particlesjs' );

			do_settings_sections( 'particlesjs' );

			submit_button( 'Save Settings' );

			?>

		</form>

	</div>

	<div class="layout-half">

		<h2>Particles.js Element via Shortcode</h2>

		<p>You can <a href="https://www.competethemes.com/blog/how-to-shortcodes-wordpress/">use a shortcode</a> in a post or page, to ouput a div element with particles.js animation applied as the background. Here's an example:</p>

		<div class="code-sample">

			<p class="shortcode-sample">[particles <strong>minheight</strong>="200px" <strong>bgcolor</strong>="#840000" <strong>textcolor</strong>="#ffffff" <strong>heading=</strong>"Awesome Title" <strong>description</strong>="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus."]</p>

		</div>

		<p>If we remove the parameter value, the shortcode looks like this:</p>

		<div class="code-sample">

			<p class="shortcode-sample">[particles <strong>minheight</strong>="" <strong>bgcolor</strong>="" <strong>textcolor</strong>="" <strong>heading=</strong>"" <strong>description</strong>=""]</p>

		</div>

		<p>The <strong><em>minheight</em></strong> attribute specifies the minimum height of the element in pixels, the <strong><em>bgcolor</em></strong> attribute specifies the background color, and <strong><em>textcolor</em></strong> specifies the color of the text inside the element. Colors need to use the <a href="https://www.color-hex.com/">hex format</a>. The <strong><em>heading</em></strong> and <strong><em>description</em></strong> attributes are for the actual content that will be displayed inside the particles.js element.</p>

		<p>Note that the particle.js animation will use the JSON configuration specified on this page.</p>

	</div>

</div>