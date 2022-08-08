<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

        <title>Nore - Pengoperasian Website</title>
    </head>
    <body>
        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo-nore.png') }}" alt="" class="logo-nore"></a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="{{ url('/') }}#home" class="nav__link">Home</a></li>
                        <li class="nav__item"><a href="{{ url('/') }}#about" class="nav__link">About</a></li>
                        <li class="nav__item"><a href="{{ url('/') }}#services" class="nav__link">Services</a></li>
                        <li class="nav__item"><a href="{{ url('/') }}#contact" class="nav__link">Contact us</a></li>

                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--========== PRIVACY POLICY ==========-->
            <section class="privacy_policy" id="privacy_policy">
                <div class="home__container bd-container bd-grid">
                    <h1>Privacy Policy</h1>
                    <p>
                        Ini buat page privacy policy sa. Silahkan bermain - main di sini bu Khansa
                    </p>
                </div>
            </section>
        </main>

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">CV Nore Inovasi</a>
                    <span class="footer__description">IT Company</span>
                    <div>
                        <a href="https://www.facebook.com/norewebid/" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="https://www.instagram.com/nore.web.id/" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="https://api.whatsapp.com/send?phone=628112772788" class="footer__social"><i class='bx bxl-whatsapp'></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Mulai</h3>
                    <ul>
                        <li><a href="#home" class="footer__link">Home</a></li>
                        <li><a href="#about" class="footer__link">About</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="#services" class="footer__link">Services</a></li>
                        <li><a href="#contact" class="footer__link">Contact Us</a></li>
                        <li><a href="{{ url('/privacy-policy') }}" class="footer__link">Privacy policy</a></li>
                        <li><a href="#" class="footer__link">Terms of services</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Hubungi Kami</h3>
                    <ul>
                        <li>☎ +62 811 2772 788</li>
                        <li>✉ cs@nore.web.id</li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">Nore Inovasi © 2022. All right reserved</p>
        </footer>

        <!--========== MAIN JS ==========-->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>