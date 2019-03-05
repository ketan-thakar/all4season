<?php
/**
 * Template Name: Page Fullwidth
 * The main template file for display page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/
$current_page_id = '';

if(isset($page->ID))
{
    $current_page_id = $page->ID;
}

get_header(); 
?>

<?php
    //Get Page RevSlider
    $page_revslider = get_post_meta($current_page_id, 'page_revslider', true);
    $page_menu_transparent = get_post_meta($current_page_id, 'page_menu_transparent', true);
    $page_header_below = get_post_meta($current_page_id, 'page_header_below', true);
    
    if(!empty($page_revslider) && $page_revslider != -1 && empty($page_header_below))
    {
    	echo '<div class="page_slider ';
    	if(!empty($page_menu_transparent))
    	{
	    	echo 'menu_transparent';
    	}
    	echo '">'.do_shortcode('[rev_slider '.$page_revslider.']').'</div>';
    }
?>

<?php
//Get page header display setting
$page_hide_header = get_post_meta($current_page_id, 'page_hide_header', true);

if($page_revslider != -1 && !empty($page_menu_transparent))
{
	$page_hide_header = 1;
}

if(empty($page_hide_header) && ($page_revslider == -1 OR empty($page_revslider) OR !empty($page_header_below)))
{
	$pp_page_bg = '';
	//Get page featured image
	if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        $pp_page_bg = $image_thumb[0];
    }
    
    if(isset($image_thumb[0]))
    {
	    $background_image = $image_thumb[0];
		$background_image_width = $image_thumb[1];
		$background_image_height = $image_thumb[2];
	}
	
	global $global_pp_topbar;
?>
<div id="page_caption" <?php if(!empty($pp_page_bg)) { ?>class="hasbg parallax <?php if(empty($page_menu_transparent)) { ?>notransparent<?php } ?> <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?> withtopbar<?php } ?>" data-image="<?php echo $background_image; ?>" data-width="<?php echo $background_image_width; ?>" data-height="<?php echo $background_image_height; ?>"<?php } ?>>
	<div class="page_title_wrapper">
		<h1 <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>class ="withtopbar"<?php } ?>><?php the_title(); ?></h1>
	</div>
	<?php if(!empty($pp_page_bg)) { ?>
		<div class="parallax_overlay_header"></div>
	<?php } ?>
</div>
<?php
}
?>

<?php
	//Check if use page builder
	$ppb_form_data_order = '';
	$ppb_form_item_arr = array();
	$ppb_enable = get_post_meta($current_page_id, 'ppb_enable', true);

	global $global_pp_topbar;
?>
<?php
	if(!empty($ppb_enable))
	{
?>
<div class="ppb_wrapper <?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>withtopbar<?php } ?>">
<?php
		tg_apply_builder($current_page_id);
?>
</div>
<?php
$args = array(
    'post_type'=> 'tours',
    'order'    => 'ASC'
);              

$the_query = new WP_Query( $args );
if($the_query->have_posts() ) :
?>
<div class="tour_place_price">
    <div class="page_content_wrapper">
        <?php
        while ( $the_query->have_posts() ) : $the_query->the_post();
        $image_url = '';
        $tour_ID = get_the_ID();  
        if(has_post_thumbnail($tour_ID, 'large'))
        {
            $image_id = get_post_thumbnail_id($tour_ID);
            $image_url = wp_get_attachment_image_src($image_id, 'full', true);
            $small_image_url = wp_get_attachment_image_src($image_id, 'gallery_grid', true);
        }
        
        //Get Tour Meta
        $tour_permalink_url = get_permalink($tour_ID);
        $tour_title = $tour->post_title;
        $tour_country= get_post_meta($tour_ID, 'tour_country', true);
        $tour_price= get_post_meta($tour_ID, 'tour_price', true);
        $tour_price_discount= get_post_meta($tour_ID, 'tour_price_discount', true);
        $tour_price_currency= get_post_meta($tour_ID, 'tour_price_currency', true);
        $tour_discount_percentage = 0;
        $tour_price_display = '';    
        $tour_gallery= get_post_meta($tour_ID, 'tour_gallery', true);
        ?>    
        <div class="tour_place_details">
            <div class="tour_place_slide">
                <div class="custom-col-md-4">
                    <div class="place-details">
                        <h4><?php echo $tour_country; ?></h4>
                        <?php
                        if(!empty($tour_country))
                        {
                        ?>
                        <h2><?php echo get_the_title(); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <div class="custom-col-md-8">
                    <div class="flex-slider">
                    <ul class="slides">    
                    <?php 
                    if(!empty($tour_gallery))
                    {
                        $images_arr = get_post_meta($tour_gallery, 'wpsimplegallery_gallery', true);
                        //$pp_lightbox_enable_title = get_option('pp_lightbox_enable_title');
                        foreach($images_arr as $key => $image)
                        {
                            //$image_url = wp_get_attachment_image_src($image, 'original', true);
                            $small_image_url = wp_get_attachment_image_src($image, 'gallery_grid', true);
                        ?>    
                        <li><img src="<?php echo $small_image_url[0]; ?>" alt="" /></li>
                        <?php  
                        }
                    }        

                    ?>
                    </ul>
                    </div>
                </div>
            </div>
            <a href="<?php echo $tour_permalink_url; ?>">
                <div class="place_location_price">
                    <div class="custom-col-40">
                        <div class="location-details">
                            <?php
                            if(!empty($tour_country))
                            {
                            ?>
                            <span class="place-name"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $tour_country; ?></span>
                            <?php }  ?>
                            <h3><?php echo get_the_title(); ?></h3>
                        </div>
                    </div>
                    <div class="custom-col-60">
                        <ul class="price-details">
                            <li class="offer_view">
                                <button class="btn">View Details <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                            </li>
                            <li class="final_value">
                                <label><?php echo $tour_price_currency." ".$tour_price; ?></label>
                            </li>
                        </ul>
                    </div>
                </div>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>



<?php
	}
	else
	{
?>
<!-- Begin content -->
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>withtopbar<?php } ?>">
    <div class="inner">
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    		<div class="sidebar_content full_width">
    		<?php 
    			if ( have_posts() ) {
    		    while ( have_posts() ) : the_post(); ?>		
    	
    		    <?php the_content(); break;  ?>

    		<?php endwhile; 
    		}
    		?>
    		</div>
    	</div>
    	<!-- End main content -->
    </div> 
</div>
<?php
}
?>
<?php
if(empty($ppb_enable))
{
?>
<br class="clear"/><br/><br/>
<?php
}
?>
<?php get_footer(); ?>