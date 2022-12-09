<header class="bg-danger text-light">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="h1 my-auto">
                <a href="/">
                    <img src="{{ asset('assets/image/logo/logo.png') }}" height="50px">
                </a>
                
            </div>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/">Jadwal</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-light" href="/result">Hasil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-light" href="/team">Tim</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-light" href="/top-team">Top</a>
                        </li>
                        <li class="nav-item ms-5">
                            <form action="/team" method="GET">
                                <input type="search" class="form-control" name="search" placeholder="Cari Tim...">
                            </form>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>