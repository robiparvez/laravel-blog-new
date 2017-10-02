<nav class="navbar navbar-default">
    <div class="container-fluid">



        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Laravel Blog</a>
        </div>



        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            {{-- dynamic --}}
            <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
            <li class="{{ Request::is('posts/create') ? "active" : "" }}"><a href="/posts/create">Create Posts</a></li>
            <li class="{{ Request::is('posts') ? "active" : "" }}"><a href="/posts">View Posts</a></li>
            <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Blog</a></li>
            <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
            <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
          </ul>


          <ul class="nav navbar-nav navbar-right">

            @if (Auth::check())

              <li class="dropdown">
                <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello '{{Auth::user()->name}}' <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    <li><a href="{{ route('categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('tags.index') }}">Tags</a></li>
                    {{-- <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li> --}}

                    <li role="separator" class="divider"></li>
                    {{-- <li class="dropdown-header">Nav header</li> --}}
                    <li>

                      {{-- <a href="{{ route('auth.logout') }}">Logout</a> --}}
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>
                  </ul>
              </li>

            @else

              <li><a href="{{ route('login') }}" class="btn btn-success"> Login </a></li>

            @endif
          </ul>


        </div><!--/.nav-collapse -->
    </div>
</nav>