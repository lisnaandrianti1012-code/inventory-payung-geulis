<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>

Login - Inventory Payung Geulis

</title>

<!-- BOOTSTRAP -->

<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<!-- FONT -->

<link href=
"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<!-- ICON -->

<link rel="stylesheet"
href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{

    font-family:'Poppins',sans-serif;
}

body{

    margin:0;

    height:100vh;

    overflow:hidden;

    display:flex;

    justify-content:center;

    align-items:center;

    background:
    linear-gradient(
    135deg,
    #021024,
    #052659,
    #0b2447
    );
}

/* BACKGROUND CIRCLE */

.circle{

    position:absolute;

    border-radius:50%;

    filter:blur(90px);

    opacity:0.4;
}

.circle1{

    width:300px;

    height:300px;

    background:#f5c26b;

    top:-80px;

    left:-80px;
}

.circle2{

    width:350px;

    height:350px;

    background:#2563eb;

    bottom:-100px;

    right:-100px;
}

/* LOGIN CARD */

.login-card{

    position:relative;

    width:420px;

    padding:40px;

    border-radius:30px;

    background:
    rgba(255,255,255,0.08);

    backdrop-filter:blur(15px);

    border:
    1px solid rgba(255,255,255,0.1);

    box-shadow:
    0 10px 40px rgba(0,0,0,0.3);

    animation:fadeUp 0.8s ease;
}

/* LOGO */

.logo{

    text-align:center;

    margin-bottom:30px;
}

.logo i{

    font-size:55px;

    color:#f5c26b;
}

.logo h2{

    color:white;

    margin-top:10px;

    font-weight:700;

    font-size:30px;
}

.logo p{

    color:#cbd5e1;

    font-size:14px;
}

/* INPUT */

.form-label{

    color:white;

    font-weight:500;
}

.input-group{

    margin-bottom:22px;
}

.input-group-text{

    background:
    rgba(255,255,255,0.08);

    border:none;

    color:#f5c26b;

    border-radius:14px 0 0 14px;
}

.form-control{

    background:
    rgba(255,255,255,0.06);

    border:none;

    color:white;

    height:50px;

    border-radius:0 14px 14px 0;
}

.form-control:focus{

    box-shadow:none;

    background:
    rgba(255,255,255,0.1);

    color:white;
}

.form-control::placeholder{

    color:#cbd5e1;
}

/* BUTTON */

.btn-login{

    width:100%;

    height:50px;

    border:none;

    border-radius:14px;

    background:#f5c26b;

    color:black;

    font-weight:600;

    transition:0.3s;
}

.btn-login:hover{

    background:white;

    transform:translateY(-2px);
}

/* REMEMBER */

.form-check-label{

    color:#cbd5e1;
}

/* LINK */

.forgot{

    color:#f5c26b;

    text-decoration:none;

    font-size:14px;
}

.forgot:hover{

    color:white;
}

/* ANIMATION */

@keyframes fadeUp{

    from{

        opacity:0;

        transform:
        translateY(30px);
    }

    to{

        opacity:1;

        transform:
        translateY(0);
    }
}

/* RESPONSIVE */

@media(max-width:500px){

    .login-card{

        width:90%;

        padding:30px 24px;
    }

    .logo h2{

        font-size:24px;
    }
}

</style>

</head>

<body>

<!-- BG -->

<div class="circle circle1"></div>

<div class="circle circle2"></div>

<!-- LOGIN -->

<div class="login-card">

    <!-- LOGO -->

    <div class="logo">

        <i class="fa fa-umbrella"></i>

        <h2>

            PAYUNG GEULIS

        </h2>

        <p>

            Inventory Management System

        </p>

    </div>

    <!-- VALIDATION -->

    @if ($errors->any())

    <div class="alert alert-danger rounded-4">

        {{ $errors->first() }}

    </div>

    @endif

    <!-- FORM -->

    <form method="POST"
          action="{{ route('login') }}">

        @csrf

        <!-- EMAIL -->

        <label class="form-label">

            Email

        </label>

        <div class="input-group">

            <span class="input-group-text">

                <i class="fa fa-envelope"></i>

            </span>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan email"
                   required>

        </div>

        <!-- PASSWORD -->

        <label class="form-label">

            Password

        </label>

        <div class="input-group">

            <span class="input-group-text">

                <i class="fa fa-lock"></i>

            </span>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   required>

        </div>

        <!-- REMEMBER -->

        <div class="d-flex
                    justify-content-between
                    align-items-center
                    mb-4">

            <div class="form-check">

                <input class="form-check-input"
                       type="checkbox"
                       name="remember">

                <label class="form-check-label">

                    Remember me

                </label>

            </div>

            <a href="#"
               class="forgot">

                Forgot Password?

            </a>

        </div>

        <!-- BUTTON -->

        <button class="btn-login">

            <i class="fa fa-right-to-bracket"></i>

            Login

        </button>

    </form>

</div>

</body>
</html>