<x-web.layouts.master>
    <section class="py-5">
        <div class="container">
            <h3 class="text-center mb-3">{{$catOrSCatProducts->name}}</h3>
            <div class="row">
                @foreach($catOrSCatProducts->product as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{asset('storage/images/product-images/'.$product->image)}}" class="card-img-top" alt="Product Image">
                        <div class="card-body text-center">
                            <a class="card-title text-decoration-none text-primary" href="{{ route('getProductBySlug', ['slug' => $product->slug]) }}">
                                {{ substr($product->title, 0, 40) }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-web.layouts.master>