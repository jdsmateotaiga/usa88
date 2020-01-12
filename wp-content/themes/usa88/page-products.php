<?php get_header(); ?>
<section class="category-area">
<div class="heading-2">
    <h2 class="title-h2"><?php the_title(); ?></h2>
  </div>
  <div class="container">
    <div class="row category-list">
      <?php
        $categories = get_field('field_5e179bafb8827',10);
        if($categories) {
          usort($categories, function($a,$b){ return $a->term_id - $b->term_id; });
          foreach($categories as $item) {
            $cat_image = get_field('category_image', 'category_'.$item->term_id);
            if( !$cat_image ) {
              $cat_image = 'https://via.placeholder.com/500x400.jpg?text=Placeholder';
            }
      ?>
        <div class="col-sm-6 col-md-4 cat-item">
          <div class="cat-bg <?= get_field('category_color_code', 'category_'.$item->term_id) ?>" style="background-image: url('<?= $cat_image ?>')">
            <a href="<?= get_category_link($item->term_id); ?>">
              <h3 class="cat-title"><?= $item->name; ?></h3>
            </a>
          </div>
        </div>
      <?php
          }
        } else {
          echo 'No Category Found!';
        }
      ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
