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
    '                                    </div>\n' +
    '                                </div>\n' +
    '                            </div>';
                    $('div#products-wrapper').append(html);
                });
            })
            .fail(function (msg) {
                console.log('ajax error')
            })
    }

    function getImage(product) {
        if(!!product.image_path) {
            return storage_path + '/' + product.image_path;
        }
        return default_image;
    }
});
