<?php get_header('checkout'); ?>
    <main class="main">
    <!-- Checkout -->
    <section class='section checkout'>
        <div class="container">
            <!-- Logo -->
            <a class='checkout__logo-link' href="/">
                <img class='checkout__logo' src="<?php print get_theme_file_uri(); ?>/img/logo.png" alt="">
            </a>
            <?php if (!empty($order)) { ?>
            <div class="checkout-success text-center">
                <div class="checkout-success__title">Thank you for your order!</div>
                <div class="checkout-success__icon">
                    <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-mail.svg" alt="">
                </div>
                <div class="checkout-success__caption">We have sent your invoice on email.</div>
                <div class="checkout-success__note">Your order reference number: <span>#<?php echo $order->get_id(); ?></span></div>
                <a href="/" class="btn btn_blue checkout-success__btn w-100">Continue shopping</a>
            </div>
            <?php } ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>