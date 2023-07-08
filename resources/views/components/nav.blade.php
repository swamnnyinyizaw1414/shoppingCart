<nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
          <a href="/#blogs" class="nav-link">Blogs</a>
          @guest
          <a href="/register" class="nav-link">Register</a>
          <a href="/login" class="nav-link">Login</a>
          @else

          <!-- @if(auth()->user()->can('admin'))
            <a href="/admin/blogs" class="nav-link">Dashboard</a>
          @endif -->

          @can('admin')
          <a href="/admin/blogs" class="nav-link">Dashboard</a>
          @endcan

          <a href="/" class="nav-link">Welcome {{auth()->user()->name}}</a>
          <img src="{{auth()->user()->avatar}}"
           alt=""
           width="40"
           height="40"
           class="rounded-circle"
          >
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
          </form>
          @endguest

          <!-- @auth
          
          @endauth -->

          <a href="/#subscribe" class="nav-link">Subscribe</a>
        </div>
      </div>
    </nav>