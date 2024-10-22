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
                                <select class="custom-select" name="subcategory" id="subcategories">
                                    <option value="" disabled selected> Select Sub Category</option>

                                </select>


                                @error('subcategory')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group text-secondary">
                                <label for="description">Description</label>
                                <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" rows="4" name="description">{{ old('description') }}</textarea>
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
                                <label for="discount_price">discount_price / New Price'</label>
                                <input id="discount_price" type="number" min="0" class="form-control " name="discount_price" value="{{ old('discount_price') }}" required>
                                @error('discount_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Category Photo</label>
                                <input class="form-control form-white" required type="file" name="image" />
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label class="control-label">Status</label>
                                <select class="custom-select" name="status" id="">
                                    <option value="1" selected> Active</option>
                                    <option value="0"> Inactive</option>
                                </select>
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