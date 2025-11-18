<!DOCTYPE html>
<html>
<head>
    <title>Lokasi - Zona Boba</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: linear-gradient(135deg, #2a2a2a 0%, #1f1f1f 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
            border: 1px solid #404040;
        }
        h1 {
            background: linear-gradient(135deg, #ffffff 0%, #a8a8a8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.8em;
            font-weight: 700;
            letter-spacing: 2px;
        }
        .back-btn {
            display: inline-block;
            background: linear-gradient(135deg, #404040 0%, #2a2a2a 100%);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 25px;
            transition: all 0.3s;
            border: 1px solid #505050;
            font-weight: 600;
        }
        .back-btn:hover {
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            transform: translateX(-5px);
            border-color: #707070;
        }
        .lokasi-card {
            background: linear-gradient(135deg, #2d2d2d 0%, #252525 100%);
            padding: 35px;
            border-radius: 15px;
            margin-bottom: 20px;
            border-left: 4px solid #606060;
            box-shadow: 0 5px 20px rgba(0,0,0,0.5);
        }
        .lokasi-card h3 {
            color: #ffffff;
            margin-bottom: 25px;
            font-size: 2em;
            letter-spacing: 1px;
        }
        .info-item {
            padding: 12px 0;
            display: flex;
            align-items: start;
            color: #d0d0d0;
        }
        .info-item strong {
            min-width: 160px;
            color: #b0b0b0;
            font-weight: 600;
        }
        .info-item a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
        }
        .info-item a:hover {
            text-decoration: underline;
        }
        .map-container {
            margin-top: 25px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.6);
            border: 2px solid #404040;
        }
        .map-container iframe {
            width: 100%;
            height: 400px;
            filter: grayscale(20%) contrast(1.1);
        }
        .delivery-badge {
            display: inline-block;
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            color: #ffffff;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.95em;
            margin-top: 15px;
            border: 1px solid #606060;
            font-weight: 600;
        }
        .wa-btn {
            display: inline-block;
            background: linear-gradient(135deg, #404040 0%, #2a2a2a 100%);
            color: white;
            padding: 14px 30px;
            text-decoration: none;
            border-radius: 10px;
            margin-top: 20px;
            font-weight: 600;
            transition: all 0.3s;
            border: 1px solid #505050;
            letter-spacing: 0.5px;
        }
        .wa-btn:hover {
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            transform: scale(1.05);
            border-color: #707070;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-btn">← Kembali ke Beranda</a>
        <h1>📍 LOKASI & INFORMASI KONTAK</h1>

        <?php
        include 'koneksi.php';
        
        $query = "SELECT * FROM lokasi";
        $result = mysqli_query($koneksi, $query);
        
        if(mysqli_num_rows($result) > 0) {
            while($lok = mysqli_fetch_assoc($result)) {
                echo "<div class='lokasi-card'>";
                echo "<h3>🧋 " . strtoupper($lok['nama_toko']) . "</h3>";
                echo "<div class='info-item'><strong>📍 Alamat:</strong> <span>" . nl2br($lok['alamat']) . "</span></div>";
                echo "<div class='info-item'><strong>📞 Telepon/WA:</strong> <span>" . $lok['telepon'] . "</span></div>";
                echo "<div class='info-item'><strong>🕐 Jam Buka:</strong> <span>" . $lok['jam_buka'] . "</span></div>";
                
                echo "<span class='delivery-badge'>🛵 Tersedia Delivery Order</span>";
                
                // Tombol WhatsApp
                $wa_number = preg_replace('/[^0-9]/', '', $lok['telepon']);
                if(substr($wa_number, 0, 1) == '0') {
                    $wa_number = '62' . substr($wa_number, 1);
                }
                echo "<br><a href='https://wa.me/$wa_number?text=Halo%20Zona%20Boba,%20saya%20mau%20pesan' target='_blank' class='wa-btn'>💬 CHAT WHATSAPP</a>";
                
                if(!empty($lok['google_maps'])) {
                    echo "<div class='map-container'>";
                    echo $lok['google_maps'];
                    echo "</div>";
                }
                
                echo "</div>";
            }
        }
        
        mysqli_close($koneksi);
        ?>
    </div>
</body>
</html>