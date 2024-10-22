<x-web.layouts.master>
    <section>
        <div class="container mt-5">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-6">
                    <img src="{{asset('storage/images/product-images/'.$product->image)}}" class="img-fluid" alt="Product Image">
                </div>


                <div class="col-md-6">

                    <h2 class="mb-4">{{ $product->title }}</h2>


                    <div class=" mb-4">
                        <h4 for="description">Product Description</h4>

                        <p>{!! $product->description !!}</p>
                    </div>
                    <div class="d-grid gap-2 d-md-block">

                    </div>

                    <div class="p-2 mb-2 ">
                        <span class="text-decoration-line-through text-muted me-2">${{ $product->price }}</span>
                        <span class="h5 text-success">${{ $product->discount_price }}</span>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary btn-md" type="button">Buy Now</button>
                        <button class="btn btn-secondary btn-md" type="button">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-web.layouts.master>