@extends('master.frontend_main')

@section('frontend')

          <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Check Out</li>
                    </ul>
                </div>
            </div>
            <div class="container">
                  <div class="row">
                     <div class="col col-xs-12">
                        <div class="woocommerce bg-light p-3">
                           <form  method="POST"  action="{{route('checkout.store')}}" enctype="multipart/form-data">
                            @csrf
                              <div class="col2-set" id="customer_details">
                                 <div class="coll-1">
                                    <div class="woocommerce-billing-fields">
                                       <h3>Billing Details</h3>
                                       <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                          <label for="billing_first_name" class="">Full Name <abbr class="required" title="required">*</abbr></label>
                                          <input type="text" class="input-text " name="full_name" id="billing_first_name" placeholder="" autocomplete="given-name" value="">
                                       </p>
                                       <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                        <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="" autocomplete="tel" value="">
                                     </p>
                                       <div class="clear"></div>
                                       
                                       <p class="form-row form-row form-row-first address-field update_totals_on_change validate-required" id="billing_country_field">
                                          <label for="billing_country" class="">Country <abbr class="required" title="required">*</abbr></label>
                                          <select name="country" id="billing_country" autocomplete="country" class="country_to_state country_select " style="display: none;">
                                             <option value=""  selected="selected">Select a country…</option>
                                             <option value="AX">Bangladesh</option>
                                             <option value="AF">Afghanistan</option>
                                             <option value="AL">USA</option>
                                             <option value="DZ">UK</option>
                                             <option value="AS">Germany</option>
                                          </select>
                                       </p>
                                       <p class="form-row form-row form-row-last address-field update_totals_on_change validate-required" id="billing_country_field">
                                          <label for="billing_country" class="">City <abbr class="required" title="required">*</abbr></label>
                                          <select name="city" id="billing_country" autocomplete="country" class="country_to_state country_select " style="display: none;">
                                             <option value="" selected="selected">Select a City…</option>
                                             <option value="AX">Dhaka</option>
                                             <option value="AF">Rangpur</option>
                                             <option value="AL">Rajshahi</option>
                                             <option value="DZ">Chattagram</option>
                                             <option value="AS">Khulna</option>
                                             <option value="AS">Barisal</option>
                                             <option value="AS">Sylhet</option>
                                             <option value="AS">Mymansingh</option>
                                          </select>
                                       </p>
                                       <p class="form-row form-row form-row-first" id="billing_company_field">
                                        <label for="billing_company" class="">Building / House No / Floor / Street</label>
                                        <input type="text" class="input-text " name="street" id="billing_company" placeholder="" autocomplete="organization" value="">
                                     </p>
                                     
                                     <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                        <label for="billing_phone" class="">Colony / Suburb / Locality / Landmark <abbr class="required" title="required">*</abbr></label>
                                        <input type="tel" class="input-text " name="locality" id="billing_phone" placeholder="" autocomplete="tel" value="">
                                     </p>
                                     <div class="clear"></div>
                                       <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                          <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                                          <input type="text" class="input-text " name="address" id="billing_address_1" placeholder="Street address" autocomplete="address-line1" value="">
                                       </p>
                                    </div>
                                    <p class="form-row form-row notes" id="order_comments_field">
                                          <label for="order_comments" class="">Order Notes</label>
                                          <textarea name="other" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                       </p>
                                 </div>
                              </div>
                              <h3 id="order_review_heading">Your order</h3>
                              <div id="order_review" class="woocommerce-checkout-review-order">
                                 <table class="shop_table woocommerce-checkout-review-order-table">
                                       <tbody><tr class="cart-subtotal">
                                          <th>Subtotal</th>
                                          <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span></span>
                                          </td>
                                       </tr>
                                       <tr class="cart-subtotal">
                                          <th>Discount</th>
                                          <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>10</span>
                                          </td>
                                       </tr>
                                       <tr class="shipping">
                                          <th>Delivery Charge</th>
                                          <td data-title="Shipping">
                                            <span class="woocommerce-Price-currencySymbol">£</span>10
                                             <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="free_shipping:1" class="shipping_method">
                                          </td>
                                       </tr>
                                       <tr class="order-total">
                                          <th>Total</th>
                                          <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>165.00</span></strong> </td>
                                       </tr>
                                 </tbody></table>
                                 <div id="payment" class="woocommerce-checkout-payment py-3 mt-5">
                                    <ul class="wc_payment_methods payment_methods methods">
                                       <li class="wc_payment_method payment_method_cheque mb-2">
                                          <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="Cash On Delivery" checked='checked' data-order_button_text="" />
                                          <!--grop add span for radio button style-->
                                          <span class='grop-woo-radio-style'></span>
                                          <!--custom change-->
                                          <label for="payment_method_cheque">Cash On Delivery</label>
                                       </li>
                                       <li class="wc_payment_method payment_method_paypal mb-2">
                                          <input id="payment_method_ssl" type="radio" class="input-radio" name="payment_method" value="SSL" data-order_button_text="Proceed to SSL Commerz" />
                                          <!--grop add span for radio button style-->
                                          <span class='grop-woo-radio-style'></span>
                                          <!--custom change-->
                                          <label for="payment_method_ssl">SSL Commerz</label>
                                       </li>
                                       <li class="wc_payment_method payment_method_paypal">
                                          <input id="payment_method_stripe" type="radio" class="input-radio" name="payment_method" value="stripe" data-order_button_text="Proceed to SSL Commerz" />
                                          <!--grop add span for radio button style-->
                                          <span class='grop-woo-radio-style'></span>
                                          <!--custom change-->
                                          <label for="payment_method_stripe">Stripe Payment</label>
                                       </li>
                                    </ul>
                                    <div class="form-row place-order">
                                       <noscript>
                                          Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.
                                          <br/>
                                          <input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" />
                                       </noscript>
                                       <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order" />
                                       <input type="hidden" id="_wpnonce5" name="_wpnonce" value="783c1934b0" />
                                       <input type="hidden" name="_wp_http_referer" value="/wp/?page_id=6" /> 
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
        </div>
@endsection