<x-admin.layouts.master>

    <x-slot:title>
        Create Sub Category | Admin
    </x-slot:title>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <h3 class="text-center mb-4">Create Sub Category</h3>
                    <a href="{{ route('sub-categories.index') }}">
                        <button type="button" class="btn btn-primary mb-2">Sub Category List
                        </button>
                    </a>

                    {{-- create --}}

                    <form action="{{ route('sub-categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-6">
                                <label class="control-label">Select Category</label>
                                <select class="custom-select" name="category" id="">
                                    <option value="" disabled selected> Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>


                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">

                                <label class="control-label">Sub Category Name</label>
                                <input class="form-control form-white" required placeholder="Sub Category Title" type="text" name="name" value="{{ old('name') }}" />


                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Sub Category Photo</label>
                                <input class="form-control form-white" required type="file" name="image" />
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="col-md-6">

                                <div class="form-check mb-4">
                                    <label class="control-label">Status</label>
                                    <select class="custom-select" name="status" id="">
                                        <option value="1" selected> Active</option>
                                        <option value="0"> Inactive</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row d-flex justify-content-center">
                            <button class="btn btn-md btn-success w-50" type="submit">Save</button>
                        </div>
                    </form>
                    {{-- edit  --}}
                </section>
            </div>
        </div>
    </div>



</x-admin.layouts.master>