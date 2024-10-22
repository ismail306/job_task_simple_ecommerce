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
                                    <label class="control-label">Select Category</label>
                                    <select class="custom-select" name="category" id="categories">
                                        <option value="" disabled>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Select Sub Category</label>
                                    <select class="custom-select" name="subcategory" id="subcategories">
                                        <option value="" disabled selected>Select Sub Category</option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $product->sub_category_id == $subcategory->id ? 'selected' : '' }}>
                                            {{ $subcategory->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('subcategory')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$product->title}}" required>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group text-secondary">
                                    <label for="description">Description</label>
                                    <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{$product->description}} </textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="price">Price/ Old Price</label>
                                    <input id="price" type="number" min="0" class="form-control" name="price" value="{{$product->price}}" required>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="discount_price">discount_price/ New Price</label>
                                    <input id="discount_price" type="number" min="0" class="form-control " name="discount_price" value="{{$product->discount_price}}" required>
                                    @error('discount_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="" style="height: 100px;width:100px;" src="{{asset('storage/images/product-images/'.$product->image)}}" alt="images">

                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label">Update Image</label>
                                            <input class="form-control form-white" type="file" name="image" />
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    @error('images')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <select class="custom-select" name="status" id="">
                                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>



                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">{{ __('Update Product') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @push('scripts')
            <script>
                $(document).on('change', '#categories', function() {
                    var categoryId = $(this).val();

                    if (categoryId) {
                        $.ajax({
                            url: '/get-subcategories-by-category/' + categoryId,
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                $('#subcategories').empty(); // Clear the subcategory dropdown

                                if (response.subcategories && response.subcategories.length > 0) {
                                    $('#subcategories').append('<option value="" disabled selected>Select Subcategory</option>');
                                    $.each(response.subcategories, function(key, subcategory) {
                                        $('#subcategories').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                                    });
                                } else {
                                    $('#subcategories').append('<option value="" disabled>No Subcategories Available</option>');
                                }
                            },
                            error: function() {
                                alert('Error fetching subcategories.');
                            }
                        });
                    }
                });
            </script>

            @endpush
</x-admin.layouts.master>