<?php 

if ( !defined( 'ABSPATH' ) ) exit;

$redirect_course_cat_directory = vibe_get_option('redirect_course_cat_directory');
if(!empty($redirect_course_cat_directory)){
	locate_template( array( 'course/index.php' ), true );	
	exit;	
}


get_header( vibe_get_header() ); ?>

<section id="title">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
             <div class="col-md-12">
                <div class="pagetitle">
                	<?php vibe_breadcrumbs(); ?> 
                   	<h1><?php single_cat_title(); ?></h1>
                    <h5><?php echo do_shortcode(category_description()); ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="content">
	<div id="buddypress">
    <div class="<?php echo vibe_get_container(); ?>">
		<div class="padder">
		<?php do_action( 'bp_before_directory_course' ); ?>	
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<div class="content">
				<?php
				$style = vibe_get_option('default_course_block_style');
				if(Empty($style)){$style = apply_filters('wplms_instructor_courses_style','course2');}
				
					if ( have_posts() ) : while ( have_posts() ) : the_post();

					echo '<div class="col-md-4 col-sm-6 clear3">'.thumbnail_generator($post,$style,'3','0',true,true).'</div>';
				
					endwhile;
					pagination();
					endif;
				?>
				</div>
			</div>	
			<div class="col-md-3 col-sm-3">
				<?php
                    $sidebar = apply_filters('wplms_sidebar','coursesidebar');
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                <?php endif; ?>
			</div>
		</div>	
		<?php do_action( 'bp_after_directory_course' ); ?>

		</div><!-- .padder -->
	
	<?php do_action( 'bp_after_directory_course_page' ); ?>
</div><!-- #content -->
</div>
</section>

<?php 

get_footer( vibe_get_footer() );  