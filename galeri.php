<!DOCTYPE html>
<html>
<head>
    <title>Galeri Survei - Zona Boba</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
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
            margin-bottom: 20px;
            border: 1px solid #505050;
            font-weight: 600;
        }
        .back-btn:hover {
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            transform: translateX(-5px);
        }
        .add-btn {
            display: inline-block;
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 10px;
            margin-left: 10px;
            border: 1px solid #606060;
            font-weight: 600;
        }
        .add-btn:hover {
            background: linear-gradient(135deg, #606060 0%, #4a4a4a 100%);
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }
        .gallery-item {
            background: linear-gradient(135deg, #2d2d2d 0%, #252525 100%);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.5);
            transition: all 0.3s;
            border: 1px solid #404040;
        }
        .gallery-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(255,255,255,0.1);
            border-color: #606060;
        }
        .gallery-item img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            filter: brightness(0.9) contrast(1.1);
        }
        .gallery-content {
            padding: 20px;
        }
        .gallery-content h3 {
            color: #ffffff;
            margin-bottom: 12px;
            font-size: 1.3em;
            letter-spacing: 0.5px;
        }
        .gallery-content p {
            color: #c0c0c0;
            line-height: 1.7;
        }
        .gallery-date {
            color: #808080;
            font-size: 0.9em;
            margin-top: 15px;
            padding-top: 12px;
            border-top: 1px solid #404040;
        }
        .no-data {
            text-align: center;
            padding: 80px 20px;
            color: #808080;
        }
        .no-data h2 {
            font-size: 4em;
            margin-bottom: 20px;
            filter: grayscale(100%);
        }
        .no-data p {
            font-size: 1.2em;
            color: #a0a0a0;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-btn">← Kembali</a>
        <a href="tambah_galeri.php" class="add-btn">+ Tambah Foto</a>
        <h1>📸 GALERI SURVEI ZONA BOBA</h1>

        <div class="gallery-grid">
            <?php
            include 'koneksi.php';
            
            $query = "SELECT * FROM galeri ORDER BY tanggal DESC";
            $result = mysqli_query($koneksi, $query);
            
            if(mysqli_num_rows($result) > 0) {
                while($item = mysqli_fetch_assoc($result)) {
                    echo "<div class='gallery-item'>";
                    
                    if(!empty($item['gambar'])) {
                        echo "<img src='uploads/" . $item['gambar'] . "' alt='" . htmlspecialchars($item['judul']) . "'>";
                    } else {
                        echo "<img src='https://via.placeholder.com/320x280/2a2a2a/ffffff?text=No+Image' alt='No Image'>";
                    }
                    
                    echo "<div class='gallery-content'>";
                    echo "<h3>" . htmlspecialchars($item['judul']) . "</h3>";
                    echo "<p>" . nl2br(htmlspecialchars($item['deskripsi'])) . "</p>";
                    echo "<div class='gallery-date'>📅 " . date('d M Y H:i', strtotime($item['tanggal'])) . "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "</div>";
                echo "<div class='no-data'>";
                echo "<h2>📸</h2>";
                echo "<p>Belum ada foto galeri. Silakan tambahkan foto survei atau testimoni pelanggan.</p>";
                echo "</div>";
            }
            
            mysqli_close($koneksi);
            ?>
        </div>
    </div>
</body>
</html>