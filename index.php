<!DOCTYPE html>
<html>
<head>
    <title>Zona Boba - Pilihan Tepat Pecinta Minuman Kekinian</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            min-height: 100vh;
            color: #e0e0e0;
        }
        .header {
            background: linear-gradient(135deg, #2c2c2c 0%, #1a1a1a 100%);
            padding: 30px 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.5);
            border-bottom: 2px solid #404040;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        h1 {
            background: linear-gradient(135deg, #ffffff 0%, #a8a8a8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            font-size: 3em;
            margin-bottom: 10px;
            text-shadow: 0 0 30px rgba(255,255,255,0.3);
            font-weight: 700;
            letter-spacing: 2px;
        }
        .tagline {
            text-align: center;
            color: #b0b0b0;
            font-style: italic;
            margin-bottom: 30px;
            font-size: 1.1em;
            letter-spacing: 1px;
        }
        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .nav a {
            background: linear-gradient(135deg, #404040 0%, #2a2a2a 100%);
            color: #ffffff;
            padding: 18px 35px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            border: 1px solid #505050;
            letter-spacing: 0.5px;
        }
        .nav a:hover {
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(255,255,255,0.1);
            border-color: #707070;
        }
        .content {
            margin-top: 50px;
            text-align: center;
        }
        .welcome-box {
            background: linear-gradient(135deg, #2a2a2a 0%, #1f1f1f 100%);
            padding: 50px;
            border-radius: 20px;
            margin: 40px auto;
            max-width: 900px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
            border: 1px solid #404040;
        }
        .welcome-box h2 {
            color: #ffffff;
            margin-bottom: 25px;
            font-size: 2.2em;
            letter-spacing: 1px;
        }
        .welcome-box p {
            color: #c0c0c0;
            line-height: 1.9;
            font-size: 1.15em;
            margin-bottom: 15px;
        }
        .boba-icon {
            font-size: 6em;
            margin: 20px 0;
            filter: drop-shadow(0 0 20px rgba(255,255,255,0.3));
        }
        .highlight {
            color: #ffffff;
            font-weight: 600;
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            padding: 3px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <h1>🧋 ZONA BOBA</h1>
            <p class="tagline">Pilihan Tepat Pecinta Minuman Kekinian</p>
            <div class="nav">
                <a href="menu.php">📋 DAFTAR MENU</a>
                <a href="lokasi.php">📍 LOKASI</a>
                <a href="galeri.php">📸 GALERI SURVEI</a>
            </div>
        </div>
    </div>
    
    <div class="container content">
        <div class="welcome-box">
            <div class="boba-icon">🧋</div>
            <h2>Selamat Datang di Zona Boba!</h2>
            <p>
                Tempat terbaik untuk menemukan minuman boba favoritmu! 
                Kami menyediakan berbagai pilihan minuman kekinian dengan <span class="highlight">cita rasa yang lezat</span> 
                dan <span class="highlight">harga terjangkau</span>.
            </p>
            <p>
                Dari <strong>Boba Series</strong> yang creamy, <strong>Es Teh</strong> yang segar, 
                hingga <strong>Es Jeruk</strong> yang menyegarkan.
            </p>
            <p style="margin-top: 25px; font-size: 1.2em;">
                <strong>✨ Jelajahi menu kami dan temukan favorit barumu! ✨</strong>
            </p>
        </div>
    </div>
</body>
</html>