<x-admin.layouts.master>

    <x-slot:title>
        Create Category | Admin
    </x-slot:title>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <h3 class="text-center mb-4">Create Category</h3>
                    <a href="{{ route('categories.index') }}">
                        <button type="button" class="btn btn-primary mb-2">Category List
                        </button>
                    </a>

                    {{-- create --}}
                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">

                                <label class="control-label">Category Title</label>
                                <input class="form-control form-white" required placeholder="Category Title" type="text" name="name" value="{{ old('name') }}" />


                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Category Photo</label>
                                <input class="form-control form-white" required type="file" name="image" />
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Category Description</label>
                                <textarea style="height: 100px;" class="form-control form-white" placeholder="Category Description" type="text" maxlength="80" name="description" value="{{ old('description') }}"></textarea>
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
                                        <option value="1" selected> Active</option>
                                        <option value="0"> Inactive</option>
                                    </select>
                                </div>

                            </div>


                        </div>
                        <div class="row d-flex justify-content-center mt-3">
                            <button class="btn btn-md btn-success w-50 " type="submit">Save</button>
                        </div>

                    </form>
                    {{-- edit  --}}
                </section>
            </div>
        </div>
    </div>



</x-admin.layouts.master>