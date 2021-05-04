<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/logout.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous"></script>
    <script src='{{ asset('/DataTables/file/js/jquery.dataTables.min.js') }}'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <fieldset class="layer_inventory">
        <p class="a-app">INVENTORY</p>
</fieldset>
    <fieldset class="layer_left">
        <button class="b1 {{ '/' == request()->path() ? 'active' : '' }}" onclick="window.location.href='/'">
            <i class="fa fa-home"></i>
            Home 
        </button><br>
        @if (!Session::get('fail') && Request::path() != 'auth/login')
            <button class="b2 {{ 'manage-data' == request()->path() ? 'active' : '' }}" onclick="window.location.href='{{ route('manage-data') }}'">
                <i class="fa fa-tasks"></i>
                Manage Data Pemasok
            </button><br>
            <div class="menu-dropdown">
                <button class="b3">
                    <i class="fa fa-exchange"></i>
                    Transaksi Barang
                    <i class="fa fa-angle-down right"></i>
                </button>
                <div class="myDropdown" >
                    <button onclick="window.location.href='{{ route('pembelian') }}'" class="p1 {{ 'pembelian' == request()->path() ? 'active' : '' }}">
                        Transaksi Pembelian Barang
                    </button><br>
                    <button onclick="window.location.href='{{ route('pengeluaran') }}'" class="p2 {{ 'pengeluaran' == request()->path() ? 'active' : '' }}">
                        Transaksi Pengeluaran Barang
                    </button>
                </div>
            </div>
            <button onclick="window.location.href='{{ route('stok') }}'" class="b22 {{ 'stok-barang' == request()->path() ? 'active' : '' }}">
                <i class="fa fa-cubes"></i>
                Stock Barang 
            </button><br>  
        @else
            <button class="b2" data-toggle="modal" data-target="#LoginModal">
                <i class="fa fa-tasks"></i>
                Manage Data Pemasok
            </button><br>
            <div class="menu-dropdown">
                <button class="b3">
                    <i class="fa fa-exchange"></i>
                    Transaksi Barang
                    <i class="fa fa-angle-down right"></i>
                </button>
                <div class="myDropdown" >
                    <button data-toggle="modal" data-target="#LoginModal" class="p1">
                    Transaksi Pembelian Barang
                    </button><br>
                    <button data-toggle="modal" data-target="#LoginModal" class="p2">
                    Transaksi Pengeluaran Barang
                    </button>
                </div>
            </div>
            <button data-toggle="modal" data-target="#LoginModal" class="b22">
                <i class="fa fa-cubes"></i>
                Stock Barang 
            </button><br>
        @endif
    </fieldset>
    <fieldset class="layer_top">
        <b class="b-app">Martabak Anugrah Koga Kedaton</b>
        @if (!session()->has('loggedUser'))
            @include('auth.login')
            <button type="button" class="b4" data-toggle="modal" data-target="#LoginModal">login</button>
        @else
            <button id="navbarDropdown" class="b4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Logout
            </button>
            <div class="dropdown-menu container_logout" aria-labelledby="navbarDropdown">
                <fieldset class="fieldset-logout">
                    <div>
                        <h1 class="h1-logout">Are you sure want to logout? </h1>
                    </div>
                    <br><br>
                    <div id="container_logout">
                        <button class="button1"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </button>
                        <button type="submit" class="cancel1">Cancel</button>
                    </div>
                </fieldset>

                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        @endif
    </fieldset>
    <div>
        <fieldset class="layer_beranda">
            <div style="background-image: url({{asset('pic/gambar1.jpeg')}});" class="img1">
                <div class="img2">
                    <fieldset class="layer_forms">
                        <div class="f">
                            <i class="fa fa-home">Home</i>
                        </div>
                    </fieldset>
                    <p class="p-app">
                    Hai, Admin!<br>
                    Selamat datang di Inventory management system,<br>
                    yakni sebuah sistem yang dapat membantu anda mengerjakan transaksi secara cepat dan mudah.
                    </p>
                </div>
            </div>
        </fieldset> 
    </div>
    <div>
        @yield('content')
    </div>
    <script>
        $(".menu-dropdown div").hide();
        $(".menu-dropdown .b3").click(function () {
	        $(this).closest('.menu-dropdown').find('.myDropdown').slideToggle();
	        $(this).find(".right").toggleClass("fa-angle-up fa-angle-down");
        });
    </script>
    <script>
        @error('username')
            $("#LoginModal").modal('show');
        @enderror
        @error('password')
            $("#LoginModal").modal('show');
        @enderror
        @if (session('fail'))
            $("#LoginModal").modal('show');     
        @endif
        @if (session('success'))
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("{{ Session::get('success') }}")                   
        @endif
    </script>
    
</script>
</body>
</html>