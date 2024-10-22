<x-admin.layouts.master>

    <x-slot:title>
        Edit Category | Admin
    </x-slot:title>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <h3 class="text-center mb-4">Edit categorys</h3>
                    <a href="{{ route('categories.index') }}">
                        <button type="button" class="btn btn-primary mb-2">Category List
                        </button>
                    </a>


                    <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Category Name</label>
                                <input class="form-control form-white" required placeholder="Category Name" type="text" value="{{ old('name', $category->name) }}" name="name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-4">
                                <div style="display: flex; justify-content:center;">
                                    <img class="" style="height: 100px;width:100px;" src="{{asset('storage/images/category-images/'.$category->image)}}" alt="images">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <label class="control-label">Update Image</label>
                                <input class="form-control form-white" type="file" name="image" />
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Category Description</label>
                                <textarea style="height: 100px;" class="form-control form-white"  placeholder="Category Description" value="{{ old('description', $category->description) }}" type="text" maxlength="80" name="description">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-4">
                                    <label class="control-label">Status</label>
                                    <select class="custom-select" name="status" id="">
                                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mt-3">
                            <button class="btn btn-md btn-success w-50 " type="submit">Update</button>
                        </div>
                    </form>


                </section>
            </div>
        </div>
    </div>


</x-admin.layouts.master>