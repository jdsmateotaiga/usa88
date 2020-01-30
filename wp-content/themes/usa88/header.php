<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#d51e4a">
    <meta name="theme-color" content="#0d5681">
    <link rel="shortcut icon" type="image/x-icon" href="<?= get_field('field_5e331e24967e1')?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/custom.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="sticky">
      <nav class="navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-navigation" aria-expanded="false">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h1 style="margin: 0">
              <a class="navbar-brand" href="/">
                <img src="<?= get_field('field_5e331dc250da3')?>" alt="<?= get_bloginfo( 'name' ) ?>">
              </a>
            </h1>
          </div>
          <div class="collapse navbar-collapse" id="global-navigation">
            <!-- <ul class="nav navbar-nav navbar-right"> -->
              <?php
                if(is_front_page()) {
                  wp_nav_menu( array(
                  'theme_location' => 'homepage_menu',
                  'menu_class' => 'nav navbar-nav navbar-right scroll-div',
                 ) );
                } else {
                 wp_nav_menu( array(
                  'theme_location' => 'subpage_menu',
                  'menu_class' => 'nav navbar-nav navbar-right',
                 ) );
                }
              ?>

            <!-- </ul> -->
          </div>
        </div>
      </nav>
    </header>
<main>
