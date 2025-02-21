<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('butterfly/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('butterfly/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('butterfly/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('butterfly/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('butterfly/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('butterfly/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('butterfly/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('butterfly/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    @include('template.navbar')

    <main class="main">
        @yield('main-content')
    </main>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('butterfly/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('butterfly/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('butterfly/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('butterfly/assets/vendor/glightbox/js') }}/glightbox.min.js') }}"></script>
    <script src="{{ asset('butterfly/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('butterfly/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('butterfly/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('butterfly/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('butterfly/assets/js/main.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let sections = document.querySelectorAll("section");
            let navLinks = document.querySelectorAll("#navmenu ul li a");

            function changeActiveSection() {
                let scrollY = window.scrollY;

                sections.forEach((section) => {
                    let sectionTop = section.offsetTop - 100;
                    let sectionHeight = section.offsetHeight;
                    let sectionId = section.getAttribute("id");

                    if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                        navLinks.forEach((link) => {
                            link.classList.remove("active");
                            if (link.getAttribute("href") === `#${sectionId}`) {
                                link.classList.add("active");
                            }
                        });
                    }
                });
            }

            window.addEventListener("scroll", changeActiveSection);
        });
    </script>
</body>

</html>
