    <?php get_template_part('modal'); ?>
    <!-- Footer -->
    <footer class="footer">
        <div class="container footer__container flex">
            <div class="footer-nav__row row-flex">
                <ul class="footer-nav__col footer-nav__mob-last  col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/about-us/">About us</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/contact-us/">Contact us</a>
                    </li>
                    <li class='footer-socials'>
                        <a target="_blank" href=' https://www.instagram.com/giardino_collection' class="footer-socials__item">
                            <img src="<?php print get_theme_file_uri(); ?>/img/icon-instagram.png" alt="">
                        </a>
                        <a target="_blank" href='https://www.facebook.com/Giardino-Collection-1262520017183555/' class="footer-socials__item">
                            <img src="<?php print get_theme_file_uri(); ?>/img/icon-fb.png" alt="">
                        </a>
                    </li>
                </ul>
                <ul class="footer-nav__col col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/delivery/">Delivery</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/return/">Return</a>
                    </li>
                </ul>
                <ul class="footer-nav__col col">
                    <!-- <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/privacy-policy/">Privacy policy</a>
                    </li> -->
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/taxes-and-duties/">Taxes and duties</a>
                    </li>
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/disclaimer/">Disclaimer</a>
                    </li>
                </ul>
            </div>

            <!-- Divider -->
            <div class="footer__divider"></div>

            <div class="footer-nav__row row-flex">
                <ul class="footer-nav__col col">
                    <?php
                    $args = array(
                        'taxonomy' => array('product_cat'),
                        'parent' => 0,
                        'hide_empty' => true,
                        'exclude' => 15
                    );
                    $categories = new WP_Term_Query($args);
                    ?>
                    <?php if (!empty($categories)) { ?>
                        <?php foreach ($categories->terms as $category) { ?>
                            <li class='footer-nav__item'>
                                <a class='footer-nav__link' href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <ul class="footer-nav__col footer-nav__mob-last footer-nav__mob-space col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/collections/">Explore by Collection</a>
                    </li>
                </ul>
                <ul class="footer-nav__col  col">
                    <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="/care-guide/">Care guide</a>
                    </li>
                    <!-- <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="<?php print get_theme_file_uri(); ?>/pdf/pillowcase.pdf">Care guide</a>
                    </li> -->
                    <!-- <li class='footer-nav__item'>
                        <a class='footer-nav__link' href="<?php print get_theme_file_uri(); ?>/pdf/pillowcase.pdf">Size guide</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="<?php print get_theme_file_uri(); ?>/js/main.js"></script>
    <script src="<?php print get_theme_file_uri(); ?>/js/vendor.js"></script>
    </body>

    </html>