<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ url('/backend') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Interface</div>

                <!-- Post Menu -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost">
                    <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePost">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('post.index') }}">List Posts</a>
                        <a class="nav-link" href="{{ route('post.create') }}">Create Post</a>
                    </nav>
                </div>

                <!-- Category Menu -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategory">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('category.index') }}">List Categories</a>
                        <a class="nav-link" href="{{ route('category.create') }}">Create Category</a>
                    </nav>
                </div>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
