<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-5 ">
        <h1 class="text-center">Charge $55 with Stripe</h1>
        <span class="payment-errors"></span>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed text-dark bg-light shadow" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Paiement par carte bancaire
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                <div class="accordion-body">
    
                    <!-- stripe payment form -->
                    <form action="submit.php" method="POST" id="paymentFrm">
                        <p>
                            <label>Name</label>
                            <input type="text" name="name" size="50" />
                        </p>
                        <p>
                            <label>Email</label>
                            <input type="text" name="email" size="50" />
                        </p>
                        <p>
                            
                        <label>Card Number</label>
                        <input type="text" name="card_num" size="20" autocomplete="off" class="card-number" />
                        </p>
                        <p>
                            <label>CVC</label>
                            <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc" />
                        </p>
                        <p>
                            <label>Expiration (MM/YYYY)</label>
                            <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
                            <span> / </span>
                            <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
                        </p>
                        <button type="submit" id="payBtn">Submit Payment</button>
                    </form>
            </div>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed text-dark bg-light shadow" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Paiement par paypal
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                </div>
            </div>
        </div>
</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>