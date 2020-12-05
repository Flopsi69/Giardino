<?php get_header(); ?>
    <main class="main">
        <!-- Checkout -->
        <section class='section checkout'>
            <div class="container">
                <!-- Logo -->
                <a class='checkout__logo-link' href="/">
                    <img class='checkout__logo' src="<?php print get_theme_file_uri(); ?>/img/logo.png" alt="">
                </a>

                <!-- Nav -->
                <div class="checkout-nav flex a-center">
                    <div class="checkout-nav__step active" data-step-target='1'>
                        <div class="checkout-nav__step-num">1</div>
                        <div class="checkout-nav__step-caption">Contact</div>
                    </div>
                    <div class="checkout-nav__step" data-step-target='2'>
                        <div class="checkout-nav__step-num">2</div>
                        <div class="checkout-nav__step-caption">Shipping</div>
                    </div>
                    <div class="checkout-nav__step" data-step-target='3'>
                        <div class="checkout-nav__step-num">3</div>
                        <div class="checkout-nav__step-caption">Payment</div>
                    </div>
                </div>

                <!-- Head -->
                <div class="checkout__head flex a-center j-between">
                    <h1 class="checkout__title">Checkout</h1>

                    <div class="checkout__orders orders">
                        <div class="orders__head">
                            <!-- Toggler -->
                            <div class="orders__toggler dropdown-toggler flex a-center">
                                <div class="orders__caption">Show Order Summary:</div>
                                <div class="orders__value">$162</div>
                            </div>

                            <!-- Popup -->
                            <div class="orders-popup">
                                <!-- Order -->
                                <div class="orders-popup__list">
                                    <div class="orders-popup__order">
                                        <!-- Image -->
                                        <a href='#' class="orders-popup__order-image">
                                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-2.png"
                                                 alt="">
                                        </a>

                                        <!-- Info -->
                                        <div class="orders-popup__order-info">
                                            <a href='#' class="orders-popup__order-title">Towel ‘Christmas Toys”</a>
                                            <div class="orders-popup__order-params flex a-end j-between">
                                                <div class="orders-popup__order-options">
                                                    <div class="orders-popup__order-option">Size 25*55</div>
                                                    <div class="orders-popup__order-option">Qty: 1</div>
                                                </div>
                                                <div class="orders-popup__order-price">$100</div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="orders-popup__order">
                                        <!-- Image -->
                                        <a href='#' class="orders-popup__order-image">
                                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-2.png"
                                                 alt="">
                                        </a>

                                        <!-- Info -->
                                        <div class="orders-popup__order-info">
                                            <a href='#' class="orders-popup__order-title">Towel ‘Christmas Toys”</a>
                                            <div class="orders-popup__order-params flex a-end j-between">
                                                <div class="orders-popup__order-options">
                                                    <div class="orders-popup__order-option">Size 25*55</div>
                                                    <div class="orders-popup__order-option">Qty: 1</div>
                                                </div>
                                                <div class="orders-popup__order-price">$100</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Prices -->
                                <div class="orders-popup__prices">
                                    <div class="orders-popup__row row-flex j-between">
                                        <div class="orders-popup__key col">Subtotal</div>
                                        <div class="orders-popup__value col">$100</div>
                                    </div>
                                    <div class="orders-popup__row row-flex j-between">
                                        <div class="orders-popup__key col">Shipping</div>
                                        <div class="orders-popup__value col">$50</div>
                                    </div>
                                    <div class="orders-popup__row row-flex j-between">
                                        <div class="orders-popup__key col">Tax</div>
                                        <div class="orders-popup__value col">Calculated at next step</div>
                                    </div>
                                </div>

                                <!-- Total -->
                                <div class="orders-popup__total">
                                    <div class="orders-popup__row row-flex j-between">
                                        <div class="orders-popup__key col">Total</div>
                                        <div class="orders-popup__value orders-popup__total-price col">$170</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Steps list -->
                <div class="steps">
                    <!-- Step -->
                    <div class="step step-one active" data-step='1' style='display: block;'>
                        <div class="step-one__row row-flex a-center">
                            <div class="step-express step-one__express col">
                                <div class="step-express__title">Express checkout</div>
                                <div class="step-express__descr">By choosing PayPal or Apple Pay you will be asked to
                                    fill in your
                                    contact
                                    and shipping details after
                                </div>
                                <div class="step-express__buttons">
                                    <button class="btn btn_trans pdp__buttons-payment w-100 step-express__buttons-item">
                                        <img
                                                src="<?php print get_theme_file_uri(); ?>/img/paypal.png" alt="">
                                    </button>
                                    <button class="btn btn_trans pdp__buttons-payment  w-100 step-express__buttons-item">
                                        <img
                                                src="<?php print get_theme_file_uri(); ?>/img/applepay.png" alt="">
                                    </button>
                                </div>
                            </div>

                            <div class="step-one__divider flex a-center j-center col">OR</div>


                            <form class='step-one__form col' action="">
                                <div class="step__title text-center">What’s your contact information?</div>
                                <div class="group">
                                    <input class='input w-100' type="email">
                                    <label class='label' for="">Email Address</label>
                                </div>

                                <div class="group">
                                    <input class='input w-100' type="text">
                                    <label class='label' for="">Full Name</label>
                                </div>

                                <div class="step__divider group"></div>

                                <button class="step-next step-two__btn btn btn_blue w-100" type='submit'>Continue
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Step -->
                    <div class="step step-two" data-step='2'>
                        <?php
                        $checkout = WC()->checkout();
                        do_action('woocommerce_before_checkout_form', $checkout);
                        do_action('woocommerce_checkout_billing');
                        do_action('woocommerce_checkout_shipping');
                        do_action('woocommerce_checkout_after_order_review');
                        ?>
                        <div class="step__inner step-two__first active" style='display: block;'>
                            <div class="step__title text-center">Where should we send your order?</div>
                            <form class='step-two__first-form' action="">
                                <div class="group error">
                                    <input class='input w-100' type="text" value='Error example'>
                                    <label class='label' for="">Street Address</label>
                                    <div class="error__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                    </div>
                                </div>

                                <div class="group">
                                    <input class='input w-100' type="text">
                                    <label class='label' for="">Apt, Suite, Building (Optional)</label>
                                </div>

                                <div class="group__row">
                                    <div class="group group__col">
                                        <input class='input w-100' type="text">
                                        <label class='label' for="">Zip Code</label>
                                    </div>

                                    <div class="group group__col">
                                        <input class='input w-100' type="text">
                                        <label class='label' for="">City, State</label>
                                    </div>
                                </div>

                                <div class="select select_out group disabled">
                                    <select class=''>
                                        <option value="">Choose</option>
                                        <option value="1">200x240x12 cm</option>
                                        <option value="2">200x240x33 cm</option>
                                        <option value="3">200x240x50 cm</option>
                                    </select>
                                    <label class='label' for="">Country/Region</label>
                                </div>

                                <div class="group">
                                    <input class='input w-100' type="tel">
                                    <label class='label' for="">Phone Number</label>
                                </div>

                                <div class="step__divider group"></div>

                                <button type='submit'
                                        class="step-two__btn btn btn_blue w-100 step-next step-next_inner">Use this
                                    address
                                </button>
                            </form>
                        </div>

                        <div class="step__inner step-two__second">
                            <div class="step__title text-center">Choose a delivery option:</div>
                            <form class='step-two__second-form' action="">
                                <label class="step__radio radio">
                                    <input class='radio__input' type="radio" name="radio">
                                    <span class="radio__mark"></span>

                                    <span class="step__radio-info">
                    <span class="step__radio-title">November,10. Till 12:00</span>
                    <span class="step__radio-caption">Express Delivery</span>
                  </span>

                                    <span class="step__radio-price">$50</span>
                                </label>

                                <label class="step__radio radio">
                                    <input class='radio__input' type="radio" name="radio">
                                    <span class="radio__mark"></span>

                                    <span class="step__radio-info">
                    <span class="step__radio-title">November,10. Till 23:59</span>
                    <span class="step__radio-caption">Standard Delivery</span>
                  </span>

                                    <span class="step__radio-price">$30</span>
                                </label>

                                <div class="step__divider group"></div>

                                <button type='submit' class="step-two__btn btn btn_blue w-100 step-next">Continue
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Step -->
                    <div class="step step-three" data-step='3'>
                        <div class="step__title text-center">How do you want to pay?</div>
                        <form class='step-three__form' action="">
                            <label class="step__radio radio">
                                <input class='radio__input' type="radio" name="radio">
                                <span class="radio__mark"></span>

                                <span class="step__radio-info">
                  <span class="step__radio-title">Credit or Debit Card</span>
                  <span class="step__radio-caption">Visa, Mastercard, Maestro, AMEX, Discover, UnionPay</span>
                </span>
                            </label>

                            <label class="step__radio radio">
                                <input class='radio__input' type="radio" name="radio">
                                <span class="radio__mark"></span>

                                <span class="step__radio-info">
                  <img src="<?php print get_theme_file_uri(); ?>/img/paypal.png" alt="">
                </span>
                            </label>

                            <label class="step__radio radio">
                                <input class='radio__input' type="radio" name="radio">
                                <span class="radio__mark"></span>

                                <span class="step__radio-info">
                  <img src="<?php print get_theme_file_uri(); ?>/img/applepay.png" alt="">
                </span>
                            </label>

                            <div class="step__divider group"></div>

                            <a href="" type='submit' class="step-two__btn btn btn_blue w-100">Continue
                                to
                                payment</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>