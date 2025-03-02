const swiperBanner = new Swiper('.swiper-banner .swiper', {
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  // Single product
  if ($(".single-product").length > 0) {

    $(".single-product-seats-item").on("click", function() {
      let seatsInput = $("#seats");
      let qttInput = $("#quantity");
      let priceArea = $(".single-product-order-price .price");
      let price = $(".single-product").data("price");
      let seatsIds = [];
      let seats = null;

      // Ativa ou desativa o que foi clicado
      $(this).toggleClass("active");
      
      // Pega todos os ativos
      seats = $(".single-product-seats-item.active");

      // Pega os ids dos assentos ativos
      seats.each(function(index, el) {
        seatsIds.push($(el).attr("id"));
      });

      // Transforma os ids em Json em insere no formulário
      seatsInput.val(JSON.stringify(seatsIds));
      
      //Insere a quantidade no formulário
      qttInput.val(seatsIds.length);

      // Altera o preço para o usuário
      price = price * seatsIds.length;
      priceArea.text(price.toLocaleString("pt-BR", { style: "currency", currency: "BRL" }));
    });
  }