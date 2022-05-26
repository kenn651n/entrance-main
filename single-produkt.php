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

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>


    <article class="single_produkt">

        <video class="produkt-movie" src="" >

        <div class="produkt_info">
            
            <p class="client"></p>
            <p class="movie-title"></p>

            <div class="produkt_wrapper">
                <h2 class="director-title">Director</h2>
                <p class="director"></p>

                <h2 class="arstal">Årstal</h2>
                <p class="year"></p>
            </div>

            <div class="beskrivelse_wrapper">
                <p class="description"></p>
            </div>
        </div>
  
    </article>


</div><!-- #primary -->

<script>
    let produkt; //laver variabel 'produkt'
    const dburl = "http://www.sjakstudio.dk/wordpress/wp-json/wp/v2/produkt" + <?php echo get_the_ID()?>; //laver konstant 'dburl' som er lig med det produkt som er klikket på

    async function getJson() {
        const data = await fetch(dburl); //laver konstant 'data' som henter data via dburl-variablen med fetch
        produkt = await data.json(); //variablen 'produkt' henter json-dataen 
        visprodukt(); //kalder funktionen visProdukt
    }

    function visprodukt() {
        document.querySelector(".produkt-movie").src = produkt.movie.guid; //indsætter kontakt i .kontakt
        document.querySelector(".client").innerHTML = produkt.client.rendered; //indsætter titlen i .produkt_navn
        document.querySelector(".movie-title").innerHTML = produkt.movie-title; //indsætter beskrivelse i .beskrivelse
        document.querySelector(".director-title").innerHTML //indsætter år i .beskrivelse
        document.querySelector(".director").innerHTML = produkt.director; //indsætter programmer i .beskrivelsedocument.querySelector(".arstal").innerHTML //indsætter år i .beskrivelse
        document.querySelector(".arstal").innerHTML //indsætter år i .beskrivelse
        document.querySelector(".year").innerHTML = produkt.year; //indsætter år i .beskrivelse
        document.querySelector(".description").innerHTML = produkt.description; //indsætter detaljer i .detaljer
    }

    getJson(); //henter JSON data

</script>


<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>