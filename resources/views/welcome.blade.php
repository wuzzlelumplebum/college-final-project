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
                        <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                        <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                        <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>
                        @if (!Auth::check())
                            <li class="nav__item"><a href="{{ url('/login') }}" class="nav__link">Log in</a></li>
                        @else
                            @if (Auth::user()->role == 1)
                                <li class="nav__item"><a href="{{ url('/admin') }}" class="nav__link">Admin Page</a></li>
                            @endif
                            @if (Auth::user()->role == 20)
                                <li class="nav__item"><a href="{{ url('/keuangan') }}" class="nav__link">Finance Page</a></li>
                            @endif
                            @if (Auth::user()->role > 20)
                                <li class="nav__item"><a href="{{ url('/customer') }}" class="nav__link">Customer Page</a></li>
                            @endif
                        @endif

                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--========== HOME ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__data">
                        <h1 class="home__title">NORE WEBSITE</h1>
                        <h2 class="home__subtitle">Tim Nore menyediakan layanan pembuatan website beserta pemeliharaannya yang ditangani langsung oleh staf IT berpengalaman. Dengan biaya berlangganan yang terjangkau, Anda bisa mendapatkan layanan konsultasi, pembuatan website, pengubahan tampilan, pengelolaan konten, dan pemeliharaan server.</h2>
                    </div>
    
                    <img src="{{ asset('assets/img/home.png') }}" alt="" class="home__img">
                </div>
            </section>
            
            <!--========== ABOUT ==========-->
            <section class="about section bd-container" id="about">
                <div class="about__container  bd-grid">
                    <div class="about__data">
                        <span class="section-subtitle about__initial">About us</span>
                        <h2 class="section-title about__initial">CV. Nore Inovasi</h2>
                        <p class="about__description">CV Nore Inovasi merupakan perusahaan yang aktif bergerak dalam bidang pengembangan teknologi informasi. Perusahaan IT ini dirintis oleh Noer Prajitno, M.Sc (Founder) bersama dengan Daniel Ismanto, ST (Co-founder) pada Oktober 2019. Berawal dari menyediakan layanan pembuatan website, NORE mengembangkan layanannya ke pembuatan mobile apps, sistem informasi, dan digital marketing (SEM).<br><br>
                            Sesuai dengan nama perusahaan NORE yang merupakan akronim “no repot”, CV Nore Inovasi berkomitmen untuk memberikan solusi berkualitas untuk pembuatan website, sistem informasi, dan segala bentuk permasalahan teknologi informasi yang praktis “No Repot, No Rempong” untuk berbagai kalangan. Dengan biaya berlangganan yang terjangkau, pelanggan bisa mendapatkan layanan konsultasi, pembuatan website, pengubahan tampilan, pengelolaan konten, dan pemeliharaan server.<br><br>
                            CV Nore Inovasi berkantor di Gedung Semarang Town Square menyediakan solusi IT dengan kualitas premium kepada pelanggan. Layanan kami termasuk, tapi tidak terbatas pada:<br><br>
                            ◌ Website Profil Perusahaan<br>
                            ◌ Toko Online<br>
                            ◌ Blog Pribadi<br>
                            ◌ Sistem Informasi<br>
                            ◌ Pengembangan Aplikasi Mobile<br>
                            ◌ Layanan Digital Marketing<br>
                            ◌ Dan Pengembangan Aplikasi Perangkat Lunak Lainnya</p>
                    </div>

                    <img src="{{ asset('assets/img/about.png') }}" alt="" class="about__img">
                </div>
            </section>

            <!--========== SERVICES ==========-->
            <section class="services section bd-container" id="services">
                <span class="section-subtitle">Offering</span>
                <h2 class="section-title">Our amazing services</h2>

                <div class="services__container  bd-grid">
                    <div class="services__content">
                        <img src="{{ asset('assets/img/mini.png') }}" alt="" class="mini__img">
                        <h3 class="services__title">Mini</h3>
                        <p class="services__description">Website berlangganan tanpa pengoperasian.</p><br>
                        <span class="section-subtitle"><b>Mulai dari Rp 600rb/thn <br> 1,2juta untuk tahun pertama</b></span>
                    </div>

                    <div class="services__content">
                        <img src="{{ asset('assets/img/nore.png') }}" alt="" class="nore__img">
                        <h3 class="services__title">NORE</h3>
                        <p class="services__description">Website berlangganan dengan pengoperasian tim NORE (No Repot, No Rempong)</p><br>
                        <span class="section-subtitle"><b>Mulai dari Rp 2juta/thn</b></span>
                    </div>

                    <div class="services__content">
                        <img src="{{ asset('assets/img/lepas.png') }}" alt="" class="lepas__img">
                        <h3 class="services__title">Lepas</h3>
                        <p class="services__description">Pembelian website dari NORE tanpa berlangganan</p><br>
                        <span class="section-subtitle"><b>Mulai dari Rp 2,5juta</b></span>
                    </div>
                </div>
            </section>

            <!--========== CONTACT US ==========-->
            <section class="contact section bd-container" id="contact">
                <div class="contact__container bd-grid">
                    <div class="contact__data">
                        <span class="section-subtitle contact__initial">Let's talk</span>
                        <h2 class="section-title contact__initial">Contact us</h2>
                        <p class="contact__description">+62 811 2772 788 <br> cs@nore.web.id </p>
                    </div>

                    <div class="contact__button">
                        <a href="https://api.whatsapp.com/send/?phone=628112772788&text=Hi%2C+saya+ingin+bertanya+tentang+Nore+Inovasi+Semarang&type=phone_number&app_absent=0" class="button">Contact us now</a>
                    </div>
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

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>