    <?php get_template_part('modal'); ?>
    <!-- Footer -->
    <footer class="footer">
        <div class="container footer__container flex">
            <div class="footer-nav__row row-flex">
                <ul class="footer-nav__col footer-nav__mob-last  col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/simple-text-page.html">About us</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/simple-text-page.html">Contact us</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link'></a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="#">Log in</a>
                    </li>
                </ul>
                <ul class="footer-nav__col col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/simple-text-page.html">Delivery</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/simple-text-page.html">Return</a>
                    </li>
                </ul>
                <ul class="footer-nav__col col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/simple-text-page.html">Privacy policy</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/simple-text-page.html">Taxes and duties</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/simple-text-page.html">Disclaimer</a>
                    </li>
                </ul>
            </div>

            <!-- Divider -->
            <div class="footer__divider"></div>

            <div class="footer-nav__row row-flex">
                <ul class="footer-nav__col col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/products.html">Bed linen</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/products.html">Towels</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/products.html">L’art de la table</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/products.html">Decoration</a>
                    </li>
                </ul>
                <ul class="footer-nav__col footer-nav__mob-last footer-nav__mob-space col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/collections.html">Explore by Collection</a>
                    </li>
                </ul>
                <ul class="footer-nav__col  col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="#">Care guide</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="#">Size guide</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="<?php print get_theme_file_uri(); ?>/js/main.js"></script>
    <script src="<?php print get_theme_file_uri(); ?>/js/vendor.js"></script>
    </body>
</html>