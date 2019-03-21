<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Bw_Particlejs_Element
 * @subpackage Bw_Particlejs_Element/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bw_Particlejs_Element
 * @subpackage Bw_Particlejs_Element/admin
 * @author     Bowo <hello@bowo.io>
 */
class Bw_Particlejs_Element_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bw-particlejs-element-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bw-particlejs-element-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add settings page as sub-menu of 'Settings'
	 */
	public function particlesjs_menu_page() {

		add_options_page(
			'Settings for Particles.js Element',
			'Particles.js Element',
			'manage_options',
			'particlesjs_element',
			array( $this, 'settings_menu_html' ),
		);
	}


	/**
	 * Register options, section and fields on the settings page
	 */
	public function particlesjs_settings() {

		// Register options group and options
		register_setting( 'particlesjs', 'pjs_urlpath' );
		register_setting( 'particlesjs', 'pjs_elementid' );
		register_setting( 'particlesjs', 'pjs_json_config' );

		// Add a section to the page
		add_settings_section(
			'particlejs_settings_section1',
			'Settings for Particles.js Element',
			array( $this, 'particlejs_settings_section1_cb' ),
			'particlesjs',
		);

		// Add a field for page slug
		add_settings_field(
			'particlejs_field_urlpath',
			'Page URL Path',
			array( $this, 'particlejs_field_urlpath_cb' ),
			'particlesjs',
			'particlejs_settings_section1',
		);

		// Add a field for element #id
		add_settings_field(
			'particlejs_field_elementid',
			'Element #ID',
			array( $this, 'particlejs_field_elementid_cb' ),
			'particlesjs',
			'particlejs_settings_section1',
		);

		// Add a field for JSON config
		add_settings_field(
			'particlejs_field_json',
			'JSON Configuration',
			array( $this, 'particlejs_field_json_cb' ),
			'particlesjs',
			'particlejs_settings_section1',
		);

	}

	public function particlejs_settings_section1_cb() {

		echo '<p>The settings in this section enables <a href="https://vincentgarreau.com/particles.js/">particles.js</a> animated background on a page, in a particular HTML element with the specified JSON configuration. If you\'re using a <a href="https://www.wpbeginner.com/beginners-guide/best-drag-and-drop-page-builders-for-wordpress/">page builder</a>, you will likely apply this to a full-width row module with a custom ID you specify in the <a href="https://help.artbees.net/how-to-s/elementor/assigning-an-id-or-class-to-an-element-in-elementor">advanced settings</a> of the module.</p>';
		
	}

	public function particlejs_field_urlpath_cb() {

		$elementid = get_option( 'pjs_urlpath' );

		echo '<input type="text" size="43" name="pjs_urlpath" value="' . esc_attr( $elementid ) . '" placeholder="e.g. /what-we-do/">';

		echo '<p class="description">Enter only the highlighted part of the page URL <br />e.g. www.yoursite.com<mark>/what-we-do/</mark> <br />Defaults to homepage if left empty.</p>';

	}

	public function particlejs_field_elementid_cb() {

		$elementid = get_option( 'pjs_elementid' );

		echo '<input type="text" size="43" name="pjs_elementid" value="' . esc_attr( $elementid ) . '" placeholder="e.g. particlesbg-row">';

		echo '<p class="description">The ID of the HTML element on the page to put <br />the particles.js animation in. You will need to set <br /><strong>"position: relative"</strong> for this element in your CSS.</p>';

	}

	public function particlejs_field_json_cb() {

		$jsonconfig = get_option( 'pjs_json_config' );

		echo '<textarea rows="10" cols="45" name="pjs_json_config">' . esc_html( $jsonconfig ) . '</textarea>';

		echo '<p class="description">Get JSON config from the controls box on the <br />particles.js <a href="https://vincentgarreau.com/particles.js/">demo site</a>. If left empty, a default <br />config wll be used.</p>';

	}

	/**
	 * Display form for changing settings
	 */
	public function settings_menu_html() {

		// Check user capabilities
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		include 'partials/bw-particlejs-element-admin-display.php';
		
	}



}