<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$sala = get_post(get_field("sala"));
$movie = get_post(get_field("filme"));
$horario = get_field("exibicao");
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div data-price="<?php echo $product->get_price() ?>" id="product-<?php the_ID(); ?>" <?php wc_product_class( 'single-product', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<?php 
	$seats = get_field("assentos", $sala->ID); ?>
	<div class="row py-4">
		<div class="col-8">
			<div class="single-product-seats">
				<table class="single-product-seats-table">
					<tbody class="d-flex flex-column gap-2">
						<?php 
						$posX = (int)$seats['quantidade_x'];
						$posY = (int)$seats['quantidade_y'];
						for ($i = 0; $i < $posX; $i++ ): ?>
							<tr class="d-flex gap-2">
								<?php for ($j = 0; $j < $posY; $j++): ?>
									<td id="<?php echo $i.'-'.$j ?>" class="single-product-seats-item">
										<?php echo $i.'-'.$j ?>
									</td>	
								<?php endfor; ?>
							</tr>
						<?php endfor; ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-4">
			<div class="single-product-order">
				<h1 class="single-product-order-title">Sala 01</h1>

				<ul class="single-product-order-info">
					<li>Filme: <?php echo $movie->post_title ?></li>
					<li>Horário: <?php echo $horario ?></li>
				</ul>

				<hr class="line bright my-4">

				<form class="d-flex flex-column" action="">
					<input type="hidden" name="seat" id="seats">
					<input type="hidden" name="quantity" id="quantity">
					<span class="single-product-order-price">Total: <strong class="price">R$ 00,00</strong></span>
					<button class="mt-2 button-cart" type="submit">Comprar</button>
				</form>

			</div>
		</div>
	</div>

	<!-- <div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		// do_action( 'woocommerce_single_product_summary' );
		?>
	</div> -->

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action( 'woocommerce_after_single_product_summary' );
	?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
