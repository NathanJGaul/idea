<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h16 flex items-center justify-between">
        <div>
            <a href="/">
                <img src="images/icon.png" alt="Idea Logo" width="48" aria-label="Idea Logo">
            </a>
        </div>
        <div class="flex gap-4 items-center">
            @guest
                <a href="/login">Login</a>
                <a href="/register" class="btn">Register</a>
            @else
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>
