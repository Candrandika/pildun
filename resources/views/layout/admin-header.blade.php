<header class="bg-danger bg-opacity-75 text-light">
    <div class="container">
        <div class="d-flex justify-content-end">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-light btn-sm text-danger my-3">Logout</button>
            </form>
        </div>
    </div>
</header>