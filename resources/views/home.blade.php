<!DOCTYPE html>
<!-- saved from url=(0029)https://karfidov.2dit-dev.ru/ -->
<html lang="ru" class="page js-focus-visible" data-js-focus-visible=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link rel="shortcut icon" href="https://karfidov.2dit-dev.ru/favicon.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="theme-color" content="#111111">
  <title>2dit-gulp-2025</title>
  <!-- <link rel="preload" href="fonts/MullerRegular.woff2" as="font" type="font/woff2" crossorigin> -->
  <link rel="stylesheet" href="{{ asset('css/home/vendor.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/main.css') }}">
  <script defer="" src="{{ asset('js/home/main.js') }}"></script>
</head>

<body class="page__body products">
  <div class="site-container">
    <main class="main">


      <section class="products-first">

        <h1 class="products-first__title title-to-animate">
          Наши продукты
        </h1>

        <div class="products-first__cover image-to-animate">
          <img src="/storage/products/products-first.png" alt="">
        </div>

      </section>

      <section class="products-about section-to-animate visible">
        <div class="container">
            <h2 class="products-about__title">
              Передовые продукты для современных отраслей
            </h2>

            <div class="products-about__text">
              Мы разрабатываем высокотехнологичные решения для различных отраслей, включая робототехнику, медицину, IoT, телекоммуникации и умные города. Теперь некоторые из наших продуктов доступны для заказа. Наши технологии соответствуют высоким отраслевым стандартам и разработаны с учетом точности, надежности и удобства использования. Свяжитесь с нами для получения дополнительной информации или оформления заказа.
            </div>
        </div>
      </section>

        @foreach ($products as $product)
          <section class="products-item section-to-animate visible">
            <div class="container">
                @if ($loop->index % 2)
                <div class="products-item__box products-item__box_reverse">
                @else
                <div class="products-item__box">
                @endif
                  <div class="products-item__image">
                    <img src="{{ $product->image }}" alt="">
                  </div>
    
                  <div class="products-item__content">
                    <div class="products-item__content-title">{{ $product->name }}</div>
                    <div class="products-item__content-description">{{ $product->title }}</div>
                    <div class="products-item__content-line"></div>
                    <div class="products-item__content-text">{{ $product->description }}</div>
                    <a href="https://karfidov.2dit-dev.ru/#" class="products-item__content-link">
                      <span>Узнать </span>подробнее
                      <svg width="27" height="8" viewBox="0 0 27 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.3536 4.35355C26.5488 4.15829 26.5488 3.84171 26.3536 3.64645L23.1716 0.464466C22.9763 0.269204 22.6597 0.269204 22.4645 0.464466C22.2692 0.659728 22.2692 0.976311 22.4645 1.17157L25.2929 4L22.4645 6.82843C22.2692 7.02369 22.2692 7.34027 22.4645 7.53553C22.6597 7.7308 22.9763 7.7308 23.1716 7.53553L26.3536 4.35355ZM0 4.5H26V3.5H0V4.5Z" fill="white"></path>
                      </svg>
                    </a>
                    <button class="btn-reset products-btn products-item__content-btn js-products-modal-open" data-modal="products-order">Заказать</button>
                  </div>
                </div>
            </div>
          </section>
        @endforeach
      </section>

      <section class="products-order section-to-animate visible">
        <div class="container">
            <div class="products-order__box">
              
              <h2 class="products-order__title">Заявка на продукт</h2>
              
              <div class="products-order__text">Здесь вы можете оставить заявку на интересующий вас продукт. Наш менеджер свяжется с вами для уточнения деталей.</div>
              
              <button class="btn-reset products-btn products-btn_fill products-order__btn js-products-modal-open" data-modal="products-order">Оставить заявку</button>

            </div>
        </div>
      </section>


    </main>
    

<div class="products-modal" data-modal="products-order">

    <div class="products-modal__inner">

        <div class="products-modal__close js-products-modal-close">
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 1L1 20" stroke="#DDDDDD" stroke-width="2"></path>
                <path d="M1 1L20 20" stroke="#DDDDDD" stroke-width="2"></path>
            </svg>
        </div>
    
        <div class="products-modal__title">Форма заказа</div>

        <form action="{{ route('post_form') }}" class="products-modal__form js-products-modal-form">
            @csrf
            <div class="products-modal__form-block">
                <div class="products-modal__form-label">ФИО</div>

                <input type="text" name="products-name" class="products-modal__form-input" placeholder="Начните набирать текст" required="" data-name-mask="">
            </div>

            <div class="products-modal__form-block">
                <div class="products-modal__form-label">Телефон</div>

                <input type="tel" name="products-tel" class="products-modal__form-input" placeholder="Начните набирать текст" required="" data-tel-mask="">
            </div>

            <div class="products-modal__form-block">
                <div class="products-modal__form-label">E-mail</div>

                <input type="email" name="products-email" class="products-modal__form-input" placeholder="Начните набирать текст" required="">
            </div>

            <div class="products-modal__form-block">
                <div class="products-modal__form-label">Продукт</div>

                <div class="select">
                    <div class="select__arrow">
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="#333333"></path>
                        </svg>
                    </div>
                    <input name="products-select" class="select__value" type="text" readonly="readonly" placeholder="Выберите из списка">
                    <div class="select__list">
                      @foreach ($products as $product)
                        <div data-value="1" class="select__option">{{ $product->name }}</div>
                      @endforeach
                    </div>
                </div>

                <!-- <div class="products-modal__form-select">
                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L6 6L11 1" stroke="#333333"/>
                    </svg>
                        
                    <select name="products-select" class="products-modal__form-input">
                        <option value="-" selected disabled>Выберите из списка</option>
                        <option value="Продукт 1">Продукт 1</option>
                        <option value="Продукт 2">Продукт 2</option>
                        <option value="Продукт 3">Продукт 3</option>
                        <option value="Продукт 4">Продукт 4</option>
                    </select>
                </div> -->

            </div>

            <div class="products-modal__form-block">
                <div class="products-modal__form-label">Количество</div>

                <input type="text" name="products-quantity" class="products-modal__form-input" placeholder="Начните набирать текст" required="" data-num-mask="">
            </div>

            <div class="products-modal__form-block">
                <div class="products-modal__form-label">Комментарий</div>

                <textarea type="text" name="products-comment" class="products-modal__form-input products-modal__form-input_area js-products-modal-comment" placeholder="Начните набирать текст" maxlength="200"></textarea>

                <div class="products-modal__form-count js-products-modal-count">199</div>
            </div>

            <button type="submit" class="btn-reset products-btn products-modal__form-submit">отправить заявку</button>

        </form>
    </div>

</div>



<div class="products-modal" data-modal="products-order-success">

    <div class="products-modal__inner products-modal__inner_success">
   
        <div class="products-modal__title">Ваша заявка отправлена</div>

        <button class="btn-reset products-btn products-modal__btn js-products-modal-close">вернуться к продуктам</button>

    </div>

</div>
  </div>


</body></html>