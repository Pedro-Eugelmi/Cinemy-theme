<?php get_header(); 
$banners = get_field("banners"); ?>

<main class="container-fluid">
    <div class="container swiper-banner">
        <div class="col-12 swiper">
            <div class="swiper-wrapper">
            <?php foreach ($banners as $banner): ?>
                <div class="swiper-slide">
                    <img src="<?php echo $banner['imagem_desktop']['url'] ?>" alt="<?php echo $banner['imagem_desktop']['alt']?>">
                    <img src="<?php echo $banner['imagem_mobile']['url'] ?>" alt="<?php echo $banner['imagem_mobile']['alt']?>">
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>