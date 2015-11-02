<header class="app-bar fixed-top navy" data-role="appbar">
    <div class="container">
        <a href="/" class="app-bar-element branding"><span class="mif-thumbs-up mif-2x mif-ani-hover-shuttle mif-ani-fast"></span> Blognya Hasan</a>

        
        
        <ul class="app-bar-menu small-dropdown">
            <li>
                <a href="#" class="dropdown-toggle"><span class="mif-database"></span> Master</a>
                <ul class="d-menu" data-role="dropdown" data-no-close="true">
                    <li>
                        <a href="" class="dropdown-toggle">Artikel</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="/artikel">Semua Artikel</a></li>
                            <li><a href="/artikel/add"><span class="mif-plus mif-ani-hover-shuttle mif-ani-fast"></span> Tambah Artikel</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="app-bar-menu small-dropdown" style="float: right;">
@if(Auth::check())

            <li>
                <a href="#" class="dropdown-toggle"><span class="mif-database"></span> {{ Auth::user()->email }}</a>
                <ul class="d-menu" data-role="dropdown" data-no-close="true">
                    <li>                                            
                            <li><a href="/auth/logout">Logout</a></li>                  
                    </li>
                </ul>
            </li>

            @else

             <li>
               <a href="{{ url('auth/login') }}">
                <span class="mif-user"></span>Sign In
                </a>
                </li>

                <li>
               <a href="{{ url('auth/register') }}">
                <span class="mif-user"></span>Sign Up
                </a>
                </li>

            </ul>

            @endif
            

        </ul>

        <span class="app-bar-pull"></span>

    </div>
</header>
