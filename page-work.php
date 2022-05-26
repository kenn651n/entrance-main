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
    <article class="produkt_article">
        <div class="">
        <video class="produkt-movies" src="" alt="">
        </div>
    </article>
</template>




	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

		<div class="galleri_container">
        <div>
            <!-- <div class="filtrerings_knap">
                <button class="filtrer">Filtre <img class="filter_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/filter_icon.svg" alt="filtrer"></button>
            </div> -->

            <!-- <div id="filter_menu">
                <nav id="filtrering" class="sortering"><button data-produkt="alle">Vis alle værker</button></nav>


                <nav>
                    <div id="former_filtrering" class="sortering"></div>
                </nav>
                <nav>
                    <div id="stoerrelse_filtrering" class="sortering"></div>
                </nav>
            </div> -->

        </div>

        <div class="introduktion">
            <!-- <p id="intro"> Mit navn er Karoline Relster. <br>Dette er min portfolio. Jeg har her på siden udvalgt en række projekter, med henblik på at finde en praktikplads som digital designer i københavnsområdet. Her på siden kan du hoppe rundt imellem de projekter jeg har været en del af. Du kan se hvilke kompetencer og evner jeg besidder, samt hvordan jeg arbejder med visuel identitet, UX -og webdesign. </p> -->
            <section class="produkt_container">
            </section>
        </div>

    </div>
   
    <div class="smiley animation">
    <div class="image-logo logo_flip">
        <img src="https://karolinerelster.dk/wp-content/themes/child-theme/SVG/smileyy_hvid.svg" alt="hvid logo">
    </div>

</div>
    <div class="boks animation"></div>
	</div><!-- #primary -->

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

    let produkter; //laver variabel 'produkter'
    //let genre; //laver variabel 'genre'
    let filterprodukt = "alle"; //laver variabel 'filterprodukt' som er lig med 'alle'
    const dburl = "http://www.sjakstudio.dk/wordpress/wp-json/wp/v2/produkt"; //laver kontant 'dburl' som er lig med alle produkter
    // const genreurl = "https://tinahvid.dk/wp-json/wp/v2/genre?per_page=100"; //laver konstant 'genreurl' som er lige med alle genrer

    async function getJson() {
        console.log("getJson");
        const data = await fetch(dburl); //laver konstant 'data' som henter data via dburl-variablen med fetch
        //const genredata = await fetch(genreurl); //laver konstant 'genredata' som henter data via genreurl-variablen med fetch
        produkter = await data.json(); //variablen 'produkter' henter json-dataen
        //        produkter.reverse(); //gør så produkterne kommer i omvendt rækkefølge
        //genre = await genredata.json(); //variablen 'genre' henter json-dataen
        visProdukter(); //kalder funktionen visProdukter
        //opretKnapper(); //kalder funktionen opretKnapper
    }

    function visProdukter() {
        let temp = document.querySelector("template"); //laver variabel 'temp' som er lig med vores template i HTML'en
        let container = document.querySelector(".produkt_container"); //laver variabel 'container' som er lig med .produkt_container
        // document.querySelector("#intro").innerHTML; //indsætter titlen i .produkt_navn

        container.innerHTML = ""; //fjerner indhold i containeren så den kun viser den genre man har klikket på (ikke lægger til)
        console.log(produkter);
        produkter.forEach(produkt => {
            //if (filterprodukt == "alle" || produkt.genre.includes(parseInt(filterprodukt))) { //hvis filterprodukt er lig med "alle" eller hvis produktet har genren man har valgt  (parseInt gør at den læser filterProdukt som tal i stedet for tekst)

                let klon = temp.cloneNode(true).content; //laver variabel 'klon' som kloner alt indholdet i vores template
                klon.querySelector("video").src = produkt.movie.guid; //fortæller hvad der skal indsættes i img
                klon.querySelector("article").addEventListener("click", () => { //når man klikker på article kommer man videre til singleview
                    location.href = produkt.link;
                });
                container.appendChild(klon); //indsætter alt det klonede indhold i container

            //}
        })
    }

    getJson(); //henter JSON data


    </script>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>


<?php get_footer(); ?>
