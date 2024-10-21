<x-admin.layouts.master>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="text-center">Create New Product</h2>

                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="control-label">Select Category</label>
                                <select class="custom-select" name="category" id="categories">
                                    <option value="" disabled selected> Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>


                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Select Sub Category</label>
                                <select class="custom-select" name="subcategories" id="subcategories">
                                    <option value="" disabled selected> Select Sub Category</option>

                                </select>


                                @error('subcategories')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group text-secondary">
                                <label for="description">Description</label>
                                <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" rows="4" name="description" required autocomplete="description">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price / Old Price</label>
                                <input id="price" type="number" min="0" class="form-control" name="price" value="{{ old('price') }}" required>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="discount">Discount / New Price'</label>
                                <input id="discount" type="number" min="0" class="form-control " name="discount" value="{{ old('discount') }}" required>
                                @error('discount')
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
                                <input id="stock" type="number" min="0" class="form-control r" name="stock" value="{{ old('stock') }}" required>
                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Create Product</button>
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
                //alert("Selected Category ID: " + categoryId); 
                if (categoryId) {
                    $.ajax({
                        url: '/get-subcategories-by-category/' + categoryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
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