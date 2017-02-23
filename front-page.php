<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Brooke_Portfolio
 */

get_header(); 
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="projects">
                <?php
                        $args = array( 
                        'post_type'      => 'project',
                        'posts_per_page' => -1,
                        'orderby'        => 'modified', 
                        'order'          => 'ASC'
                        );
            
                            $projects = new WP_Query( $args );

                            if ( $projects->have_posts()){ 
                             while( $projects->have_posts() ){
                                 
                                $projects->the_post();
             
            ?>
                    <div class="single-project"> 
                       <a href="<?php the_permalink(); ?>">See Project</a>
                        <?php the_post_thumbnail('thumbnail'); ?>
                            <h2><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                    </div>
                    <?php 
                             }
                            wp_reset_postdata(); 
                            }
                        ?>
            </div>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php
get_footer();