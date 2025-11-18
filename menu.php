<!DOCTYPE html>
<html>
<head>
    <title>Daftar Menu - Zona Boba</title>
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
            margin-bottom: 15px;
            font-size: 2.8em;
            font-weight: 700;
            letter-spacing: 2px;
        }
        .subtitle {
            text-align: center;
            color: #b0b0b0;
            margin-bottom: 40px;
            font-size: 1.1em;
            letter-spacing: 0.5px;
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
        .kategori-section {
            margin: 40px 0;
        }
        .kategori-title {
            background: linear-gradient(135deg, #3a3a3a 0%, #2a2a2a 100%);
            color: #ffffff;
            padding: 18px 25px;
            border-radius: 12px;
            font-size: 1.6em;
            margin-bottom: 20px;
            border: 1px solid #505050;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            font-weight: 600;
            letter-spacing: 1px;
        }
        .menu-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.5);
        }
        .menu-table thead {
            background: linear-gradient(135deg, #3a3a3a 0%, #2a2a2a 100%);
        }
        .menu-table th {
            padding: 18px;
            text-align: left;
            color: #ffffff;
            font-weight: 600;
            border-bottom: 2px solid #505050;
            letter-spacing: 0.5px;
        }
        .menu-table td {
            padding: 15px 18px;
            border-bottom: 1px solid #353535;
            color: #d0d0d0;
            background: #252525;
        }
        .menu-table tr:hover td {
            background: #2d2d2d;
        }
        .harga {
            color: #ffffff;
            font-weight: 600;
            font-size: 1.05em;
        }
        .best-seller-badge {
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            color: #ffffff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85em;
            margin-left: 10px;
            border: 1px solid #606060;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-btn">← Kembali</a>
        <h1>🧋 DAFTAR MENU ZONA BOBA</h1>
        <p class="subtitle">Pilih minuman favoritmu!</p>

        <?php
        include 'koneksi.php';
        
        $query = "SELECT DISTINCT kategori FROM menu ORDER BY 
                  CASE 
                    WHEN kategori = 'Best Seller' THEN 1
                    WHEN kategori = 'Boba Series' THEN 2
                    WHEN kategori = 'Es Teh Series' THEN 3
                    WHEN kategori = 'Es Jeruk Series' THEN 4
                  END";
        $kategori_result = mysqli_query($koneksi, $query);
        
        while($kat = mysqli_fetch_assoc($kategori_result)) {
            $kategori = $kat['kategori'];
            echo "<div class='kategori-section'>";
            echo "<div class='kategori-title'>" . strtoupper($kategori) . "</div>";
            
            echo "<table class='menu-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nama Menu</th>";
            echo "<th>Ukuran Small (S)</th>";
            echo "<th>Ukuran Jumbo (J)</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            
            $menu_query = "SELECT * FROM menu WHERE kategori = '$kategori' ORDER BY nama_menu";
            $menu_result = mysqli_query($koneksi, $menu_query);
            
            while($menu = mysqli_fetch_assoc($menu_result)) {
                echo "<tr>";
                echo "<td><strong>" . $menu['nama_menu'] . "</strong>";
                if($kategori == 'Best Seller') {
                    echo "<span class='best-seller-badge'>⭐ BEST SELLER</span>";
                }
                echo "</td>";
                
                if($menu['harga_small'] > 0) {
                    echo "<td class='harga'>Rp " . number_format($menu['harga_small'], 0, ',', '.') . "</td>";
                } else {
                    echo "<td style='color: #606060;'>-</td>";
                }
                
                if($menu['harga_jumbo'] > 0) {
                    echo "<td class='harga'>Rp " . number_format($menu['harga_jumbo'], 0, ',', '.') . "</td>";
                } else {
                    echo "<td style='color: #606060;'>-</td>";
                }
                
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }
        
        mysqli_close($koneksi);
        ?>
    </div>
</body>
</html>