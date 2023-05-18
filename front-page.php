<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package seox
 */


get_header();
?>
<main>
  <div class="position-absolute gray-700"></div>
  <div class="position-absolute black-gradient"></div>
  <section class="carrossel d-flex flex-column">
    <section class="heading-dark-2 d-flex flex-row justify-content-between align-items-center">
      <h1 class="section">VÍDEOS</h1>
      <section class="btns-group d-flex" role="group">
        <a href="#" class="btn btn-veja-mais-outline flex-row justify-content-end align-items-center text-nowrap" role="button">
            veja mais<i class="vector-82"></i>
        </a>
        <a href="#" class="carousel-btn btn-prev m-0 p-0" role="button" data-bs-toggle="carrossel">
          <i class="vector-58" aria-hidden="true"></i>
          <span class="visually-hidden">Previous</span>
        </a>
        <a href="#" class="carousel-btn btn-next m-0 p-0" role="button" data-bs-toggle="carrossel">
            <i class="vector-96" aria-hidden="true"></i>
            <span class="visually-hidden">Next</span>
        </a>
      </section>
    </section><!--heading-dark-2-->
    <section class="d-flex gap-flex">
      <?php
        $response = wp_remote_get('https://teste-frontend.seox.com.br/wp-json/wp/v2/posts?_embed',  array(
          'timeout'     => 20,
        ));

        if (is_wp_error($response)) {
          return false; // Bail early
        }

        $data = wp_remote_retrieve_body($response);

        $apiData= json_decode($data);


        if (! empty($data)) {
          echo '<section class="slider-single">';
            foreach ($apiData as $post) {
              echo '<section class="position-relative max-slide-height">';
                $title= $post->title->rendered;
                $image= $post->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->{'full'}->source_url;
                $excerpt= $post->excerpt->rendered;
                $link = $post->link;
                echo '<img class="img-fluid" src="' .$image. '">';
                echo '<a class="state-vector position-absolute" href="' . esc_url( $link ) . '"></a>';
                echo '<h1 class="hat loren-hat">' .$title. '</h1>';
                echo '' . $excerpt . '';
              echo '</section>';
            }
          echo '</section>';
          echo '<section class="slider-nav">';
            foreach ($apiData as $post) {
              echo '<section class="position-relative d-flex flex-column align-items-start p-0 wrapper">';
                $title= $post->title->rendered;
                $image= $post->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->{'medium'}->source_url;
                $excerpt= $post->excerpt->rendered;
                $link = $post->link;
                echo '<img class="slider-nav-img img-fluid" src="' .$image. '">';
                echo '<a class="state-vector-thumb position-absolute" href="' . esc_url( $link ) . '"></a>';
                echo '<span class="comment position-absolute"><i class="ico-comment d-inline-block"></i>29</span>';
                echo '<section class="d-flex flex-column p-thumb">';
                  echo '<h1 class="hat loren-hat">' .$title. '</h1>';
                  echo '' . $excerpt . '';
                echo '</section>';
              echo '</section>';
            }
        echo '</section>';
        }
      ?>
    </section>
  </section><!--carrossel-->
</main>

<?php get_footer(); ?>