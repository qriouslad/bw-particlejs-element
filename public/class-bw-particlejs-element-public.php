<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Bw_Particlejs_Element
 * @subpackage Bw_Particlejs_Element/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bw_Particlejs_Element
 * @subpackage Bw_Particlejs_Element/public
 * @author     Bowo <hello@bowo.io>
 */
class Bw_Particlejs_Element_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bw_Particlejs_Element_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bw_Particlejs_Element_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bw-particlejs-element-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bw_Particlejs_Element_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bw_Particlejs_Element_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bw-particlejs-element-public.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( $this->plugin_name . 'particlesjs', plugin_dir_url( __FILE__ ) . 'js/particles.js', array(), $this->version, false );

	}

	/**
	 * Function to create [particle element="name"] shortcode that renders the element with a particle.js background
	 */
	public function particlejs_shortcode( $atts ) {

		$atts = shortcode_atts(
			array( 
				'minheight' => '80px',
				'bgcolor' => '#333333',
				'textcolor' => '#ffffff',
				'heading' => 'Content Heading',
				'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.

',
			),
			$atts
		);

		$jsonconfig = get_option( 'pjs_json_config' );

		ob_start();
		?>

		<div id="particlesbg" style="position:relative; text-align:center; padding:1.5em; min-height:<?php echo esc_attr( $atts['minheight'] ); ?>; color:<?php echo esc_attr( $atts['textcolor'] ); ?>; background:<?php echo esc_attr( $atts['bgcolor'] ); ?>;">
			<h2 style="color:<?php echo esc_attr( $atts['textcolor'] ); ?>;"><?php echo $atts['heading']; ?></h2>
			<p><?php echo $atts['description']; ?></p>
		</div>

		<script type="text/javascript">

			particlesJS( 'particlesbg', <?php echo $jsonconfig; ?> );
		</script>

		<?php
		return ob_get_clean();

	}

	/**
	 * Registers all shortcodes at once
	 */
	public function register_shortcodes() {

		add_shortcode( 'particles', array( $this, 'particlejs_shortcode' ) );

	}

	/**
	 * Function to load css related to the particle.js element
	 */
	public function particlejs_style_output() {

		$elementid = get_option( 'pjs_elementid' );

		?>

		<style>

			#<?php echo $elementid; ?> {
				position: relative;
			}

		</style>

		<?php

	}


	/**
	 * Function to load plugin settings and output particle.js scripts to footer
	 */
	public function particlejs_script_output() {

		$elementid = get_option( 'pjs_elementid' );

		$jsonconfig = get_option( 'pjs_json_config' );

		?>

		<script type="text/javascript">
			particlesJS( '<?php echo esc_attr( $elementid ); ?>', 

			<?php

			if ( ! empty( $jsonconfig ) ) {

				echo $jsonconfig;

			} else {

				include 'partials/bw-particlejs-element-public-particlesjs-default-json.php';

			}

			?>

			);
		</script>

		<?php
	} 

}
