<x-admin.layouts.master>

    <x-slot:breadcrumb>
        Product / Edit
        </x-slot>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2 class="text-center">Create New Product</h2>

                        <div class="card-body">
                            <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    @php
                                    $selectedCategoryID=$product->category_id;
                                    @endphp
                                    <x-admin.layouts.partials.form.select :options="$categoryList" name="category_id" placeholder="Select Category" :selected="$selectedCategoryID" />
                                </div>


                                <input type="hidden" name="id" value="{{$product->id }}">



                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group text-secondary">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{$product->description}} </textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="price">{{ __('Price') }}</label>
                                    <input id="price" type="number" min="0" class="form-control" name="price" value="{{$product->price}}" required>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label for="images[]">Images:</label>
                                        <input type="file" name="images[]" id="images" multiple>
                                    </div>

                                    @error('images.*')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @error('images')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="stock">{{ __('Stock') }}</label>
                                    <input id="stock" type="number" min="0" class="form-control r" name="stock" value="{{$product->stock}}" required>
                                    @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="discount">{{ __('Discount %') }}</label>
                                    <input id="discount" type="number" min="0" class="form-control " name="discount" value="{{$product->discount}}" required>
                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">{{ __('Update Product') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</x-admin.layouts.master>