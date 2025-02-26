<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partai Keadilan Sejahtera</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header styles */
        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
        }
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .logo span {
            font-size: 1.5rem;
            font-weight: bold;
        }
        nav ul {
            list-style: none;
            display: flex;
        }
        nav ul li {
            margin-left: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }
        nav ul li a:hover {
            color: #fe5000;
        }
        .btn {
            background-color: #fe5000;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #e64600;
        }

        /* Hero section styles */
        .hero {
            background: linear-gradient(to right, #fe5000, #ff7e3f);
            color: #fff;
            padding: 4rem 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        .hero .btn {
            margin: 0 10px;
        }
        .btn-outline {
            background-color: transparent;
            border: 2px solid #fff;
        }
        .btn-outline:hover {
            background-color: #fff;
            color: #fe5000;
        }

        /* Vision section styles */
        .vision {
            padding: 4rem 0;
        }
        .vision h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .vision-items {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .vision-item {
            flex-basis: calc(33.333% - 20px);
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .vision-item h3 {
            color: #fe5000;
            margin-bottom: 1rem;
        }

        /* Why choose section styles */
        .why-choose {
            background-color: #fff5e6;
            padding: 4rem 0;
        }
        .why-choose h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .why-choose-items {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .why-choose-item {
            flex-basis: calc(50% - 20px);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        .why-choose-item:before {
            content: '✓';
            color: #fe5000;
            font-size: 1.2rem;
            margin-right: 10px;
        }

        /* CTA section styles */
        .cta {
            padding: 4rem 0;
            text-align: center;
        }
        .cta h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .cta p {
            margin-bottom: 2rem;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 3rem 0;
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .footer-section {
            flex-basis: calc(25% - 20px);
            margin-bottom: 2rem;
        }
        .footer-section h3 {
            margin-bottom: 1rem;
        }
        .footer-section ul {
            list-style: none;
        }
        .footer-section ul li {
            margin-bottom: 0.5rem;
        }
        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-section ul li a:hover {
            color: #fe5000;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #555;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }
            nav {
                margin-top: 1rem;
            }
            nav ul {
                flex-direction: column;
            }
            nav ul li {
                margin-left: 0;
                margin-bottom: 0.5rem;
            }
            .vision-item, .why-choose-item {
                flex-basis: 100%;
            }
            .footer-section {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <a href="#" class="logo">
                <img src="https://pks.id/img/logo-pks.png" alt="Logo PKS">
                <span>Partai Keadilan Sejahtera</span>
            </a>
            <nav>
                <ul>
                    <li><a href="#">Tentang</a></li>
                    <li><a href="#">Isu</a></li>
                    <li><a href="#">Acara</a></li>
                    <li><a href="#">Donasi</a></li>
                </ul>
            </nav>
            <a href="{{url('admin/register')}}" class="btn">Bergabung</a>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Membangun Indonesia yang Adil dan Sejahtera</h1>
                <p>Bergabunglah dengan Partai Keadilan Sejahtera dalam misi kami untuk menciptakan perubahan positif dan kesejahteraan bagi seluruh rakyat Indonesia.</p>
                <button class="btn">Ikut Berpartisipasi</button>
                <button class="btn btn-outline">Pelajari Lebih Lanjut</button>
            </div>
        </section>

        <section class="vision">
            <div class="container">
                <h2>Visi Kami untuk Indonesia</h2>
                <div class="vision-items">
                    <div class="vision-item">
                        <h3>Pertumbuhan Ekonomi</h3>
                        <p>Mendorong ekonomi dan menciptakan lapangan kerja melalui kebijakan dan investasi yang inovatif.</p>
                    </div>
                    <div class="vision-item">
                        <h3>Pendidikan untuk Semua</h3>
                        <p>Memastikan pendidikan berkualitas dapat diakses dan terjangkau bagi setiap warga negara.</p>
                    </div>
                    <div class="vision-item">
                        <h3>Masa Depan yang Aman</h3>
                        <p>Memperkuat keamanan nasional sambil melindungi kebebasan individu.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="why-choose">
            <div class="container">
                <h2>Mengapa Memilih PKS?</h2>
                <div class="why-choose-items">
                    <div class="why-choose-item">Tata kelola yang transparan dan akuntabel</div>
                    <div class="why-choose-item">Kebijakan inklusif yang menguntungkan seluruh rakyat</div>
                    <div class="why-choose-item">Inisiatif lingkungan yang berkelanjutan</div>
                    <div class="why-choose-item">Fokus kuat pada inovasi dan teknologi</div>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container">
                <h2>Siap Membuat Perubahan?</h2>
                <p>Bergabunglah dengan Partai Keadilan Sejahtera hari ini dan jadilah bagian dari gerakan yang membentuk masa depan Indonesia.</p>
                <a href="{{url('admin/register')}}" class="btn">Menjadi Anggota</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Tentang Kami</h3>
                    <ul>
                        <li><a href="#">Sejarah Kami</a></li>
                        <li><a href="#">Kepemimpinan</a></li>
                        <li><a href="#">Karir</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Berpartisipasi</h3>
                    <ul>
                        <li><a href="#">Menjadi Relawan</a></li>
                        <li><a href="#">Donasi</a></li>
                        <li><a href="#">Acara</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Sumber Daya</h3>
                    <ul>
                        <li><a href="#">Makalah Kebijakan</a></li>
                        <li><a href="#">Siaran Pers</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Partai Keadilan Sejahtera. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>

