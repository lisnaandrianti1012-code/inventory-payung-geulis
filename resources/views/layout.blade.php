<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>

Inventory Payung Geulis

</title>

<!-- BOOTSTRAP -->

<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<!-- GOOGLE FONT -->

<link href=
"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<!-- FONT AWESOME -->

<link rel="stylesheet"
href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

/* ===========================
GLOBAL
=========================== */

*{

    font-family:'Poppins',sans-serif;
}

body{

    background:#f1f5f9;

    overflow-x:hidden;

    min-height:100vh;
}

/* ===========================
LOADER
=========================== */

#loader{

    position:fixed;

    width:100%;

    height:100vh;

    background:white;

    z-index:999999;

    display:flex;

    justify-content:center;

    align-items:center;

    top:0;

    left:0;
}

.spinner{

    width:65px;

    height:65px;

    border:7px solid #e5e7eb;

    border-top:7px solid #052659;

    border-radius:50%;

    animation:spin 1s linear infinite;
}

@keyframes spin{

    100%{

        transform:rotate(360deg);
    }
}

/* ===========================
SIDEBAR
=========================== */

.sidebar{

    width:240px;

    height:100vh;

    position:fixed;

    top:0;

    left:0;

    background:
    linear-gradient(
    180deg,
    #021024,
    #052659
    );

    padding:20px;

    overflow-y:auto;

    z-index:999;

    box-shadow:
    0 0 25px rgba(0,0,0,0.08);

    backdrop-filter:blur(12px);

    border-right:
    1px solid rgba(255,255,255,0.05);
}

/* ===========================
LOGO
=========================== */

.logo{

    text-align:center;

    margin-bottom:24px;
}

.logo i{

    font-size:34px;

    color:#f5c26b;
}

.logo h2{

    color:white;

    font-size:22px;

    font-weight:700;

    line-height:1.2;

    margin-top:10px;
}

/* ===========================
PROFILE
=========================== */

.profile-box{

    background:
    rgba(255,255,255,0.06);

    border-radius:20px;

    padding:18px;

    text-align:center;

    margin-bottom:25px;

    box-shadow:
    0 8px 20px rgba(0,0,0,0.08);
}

.profile-box img{

    width:75px;

    height:75px;

    border-radius:50%;

    object-fit:cover;

    border:3px solid #f5c26b;
}

.profile-box h5{

    color:white;

    font-size:16px;

    margin-top:12px;

    margin-bottom:3px;
}

.profile-box p{

    color:#f5c26b;

    font-size:13px;

    margin:0;

    text-transform:uppercase;

    letter-spacing:1px;
}

/* ===========================
MENU
=========================== */

.menu-title{

    color:#94a3b8;

    font-size:11px;

    letter-spacing:1px;

    margin-bottom:10px;

    margin-top:18px;

    padding-left:10px;
}

.menu a{

    display:flex;

    align-items:center;

    gap:12px;

    text-decoration:none;

    color:#dbeafe;

    padding:12px 16px;

    border-radius:14px;

    margin-bottom:8px;

    transition:0.3s;

    font-size:15px;

    font-weight:500;
}

.menu a:hover{

    background:
    rgba(245,194,107,0.18);

    color:white;

    transform:translateX(6px);

    box-shadow:
    0 8px 20px rgba(0,0,0,0.08);
}

.menu a.active{

    background:#f5c26b;

    color:black;

    font-weight:600;

    box-shadow:
    0 5px 15px rgba(245,194,107,0.25);
}

.menu i{

    width:18px;

    text-align:center;
}

/* ===========================
LOGOUT
=========================== */

.logout-btn{

    width:100%;

    border:none;

    background:#f5c26b;

    padding:12px;

    border-radius:14px;

    font-weight:600;

    transition:0.3s;
}

.logout-btn:hover{

    background:white;
}

/* ===========================
CONTENT
=========================== */

.content{

    margin-left:240px;

    padding:30px;

    min-height:100vh;
}

/* ===========================
TABLE CARD
=========================== */

.table-card{

    background:white;

    border-radius:28px;

    padding:28px;

    box-shadow:
    0 10px 35px rgba(0,0,0,0.05);

    border:
    1px solid rgba(0,0,0,0.03);
}

/* ===========================
BUTTON
=========================== */

.btn-premium{

    background:#052659;

    color:white;

    border:none;

    border-radius:12px;

    padding:10px 18px;

    font-weight:500;

    transition:0.3s;
}

.btn-premium:hover{

    background:#f5c26b;

    color:black;
}

/* ===========================
ANIMATION
=========================== */

.table-card,
.dashboard-card,
.mini-card{

    animation:fadeUp 0.5s ease;
}

@keyframes fadeUp{

    from{

        opacity:0;

        transform:
        translateY(20px);
    }

    to{

        opacity:1;

        transform:
        translateY(0);
    }
}

/* ===========================
RESPONSIVE
=========================== */

@media(max-width:991px){

    .sidebar{

        width:90px;
    }

    .sidebar .logo h2,
    .sidebar .menu-title,
    .sidebar .menu a span,
    .profile-box h5,
    .profile-box p{

        display:none;
    }

    .content{

        margin-left:90px;
    }

    .menu a{

        justify-content:center;
    }

    .menu a i{

        font-size:18px;
    }

    .profile-box{

        padding:10px;
    }

    .profile-box img{

        width:50px;
        height:50px;
    }
}

</style>

</head>

<body>

<!-- LOADER -->

<div id="loader">

    <div class="spinner"></div>

</div>

<!-- SIDEBAR -->

<div class="sidebar">

    <!-- LOGO -->

    <div class="logo">

        <i class="fa fa-umbrella"></i>

        <h2>

            PAYUNG
            <br>
            GEULIS

        </h2>

    </div>

    <!-- PROFILE -->

    <div class="profile-box">

        <img src=
"https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

        <h5>

            {{ auth()->user()->name }}

        </h5>

        <p>

            {{ auth()->user()->role }}

        </p>

    </div>

    <!-- MENU -->

    <div class="menu">

        <!-- DASHBOARD -->

        <div class="menu-title">

            MENU UTAMA

        </div>

        <a href="/dashboard"
           class="{{ request()->is('dashboard') ? 'active' : '' }}">

            <i class="fa fa-house"></i>

            <span>Dashboard</span>

        </a>

        <!-- ADMIN -->

<!-- ADMIN -->

@if(auth()->user()->role == 'admin')

<div class="menu-title">

    MASTER DATA

</div>

<!-- PRODUK INVENTORY -->

<a href="/produk"
   class="{{ request()->segment(1) == 'produk'
   ? 'active'
   : '' }}">

    <i class="fa fa-box"></i>

    <span>Produk Inventory</span>

</a>

<!-- PRODUK CUSTOMER -->

<a href="/produk-customer"
   class="{{ request()->segment(1) == 'produk-customer'
   ? 'active'
   : '' }}">

    <i class="fa fa-store"></i>

    <span>Produk Customer</span>

</a>

<!-- SUPPLIER -->

<a href="/supplier"
   class="{{ request()->is('supplier*') ? 'active' : '' }}">

    <i class="fa fa-truck"></i>

    <span>Mitra Supplier</span>

</a>

<div class="menu-title">

    INVENTORY

</div>

<!-- PENERIMAAN -->

<a href="/stok-masuk"
   class="{{ request()->is('stok-masuk*') ? 'active' : '' }}">

    <i class="fa fa-arrow-down"></i>

    <span>Penerimaan Barang</span>

</a>

<!-- DISTRIBUSI -->

<a href="/stok-keluar"
   class="{{ request()->is('stok-keluar*') ? 'active' : '' }}">

    <i class="fa fa-arrow-up"></i>

    <span>Distribusi Barang</span>

</a>

<div class="menu-title">

    PENJUALAN

</div>

<!-- PESANAN CUSTOMER -->

<a href="/pesanan"
   class="{{ request()->is('pesanan*') ? 'active' : '' }}">

    <i class="fa fa-cart-shopping"></i>

    <span>Pesanan Customer</span>

</a>

<!-- TRANSAKSI -->

<a href="/transaksi"
   class="{{ request()->is('transaksi*') ? 'active' : '' }}">

    <i class="fa fa-cash-register"></i>

    <span>Checkout Penjualan</span>

</a>

<div class="menu-title">

    ANALYTICS

</div>

<!-- LAPORAN -->

<a href="/laporan"
   class="{{ request()->is('laporan*') ? 'active' : '' }}">

    <i class="fa fa-chart-line"></i>

    <span>Laporan Penjualan</span>

</a>

<!-- ANALYTICS -->

<a href="/analytics"
   class="{{ request()->is('analytics*') ? 'active' : '' }}">

    <i class="fa fa-chart-pie"></i>

    <span>Analytics</span>

</a>

<div class="menu-title">

    MANAGEMENT

</div>

<!-- USER -->

<a href="/user"
   class="{{ request()->is('user*') ? 'active' : '' }}">

    <i class="fa fa-users"></i>

    <span>Data Pengguna</span>

</a>

@endif
        <!-- OWNER -->

        @if(auth()->user()->role == 'owner')

        <div class="menu-title">

            MONITORING

        </div>

        <a href="/produk"
           class="{{ request()->is('produk*') ? 'active' : '' }}">

            <i class="fa fa-box"></i>

            <span>Produk</span>

        </a>

        <a href="/supplier"
           class="{{ request()->is('supplier*') ? 'active' : '' }}">

            <i class="fa fa-truck"></i>

            <span>Supplier</span>

        </a>

        <a href="/laporan"
           class="{{ request()->is('laporan*') ? 'active' : '' }}">

            <i class="fa fa-chart-line"></i>

            <span>Laporan</span>

        </a>

        @endif

        <!-- GUDANG -->

        @if(auth()->user()->role == 'gudang')

        <div class="menu-title">

            INVENTORY

        </div>

        <a href="/stok-masuk"
           class="{{ request()->is('stok-masuk*') ? 'active' : '' }}">

            <i class="fa fa-arrow-down"></i>

            <span>Penerimaan Barang</span>

        </a>

        <a href="/stok-keluar"
           class="{{ request()->is('stok-keluar*') ? 'active' : '' }}">

            <i class="fa fa-arrow-up"></i>

            <span>Pengeluaran Barang</span>

        </a>

        @endif

        <!-- KASIR -->

        @if(auth()->user()->role == 'kasir')

        <div class="menu-title">

            PENJUALAN

        </div>

        <a href="/transaksi"
           class="{{ request()->is('transaksi*') ? 'active' : '' }}">

            <i class="fa fa-cash-register"></i>

            <span>Transaksi</span>

        </a>

        @endif

    </div>

    <!-- LOGOUT -->

    <form action="{{ route('logout') }}"
          method="POST"
          class="mt-4">

        @csrf

        <button class="logout-btn">

            <i class="fa fa-right-from-bracket"></i>

            Logout

        </button>

    </form>

</div>

<!-- CONTENT -->

<div class="content">

    @yield('content')

</div>

<!-- SWEET ALERT -->

<script src=
"https://cdn.jsdelivr.net/npm/sweetalert2@11">
</script>

@if(session('success'))

<script>

Swal.fire({

    icon:'success',

    title:'Berhasil',

    text:'{{ session('success') }}',

    showConfirmButton:false,

    timer:2200

});

</script>

@endif

@if(session('error'))

<script>

Swal.fire({

    icon:'error',

    title:'Oops...',

    text:'{{ session('error') }}'

});

</script>

@endif

<!-- DELETE CONFIRM -->

<script>

function confirmDelete(
    event,
    url
){

    event.preventDefault();

    Swal.fire({

        title:'Yakin hapus data?',

        text:'Data tidak bisa dikembalikan!',

        icon:'warning',

        showCancelButton:true,

        confirmButtonColor:'#dc2626',

        cancelButtonColor:'#6b7280',

        confirmButtonText:'Ya, hapus',

        cancelButtonText:'Batal'

    }).then((result)=>{

        if(result.isConfirmed){

            window.location.href = url;

        }

    });

}

</script>

<!-- LOADING -->

<script>

window.addEventListener(

    'load',

    function(){

        document.getElementById(
            'loader'
        ).style.display='none';

    }

);

</script>

</body>
</html>