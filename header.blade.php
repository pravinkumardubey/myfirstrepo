<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="{{URL::asset('js/comment.js')}}"></script>
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('home.languageLable')
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="locale/en">English</a>
          <a class="dropdown-item" href="locale/hindi">Hindi</a>
          <a class="dropdown-item"href="locale/franch">French</a>
          
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">@lang('home.home') <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('category')}}">@lang('home.totalCategoryLable')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewdesc">@lang('home.totalBlobsLable')</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">@lang('home.search')</button>
    </form>
  </div>
</nav>
@yield('body')
  </body>
  </html>