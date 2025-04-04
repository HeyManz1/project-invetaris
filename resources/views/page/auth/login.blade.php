<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InventarisWeb | Log in</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('Tamplate/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('Tamplate/plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- Custom Style -->
  <link rel="stylesheet" href="{{ asset('Tamplate/dist/css/adminlte.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    /* Background Gradient */
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      font-family: 'Poppins', sans-serif;
    }

    /* Login Container */
    .login-box {
      width: 400px;
    }

    .login-card-body {
      border-radius: 10px;
      padding: 40px;
      background: white;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* Logo Styling */
    .login-logo img {
      width: 100px;
      height: 100px;
      border-radius: 50%; /* Membuat logo bulat */
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      margin-bottom: 10px;
    }

    .login-logo a {
      font-size: 26px;
      font-weight: bold;
      color: white;
      text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
    }

    /* Form Styling */
    .form-control {
      border-radius: 25px;
      padding: 12px 20px;
      font-size: 16px;
      border: 1px solid #ccc;
      transition: all 0.3s;
    }

    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
    }

    .input-group-text {
      border-radius: 25px;
      background: #f8f9fa;
      border: none;
    }

    /* Login Button */
    .btn-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 25px;
      font-size: 16px;
      padding: 12px;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
    }
  </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

  <div class="login-box">
    <div class="login-logo text-center">
      <img src="{{ asset('asset/Logo.png') }}" alt="Logo"> <!-- Logo bulat -->
      <a href="/">INVETARIS <span style="color:#ffd700;">WEB</span></a>
    </div>

    @if (session('error-unauthorized'))
      <script>
          Swal.fire({
            title: "Error!",
            text: "{{ session('error-unauthorized') }}",
            icon: "error"
          });
      </script>
    @endif

    <div class="card">
      <div class="card-body login-card-body">
        <p class="text-center mb-4" style="color: #555;">Masukkan akun untuk login</p>

        <form action="/login" method="post">
          @csrf
          @method('POST')
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope text-muted"></span>
              </div>
            </div>
            @error('email')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="input-group mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock text-muted"></span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          <a href="{{ route('landingpage.index') }}" class="btn btn-outline-secondary btn-block mt-2 ">Kembali ke Home</a>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('Tamplate/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('Tamplate/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Admin App -->
  <script src="{{ asset('Tamplate/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
