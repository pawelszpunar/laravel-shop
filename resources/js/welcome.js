$(function() {
    $('div.products-sort a').click(function (event) {
        event.preventDefault();
        $('a.products-actual-sort').text($(this).text()).data($(this).data());
        //getProducts($(this).text());
    });

    $('div.products-count a').click(function (event) {
        event.preventDefault();
        $('a.products-actual-count').text($(this).text());
        //getProducts($(this).text());
    });

    $('div.products-count a').add('div.products-sort a').click(function (event) {
        event.preventDefault();
        console.log($('a.products-actual-sort').data().id);
        getProducts($('a.products-actual-count').first().text(), $('a.products-actual-sort').data().id);
    });

    $('a#filter-button').click(function (event) {
        event.preventDefault();
        getProducts($('a.products-actual-count').first().text());
    });

    // Cart
    $('button.add-cart-button').click(function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: WELCOME_DATA.addToCart + $(this).data().id
        })
            .done(function () {
                Swal.fire({
                    title: 'Awesome!',
                    text: 'Product added to the Cart',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<i class="fa-solid fa-cart-shopping"></i> Go to your Cart',
                    cancelButtonText: '<i class="fa-solid fa-basket-shopping"></i> Continue shopping'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = WELCOME_DATA.listCart;
                    }
                })
            })
            .fail(function (e) {
                console.log('ajax error - cart');
                console.log(e);
                Swal.fire('Ooops...', 'Error Occurred!', 'error');
            })
    });

    // Filter
    function getProducts(paginate, sort) {
        const form = $('form.sidebar-filter').serialize();
        $.ajax({
            method: "GET",
            url: "/",
            data: form + "&" + $.param({paginate: paginate}) + "&" + $.param({sort: sort})
        })
            .done(function (response) {
                $('div#products-wrapper').empty();
                $.each(response.data, function (index, product) {
                    const html = '<div class="col-6 col-md-6 col-lg-4 mb-3">\n' +
    '                                <div class="card h-100 border-0">\n' +
    '                                    <div class="card-img-top">\n' +
'                                            <img src="' + getImage(product) + '"\n' +
'                                                 class="img-fluid mx-auto d-block" alt="Product image">\n' +
    '                                    </div>\n' +
    '                                    <div class="card-body text-center">\n' +
    '                                        <h4 class="card-title">' + product.name + '\n' +
    '                                        </h4>\n' +
    '                                        <h5 class="card-price small">\n' +
    '                                            <i>PLN ' + product.price + '</i>\n' +
    '                                        </h5>\n' +
    '                                        <button class="btn btn-success btn-sm add-cart-button"' + getDisabled() + ' data-id="' + product.id + '">\n' +
    '                                            <i class="fa-solid fa-cart-shopping"></i>\n' +
    '                                            Add to Cart\n' +
    '                                        </button>\n' +
    '                                    </div>\n' +
    '                                </div>\n' +
    '                            </div>';
                    $('div#products-wrapper').append(html);
                });
            })
            .fail(function (msg) {
                console.log('ajax error');
                Swal.fire('Ooops...', 'Error Occurred!', 'error');
            })
    }

    function getImage(product) {
        if(!!product.image_path) {
            return WELCOME_DATA.storage_path + '/' + product.image_path;
        }
        return WELCOME_DATA.default_image;
    }

    function getDisabled() {
        if(WELCOME_DATA.isGuest) {
            return ' disabled';
        }
        return '';
    }
});
