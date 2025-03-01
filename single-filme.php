<?php get_header(); 
$thumbnail = get_the_post_thumbnail_url(); 
$post_id = get_the_ID();
$duracao = get_field("Duracao"); 
$generos = wp_get_post_terms($post_id, 'genero');
$classificacao_indicativa = wp_get_post_terms($post_id, 'classificacao-indicativa'); ?>
<main>
    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img class="single-movie-thumbnail" src="<?php echo $thumbnail ?>" alt="<?php echo get_the_title() ?>">
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid pt-4">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">
                    <div class="single-movie-info">
                        <h2 class="single-movie-info-title">Ficha técnica</h2>

                        <ul class="pt-4 single-movie-info-list">
                            <li>
                                <strong>Duração: </strong><span><?php echo $duracao?></span>
                            </li>

                            <li>
                                <strong>Gênero: </strong><span><?php echo $generos[0]->name ?></span>
                            </li>

                            <li>
                                <strong>Classificação indicativa: </strong><span><?php echo $classificacao_indicativa[0]->name ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="single-movie-title"><?php echo get_the_title(); ?></h1>
                </div>
                <div class="col-12 pt-2">
                    <?php echo get_the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>