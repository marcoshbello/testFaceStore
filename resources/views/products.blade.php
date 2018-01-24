@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@else
    @foreach ($products->data as $product)
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://placehold.it/100x100/000/fff" alt=""/>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">{{$product->i18n[0]->pt_PT->name}}</h4>
                    <p class="group inner list-group-item-text">
                        Description: {{$product->i18n[0]->pt_PT->description}}
                    </p>
                    <h5 class="group inner list-group-item-heading">SKU: {{ $product->sku }}</h5>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">9,99€</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <button onclick="getProductsById({{ $product->id }})" type="button"
                                    class="btn btn-primary btn-lg" data-toggle="modal" data-target="#productsModal">
                              See more...
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <input type="hidden" id="lastPage" value="{{ $products->meta->last_page }}">
@endif

<!-- Modal -->
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 id="productNameLabel" class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <img id="productImageSrc" class="group list-group-image" src="" alt=""/>
        <div class="caption">
            <p id="productDescriptionLabel" class="group inner list-group-item-text">
            </p>
            <h5 id="productSkuLabel" class="group inner list-group-item-heading"></h5>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p id="productPriceLabel" class="lead"></p>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add to cart</button>
      </div>
    </div>
  </div>
</div>