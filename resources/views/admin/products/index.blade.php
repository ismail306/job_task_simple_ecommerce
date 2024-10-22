<x-admin.layouts.master>

    <x-slot:breadcrumb>
        Products
        </x-slot>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
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
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Price (Old Price)</th>
                                                <th>discount_price (New Price)</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>

                                                    <img class="" style="height: 100px;width:100px;" src="{{ asset('storage/images/product-images/'.$product->image) }}" alt="ProdImg">

                                                </td>
                                                <td>{!! Str::limit($product->description, 250, ' ...') !!}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->discount_price }}</td>
                                                <td>
                                                    @if ($product->status)
                                                    <span class="badge badge-success">Active</span>
                                                    @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
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
                    </section>
                </div>
            </div>
        </div>

</x-admin.layouts.master>