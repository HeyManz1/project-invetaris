<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #000001;
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
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 8px;
            margin: 3px;
            color: white;
            background: #2059cc;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            /* Tambahkan ini untuk mengecilkan ukuran teks */
        }

        .pagination a:hover {
            background: #262728;
        }

        .pagination svg {
            width: 14px;
            height: 14px;
        }

        .pagination a:hover {
            background: #010202;
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
            /* Warna emas untuk menarik perhatian */
            text-decoration: none;
            font-weight: bold;
        }

        .main-footer a:hover {
            text-decoration: underline;
            color: #ffffff;
            /* Warna emas lebih terang saat hover */
        }

        .float-right {
            float: right;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .float-right {
                float: none;
                display: block;
                text-align: center;
                margin-top: 5px;
            }
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background: white;
            margin: 10% auto;
            padding: 20px;
            width: 50%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .modal-close {
            background: red;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }

        .modal-close:hover {
            background: darkred;
        }
        .filter-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .filter-container select {
            width: 300px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
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

    <div class="search-container" style="text-align: center; margin-bottom: 20px; margin-top: 10px;">
        <form action="{{ route('landingpage.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}" 
                style="padding: 10px; width: 300px; border: 1px solid #ddd; border-radius: 5px;">
            <button type="submit" style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Cari
            </button>
        </form>
    </div>

    <div class="filter-container">
        <form action="{{ route('landingpage.index') }}" method="GET">
            <select name="category" id="categoryFilter" class="select2">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Filter</button>
        </form>
    </div>

    <div class="container">
        <h2 style="text-align: center;">Daftar Produk</h2>
        <div class="grid">
            @foreach ($products as $product)
                <div class="card" onclick="openModal('{{ $product->name }}', '{{ $product->photo ? asset('storage/' . $product->photo) : asset('asset/Logo.png') }}', '{{ $product->description }}', '{{ number_format($product->price, 0, ',', '.') }}')">
                    <img src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('asset/Logo.png') }}" 
                         alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ Str::limit($product->description, 50) }}</p>
                    <p><strong>Harga: </strong>Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>

    <!-- Pagination -->
    <div class="pagination">
        {{ $products->links() }}
    </div>
    </div>

    <!-- Modal Detail Produk -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <h2 id="modalTitle"></h2>
        <img id="modalImage" src="" alt="Produk" style="max-width: 100%; max-height: 250px; object-fit: contain; border-radius: 5px;">
        <p id="modalDescription" style="max-height: 150px; overflow-y: auto; text-align: justify; padding: 5px;"></p>
        <p><strong>Harga: </strong>Rp<span id="modalPrice"></span></p>
        <button class="modal-close" onclick="closeModal()">Tutup</button>
    </div>
</div>

    <footer class="main-footer"
        style="background-color: #282727; color: white; text-align: center; padding: 15px; margin-top: 20px;">
        <strong>Copyright &copy; 2025-2026 <a href="https://www.instagram.com/adityawarman_1/">ANDIKA
                SEMBAKO</a>.</strong> All rights reserved.
    </footer>

    <script>
        function openModal(name, image, description, price) {
            document.getElementById("modalTitle").innerText = name;
            document.getElementById("modalImage").src = image;
            document.getElementById("modalDescription").innerText = description;
            document.getElementById("modalPrice").innerText = price;
            document.getElementById("productModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("productModal").style.display = "none";
        }

        window.onclick = function (event) {
            let modal = document.getElementById("productModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>