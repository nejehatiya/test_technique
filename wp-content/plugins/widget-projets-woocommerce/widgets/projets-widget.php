<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor projets Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Projets_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve projets woocomerce widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'projets_woocomerce';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve projets widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Widget projets woocomerce', 'elementor-projets-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve projets widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the projets widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the projets widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'widget', 'projets', 'woocomerce' ];
	}

	/**
	 * Register projets widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-projets-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
            'products_ids',
            [
                'label' => __('Sélectionner un ou plusieurs produits.', 'text_domain'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_products_list(),
				'multiple'=>true,
            ]
        );

		$this->end_controls_section();

	}

	/**
	 * Render projets widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

        echo $this->renderHtml($settings);

	}
	/**
     * Récupère la liste des catégories de produits WooCommerce.
     *
     * @return array
     */
    private function get_products_list() {
		
		$options = [];

        $args = array(
			'post_type'      => 'product',
			'posts_per_page' => 1000,
		);
	
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
			global $product;
			$options[get_the_ID()] = get_the_title();
		endwhile;
	
		wp_reset_query();

        return $options;
    }


	private function renderHtml($setting){
		$_pf = new WC_Product_Factory();  

		$products_list = [];  
		$images_urls = plugins_url();
		$products_ids = $setting['products_ids'];
		if(!is_array($products_ids) || empty($products_ids)){
			return "empty list";
		}
		echo "<div class='product-list product-list-slick'>";
			for($i=0;$i<count($products_ids);$i++){
				// check product
				$_product = $_pf->get_product($products_ids[$i]);
				//
				$products_list[$_product->id] = $_product->name;
				// get product mission
				$product_missoin = explode('|',get_post_meta($_product->id, '_custom_product_missions', true));
				// start html items
				echo "<div class='product-item' id='item-".$_product->id."' >";

					echo "<div class='inner'>";

						echo "<div class='product-item-header'>";
							echo "<p class='title'><img src='".$images_urls."/widget-projets-woocommerce/assets/images/ecran-de-projection-1.svg'  alt='".$_product->name."' />".$_product->name."</p>";
						echo "</div>";
						
						echo "<div class='product-item-description'>";
							echo $_product->description;
						echo "</div>";

						echo "<div class='product-item-budget'>";
							echo "<p class='title'><img src='".$images_urls."/widget-projets-woocommerce/assets/images/budget.svg'  alt='BUDGET' />BUDGET</p>";
							echo "<p class='infos'>".get_post_meta($_product->id, '_custom_product_budget', true)."</p>";
						echo "</div>";

						echo "<div class='product-item-mission'>";
							echo "<p class='title'><img src='".$images_urls."/widget-projets-woocommerce/assets/images/mission.svg'  alt='mission' />Mission</p>";
							echo "<div  class='infos'>".implode('<br>',$product_missoin)."</div>";
						echo "</div>";

					echo "</div>";

				echo "</div>";
			}
		echo "</div>";

		echo "<div class='product-list-nav'>";
			echo "<ul>";
				$index = 0;
				foreach($products_list as $key=>$value){
					echo "<li><button class='".(!$index?"active":"")."'><input type='hidden' value='item-".$key."' /> ".$value."</button></li>";
					$index += 1;
				}
			echo "</ul>";
			echo "<button class='play-button'><img src='".$images_urls."/widget-projets-woocommerce/assets/images/play.svg'  alt='".$_product->name."' /><span class='text'>Play</span></button>";
		echo "</div>";
	}
}