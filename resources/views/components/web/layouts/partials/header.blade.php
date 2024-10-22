<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            @foreach($categoriesmenu as $category)
                            <li class="dropdown-submenu">

                                <a class="dropdown-item dropdown-toggle" href="{{ route('getProductsByCat', ['name' => $category->name, 'id' => $category->id]) }}"">{{$category->name}}</a>
                                <ul class=" dropdown-menu">
                                    @foreach($category->subCategory as $subCat)
                            <li><a class="dropdown-item" href="{{ route('getProductsBySCat', ['name' => $subCat->name, 'id' => $subCat->id]) }}"">{{$subCat->name}}</a></li>
                            @endforeach
                        </ul>

                    </li>
                    @endforeach

                </ul>
                </li>

                </ul>

                <ul class=" navbar-nav mb-2 mb-lg-0">
                                    @if (auth()->check())
                            <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                            @else
                            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                            @endif


                        </ul>
            </div>
        </div>
    </nav>
</header>