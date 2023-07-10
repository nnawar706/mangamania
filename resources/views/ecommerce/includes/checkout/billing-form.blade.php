<div class="checkout__form">
    <h4>Billing Details</h4>
    <form action="#">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="checkout__input">
                    <p>Address<span>*</span></p>
                    <input type="text" name="address1" placeholder="Street Address" class="checkout__input__add" required>
                    <input type="text" name="address2" placeholder="Building, Flat, etc (optional)" class="checkout__input__add">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Phone<span>*</span></p>
                            <input type="text" name="contact" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="checkout__input">
                    <p>Account Password<span>*</span></p>
                    <input type="password" name="password" required>
                </div>
                <p>Please verify your email and password to confirm order.</p>
                <div class="checkout__input__checkbox">
                    <label for="diff-acc">
                        I agree to the terms and conditions
                        <input type="checkbox" id="diff-acc">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="checkout__input">
                    <p>Order notes</p>
                    <input type="text"
                           placeholder="Notes about your order, e.g. special notes for delivery.">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="checkout__order">
                    <h4>Your Order</h4>
                    <div class="checkout__order__products">Items <span>Total</span></div>
                    <ul>
                        @foreach($data as $row)
                        @php
                            $discount = $row['discount'] ? (($row['price']*$row['discount'])/100) : 0;
                        @endphp
                        <li>{{ $row->item }}, {{ $row->volume }} - {{ $row->attribute_name }}
                            <span>
                                @if($row->attribute_name == 'Hardcover')
                                    &#2547; {{ (($row->price - $discount)*$row->quantity)+(150*$row->quantity) }}
                                @else
                                    &#2547; {{ ($row->price - $discount)*$row->quantity }}
                                @endif
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="checkout__order__subtotal">Subtotal <span>&#2547; {{ \Illuminate\Support\Facades\Session::get('cart_price') }}</span></div>
                    <div class="checkout__order__total">Total <span>&#2547; {{ \Illuminate\Support\Facades\Session::get('cart_price')-\Illuminate\Support\Facades\Session::get('promo_discount') }}</span>
                        @if(\Illuminate\Support\Facades\Session::get('promo_discount')!==null)
                        <p style="font-size: 11px;color:#f30000">* &#2547;{{ \Illuminate\Support\Facades\Session::get('promo_discount') }} Discount Applied</span>
                        @endif
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.</p>
                    <div class="checkout__input__checkbox">
                        <label for="payment">
                            Cash On Delivery
                            <input type="checkbox" id="payment">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="checkout__input__checkbox">
                        <label for="paypal">
                            Card Payment
                            <input type="checkbox" id="paypal">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <button type="submit" class="site-btn">PLACE ORDER</button>
                </div>
            </div>
        </div>
    </form>
</div>
