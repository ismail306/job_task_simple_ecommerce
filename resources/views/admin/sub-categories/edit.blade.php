<x-admin.layouts.master>

    <x-slot:title>
        Edit Category | Admin
    </x-slot:title>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <h3 class="text-center mb-4">Edit Sub Category</h3>
                    <a href="{{ route('sub-categories.index') }}">
                        <button type="button" class="btn btn-primary mb-2">Sub Category List
                        </button>
                    </a>

                    {{-- create --}}
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>{{$error}}
                    </div>
                    @endforeach

                    @endif
                    <form action="{{route('sub-categories.update',$sub_category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Select Category</label>
                                <select class="custom-select" name="category" id="">
                                    <option value="" disabled selected> Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $sub_category->category_id ? 'selected' : '' }}> {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>


                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Sub Category Name</label>
                                <input class="form-control form-white" required placeholder="Category Title" type="text" value="{{ old('name', $sub_category->name) }}" name="name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-4">
                                <div style="display: flex; justify-content:center;">
                                    <img class="" style="height: 100px;width:100px;" src="{{asset('storage/images/sub-category-images/'.$sub_category->image)}}" alt="images">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <label class="control-label">Update Photo</label>
                                <input class="form-control form-white" type="file" name="image" />
                                @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="col-md-4">
                                <div class="form-check mb-4">
                                    <label class="control-label">Status</label>
                                    <select class="custom-select" name="status" id="">
                                        <option value="1" {{ $sub_category->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $sub_category->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row d-flex justify-content-center mt-3">
                            <button class="btn btn-md btn-success w-50 " type="submit">Update</button>
                        </div>
                    </form>
                    {{-- edit  --}}

                </section>
            </div>
        </div>
    </div>


</x-admin.layouts.master>