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
            <div class="video-container">
                <center>
				<video width="100%" height="auto" src="assets/videos/video.mp4" muted autoplay loop></video>
                </center>
			</div>
            <!--========== HOME ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__data">
                        <h1 class="home__title">NORE WEBSITE</h1>
                        <h2 class="home__subtitle">Nore team provides website creation and maintenance services which are handled directly by experienced IT staff. With an affordable subscription fee, you can get consulting services, website creation, retouching, content management, and server maintenance.</h2>
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
                        <p class="about__description">CV Nore Inovasi is a company that is actively engaged in the development of information technology. This IT company was started by Noer Prajitno, M.Sc (Founder) together with Daniel Ismanto, ST (Co-founder) in October 2019. Starting from providing website creation services, NORE developed its services to create mobile apps, information systems, and digital marketing (SEM).<br><br>
                            In accordance with the company name NORE which is an acronym for "no repot", CV Nore Inovasi is committed to providing quality solutions for website creation, information systems, and all forms of practical information technology problems "No Repot, No Rempong" for various groups. With an affordable subscription fee, customers can get consulting services, website creation, retouching, content management, and server maintenance.<br><br>
                            CV Nore Inovasi is based in Semarang Town Square Building, providing IT solutions with premium quality to customers. Our services include, but are not limited to:<br><br>
                            • Company Profile Website<br>
                            • Online Shop<br>
                            • Personal Blog<br>
                            • Information System<br>
                            • Mobile Application Development<br>
                            • Digital Marketing Services<br>
                            • And Other Software Application Development</p>
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
                        <p class="services__description">Subscription website without operation.</p><br>
                        <span class="section-subtitle"><b>Starting from IDR 600k/year <br> 1.2 million for the first year</b></span>
                    </div>

                    <div class="services__content">
                        <img src="{{ asset('assets/img/nore.png') }}" alt="" class="nore__img">
                        <h3 class="services__title">NORE</h3>
                        <p class="services__description">Subscription website with the operation of the NORE team (No Repot, No Rempong)</p><br>
                        <span class="section-subtitle"><b>Starting from IDR 2 million/year</b></span>
                    </div>

                    <div class="services__content">
                        <img src="{{ asset('assets/img/lepas.png') }}" alt="" class="lepas__img">
                        <h3 class="services__title">Lepas</h3>
                        <p class="services__description">Purchase the website from NORE without subscribing</p><br>
                        <span class="section-subtitle"><b>Starting from IDR 2.5 million</b></span>
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
                    <h3 class="footer__title">Begin</h3>
                    <ul>
                        <li><a href="#home" class="footer__link">Home</a></li>
                        <li><a href="#about" class="footer__link">About</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="#services" class="footer__link">Services</a></li>
                        <li><a href="#portfolio" class="footer__link">Portfolio</a></li>
                        <li><a href="#contact" class="footer__link">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Contact Us</h3>
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