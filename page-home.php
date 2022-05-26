<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>


<template>
    <article class="slideshow-container">
    </article>
</template>



	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

    </div>


    <div class="smiley animation">
    <div class="image-logo logo_flip">
        <img src="https://karolinerelster.dk/wp-content/themes/child-theme/SVG/smileyy_hvid.svg" alt="hvid logo">
    </div>

</div>
    <div class="boks animation"></div>
	</div>

    <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <img src="https://entrance.dk/sites/default/files/plan-boernefonden.png" style="width:100%">
    <div id="info-container">
      <div id="info-wrapper">
        <a class="client" href="">PlanBørneFonden</a>  
        <h2 class="title">Planen virker ikke uden dig og mig</h2>
        <a class="director" href="">Kasper Torsting</a>
      </div>
      <div id="player-wrapper">
      <a class="play" href="">Play</a>
      <a class="read-more" href="">Read more →</a>  
      </div>
    </div>

</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img2.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img3.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- The dots/circles -->
<div id="dot-wrapper">
<div id="dots" style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>
</div>
 <div id="section2">   
<div class="info-container">
  <div class="info-wrapper">
    <h2>entrance</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
  </div>
  <div class="button-wrapper">
  <a href="">work →</a>
  <a href="">directors →</a>
  </div>
</div>
</div>
    <!-- #primary -->

<script>
    window.addEventListener("load", sidenVises); //lader siden loade før javascipt startes


   
function sidenVises() {
        document.querySelector(".boks").classList.add("animation");
        document.querySelector(".image-logo").classList.add("logo_flip");

    }

function showPage() {
        document.querySelector(".boks").classList.add("animation");
        document.querySelector(".smiley").classList.add("animation");
}

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

    </script>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>


<?php get_footer(); ?>
