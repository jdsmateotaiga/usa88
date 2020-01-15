<?php
$page = 'products';
include('header.php');
$parent_category = get_queried_object();
$cat_image = get_field('category_image_heading', 'category_'.$parent_category->term_id);
$cat_color_code = get_field('category_color_code', 'category_'.$parent_category->term_id);
$opposite_color_code = (get_field('category_color_code', 'category_'.$parent_category->term_id) == 'blue') ? 'red' : 'blue';
if( !$cat_image ) {
    $cat_image = 'https://via.placeholder.com/500x400.jpg?text=Placeholder';
}
?>
<section class="category-listing">
        <?php
            $child_categories = get_terms( $parent_category->taxonomy, array(
                'parent'    => $parent_category->term_id,
                'hide_empty' => false
            ));
        ?>
        <?php
            usort($child_categories, function($a,$b){ return $a->term_id - $b->term_id; });
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
            <div class="cat-heading cat-bg <?= $cat_color_code ?>" style="background-image: url('<?= $cat_image; ?>')">
                <h1><?= $parent_category->name ?></h1>
            </div>
            <div class="container-fluid">
                <div class="category-list row">
            <?php
                foreach($child_categories as $item) {

                    if($item->count == 0 || $parent_category->term_id == 5) {
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
                            'category_name' => $item->slug,
                            'order'   => 'ASC',
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
                                        <div class="product-item">
                                          <div class="row">
                                            <h3><?= the_title() ?></h3>
                                            <div class="col-md-5">
                                                <div class="product-image">
                                                <?php
                                                    $attachment_id = get_field('field_5e1b2d3d7923d');
                                                        if($attachment_id) {
                                                        foreach($attachment_id as $item) {
                                                            $size = "medium"; // (thumbnail, medium, large, full or custom size)
                                                            $image = wp_get_attachment_image_src( $item['product_image'], $size );
                                                            echo '<img class="img-responsive" src="'.$image[0].'" alt="">';
                                                        }
                                                    } else {
                                                        echo '<img class="img-responsive" src="https://via.placeholder.com/200x300.jpg?text=Placeholder" alt="">';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="product-info">
                                                <?php if(get_the_content()) { ?>
                                                <?= the_content() ?>
                                                <?php } else {
                                                ?>
                                                  <h4>Two Stroke Motorcycle Oil</h4>
                                                  Recommended for tricycles, motorcycles, scooter, lawn mowers, small tractors and other portable equipment powered by two-stroke engines.
                                                  <h5>RECOMMENDED RATIO:</h5>
                                                  30 parts fuel to 1 part 2T
                                                  <h5>PACKAGING:</h5>
                                                  200mL, 1000mL, Pails, Drums
                                                <?php
                                                      }
                                                ?>
                                                </div>
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
            </div>
        <?php
            } else {
                  $special_cat = get_the_category_by_ID($parent_category->parent);
                  $special_cat_color_code = get_field('category_color_code', 'category_'.$parent_category->parent);

        ?>
                  <div class="cat-heading cat-bg <?= $special_cat_color_code ?>" style="background-image: url('<?= $cat_image; ?>')">
                      <h1><?= $special_cat ?></h1>
                  </div>
                  <div class="container product-area">
                        <div class="heading-3 <?= $opposite_color_code ?>">
                            <h2><?= $parent_category->name ?></h2>
                        </div>
                        <?php
                            $args = array(
                                'post_type'     => 'products',
                                'category_name' => $parent_category->slug,
                                'order'   => 'ASC',
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
                                      <div class="product-item">
                                        <div class="row">
                                          <h3><?= the_title() ?></h3>
                                          <div class="col-md-5">
                                              <div class="product-image">
                                              <?php
                                                  $attachment_id = get_field('field_5e1b2d3d7923d');
                                                      if($attachment_id) {
                                                      foreach($attachment_id as $item) {
                                                          $size = "medium"; // (thumbnail, medium, large, full or custom size)
                                                          $image = wp_get_attachment_image_src( $item['product_image'], $size );
                                                          echo '<img class="img-responsive" src="'.$image[0].'" alt="">';
                                                      }
                                                  } else {
                                                      echo '<img class="img-responsive" src="https://via.placeholder.com/200x300.jpg?text=Placeholder" alt="">';
                                                  }
                                              ?>
                                              </div>
                                          </div>
                                          <div class="col-md-7">
                                              <div class="product-info">
                                              <?php if(get_the_content()) { ?>
                                              <?= the_content() ?>
                                              <?php } else {
                                              ?>
                                                <h4>Two Stroke Motorcycle Oil</h4>
                                                Recommended for tricycles, motorcycles, scooter, lawn mowers, small tractors and other portable equipment powered by two-stroke engines.
                                                <h5>RECOMMENDED RATIO:</h5>
                                                30 parts fuel to 1 part 2T
                                                <h5>PACKAGING:</h5>
                                                200mL, 1000mL, Pails, Drums
                                              <?php
                                                    }
                                              ?>
                                              </div>
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
                                wp_reset_postdata();
                              ?>

                          </div>
            <?php
                }
            ?>
    </div>
</section>
<?php get_footer(); ?>
