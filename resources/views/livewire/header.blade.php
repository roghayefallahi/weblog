<header class="container-fluid bg-light shadow sticky-top py-1 w_100vw">
    <div class="row m-0 justify-content-between w-100 align-items-center">
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ROFA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">صفحه ی اصلی 
                    {{-- <span class="sr-only">(current)</span> --}}
                </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">درباره ی ما</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('search', ['catId' => 0]) }}">مقالات</a>
                </li>
                @if( Auth::check() )
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-center" href="{{ route('logout') }}">خروج</a>
                  </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">ورود | ثبت نام</a>
                  </li>
               @endif
              </ul>
            
            </div>
          </nav>
        <div class="col-12 col-md-4 form-group search_box  d-none d-md-block">
            <input type="text" class="form-control rounded_5 placeholder_gray shadow-sm" 
                placeholder="دنبال چی می گردی؟" wire:model="char" />
            
            <a href="{{ route('search', ['catId' => 0 , 'char' => $char])}}" class="fas fa-search search_btn"></a>
        </div>
    </div>
</header>
