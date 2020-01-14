<?php
  /*
  Template Name: Homepage
  */
  get_header();
?>

<section class="hero-area" id="home">
  <div class="slider owl-carousel" id="slider">
  <div class="slider-item" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/banner1.jpg');">
   <div class="container">
     <div class="slider-content animated fadeInLeft">
       <h1>POWERING BEYOND<br>PERFORMANCE</h1>
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus cumque unde totam minus laborum beatae repudiandae molestias dolores, illum assumenda.</p>
     </div>
   </div>
  </div>
  <div class="slider-item" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/banner2.jpeg');">
    <div class="container">
      <div class="slider-content">
        <h1>POWERING BEYOND<br>PERFORMANCE</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus cumque unde totam minus laborum beatae repudiandae molestias dolores, illum assumenda.</p>
      </div>
    </div>
  </div>
</div>
</section>
<section class="category-area" id="products">
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
<section class="warehouse-area" id="about-us">
  <div class="heading-2">
    <h2 class="title-h2">OUR WAREHOUSE</h2>
  </div>
  <div class="container">
    <p class="title-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium excepturi nobis voluptate quam hic et maxime ad, cumque vero saepe a sint neque, maiores fugiat necessitatibus tenetur modi facilis repellendus enim natus esse quo, nulla!</p>
  </div>
  <img class="img-responsive" src="<?= get_template_directory_uri() ?>/assets/img/warehouse.jpg" alt="">
  <section class="story-area">
    <div class="heading-2">
      <h2 class="title-h2">OUR STORY</h2>
    </div>
    <div class="container">
      <div class="story-video">
        <img class="img-responsive" src="<?= get_template_directory_uri() ?>/assets/img/story.jpg" alt="">
      </div>
      <div class="content">
        <p>We are Chemical Alloy Corporation a lubricant manufacturing company since 1993 under the brand name of USA 88. Our aim is to provide and recognize total customer satisfaction in achieving excellence and competence in all of our business under takings. We are committed to improve our products, services and our system through technology innovation, manpower training, efficient and effective processes and team work with our customers and suppliers. As an ISO 9001:2008 Certified Company we have the experience, the knowledge, and the facilities to provide QUALITY PRODUCTS and AFTERSALES SERVICES that will provide TOTAL CUSTOMER SATISFACTION.</p>
      </div>
    </div>
  </section>
</section>

<section class="service-area" id="services">
  <div class="heading-2">
    <h2 class="title-h2">SERVICES</h2>
  </div>
  <div class="container">
      <div class="content">
          <p>More than manufacturing and distribution, USA88 is engaged in blending, packaging, and bulk storage of lubricants as well as providing technical and aftersales services for total customer satisfaction.</p>
          <p>As a trusted lubricant solutions provider, the USA88 workforce consists of a team of experts competent with the experience, knowledge, and world-class facilities to deliver QUALITY PRODUCTS and technical know-how for all lubricant requirements and queries.</p>
      </div>
      <div class="row service-icons">
        <div class="col-md-3">
          <div class="service-item">
            <img src="/wp-content/uploads/2020/01/s1.gif">
            <h4>Mixing</h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="service-item">
            <img src="/wp-content/uploads/2020/01/s2.gif">
            <h4>Packaging</h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="service-item">
            <img src="/wp-content/uploads/2020/01/s3.gif">
            <h4>Bulk Storage</h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="service-item">
            <img src="/wp-content/uploads/2020/01/s4.gif">
            <h4>Technical Support</h4>
          </div>
        </div>
      </div>
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
