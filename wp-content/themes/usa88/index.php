<?php
  /*
  Template Name: Homepage
  */
  get_header();
?>

<section class="hero-area">
  <div class="slider owl-carousel" id="slider">
  <div class="slider-item" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/banner1.jpeg');">
   <div class="container">
     <div class="slider-content animated fadeInLeft">
       <h1>POWERING BEYOND<br>PERFORMANCE</h1>
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus cumque unde totam minus laborum beatae repudiandae molestias dolores, illum assumenda.</p>
     </div>
   </div>
  </div>
  <div class="slider-item" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/banner2.jpg');">
    <div class="container">
      <div class="slider-content">
        <h1>POWERING BEYOND<br>PERFORMANCE</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus cumque unde totam minus laborum beatae repudiandae molestias dolores, illum assumenda.</p>
      </div>
    </div>
  </div>
</div>
</section>
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
<section class="warehouse-area">
  <div class="heading-2">
    <h2 class="title-h2">OUR WAREHOUSE</h2>
  </div>
  <div class="container">
    <p class="title-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium excepturi nobis voluptate quam hic et maxime ad, cumque vero saepe a sint neque, maiores fugiat necessitatibus tenetur modi facilis repellendus enim natus esse quo, nulla!</p>
  </div>
  <img class="img-responsive" src="<?= get_template_directory_uri() ?>/assets/img/warehouse.jpg" alt="">
</section>
<section class="story-area">
  <div class="heading-2">
    <h2 class="title-h2">OUR STORY</h2>
  </div>
  <div class="container">
    <div class="story-video">
      <img class="img-responsive" src="<?= get_template_directory_uri() ?>/assets/img/story.jpg" alt="">
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam consequatur ex debitis ipsam autem maxime, labore, repellat fugit, possimus quibusdam officiis iure adipisci beatae assumenda rem accusantium sint velit minima nam explicabo aspernatur facilis. Excepturi magni laboriosam sint necessitatibus quod adipisci quasi quisquam, provident a. Praesentium commodi dolore itaque explicabo ipsa ut ex, odit distinctio quibusdam. Dolorem enim ipsam laboriosam facilis, tempore molestias nulla fugit quas reiciendis quae earum modi error accusamus, labore eius quod, ratione repellendus, dignissimos in nemo sint cumque. Suscipit id, mollitia eum cumque? Enim, perspiciatis dolorum! Quos placeat quo eum doloremque voluptates, ipsam ad perspiciatis officia!</p>
  </div>
</section>
<section class="contact-area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5">
        <div class="contact-info">
          <div class="contact-section row">
            <div class="col-md-2">
              <div class="contact-icon">
                <img src="<?= get_template_directory_uri() ?>/assets/img/location.jpg" alt="">
              </div>
            </div>
            <div class="col-md-10">
              <div class="contact-details">
                <h4>OUR LOCATION</h4>
                <h5>MANILA OFFICE:</h5>
                <p>Unit 109 Columbia Tower, Ortigas Ave., Mandaluyong City, Philippines 1550</p>
                <h5>PLANT:</h5>
                <p>227 Gen. Ordonez St. cor. Balagtas St. Parang, Marikina City, Philippies 1809</p>
              </div>
            </div>
          </div>
          <div class="contact-section row">
            <div class="col-md-2">
              <div class="contact-icon">
                <img src="<?= get_template_directory_uri() ?>/assets/img/phone.jpg" alt="">
              </div>
            </div>
            <div class="col-md-10">
              <div class="contact-details">
                <h4>OUR NUMBER</h4>
                <h5>MANILA OFFICE:</h5>
                <p>(632) 744 3467 to 68</p>
                <h5>MARIKINA PLANT:</h5>
                <p>(632) 518 9998</p>
              </div>
            </div>
          </div>
          <div class="contact-section row">
            <div class="col-md-2">
              <div class="contact-icon">
                <img src="<?= get_template_directory_uri() ?>/assets/img/mail.jpg" alt="">
              </div>
            </div>
            <div class="col-md-10">
              <div class="contact-details">
                <h4>OUR EMAIL</h4>
                <p>chemalloy@usa88lubes.com</p>
              </div>
            </div>
          </div>
          <div class="social-media">
            <ul>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="contact-form-section">
          <h2>GET IN TOUCH</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt explicabo voluptas qui, nemo placeat iure suscipit officia ut expedita, natus! Repellat eveniet repellendus, sunt ipsa amet vel hic distinctio obcaecati voluptas explicabo quasi a?</p>
          <div>
            <?= do_shortcode('[contact-form-7 id="8" title="Contact form 1"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  get_footer();
?>
