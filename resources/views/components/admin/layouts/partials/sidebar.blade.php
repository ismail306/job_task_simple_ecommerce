<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="{{ route('dashboard') }}">
                        <!-- <img src="images/logo.png" alt="" /> --><span>Logo</span></a>
                </div>
                <li class="label">Main</li>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
                </li>
                <li class="label">Apps</li>

                <li>
                    <a href="{{ route('categories.index') }}"><i class="fa fa-solid fa-list"></i>Catagories
                    </a>
                </li>
                <li>
                    <a href="{{ route('sub-categories.index') }}"><i class="fa fa-tag"></i>Sub Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"><i class="fa fa-cube"></i> Products</a>
                </li>


                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="route('logout')" class="ml-3 text-danger"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"> <i class="ti-close"></i> Logout</a>
                    </form>

                </li>
            </ul>
        </div>
    </div>
</div>