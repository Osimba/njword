<header>
    <nav class="navbar navbar-light"  style="background-color: #e3f2fd;">
        <a href="/" class="navbar-brand">{{ auth()->user()->name ?? 'Education Stats'}}</a>
        @auth
            <form class="form-inline" action="/logout" method="POST">
                @csrf
                <input class="btn btn-outline-primary my-2 my-sm-0"  type="submit" value="Logout">
            </form>
        @else
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navContent" 
                aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navContent" class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>                    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Sign up</a>
                    </li>
                </ul>
            </div>
        @endauth
        
    </nav>
</header>