(function($) {
    "use strict";

    //window load start
    // $(window).load(function () {


    //add to cart
    const currentRestaurant = {
        uniqueId: $('input[name="outlet_id"]').val(),
        url: $('input[name="outlet_url"]').val(),
        name: $('input[name="outlet_name"]').val(),
        image: $('input[name="outlet_img"]').val(),
        city: $('input[name="outlet_city"]').val(),
        address: $('input[name="outlet_address"]').val(),
    };
    
var order_data = {};

    const keys = ['id', 'qty'];
    const add_to_cart_button = '.menu-list-item__btn--cart .btn-text';
    //cart storage key
    const cartStorageKey = 'cart_products';
    const localStorageKey = 'pind';

    const cart_btn_increase = '.cart-item-count__btn--increase';
    const cart_btn_decrease = '.cart-item-count__btn--decrease';


    // cart increase decrease functions

    $(document).on('click', '.menu-list-item__btn--cart', function(e) {
        e.preventDefault();
    });


    $(document).on('click', cart_btn_increase, function(e) {
        e.preventDefault();
        var data = {
            qty: 1,
            id: $(this).parent().attr('data-id')
        }
        increaseDecreaseCommon($(this), data);
    });

    $(document).on('click', cart_btn_decrease, function(e) {
        e.preventDefault();
        var data = {
            qty: -1,
            id: $(this).parent().attr('data-id')
        }
        increaseDecreaseCommon($(this), data);
    });


    const increaseDecreaseCommon = (instance, data) => {

        if (!instance.hasClass('cart-item-count__btn--active')) {
            data.bypass = true;
        }

        const item = updateOrAddToCart(data, function(item) {
            const parent = instance.parent();
            if (Object.keys(item).length > 0) {
                parent.find('.cart-item-count').text(item['qty']);
            } else {
                if (parent.hasClass('cart-item-count__btn--active')) {
                    parent.removeClass('cart-item-count__btn--active');
                    parent.prev().removeClass('btn-text--hidden');
                }
            }
        });

    }



    $(add_to_cart_button).on('click', function(e) {
        e.preventDefault();
        const product_id = $(this).attr('data-id');
        const name = $(this).attr('data-name');

        const price = $(this).attr('data-price');
        const is_veg = $(this).attr('data-veg');
        // for demo
        var data = {
            id: product_id,
            name: name,
            qty: 1,
            is_veg: is_veg,
            price: price
        };
        // alert(data.is_veg);exit();

        const item = updateOrAddToCart(data, function(item) {
            const next = $(this).next();
            if (Object.keys(item).length > 0 && item['qty'] > 0) {
                next.attr('data-id', product_id);
                $(this).addClass('btn-text--hidden');
                next.addClass('cart-item-count__btn--active');
                next.find('.cart-item-count').text(item['qty']);
            } else {
                next.attr('data-id', -1);
                $(this).removeClass('btn-text--hidden');
                next.removeClass('cart-item-count__btn--active');
            }
        });

    });



    const changeLoopAddToCart = (id, items) => {
        const addToCart = $('.menu-list-item__btn--cart').find('[data-id="' + id + '"]');
        const next = addToCart.next();
        if (items.hasOwnProperty(id)) {
            next.attr('data-id', id);
            addToCart.addClass('btn-text--hidden');
            next.addClass('cart-item-count__btn--active');
            next.find('.cart-item-count').text(items[id]['qty']);
        } else {
            next.attr('data-id', -1);
            addToCart.removeClass('btn-text--hidden');
            next.removeClass('cart-item-count__btn--active');
        }
    }



    // cart related Functions cart storage update cart events also 
    function getCart(key = null) {
        var cart = getItem(cartStorageKey);

        if (Object.keys(cart).length > 0) {
            var $return = cart;
            if (key && cart.hasOwnProperty(key)) {
                $return = cart[key];
            }
            return $return;
        }
        return {};
    }

    // cart related Functions cart storage update cart events also 
    function getCartItems(product_id = null) {
        var items = getCart('items');
        if (Object.keys(items).length > 0) {
            var $return = items;
            if (product_id && items.hasOwnProperty(product_id)) {
                $return = $return[product_id];
            }
            return $return;
        }
        return {};
    }

    function getCartItem(product_id) {
        var item = getCartItems(product_id);
        return item;
    }


    const getCartItemSinglePayload = (data) => {
        let current_restaurant = currentRestaurant;
        if (isCheckOutPage() || (data.hasOwnProperty('bypass') && data.bypass)) {
            current_restaurant = getCurrentCartResturant();
        }

        return {
            name: data.name,
            qty: data.qty,
            price: data.price,
            is_veg: data.is_veg,
            id: data.id,
            current_restaurant: current_restaurant,
            bypass: data.bypass || false
        }
    };




    //check payload of dada params
    function checkAddToCartDataPayload(data) {
        var $return = true;
        keys.forEach((key, index) => {
            if (!data.hasOwnProperty(key) || data[key] == undefined || data[key] == null) {
                return $return = false;
            }
        });
        return $return;
    }

    var payload = null;
    var afterFetchCallback = null;

    const updateOnServer = (reset = false) => {

        $.post(global_config.base_url + 'home/add_to_cart', {
            item: payload,
            reset: reset
        }, (response) => {
            var json_object = JSON.parse(response);
            if (json_object.success) {
                const cart = json_object.cart;
                const items = cart.items;
                setItem(cartStorageKey, cart);

                var item = items[payload.id];
                $(document).trigger('TSM/cart-item-' + json_object.trigger, [payload.id, item, payload]);

                $(document).trigger('TSM/cart-updated', [payload.id, cart, items, payload]);

                if (afterFetchCallback) {

                    afterFetchCallback(item);
                }

            } else {
                console.log('error on update cart')
            }

        });

    }

    //cart auto determine where to update or add new
    function updateOrAddToCart(data, callback = null) {
        if (!checkAddToCartDataPayload(data)) {
            return false;
        }
        payload = getCartItemSinglePayload(data);
        afterFetchCallback = callback;
        var lastResturant = getCurrentCartResturant();

        if (!payload.bypass && lastResturant && lastResturant.uniqueId != payload.current_restaurant.uniqueId) {
            $("#resetCartModal").modal({
                backdrop: 'static',
                keyboard: false
            });
        } else {
            updateOnServer();
        }
    }

    $(document).on('click', '.reset-cart-modal__button--fresh-start', function() {
        $(document).trigger('TSM/cart-reset');
        updateOnServer(true);
    });


    const getCurrentCartResturant = () => {
        var current = getCart('current_restaurant');
        if (Object.keys(current).length === 0) {
            current = false;
        }
        return current;
    }


    const isCheckOutPage = () => {
        if ($('.cart-container').hasClass('checkout__cart-review')) {
            return true;
        }
        return false;
    }

    //broadcast between tabs events
    const channel = new BroadcastChannel('cart-update-data');
    channel.addEventListener('message', (event) => {

        if (event.data.reset) {
            resetAllAddToCartButtons();
            return;
        }

        sideCart(event.data.cart);

        
        changeLoopAddToCart(event.data.id, event.data.items);
    });


    function resetAllAddToCartButtons() {
        $('.btn-text--hidden').each(function() {
            var next = $(this).next();
            $(this).removeClass('btn-text--hidden');
            next.removeClass('cart-item-count__btn--active');
            next.attr('data-id', -1);
            next.find('.cart-item-count').text(0);

        });
    }

    $(document).on('TSM/cart-reset', function() {
        const channel = new BroadcastChannel('cart-update-data');
        const data = {
            reset: true
        }
        channel.postMessage(data);
    });


    $(document).on('TSM/cart-updated', function(event, id, cart, items, passedData) {
        // sideCart(items);
        const channel = new BroadcastChannel('cart-update-data');
        const data = {
            cart: cart,
            items: items,
            id: id,
        }
        channel.postMessage(data);

        if ($("#resetCartModal").data('bs.modal')?._isShown) {
            $("#resetCartModal").modal('hide');
        }
    });

    $(document).on('TSM/empty-cart', function() {
        $('.cart-container').html(emptyCartHtml());
        if (isCheckOutPage()) {
            window.location.assign(global_config.base_url + 'home');
        }
    });






    function sideCart(cart = {}) {


        if (Object.keys(cart).length <= 0) {
            cart = getCart();
        }

        var items = cart.hasOwnProperty('items') ? cart['items'] : {};

        var count_products = 0;
        var item_total = 0;
        var productHtml = '';
        for (var [product_id, item] of Object.entries(items)) {
            count_products += item.qty;
            productHtml += getCartItemHtml(item, product_id);
            item_total += item.price;
            changeLoopAddToCart(product_id,items);
        };
        
        $('.nav-menu__item--link .cart-count').text(count_products);
        $('.ecommerce-cta__item-val-highlighter').text(count_products);
        
        if (count_products <= 0) {
            $(document).trigger('TSM/empty-cart', [items]);
        } else {

            let data = {
                subtotal: item_total,
                item_total: item_total,
                to_pay: item_total,
                delivery: 0,
                coupon: 0,
                tax_charges: 0,
                products: productHtml,
                number_of_products: count_products,
                suggestion: '',
                current_restaurant: cart.current_restaurant,
                order_data:order_data
            }

            if (isCheckOutPage()) {
                $('.checkout__cart-review').html(checkoutCartHtml(data));
            } else {
                $('.cart-container').html(cartContainerHtml(data));
            }


        }

    }


    const checkoutCartHtml = (data) => {


        return `    
  ${cartResturantComponent(data)}
              <div class="cart-review__body px-4">
                
                <!--cart items-->
                
                ${data.products}
                
                <!--end cart items-->
                
                
                <!--suggestion-->
                
                ${cartSuggestionComponent(data)}
                
                <!--end suggestion-->
                
                
                
                <!--apply coupon-->
                
                ${cartApplyCouponComponent(data)}
                <!--end apply coupon-->
                
                
                
                <!--subtotal-->
                <div class="cart-review__subtotal-container">
                
                
                  <!--item total-->
                
                    ${cartItemTotalComponent(data)}  
                  
                  <!--end item total-->
                  
                  
                  <!--start delivery fee-->
                  
                <!--end delivery fee-->
                    
                    
                    
                  <!--taxes and charges-->
                  
                  <!--end taxes and charges-->
                  
                </div>
                <!--end subtotal container-->

                
                <!--cart to pay-->
                ${cartToPayComponent(data)}
                <!--cart to pay end-->
            
            </div>`;

    };

    const cartResturantComponent = (data) => {
        return `<a href="${data.current_restaurant.url}" class="cart-review__header cart-review-selected-outlet px-4 py-3 d-flex position-sticky top-0">
                <div class="selected-outlet__image mr-3">
                  <img src="${data.current_restaurant.image}" class="border-radius--custom" alt="outlet image" width="50">
                </div>
                <div class="selected-outlet__content">
                  <p class="text--heading font-weight-bold mb-0">${data.current_restaurant.name}</p>
                  <p class="text--para text--xs">${data.current_restaurant.city}, ${data.current_restaurant.address}</p>
                </div>
              </a>`;
    }

    const cartSuggestionComponent = () => {
        return `<div class="cart-review__user-suggestion-form mb-3 d-flex align-items-center bg--light border-radius--custom px-3 py-1">
                  <span class="user-suggestion-form__quote-icon"><i class="fas fa-quote-left"></i></span>
                  <input type="text" name="userSuggestionAboutOrder" placeholder="Any suggestions? We will pass it on." class="user-suggestion-form__input w-100 py-2 px-3 bg--light border-0 border-radius--custom text--xs" value="${data.order_data.suggestion || ''}">
                </div>`;
    }

    const cartApplyCouponComponent = (data) => {
        return `<div class="cart-review__apply-coupan-form d-flex align-items-center mb-3 border-radius--custom px-3 py-1">
                  <span><img src="${global_config.base_url}assest/images/coupan-code-icon.png" alt="coupan-code-icon" width="20"></span>
                  <input type="text" name="coupon_code" value="${data.order_data.coupon_code || ''}" placeholder="Apply coupon code here..." class="apply-coupan-form__input w-100 py-2 px-3 border-0 border-radius--custom text--xs outline--none">
                </div>`;
    }


    const cartItemTotalComponent = (data) => {
        return `<div class="subtotal-item d-flex justify-content-between mb-2">
                    <p class="text--para text--xs m-0">Item Total</p>
                    <p class="text--para text--xs m-0">
                      <span class="subtotal-item__currency"><i class="fas fa-rupee-sign"></i></span><span class="subtotal-item__value">${data.item_total}</span>
                    </p>
                  </div>`;
    }

    const cartDeliveryChargesComponent = (data) => {
        return `<div class="subtotal-item justify-content-between d-flex pb-3">
                    <div class="text--para text--xs m-0 d-inline-block position-relative">
                      Delivery Fee |
                      <span class="subtotal-item__delivery-distance"
                        >4.2 kms
                        <span class="ml-1 subtotal-item__extra-info">
                          <i class="fas fa-info-circle"></i>
                        </span>
                      </span>
                      <div class="subtotal-item__extra-info-tooltip p-2 bg--white border-radius--custom">
                        <p class="tooltip__heading m-0 text--para text--xxs">Delivery fee breakup for this order</p>
                        <div class="tooltip__content d-flex align-items-center justify-content-between">
                          <span class="extra-info__title text--xxs text--para">Base Fee</span>
                          <span class="extra-info__value-container">
                            <span class="extra-info__value-currency text--xxs text--para"><i class="fas fa-rupee-sign"></i></span>
                            <span class="extra-info__value text--xxs text--para">50</span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <p class="text--para text--xs m-0">
                      <span class="subtotal-item__currency"><i class="fas fa-rupee-sign"></i></span><span class="subtotal-item__value">100</span>
                    </p>
                  </div>`;
    }

    const cartTaxesAndChargesComponent = (data) => {
        return `<div class="subtotal-item subtotal-item--taxes justify-content-between d-flex pt-3 pb-3">
                    <div class="text--para text--xs m-0 d-inline-block position-relative">
                      Taxes and Charges
                      <span class="ml-1 subtotal-item__extra-info">
                        <i class="fas fa-info-circle"></i>
                      </span>
                      <div class="subtotal-item__extra-info-tooltip p-2 bg--white border-radius--custom">
                        <p class="tooltip__heading m-0 text--para text--xxs">Taxes and Chages</p>
                        <div class="tooltip__content d-flex align-items-center justify-content-between">
                          <span class="extra-info__title text--xxs text--para">Charges Title</span>
                          <span class="extra-info__value-container">
                            <span class="extra-info__value-currency text--xxs text--para"><i class="fas fa-rupee-sign"></i></span>
                            <span class="extra-info__value text--xxs text--para">10</span>
                          </span>
                        </div>
                        <div class="tooltip__content d-flex align-items-center justify-content-between">
                          <span class="extra-info__title text--xxs text--para">Charges Title</span>
                          <span class="extra-info__value-container">
                            <span class="extra-info__value-currency text--xxs text--para"><i class="fas fa-rupee-sign"></i></span>
                            <span class="extra-info__value text--xxs text--para">10</span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <p class="text--para text--xs m-0">
                      <span class="subtotal-item__currency"><i class="fas fa-rupee-sign"></i></span><span class="subtotal-item__value">100</span>
                    </p>
                  </div>`;
    }

    const cartToPayComponent = (data) => {
        return `<div class="cart-order__total-container d-flex justify-content-between mb-4 py-3">
                  <div>
                    <p class="font-weight-bold text--heading mb-0">To Pay</p>
                  </div>
                  <div>
                    <span class="cart-order__total-price-container text--heading pl-2">
                      <span class="cart-order__total-price-currency"><i class="fas fa-rupee-sign"></i></span>
                      <span class="cart-order__total-price-value">${data.to_pay}</span>
                    </span>
                  </div>
                </div>`;
    }


    const cartContainerHtml = (data) => {
        return '<div class="cart-container__main">' +
            '<h4 class="text--heading mb-2">Cart</h4>' +
            '<p class="text--para text--xs mb-1">' +
            'from<span class="cart-order__from-restaurant ml-2"><a href="' + data.current_restaurant.url + '" class="cart-order__from-restaurant--link">' + data.current_restaurant.name + '</a></span>' +
            '</p>' +
            '<p class="cart-order__item-count text--xs text--para mb-4">' +
            '<span class="cart-order__item-count-value">' + data.number_of_products + '</span>' +
            '<span>Items</span>' +
            '</p>' +
            '<div class="cart-item-container">' +
            data.products +
            '</div>' +

            '<div class="cart-order__total-container d-flex justify-content-between mb-4">' +
            '<div>' +
            '<h6 class="font-weight-bold text--heading mb-0">Subtotal</h6>' +
            '<p class="text--xs text--para m-0">Extra charges may apply</p>' +
            '</div>' +
            '<div>' +
            '<span class="cart-order__total-price-container text--heading pl-2">' +
            '<span class="cart-order__total-price-currency"><i class="fas fa-rupee-sign"></i></span>' +
            '<span class="cart-order__total-price-value">' + data.subtotal + '</span>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '<a href="#" class="checkout_button button button__primary d-block w-100 text-center">' +
            '<span>Checkout</span>' +
            '<span class="ml-1"><i class="fas fa-long-arrow-alt-right"></i></span>' +
            '</a>' +
            '</div>';
    }

    const emptyCartHtml = () => {
        return '<div class="cart-container__empty">' +
            '<h4 class="text--heading mb-2">Empty Cart</h4>' +
            '<div class="empty-cart__image">' +
            '<img src="' + global_config.base_url + 'assest/images/empty-cart-icon.jpg" alt="" />' +
            '</div>' +
            '<p class="text--para text--lg">Oops, your cart is empty.<br>Go ahead, order some yummy items from the menu.</p>' +
            '</div>';
    }

    const getCartItemHtml = (item, product_id) => {
        // if(item.is_veg === 'veg'){
        //     var item_isveg = 'nonveg';
        // }else{
        //     var item_isveg = 'veg';
        // }
        // alert(data.is_veg);exit();
        return '<div class="cart-order__cta d-flex justify-content-lg-between mb-4 w-100">' +
            '<span class="cart-order__food-type cart-order__food-type--' + item.is_veg + ' mr-2">' +
            '<i class="fas fa-utensils"></i>' +
            '</span>' +
            '<span class="cart-order__food-title text--xs text--heading pr-2">' + item.name + '</span>' +
            '<div class="cart-item-count__btn d-flex" data-id="' + product_id + '">' +
            '<a class="cart-item-count__btn--decrease">-</a>' +
            '<span class="cart-item-count">' + item.qty + '</span>' +
            '<a class="cart-item-count__btn--increase">+</a>' +
            '</div>' +
            '<span class="cart-order__calculated-price-container text--xs text--heading pl-2">' +
            '<span class="cart-order__calculated-price-currency"><i class="fas fa-rupee-sign"></i></span>' +
            '<span class="cart-order__calculated-price-value">' + item.price + '</span>' +
            '</span>' +
            '</div>';
    }


$(document).on('keyup','input[name="userSuggestionAboutOrder"]',function(){
    order_data.suggestion =$(this).val(); 
});

$(document).on('keyup','input[name="coupon_code"]',function(){
    order_data.coupon_code = $(this).val(); 
});

    sideCart();

    //storage functions
    function setItem(key, data, to) {
        var all = getItems();
        if (!all) {
            all = {}
        }
        if (!to) {
            to = localStorageKey;
        }
        all[key] = data;
        localStorage.setItem(to, JSON.stringify(all));
        return all;
    }

    function getItem(key, from = false) {
        if (!from) {
            from = localStorageKey;
        }
        var data = JSON.parse(localStorage.getItem(from));
        if (data && data.hasOwnProperty(key)) {
            return data[key];
        }
        return {};
    }

    function getItems(key = false) {
        if (!key) {
            key = localStorageKey;
        }
        return JSON.parse(localStorage.getItem(key));
    }




    //helper
    // checkout

    $(document).on('click', '.checkout_button', function(e) {
        var url = "add-to-cart";
        e.preventDefault();
        const cartItems = getCartItems();
        if (Object.keys(cartItems).length > 0) {
            window.location.assign(global_config.base_url + 'home/checkout');
        }
    });


    //window load end
    //  });


})(jQuery);