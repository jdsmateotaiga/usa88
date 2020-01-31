<?php
  /*
  Template Name: Homepage
  */
  get_header();
?>

<section class="hero-area" id="home">
  <div class="slider owl-carousel" id="slider">
  <?php
    $hero_count = 0;
    $hero_slider = get_field('field_5e331219c0407');
    foreach($hero_slider as $item) {

  ?>
      <div class="slider-item" style="background-image: url('<?= $item['hero_image'] ?>')">
       <div class="container <?php echo ($hero_count == 0) ? 'animated fadeInLeft' : ''; ?>">
         <div class="slider-content">
           <?= $item['hero_content'] ?>
         </div>
       </div>
      </div>
  <?php
      $hero_count++;
    }
  ?>
</div>
</section>
<section class="category-area" id="products">
  <div class="heading-2">
    <h2 class="title-h2"><?= get_field('field_5e3316620109c') ?></h2>
  </div>
  <div class="container">
    <div class="title-description">
      <?= get_field('field_5e3316730109d') ?>
    </div>
    <div class="row category-list">
      <?php
        $categories = get_field('field_5e179bafb8827');
        if($categories) {
          usort($categories, function($a,$b){ return $a->term_id - $b->term_id; });
          foreach($categories as $item) {
            $o_image = get_field('category_image', 'category_'.$item->term_id);
            $cat_image = $o_image['sizes']['medium_large'];
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
<section class="about-area" id="about-us">
  <div class="heading-2">
    <h2 class="title-h2"><?= get_field('field_5e33176ceffcb') ?></h2>
  </div>
  <div class="container">
    <div class="content text-justify">
      <?= get_field('field_5e331781effcc') ?>
    </div>
  </div>
  <section class="warehouse-area">
    <div class="heading-2">
      <h2 class="title-h2"><?= get_field('field_5e3318969fc2f') ?></h2>
    </div>
    <!-- <iframe src="" style="width: 100%; height: auto; margin-bottom: 3em"></iframe> -->
    <img class="img-responsive" src="<?= get_field('field_5e3318a69fc30') ?>" alt="" style="margin-bottom: 3em">
    <div class="container">
      <div class="content text-justify">
        <?= get_field('field_5e3318d59fc31') ?>
      </div>
    </div>
  </section>
  <section class="story-area">
    <div class="heading-2">
      <h2 class="title-h2"><?= get_field('field_5e331a1478eb7') ?></h2>
    </div>
    <div class="container">
      <div class="story-video">
        <img class="img-responsive" src="<?= get_field('field_5e331a2978eb8') ?>" alt="">
      </div>
      <div class="content text-justify">
        <?= get_field('field_5e331a3e78eb9') ?>
      </div>
    </div>
  </section>
</section>


<section class="service-area" id="services">
  <div class="heading-2">
    <h2 class="title-h2"><?= get_field('field_5e331b3c05ccb') ?></h2>
  </div>
  <div class="container">
      <div class="content text-justify">
        <?= get_field('field_5e331b5005ccc') ?>
      </div>
      <div class="row service-icons">
        <?php
          $services_pods = get_field('field_5e331b6405ccd');
          foreach($services_pods as $item) {
        ?>
            <div class="col-sm-6 col-md-3">
              <div class="service-item">
                <img src="<?= $item['service_icon'] ?>">
                <h4><?= $item['service_label'] ?></h4>
              </div>
            </div>
        <?php
          }
        ?>
      </div>
  </div>

</section>
<section class="contact-area" id="contact">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-5">
        <div class="contact-info">
          <?php
            $contact_info = get_field('field_5e346371fb0df');
            foreach($contact_info as $item) {
                $excerpt = false;
                if( strlen($item['contact_details']) > 500) {
                  $excerpt = true;
                }
          ?>
          <div class="contact-section row">
            <div class="col-md-2">
              <div class="contact-icon">
                <img src="<?= $item['contact_icon']?>" alt="">
              </div>
            </div>
            <div class="col-md-10">
              <div class="contact-details <?= ($excerpt) ? 'view-more' : ''; ?>">
                <div class="content text-justify">
                  <?= $item['contact_details']?>
                </div>
                <?= ($excerpt) ? '<p><a href="#" class="more">View More</a></p>' : ''; ?>
              </div>
            </div>
          </div>
          <?php
            }
          ?>
          <div class="social-media">
            <?= get_field('field_5e346418fb0e2') ?>
          </div>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="contact-form-section">
          <h2><?= get_field('field_5e3462ab03ac2') ?></h2>
          <p class="text-justify">
            <?= get_field('field_5e3462bc03ac3') ?>
          </p>
          <div>
            <?= do_shortcode(''.get_field('field_5e3462cb03ac4').''); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  get_footer();
?>
