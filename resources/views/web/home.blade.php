<x-web.layouts.master>
    <!-- Shoes -->
    <section class="container" id="shoes">
        @foreach($categories as $category)
        <h2 class="mb-2 mt-4 text-center">{{$category->name}}</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($category->subCategory as $sCat)
            <div class="col">
                <div class="card h-100 border-0 shadow-lg">
                    <img src="{{asset('storage/images/sub-category-images/'.$sCat->image)}}" class="card-img-top" alt="...">

                    <div class="m-3 text-center">
                        <a href="{{ route('getProductsBySCat', ['name' => $sCat->name, 'id' => $sCat->id]) }}" class="text-decoration-none custom-button">See Products</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </section>


</x-web.layouts.master>