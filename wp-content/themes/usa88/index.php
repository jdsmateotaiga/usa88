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
          <div class="contact-section row">
            <div class="col-md-2">
              <div class="contact-icon">
                <img src="<?= get_template_directory_uri() ?>/assets/img/location.jpg" alt="">
              </div>
            </div>
            <div class="col-md-10">
              <div class="contact-details view-more">
                <div class="content text-justify">
                  <h4>OUR LOCATION</h4>
                  <h5>MAIN OFFICE:</h5>
                  <p>Unit 109 Columbia Ortigas Ave., Mandaluyong City, Philippines 1550</p>
                  <h5>PLANT:</h5>
                  <p>227 Gen. Ordonez St. Corner Balagtas St., Parang Marikina City, Philippines 1809</p>
                  <p>T: (632) 8518 9998  F: (632) 8518 9998</p>
                  <p>PALAWAN: Panel Compound Sampaloc Road, Brgy. Sta Monica Puerto Princesa City</p>
                  <p>T: (048) 716 2439  M: (63) 917 1361427</p>
                  <h5>VISAYAS</h5>
                  <p>BACOLOD: F-5 Cgo Bldg., Luzuriaga St. Reclamation Area., Bacolod City</p>
                  <p>T: (034) 433 2846  M: (63) 917 1301157</p>
                  <p>CEBU: 25 Wireless Subang Dako Mandaue City Cebu</p>
                  <p>T: (032) 261 7288  M: (63) 917 1301169</p>
                  <p>ILOILO: Door 2 Newton Bldg. Quezon St. Iloilo City</p>
                  <p>T: (033) 508 2361 M: (63) 917 1438392</p>
                  <p>LEYTE: Flying V Station, Brgy. San Antonio Ormoc City, Leyte</p>
                  <p>M: (63) 917 1361479</p>
                  <h5>MINDANAO</h5>
                  <p>BUTUAN: Flying V Butuan KM 3, National Highway, Baan, Butuan City</p>
                  <p>T: (085) 815 4143  M: (63) 917 1363590</p>
                  <p>CAGAYAN DE ORO: Petro de Oro Compound, Purok 10, Sitio Baley, Brgy. Tablon, Cagayan De Oro City</p>
                  <p>T: (072) 700 2430  M: (63) 917 1361412</p>
                  <p>DAVAO: Unit 22-S DEPC Warehouse, Purok 9, Brgy. Communal, Buhangin, Davao City</p>
                  <p>T: (082) 235 1980  M: (63) 922 8893009</p>
                  <p>GENSAN: National Highway, Dadiangas North General Santos City</p>
                  <p>T: (083) 552 8955  M: (63) 917 1363590</p>
                  <p><a href="http://www.usa88lubes.com" target="_blank">www.usa88lubes.com</a></p>
                </div>
                <p><a href="#" class="more">View More</a></p>
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
                <p><a href="tel:85189998">8518-9998</a></p>
                <h5>MARIKINA PLANT:</h5>
                <p><a href="tel:6325189998">(632) 518 9998</a></p>
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
                <p><a href="mailto:chemalloy@usa88lubes.com">chemalloy@usa88lubes.com</a></p>
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
      <div class="col-sm-7">
        <div class="contact-form-section">
          <h2>GET IN TOUCH</h2>
          <p class="text-justify">Here at USA88, we are looking forward to providing our customers with the best service. Contact us and we will revert promptly. The support team are ready and happy to help.</p>
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
