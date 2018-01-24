function getProducts(page) {
    $.ajax({
        url: './products/getProducts',
        headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
        data: {
            pageNumber: page
        },
        type: 'GET',
        datatype: 'JSON',
        success: function (productView) {
            $("#products").empty().html(productView);
        }
    });
}

function getProductsById(productId) {
    $.ajax({
        url: './products/getProductById',
        headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
        data: {
            productId: productId
        },
        type: 'GET',
        datatype: 'JSON',
        beforeSend: function () {
            $("#productNameLabel").empty();
            $("#productImageSrc").attr("src", "");
            $("#productDescriptionLabel").empty();
            $("#productSkuLabel").empty();
            $("#productPriceLabel").empty();
        },
        success: function (product) {
            if (product[0]['success']) {
                $("#productNameLabel").html(product[0]['data']['data'][0]['i18n'][0]['pt_PT']['name']);
                $("#productImageSrc").attr("src", "http://placehold.it/200x200/000/fff");
                $("#productDescriptionLabel").html('Description: ' + product[0]['data']['data'][0]['i18n'][0]['pt_PT']['description']);
                $("#productSkuLabel").html('SKU: ' + product[0]['data']['data'][0]['sku']);
                $("#productPriceLabel").html("9,99€");
            } else {
                $("#productDescriptionLabel").html('Error: ' + product[0]['messages']);
            }
        }
    });
}

$(document).ready(function () {
    $('#productsModal').on('shown.bs.modal', function () {
    });

    window.pagObj = $('#pagination').twbsPagination({
        totalPages: $('#lastPage').val(),
        visiblePages: 10,
    }).on('page', function (event, page) {
        console.info(getProducts(page));
    });
});
