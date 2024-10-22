<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">

                    <div class="dropdown dib">
                        <div class="header-icon">
                            <a class="mx-5 btn btn-sm btn-success" href="{{route('index')}}">WEB

                            </a>
                            <span class="user-avatar">{{ auth()->user()->name }}
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                            <div
                                class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">

                                <div class="dropdown-content-body">
                                    <ul>

                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <span> <a class="text-danger" href="route('logout')"
                                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"> <i class="ti-power-off"></i> Logout</a></span>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>