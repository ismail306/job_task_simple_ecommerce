<x-admin.layouts.master>

  <x-slot:title>
    Sub Category | Admin
  </x-slot:title>

  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-title text-center">
                  <h1>Sub Category</h1>
                  @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                  @endif

                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                      <a href="{{route('sub-categories.create')}}" class="btn btn-md btn-success btn-block waves-effect waves-light">
                        <i class="fa fa-plus"></i> Create New
                      </a>
                    </div>
                    <div class="col-md-9">
                      <div class="card-box">
                        <div></div>
                      </div>
                    </div>
                    <!-- end col -->

                  </div>

                  {{-- table  --}}
                  <div class="table-responsive ">
                    <table class="table header-border  table-hover verticle-middle">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Sub Category</th>
                          <th scope="col">Category</th>
                          <th scope="col">Status</th>
                          <th scope="col" style=" display:flex; justify-content:center;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($sub_categories) > 0)
                        @foreach($sub_categories as $sub_category)
                        <tr>
                          <th>{{ $loop->iteration }}</th>
                          <td><img class="" style="height: 80px;width:80px;" src="{{asset('storage/images/sub-category-images/'.$sub_category->image)}}" alt="images"></td>
                          <td>{{ $sub_category->name }}</td>
                          <td>{{ $sub_category->category->name }}</td>
                          <td>
                            @if ($sub_category->status)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                          </td>


                          <td style="display:flex; justify-content:center; ">
                            <div class="btn-group">

                              <a href="{{ route('sub-categories.edit', $sub_category->id) }}" class=" mx-1 btn btn-warning"><i class="fa fa-edit"></i></a>
                              <form action="{{ route('sub-categories.destroy', $sub_category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fa fas fa-trash"></i></button>

                              </form>
                            </div>


                          </td>
                        </tr>


                        @endforeach

                        @else
                        <tr>
                          <td colspan="6" class="text-center">No Categories Found</td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /# card -->
            </div>
            <!-- /# column -->
          </div>
          <!-- /# row -->


        </section>
      </div>
    </div>
  </div>
</x-admin.layouts.master>