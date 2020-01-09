<?php get_header(); ?>
<section class="category-area">
  <div class="heading-2">
    <h2 class="title-h2">BROWSE BY CATEGORY</h2>
  </div>
  <div class="container">
    <p class="title-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium excepturi nobis voluptate quam hic et maxime ad, cumque vero saepe a sint neque, maiores fugiat necessitatibus tenetur modi facilis repellendus enim natus esse quo, nulla!</p>
    <div class="row category-list">
      <?php
        $categories = get_field('field_5e179bafb8827',10);
        if($categories) {
          usort($categories, function($a,$b){ return $a->term_id - $b->term_id; });
          foreach($categories as $item) {
      ?>
        <div class="col-sm-6 col-md-4 cat-item">
          <div class="cat-bg <?= get_field('category_color_code', 'category_'.$item->term_id) ?>" style="background-image: url('<?= get_field('category_image', 'category_'.$item->term_id) ?>')">
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
