<?php $banners = get_field("banners"); ?>

<main class="container-fluid">
    <div class="container">
        <div class="position-relative row swiper-banner">
            <div class="col-12 swiper">
                <div class="swiper-wrapper">
                <?php foreach ($banners as $banner): ?>
                    <div class="swiper-slide">
                        <img class="banner-image-desktop" src="<?php echo $banner['imagem_desktop']['url'] ?>" alt="<?php echo $banner['imagem_desktop']['alt']?>">
                        <img class="banner-image-mobile" src="<?php echo $banner['imagem_mobile']['url'] ?>" alt="<?php echo $banner['imagem_mobile']['alt']?>">
                    </div>
                <?php endforeach; ?>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="row">
            <div class="col-12 py-2">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</main>