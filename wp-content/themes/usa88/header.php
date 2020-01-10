<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri(); ?>/assets/img/favicon.ico" />
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
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
              <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.png" alt="<?= get_bloginfo( 'name' ) ?>">
            </a>
          </div>
          <div class="collapse navbar-collapse" id="global-navigation">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#">HOME</a></li>
              <li><a href="/products">PRODUCTS</a></li>
              <li><a href="#">SERVICES</a></li>
              <li><a href="#">ABOUT US</a></li>
              <li class="last"><a href="tel:027443467">(02) 744 3467</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
<main>
