# wordpress

![WordPress Theme](https://github.com/web-browser1/wordpress/blob/main/PressFrameComplete2/pressframe-thumbnail.png)

![WordPress Theme](https://github.com/web-browser1/wordpress/blob/main/PressFrameComplete2/pressframe-main_files/theme/pressframe/screenshot.png)



**Kodens struktur och syfte**

Koden är skriven i PHP och används för att skapa en standardsida för nyheter på en WordPress-webbplats. Den hämtar olika delar av mallarna och bygger upp en sida med nyhetsinnehåll, kategorier, taggar, kommentarer och sidpagination.

**Röd tråd genom koden**

1. **Inkludering av header och mall:**
   - `<?php get_header(); ?>`: Hämtar header-filen som troligtvis innehåller sidans huvudinformation såsom logo, navigation och sidtitel.
   - `<?php get_template_part('news') ?>`: Hämtar en mallfil med namnet "news.php" som antagligen innehåller specifik layout och styling för nyhetssidor.

2. **Sidans innehållsområde:**
   - `<div id="content" ...>`: Definierar en div-container med id "content" och tillhörande styling för innehållet.

3. **Huvudcontainer och loopen för inlägg:**
   - `<div class="container"> ... </div>`: En container för själva nyhetsinnehållet.
   - `<div id="main" class="main"> ... </div>`: Huvudområdet för nyheterna.
   - `<?php if (have_posts()): ?> ... <?php endif; ?>`: Kontrollerar om det finns några publicerade inlägg. Om det finns körs koden inom denna block.
      - `<?php $c = 0; ?>`: Initierar en variabel $c för att räkna inlägg.
      - `<ul id="index"> ... </ul>`: Skapar en oordnad lista med id "index" för att visa nyhetsartiklarna.
      - `<?php while (have_posts()): the_post(); ?> ... <?php endwhile; ?>`: Loopar igenom alla publicerade inlägg. Inuti loopen hämtas information om varje inlägg med `the_post()`.
         - `<li <?php echo 'id="li' . $c . '"' ?> ... >`: Skapar en lista-element (li) för varje inlägg med ett unikt id baserat på räknaren $c.
            - **Inläggsbild:**
               - `<div id="featured" ... > <?php the_post_thumbnail(); ?> </div>`: Definierar en div för inläggsbilden och använder `the_post_thumbnail()` för att hämta den.
            - **Inläggsrubrik och kategorier/taggar:**
               - `<div id="top"> ... </div>`: En div-container för rubrik, kategorier och taggar.
                  - `<a id="title" href="<?php the_permalink(); ?>"><h1> <?php the_title(); ?> </h1></a>`: Skapar en länk till inlägget med rubriken som h शीर्ष (tóushì) ("huvudtext") innanför en h1-tagg.
                  - `<div class="cattag"> ... </div>`: En div-container för kategorier och taggar.
                     - `<div id="catlist" ... > <?php echo get_the_category_list(' '); ?> </div>`: Hämtar och visar alla kategorier som inlägget tillhör.
                     - `<div id="taglist" ... > <?php echo get_the_tag_list(' '); ?> </div>`: Hämtar och visar alla taggar som är kopplade till inlägget.
            - **Inläggsinformation:**
               - `<div class="info"> ... </div>`: En div-container för kommentarer och publiceringsdatum.
                  - `<div id="commenthead" ... > ... <?php comments_number('0', '1', '%'); ?> ... </div>`: Visar antalet kommentarer till inlägget.
                  - `<div id="date" ... > <?php echo get_the_date(); ?> written by <?php the_author_posts_link(); ?> </div>`: Visar publiceringsdatum och författare.
            - **Inläggsinnehåll:**
               - `<div class="text"> <?php the_content(); ?> </div>`: Hämtar och visar inläggsinnehållet.

4. **Sidpagination:**
   - `<?php if (get_previous_posts_link()): ?> ... <?php endif; ?>`: Kontrollerar om det finns en föregående sida med inlägg och visar en länk i så fall.
   - `<?php
