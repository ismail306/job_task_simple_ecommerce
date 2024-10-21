<x-admin.layouts.master>

    <x-slot:breadcrumb>
        Products
        </x-slot>

        @if (session('success'))
        <div class="alert alert-success mx-3">
            {{ session('success') }}
        </div>
        @endif
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <h2>Products</h2>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <a href="{{ route('products.create') }}" class="btn btn-primary float-right"> <i class="fa fa-plus mr-2"></i>Add Product</a>
                        </div>


                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if ($product->images->isNotEmpty())
                                    <img class="" style="height: 100px;width:100px;" src="{{ asset('storage/images/products_images/'.$product->images[0]->url) }}" alt="ProdImg">
                                    @else
                                    No image available
                                    @endif
                                </td>
                                <td>{!! Str::limit($product->description, 250, ' ...') !!}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fa fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-admin.layouts.master>