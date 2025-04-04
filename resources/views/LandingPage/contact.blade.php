<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100%;
            flex-direction: column;
        }
        .navbar {
            background-color: #000000;
            padding: 15px;
            text-align: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .container {
            flex: 1;
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .btn-wa {
            display: inline-block;
            background-color: #25D366;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn-wa:hover {
            background-color: #1ebe57;
        }
        /* Footer */
        .main-footer {
            background-color: #282727;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            margin-top: 20px;
            position: relative;
            width: 100%;
        }
        .main-footer a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }
        .main-footer a:hover {
            text-decoration: underline;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ route('landingpage.index') }}">Home</a>
        <a href="{{ route('landingpage.contact') }}">Contact</a>
        <a href="{{ route('login') }}">Login</a>
    </div>

    <div class="container">
        <h2>Hubungi Kami</h2>
        <p>Jika Anda memiliki pertanyaan atau ingin menghubungi kami, silakan klik tombol di bawah untuk mengirim pesan melalui WhatsApp.</p>
        <a href="https://wa.me/6281911853758" class="btn-wa">Chat via WhatsApp</a>
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2025-2026 <a href="https://www.instagram.com/adityawarman_1/">ANDIKA SEMBAKO</a>.</strong> All rights reserved.
    </footer>
</body>
</html>
