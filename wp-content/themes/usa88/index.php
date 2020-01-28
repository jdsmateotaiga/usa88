<?php
  /*
  Template Name: Homepage
  */
  get_header();
?>

<section class="hero-area" id="home">
  <div class="slider owl-carousel" id="slider">
  <div class="slider-item" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/home.jpg');">
   <div class="container">
     <div class="slider-content animated fadeInLeft">
       <h2>The best <br>in power</h2>
       <p>Give the ultimate boost of power to bring out the best in your machine.</p>
     </div>
   </div>
  </div>
  <div class="slider-item" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/home.jpg');">
   <div class="container">
     <div class="slider-content">
       <h2>The best in performance</h2>
       <p>Reach optimum potential for all types of performance specifications.</p>
     </div>
   </div>
  </div>
  <div class="slider-item" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/home.jpg');">
   <div class="container">
     <div class="slider-content">
       <h2>The best in protection</h2>
       <p>Put on exceptional protection for an extended equipment life.</p>
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
    <p class="title-description">USA88 offers a complete line of world-class quality products for a wide range of industries. All lubricants are locally blended and internationally validated with an ISO 9001:2008 certification.</p>
    <div class="row category-list">
      <?php
        $categories = get_field('field_5e179bafb8827',10);
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
    <h2 class="title-h2">ABOUT US</h2>
  </div>
  <div class="container">
    <div class="content text-justify">
      <p>USA88 is a trusted lubricants manufacturing and distribution company under Chemical Alloy Corporation. Since its establishment in 1993, USA88 has grown from being a manufacturer and distributor of independent companies into one of the best providers of lubricants and solutions in the country with their additional packaging and storing services.</p>
      <p>With its wide range of world-class products, USA88 lubricants are formulated with the best proficiency to meet quality ISO standards, providing the best power, protection, and performance needed for optimum efficiency.</p>
      <p>Through the vast experience in product innovation coupled with the most extensive background in petroleum processing, USA88 is committed in providing total customer satisfaction by continuously improving products, services, and system through technology innovation, manpower training, efficient and effective processes and team work with customers and suppliers.</p>
    </div>
  </div>
  <section class="warehouse-area">
    <div class="heading-2">
      <h2 class="title-h2">OUR WAREHOUSE</h2>
    </div>
    <!-- <div class="container">
      <p class="title-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium excepturi nobis voluptate quam hic et maxime ad, cumque vero saepe a sint neque, maiores fugiat necessitatibus tenetur modi facilis repellendus enim natus esse quo, nulla!</p>
    </div> -->
    <img class="img-responsive" src="<?= get_template_directory_uri() ?>/assets/img/warehouse.jpg" alt="" style="margin-bottom: 3em">
    <div class="container">
      <div class="content text-justify">
        <h4>WAREHOUSE:</h4>
        <p>Ports and warehouse in La Union, Cebu, Bacolod, Ilo-ilo, Davao, Cagayan de Oro, General Santos, and Butuan are strategically located to ensure constant supply and convenient delivery throughout the Philippines.</p>
        <p>The company logistics system provides fast, reliable, and on time delivery especially for clients outside Metro Manila and the provinces.</p>
        <br>
        <h4>FACILITIES:</h4>
        <p>The manufacturing plant located in Marikina City houses a total storage capacity of 180,000L for both lubricants and raw materials.</p>
        <p>With a top-notch technical laboratory complete with calibrated equipment, every raw material and finished product is tested and evaluated to ensure that only quality products are manufactured.</p>
        <br>
        <h4>ORGANISATION:</h4>
        <p>The perfect blend of exceptional equipment and excellent manpower gives USA88 the power to produce a total of 8000L of high-quality finished products in small packaging, pails, and drums per hour.</p>
        <p>USA88’s technical team are highly trained in terms of QUALITY CONTROL to ensure the quality of the products, RESEARCH & DEVELOPMENT to provide the latest and the most efficient lubricants, and TECHNICAL SERVICE to give clients best assurance and consistent supplier and customer relationship.</p>
      </div>
    </div>
  </section>
  <section class="story-area">
    <div class="heading-2">
      <h2 class="title-h2">OUR STORY</h2>
    </div>
    <div class="container">
      <div class="story-video">
        <img class="img-responsive" src="<?= get_template_directory_uri() ?>/assets/img/story.jpg" alt="">
      </div>
      <div class="content text-justify">
        <p>USA88 was established in 1993, primarily as a partner of independent fuel companies in the country. Since then, and with the increasing market demand, USA88 has grown into becoming one of the best alternatives to high-performance lubricants in the country.</p>
        <p>The aim to provide the best lubrication solution in the local market is what drove USA88 to be formed from under Chemical Alloy Corporation and has now emerged as a key player in the Philippine lubricant industry.</p>
        <p>With numerous upgrades, along with a meaningful change in brand image, USA88 currently offers products with ISO certification and provides services using advanced facilities and equipment to support the local sectors of automotive, industrial, construction, and more.</p>
        <p>It is the company’s commitment to provide the best lubrication solution for total customer satisfaction while achieving excellence and competence.</p>
      </div>
    </div>
  </section>
</section>


<section class="service-area" id="services">
  <div class="heading-2">
    <h2 class="title-h2">SERVICES</h2>
  </div>
  <div class="container">
      <div class="content text-justify">
        <p>More than manufacturing and distribution, USA88 is engaged in blending, packaging, and bulk storage of lubricants as well as providing technical and aftersales services for total customer satisfaction.</p>
        <p>As a trusted lubricant solutions provider, the USA88 workforce consists of a team of experts competent with the experience, knowledge, and world-class facilities to deliver QUALITY PRODUCTS and technical know-how for all lubricant requirements and queries.</p>
      </div>
      <div class="row service-icons">
        <div class="col-sm-6 col-md-3">
          <div class="service-item">
            <img src="/wp-content/uploads/2020/01/s1.gif">
            <h4>Mixing</h4>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="service-item">
            <img src="/wp-content/uploads/2020/01/s2.gif">
            <h4>Packaging</h4>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="service-item">
            <img src="/wp-content/uploads/2020/01/s3.gif">
            <h4>Bulk Storage</h4>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="service-item">
            <img src="/wp-content/uploads/2020/01/s4.gif">
            <h4>Technical Support</h4>
          </div>
        </div>
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
