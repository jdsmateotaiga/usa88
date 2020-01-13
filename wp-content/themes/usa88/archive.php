<?php
get_header();
$parent_category = get_queried_object();
$cat_image = get_field('category_image_heading', 'category_'.$parent_category->term_id);
$cat_color_code = get_field('category_color_code', 'category_'.$parent_category->term_id);
if( !$cat_image ) {
    $cat_image = 'https://via.placeholder.com/500x400.jpg?text=Placeholder';
}
?>
<section class="category-listing">
    <div class="cat-heading cat-bg <?= $cat_color_code ?>" style="background-image: url('<?= $cat_image; ?>')">
        <h1><?= $parent_category->name ?></h1>
    </div>
    <?php
        $child_categories = get_terms( $parent_category->taxonomy, array(
            'parent'    => $parent_category->term_id,
            'hide_empty' => false
        ));
    ?>
    <div class="container-fluid">
        <?php
            if($child_categories) {
                $count = count($child_categories);
                $col = 12;
                if($count == 2) {
                    $col = 6;
                } else if($count == 8) {
                    $col = 3;
                } else if($count == 6) {
                    $col = 4;
                }
        ?>
        <div class="category-list row">
            <?php
                foreach($child_categories as $item) {
                    $opposite_color_code = (get_field('category_color_code', 'category_'.$item->term_id) == 'blue') ? 'red' : 'blue';
                    if($item->count == 0) {
            ?>
                        <div class="col-md-<?= $col ?>  cat-item">
                            <div class="cat-bg <?= $opposite_color_code ?>" style="background-image: url('<?= $cat_image ?>')">
                                <a href="<?= get_category_link($item->term_id); ?>">
                                <h3 class="cat-title"><?= $item->name; ?></h3>
                                </a>
                            </div>
                        </div>
            <?php 
                    } else {
            ?>
                <div class="container product-area">
                    <div class="heading-3 <?= $opposite_color_code ?>">
                        <h2><?= $item->name ?></h2>
                    </div>
                    <?php
                        $args = array(
                            'post_type'     => 'products',
                            'category_name' => $item->slug
                        );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) {
                    ?>
                        <div class="product-listing row">
                    <?php        
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                    ?>
                                    <div class="col-md-6">
                                        <div class="product-item row">
                                            <h3><?= the_title() ?></h3>
                                            <div class="col-md-5">
                                                <div class="product-image">
                                                <?php 
                                                    $attachment_id = get_field('field_5e1b2d3d7923d');
                                                        if($attachment_id) {
                                                        foreach($attachment_id as $item) {
                                                            $size = "medium"; // (thumbnail, medium, large, full or custom size)
                                                            $image = wp_get_attachment_image_src( $item['product_image'], $size );
                                                            if(!$image) {
                                                                $image = 'https://via.placeholder.com/200x350.jpg?text=Placeholder';
                                                            }
                                                            echo '<img class="img-responsive" src="'.$image[0].'" alt="">';
                                                        }
                                                    } else {
                                                        echo '<img class="img-responsive" src="https://via.placeholder.com/200x350.jpg?text=Placeholder" alt="">';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="product-info">
                                                <?= the_content() ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php         
                            }
                    ?>
                        </div>
                    <?php
                        } else {
                    ?>
                    <h3 class="no-found">No Product Available!</h3>
                    <?php 
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata();
                        ?>
   
                    </div> 
            <?php
                    }
                } 
            ?>
        </div>
        <?php
            } else {
        ?>
            <h3 class="no-found">No Product Available!</h3>
        <?php
            }
        ?>
    </div>
</section>
<?php get_footer(); ?>
