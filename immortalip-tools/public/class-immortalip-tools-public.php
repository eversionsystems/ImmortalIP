<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.toptal.com/resume/andrew-schultz
 * @since      1.0.0
 *
 * @package    Immortalip_Tools
 * @subpackage Immortalip_Tools/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Immortalip_Tools
 * @subpackage Immortalip_Tools/public
 * @author     Andrew Schultz <andrew.schultz@toptal.com>
 */
class Immortalip_Tools_Public {

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
		 * defined in Immortalip_Tools_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Immortalip_Tools_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/immortalip-tools-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
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
		 * defined in Immortalip_Tools_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Immortalip_Tools_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 
		wp_enqueue_script( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.12.1', true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/immortalip-tools-public.js', array( 'jquery' ), $this->version, true );

		/*
		 * Remove AJAX Calculations for now
		$args = array(
			'nonce' => wp_create_nonce( 'calculate_sensitivity_values' ),
			'ajaxurl'   => admin_url( 'admin-ajax.php' )
		);

		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/immortalip-tools-public.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name, 'immortal', $args );
		wp_enqueue_script( $this->plugin_name );
		*/
	}
	
	/**
	 * Shortcode for valuation tool
	 *
	 * @since	1.0.0
	 */
	function init_shortcodes() {
		add_shortcode( 'implied_sens_val_tool', array( $this, 'implied_sensitivity_valuation_tool' ) );
	}
	
	/**
	 * Calculate values for the valuation tool 
	 *
	 * @since	1.0.0
	 */
	function get_sensitivity_valuation_values() {
		check_ajax_referer( 'calculate_sensitivity_values', 'security' );
		$assets_management_val = $_POST['assests_management_val'];
		
		
		write_log($assets_management_val);
		echo json_encode( array( 'finalValue' => $assets_management_val ) );
		wp_die();
	}
	
	/**
	 * Create a tool to calculate financial figures
	 *
	 * @since	1.0.0
	 *
	 */
	public function implied_sensitivity_valuation_tool() {
		//ob_start();
		
		$output = '
		<div class="et_pb_section  et_pb_section_0 et_section_regular">

			<div class=" et_pb_row et_pb_row_0">

				<div class="et_pb_column et_pb_column_4_4  et_pb_column_0">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_0">
						<h2>Implied Enterprise Valuation Sensitivity Tool
					</div>
					<!-- .et_pb_text -->
					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_1">
						<h3>Immortalip PTY LTD</h3>
						<h4>Round One Equity Capital Raise</h4>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->

		</div>
		<!-- .et_pb_section -->
		<div class="et_pb_section  et_pb_section_1 et_section_regular">

			<div class=" et_pb_row et_pb_row_1">

				<div class="et_pb_column et_pb_column_1_2  et_pb_column_1">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_2">
						<h3>ENTERPRISE & REVENUE MODEL & SENSITIVITIES YOU CAN MODIFY</h3>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_2  et_pb_column_2">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_3">

					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row  et_pb_equal_columns-->
			<div class=" et_pb_row et_pb_row_2">

				<div class="et_pb_column et_pb_column_1_3  et_pb_column_3">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_4">
						<label for="assets_management">FUNDS UNDER MANAGEMENT ( AUD )</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_4">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_5">
						<input type="text" id="assets_management" class="slider-input" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_5">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_6">
						<div id="assets_management_slider"></div>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_3 et_pb_equal_columns">

				<div class="et_pb_column et_pb_column_1_3  et_pb_column_6">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_7">
						<label for="fund_yield">FUND PERFORMANCE %</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_7">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_8">
						<input type="text" id="fund_yield" class="slider-input" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_8">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_9">
						<div id="fund_yield_slider"></div>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_4">

				<div class="et_pb_column et_pb_column_1_3  et_pb_column_9">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_10">
						<label for="management_fee">Management Fee %</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_10">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_11">
						<input type="text" id="management_fee" class="slider-input" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_11">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_12">
						<div id="management_fee_slider"></div>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_5">

				<div class="et_pb_column et_pb_column_1_3  et_pb_column_12">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_13">
						<label for="performance_fee">Performance Fee %</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_13">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_14">
						<input type="text" id="performance_fee" class="slider-input" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_14">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_15">
						<div id="performance_fee_slider"></div>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_6">

				<div class="et_pb_column et_pb_column_1_3  et_pb_column_15">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_16">
						<label for="your_shares">YOUR SHARE (0.267%) PARCELS OF 0.267%</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_16">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_17">
						<input type="text" id="your_shares" class="slider-input" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_3  et_pb_column_17">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_18">
						<div id="your_shares_slider"></div>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->

		</div>
		<!-- .et_pb_section -->
		<div class="et_pb_section  et_pb_section_2 et_section_regular">

			<div class=" et_pb_row et_pb_row_7">

				<div class="et_pb_column et_pb_column_1_2  et_pb_column_18">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_19">
						<h2>Results</h2>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_2  et_pb_column_19">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_20">
						
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_8">

				<div class="et_pb_column et_pb_column_1_2  et_pb_column_20">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_21">
						<label for="group_gross_revenue">Group Gross Revenue $</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_2  et_pb_column_21">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_22">
						<input type="text" id="group_gross_revenue" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_9">

				<div class="et_pb_column et_pb_column_1_2  et_pb_column_22">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_23">
						<label for="group_ebitda_npat">GROUP EBITDA ( EBITDA ) $</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_2  et_pb_column_23">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_24">
						<input type="text" id="group_ebitda_npat" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_10">

				<div class="et_pb_column et_pb_column_1_2  et_pb_column_24">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_25">
						<label for="implied_ent_val">IMPLIED ENTERPRISE VALUATION IEV ( 15X GGR )</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_2  et_pb_column_25">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_26">
						<input type="text" id="implied_ent_val" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_11">

				<div class="et_pb_column et_pb_column_1_2  et_pb_column_26">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_27">
						<label for="iev_return_on_investment">RETURN ON INVESTMENT $ ( PER 0.267% SHAREHOLDING )</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_2  et_pb_column_27">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_28">
						<input type="text" id="iev_return_on_investment" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->
			<div class=" et_pb_row et_pb_row_12">

				<div class="et_pb_column et_pb_column_1_2  et_pb_column_28">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_29">
						<label for="return_on_investment">GROSS REVENUE PER SHARE $ ( EBITDA / 100,000 SHARES )</label>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->
				<div class="et_pb_column et_pb_column_1_2  et_pb_column_29">

					<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_30">
						<input type="text" id="return_on_investment" readonly>
					</div>
					<!-- .et_pb_text -->
				</div>
				<!-- .et_pb_column -->

			</div>
			<!-- .et_pb_row -->

		</div>
		<!-- .et_pb_section -->';
		
		//$output = ob_end_flush();
		
		return $output;

	}

}
