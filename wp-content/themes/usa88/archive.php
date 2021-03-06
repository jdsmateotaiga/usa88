<?php
$page = 'products';
include('header.php');
$parent_category = get_queried_object();
$cat_image = get_field('image_heading', 'category_'.$parent_category->term_id);
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
            <div class="cat-heading" style="background-image: url('<?= $cat_image; ?>')">
                <h1><?= $parent_category->name ?></h1>
            </div>
            <div class="container-fluid">
                <div class="category-list row">
            <?php
                foreach($child_categories as $item) {

                    if($item->count == 0 || $parent_category->term_id == 5) {
                        $child_cat_image = get_field('category_image', 'category_'.$item->term_id)['sizes']['medium_large'];
            ?>
                        <div class="col-sm-<?= $col ?>  cat-item">
                            <div class="cat-bg <?= $opposite_color_code ?>" style="background-image: url('<?= $child_cat_image ?>')">
                                <a href="<?= get_category_link($item->term_id); ?>">
                                <h3 class="cat-title"><?= $item->name; ?></h3>
                                </a>
                            </div>
                        </div>
            <?php
                    } else {
            ?>
              <div class="m-15">
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
                        $count = $the_query->found_posts;
                        $isodd = '';
                        $c = 0;
                        $remainder = $count % 2;
                        if($remainder != 0){
                            $isodd = 'col-sm-offset-3';
                        }
                        if ( $the_query->have_posts() ) {
                    ?>
                        <div class="product-listing row">
                    <?php
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                $bulletin = get_field('field_5e306dfffbc5a');
                                $msds = get_field('field_5e306e2f7a177');
                                $bulletin_files = [];
                                $msds_files = [];
                                $c++;
                    ?>
                                    <div class="col-sm-6 <?= ($count == $c) ? $isodd : '' ?>">
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
                                                        echo '<img class="img-responsive" src="/wp-content/uploads/2020/01/Versa-Fleet-Power-SAE-40-200x300.png" alt="">';
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
                                                  <p>Not Available!</p>
                                                <?php
                                                      }
                                                    if( $bulletin || $msds ) {
                                                ?>
                                                        <a href="#" class="pdf-link" data-toggle="modal" data-target="#productModal-<?=$c?>">
                                                          <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </a>
                                                <?php
                                                    }
                                                ?>


                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="productModal-<?=$c?>" tabindex="-1" role="dialog" aria-labelledby="Product" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-body product-modal-body">
                                            <div class="row">
                                              <div class="col-sm-12">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="col-sm-12">
                                                <h4><?= the_title(); ?></h4>
                                              </div>
                                              <?php
                                                if($bulletin) {
                                              ?>
                                              <div class="col-sm-6">
                                                <h5>PRODUCT BULLETIN</h5>
                                                <ul>
                                                  <?php
                                                    foreach($bulletin as $item) {
                                                      $bulletin_files[] = $item['product_bulletin_file']['url'];
                                                  ?>
                                                        <li>
                                                          <a href="<?= $item['product_bulletin_file']['url'] ?>" target="_blank">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;&nbsp;<?= $item['product_bulletin_file']['title'] ?>&nbsp;&nbsp;
                                                          </a>
                                                          <small><?= size_format( filesize( get_attached_file( $item['product_bulletin_file']['ID'] ) ), 2) ?></small>
                                                        </li>
                                                  <?php
                                                    }
                                                  ?>
                                                </ul>
                                              </div>
                                              <?php
                                                }
                                                if($msds) {
                                              ?>
                                              <div class="col-sm-6">
                                                <h5>MSDS</h5>
                                                <ul>
                                                  <?php
                                                    foreach($msds as $item) {
                                                      $msds_files[] = $item['product_msds_file']['url'];
                                                  ?>
                                                        <li>
                                                          <a href="<?= $item['product_msds_file']['url'] ?>" target="_blank">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;&nbsp;<?= $item['product_msds_file']['title'] ?>&nbsp;&nbsp;
                                                          </a>
                                                          <small><?= size_format( filesize( get_attached_file( $item['product_msds_file']['ID'] ) ), 2) ?></small>
                                                        </li>
                                                  <?php
                                                    }
                                                  ?>
                                                </ul>
                                              </div>
                                              <?php
                                                }
                                              ?>
                                              <div class="col-sm-12">
                                                <form class="email-submit" action="/" method="post">
                                                  <p style="margin-top: 20px;"><small><strong>Info:</strong> Please provide your email below to get the link of the files.</small></p>
                                                  <input type="hidden" class="product-title-for-email" value="<?= the_title() ?>">
                                                  <input type="hidden" class="files-for-email-bulletin" name="bulletin_files" value="<?= implode('x???x', $bulletin_files) ?>">
                                                  <input type="hidden" class="files-for-email-msds" name="msds_files" value="<?= implode('x???x', $msds_files) ?>">
                                                  <div class="form-group" style="margin-bottom: 5px">
                                                    <input type="email" class="form-control email-for-file" name="email" autocomplete="off" placeholder="example@mail.com" required>
                                                  </div>
                                                  <input type="submit" name="submit" class="btn btn-primary" value="SEND">
                                                </form>
                                                <div class="alert-area">
                                                </div>
                                              </div>
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
                  $special_cat_image = get_field('image_heading', 'category_'.$parent_category->parent);
        ?>
                  <div class="cat-heading" style="background-image: url('<?= $special_cat_image; ?>')">
                      <h1><?= $special_cat ?></h1>
                  </div>
                  <div class="m-15">
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
                            $count = $the_query->found_posts;
                            $isodd = '';
                            $c = 0;
                            $remainder = $count % 2;
                            if($remainder != 0){
                                $isodd = 'col-sm-offset-3';
                            }
                            if ( $the_query->have_posts() ) {
                        ?>
                                <div class="product-listing row">
                                <?php
                                    while ( $the_query->have_posts() ) {
                                    $the_query->the_post();
                                    $bulletin = get_field('field_5e306dfffbc5a');
                                    $msds = get_field('field_5e306e2f7a177');
                                    $c++;
                                ?>
                                    <div class="col-sm-6 <?= ($count == $c) ? $isodd : '' ?>">
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
                                                    echo '<img class="img-responsive" src="/wp-content/uploads/2020/01/Versa-Fleet-Power-SAE-40-200x300.png" alt="">';
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
                                                <p>Not Available!</p>
                                              <?php
                                                    }
                                                    if( $bulletin || $msds ) {
                                              ?>
                                                        <a href="#" class="pdf-link" data-toggle="modal" data-target="#productModal-<?=$c?>">
                                                          <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </a>
                                              <?php
                                                    }
                                              ?>
                                              </div>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                    <div class="modal fade" id="productModal-<?=$c?>" tabindex="-1" role="dialog" aria-labelledby="Product" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-body product-modal-body">
                                            <div class="row">
                                              <div class="col-sm-12">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="col-sm-12">
                                                <h4><?= the_title(); ?></h4>
                                              </div>
                                              <?php
                                                if($bulletin) {
                                              ?>
                                              <div class="col-sm-6">
                                                <h5>PRODUCT BULLETIN</h5>
                                                <ul>
                                                  <?php
                                                    foreach($bulletin as $item) {

                                                  ?>
                                                        <li>
                                                          <a href="<?= $item['product_bulletin_file']['url'] ?>" target="_blank">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;&nbsp;<?= $item['product_bulletin_file']['title'] ?>&nbsp;&nbsp;
                                                          </a>
                                                          <small><?= size_format( filesize( get_attached_file( $item['product_bulletin_file']['ID'] ) ), 2) ?></small>
                                                        </li>
                                                  <?php
                                                    }
                                                  ?>
                                                </ul>
                                              </div>
                                              <?php
                                                }
                                                if($msds) {
                                              ?>
                                              <div class="col-sm-6">
                                                <h5>MSDS</h5>
                                                <ul>
                                                  <?php
                                                    foreach($msds as $item) {
                                                  ?>
                                                        <li>
                                                          <a href="<?= $item['product_msds_file']['url'] ?>" target="_blank">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;&nbsp;<?= $item['product_msds_file']['title'] ?>&nbsp;&nbsp;
                                                          </a>
                                                          <small><?= size_format( filesize( get_attached_file( $item['product_msds_file']['ID'] ) ), 2) ?></small>
                                                        </li>
                                                  <?php
                                                    }
                                                  ?>
                                                </ul>
                                              </div>
                                              <?php
                                                }
                                              ?>

                                              <div class="col-sm-12">
                                                <form class="email-submit" action="/" method="post">
                                                  <p style="margin-top: 20px;"><small><strong>Info:</strong> Please provide your email below to get the link of the files.</small></p>
                                                  <input type="hidden" class="product-title-for-email" value="<?= the_title() ?>">
                                                  <input type="hidden" class="files-for-email" name="files" value="http://usa88lubes.com/file-manager/files/DIESEL%20ENGINE%20OIL/VFULTIMA15W40.pdfx???xhttp://usa88lubes.com/file-manager/files/DIESEL%20ENGINE%20OIL/VFULTIMA15W40.pdf">
                                                  <div class="form-group" style="margin-bottom: 5px">
                                                    <input type="email" class="form-control email-for-file" name="email" autocomplete="off" placeholder="example@mail.com" required>
                                                  </div>
                                                  <input type="submit" name="submit" class="btn btn-primary" value="SEND">
                                                </form>
                                                <div class="alert-area">
                                                </div>
                                              </div>
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
                  </div>
            <?php
                }
            ?>
    </div>
</section>
<?php get_footer(); ?>
