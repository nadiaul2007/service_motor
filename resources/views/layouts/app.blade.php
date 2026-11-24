<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Service Motor')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            background: #FFF5F7;
            color: #59404D;
        }

        /* HEADER */
        header {
            background: linear-gradient(120deg, #A95F7C, #D28DA6, #E6AFC0);
            color: white;
            padding: 32px 38px;
        }

        header h1 {
            margin: 0 0 8px;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        header p {
            color: #FFF0F4;
            margin: 0;
            font-size: 14px;
        }

        /* NAVIGASI */
        nav {
            background: #92516D;
            padding: 17px 38px;
            display: flex;
            flex-wrap: wrap;
            gap: 28px;
            box-shadow: 0 4px 12px rgba(146, 81, 109, 0.15);
        }

        nav a {
            color: #FFFFFF;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        nav a:hover {
            color: #FFE0A8;
            transform: translateY(-2px);
        }

        /* KONTEN */
        main {
            padding: 35px;
            min-height: 75vh;
        }

        .container {
            background: #FFFFFF;
            padding: 30px;
            border-radius: 18px;
            border: 1px solid #F4E0E7;
            box-shadow: 0 8px 25px rgba(169, 95, 124, 0.09);
        }

        h2, h3 {
            color: #A45D7A;
        }

        /* TOMBOL */
        button, .btn {
            display: inline-block;
            padding: 11px 20px;
            background: linear-gradient(135deg, #C47795, #A95F7C);
            color: #FFFFFF;
            border: none;
            border-radius: 9px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 3px 8px rgba(169, 95, 124, 0.15);
        }

        button:hover, .btn:hover {
            background: #87445F;
            transform: translateY(-2px);
        }

        /* FORM */
        label {
            display: block;
            font-weight: 600;
            margin-top: 14px;
            color: #87516A;
        }

        input, select, textarea {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border: 1px solid #EBD5DF;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            background: #FFFAFC;
            color: #59404D;
            transition: 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #C47795;
            box-shadow: 0 0 0 3px rgba(196, 119, 149, 0.13);
        }

        input[type="radio"],
        input[type="checkbox"] {
            display: inline-block;
            width: auto;
            margin-right: 6px;
        }

        /* TABEL */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            border: 1px solid #F0E1E7;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #F3DDE6;
            color: #87445F;
            font-weight: 700;
        }

        td {
            color: #624B56;
        }

        tr:hover {
            background: #FFF4F7;
        }

        /* PESAN SUKSES */
        .success {
            background: #E8F5EB;
            color: #35734A;
            padding: 14px;
            border-radius: 9px;
            margin-bottom: 18px;
            border-left: 4px solid #69A77D;
        }

        /* PESAN ERROR */
        .error {
            background: #FCE9ED;
            color: #B13F5B;
            padding: 14px;
            border-radius: 9px;
            margin-bottom: 18px;
            border-left: 4px solid #D46D87;
        }

        .error ul {
            margin-bottom: 0;
        }

        /* FOOTER */
        footer {
            background: linear-gradient(120deg, #87445F, #A95F7C);
            color: #FFEAF0;
            text-align: center;
            padding: 22px;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            header {
                padding: 23px 20px;
            }

            header h1 {
                font-size: 25px;
            }

            nav {
                padding: 16px 20px;
                gap: 15px;
            }

            main {
                padding: 17px;
            }

            .container {
                padding: 18px;
                overflow-x: auto;
            }

            th, td {
                padding: 10px;
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <h1>SERVICE MOTOR</h1>
        <p>Sistem Informasi Pengelolaan Service Motor</p>
    </header>

    <!-- MENU NAVIGASI -->
    
<nav>
    <a href="{{ route('pelanggan.index') }}">Data Pelanggan</a>

    <a href="{{ route('kendaraan.index') }}">Data Kendaraan</a>

    <a href="{{ route('daftar_service.index') }}">Daftar Service</a>

    <a href="{{ route('data_service.index') }}">Data Service</a>

    <a href="{{ route('pembayaran_service.index') }}">Pembayaran Service</a>
</nav>


    <!-- ISI HALAMAN -->
    <main>
        <div class="container">

            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error">
                    <strong>Terjadi kesalahan:</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        &copy; {{ date('Y') }} Aplikasi Service Motor
        | Sistem Informasi Pengelolaan Bengkel
    </footer>

</body>
</html>
