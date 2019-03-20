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
			array( 'element' => 'particles-bg' ),
			$atts
		);

		ob_start();
		?>

		<div id="particles-bg" style="background:#000;"></div>

		<?php
		return ob_get_clean();

	}

	/**
	 * Registers all shortcodes at once
	 */
	public function register_shortcodes() {

		add_shortcode( 'particlejs', array( $this, 'particlejs_shortcode' ) );

	}

	/**
	 * Function to load plugin settings and output particle.js scripts to footer
	 */
	public function particlejs_output() {
		?>
			<script type="text/javascript">
				particlesJS('particles-bg', 
				{
				  "particles": {
				    "number": {
				      "value": 180,
				      "density": {
				        "enable": true,
				        "value_area": 800
				      }
				    },
				    "color": {
				      "value": "#ffffff"
				    },
				    "shape": {
				      "type": "circle",
				      "stroke": {
				        "width": 0,
				        "color": "#000000"
				      },
				      "polygon": {
				        "nb_sides": 5
				      },
				      "image": {
				        "src": "img/github.svg",
				        "width": 100,
				        "height": 100
				      }
				    },
				    "opacity": {
				      "value": 0.5,
				      "random": false,
				      "anim": {
				        "enable": false,
				        "speed": 1,
				        "opacity_min": 0.1,
				        "sync": false
				      }
				    },
				    "size": {
				      "value": 3,
				      "random": true,
				      "anim": {
				        "enable": false,
				        "speed": 40,
				        "size_min": 0.1,
				        "sync": false
				      }
				    },
				    "line_linked": {
				      "enable": true,
				      "distance": 150,
				      "color": "#ffffff",
				      "opacity": 0.4,
				      "width": 1
				    },
				    "move": {
				      "enable": true,
				      "speed": 6,
				      "direction": "none",
				      "random": false,
				      "straight": false,
				      "out_mode": "out",
				      "bounce": false,
				      "attract": {
				        "enable": false,
				        "rotateX": 600,
				        "rotateY": 1200
				      }
				    }
				  },
				  "interactivity": {
				    "detect_on": "canvas",
				    "events": {
				      "onhover": {
				        "enable": true,
				        "mode": "grab"
				      },
				      "onclick": {
				        "enable": true,
				        "mode": "push"
				      },
				      "resize": true
				    },
				    "modes": {
				      "grab": {
				        "distance": 400,
				        "line_linked": {
				          "opacity": 1
				        }
				      },
				      "bubble": {
				        "distance": 400,
				        "size": 40,
				        "duration": 2,
				        "opacity": 8,
				        "speed": 3
				      },
				      "repulse": {
				        "distance": 200,
				        "duration": 0.4
				      },
				      "push": {
				        "particles_nb": 4
				      },
				      "remove": {
				        "particles_nb": 2
				      }
				    }
				  },
				  "retina_detect": true
				}

				);
			</script>
		<?php
	} 

}
