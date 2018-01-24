<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Test FaceStore</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset("css/products.css")}}">
    </head>
    <body>
        <div id="container" class="container">
            <h2>Products FaceStore</h2>
            <div id="products" class="row list-group">
                @include('products')
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination" id="pagination"></ul>
            </nav>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="{{asset("js/products.js")}}"></script>
    <script src="{{asset("js/jquery.twbsPagination.js")}}"></script>
</html>