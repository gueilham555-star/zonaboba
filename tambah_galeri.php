<!DOCTYPE html>
<html>
<head>
    <title>Tambah Galeri - Zona Boba</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: linear-gradient(135deg, #2a2a2a 0%, #1f1f1f 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
            border: 1px solid #404040;
        }
        h1 {
            color: #ffffff;
            margin-bottom: 35px;
            font-size: 2.3em;
            letter-spacing: 1px;
        }
        .back-btn {
            display: inline-block;
            background: linear-gradient(135deg, #404040 0%, #2a2a2a 100%);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #505050;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #d0d0d0;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        input, textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #404040;
            border-radius: 10px;
            font-size: 1em;
            background: #252525;
            color: #e0e0e0;
            transition: all 0.3s;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #606060;
            background: #2d2d2d;
        }
        input::placeholder, textarea::placeholder {
            color: #707070;
        }
        button {
            background: linear-gradient(135deg, #505050 0%, #3a3a3a 100%);
            color: white;
            padding: 14px 35px;
            border: 1px solid #606060;
            border-radius: 10px;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        button:hover {
            background: linear-gradient(135deg, #606060 0%, #4a4a4a 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,255,255,0.1);
        }
        .success {
            background: linear-gradient(135deg, #3a4a3a 0%, #2a3a2a 100%);
            color: #b0ffb0;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #4a5a4a;
        }
        .error {
            background: linear-gradient(135deg, #4a3a3a 0%, #3a2a2a 100%);
            color: #ffb0b0;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #5a4a4a;
        }
        .info {
            background: linear-gradient(135deg, #3a3a4a 0%, #2a2a3a 100%);
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 0.95em;
            border: 1px solid #4a4a5a;
            color: #c0c0ff;
        }
        .preview {
            max-width: 350px;
            margin-top: 15px;
            border-radius: 10px;
            border: 2px solid #404040;
        }
        input[type="file"] {
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="galeri.php" class="back-btn">← Kembali</a>
        <h1>📸 Tambah Foto Galeri</h1>

        <?php
        if(isset($_POST['submit'])) {
            include 'koneksi.php';
            
            $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
            $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
            $gambar = '';
            
            // Cek apakah ada file yang diupload
            if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
                $target_dir = "uploads/";
                
                // Buat folder uploads jika belum ada
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                
                $file_extension = strtolower(pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION));
                $new_filename = uniqid() . '.' . $file_extension;
                $target_file = $target_dir . $new_filename;
                
                // Validasi tipe file
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                
                if(in_array($file_extension, $allowed_types)) {
                    // Validasi ukuran file (max 5MB)
                    if($_FILES["gambar"]["size"] <= 5000000) {
                        if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                            $gambar = $new_filename;
                        } else {
                            echo "<div class='error'>❌ Gagal mengupload file.</div>";
                        }
                    } else {
                        echo "<div class='error'>❌ Ukuran file terlalu besar (max 5MB).</div>";
                    }
                } else {
                    echo "<div class='error'>❌ Format file tidak valid. Gunakan JPG, PNG, atau GIF.</div>";
                }
            }
            
            // Insert ke database
            $query = "INSERT INTO galeri (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')";
            
            if(mysqli_query($koneksi, $query)) {
                echo "<div class='success'>✅ Foto berhasil ditambahkan ke galeri!</div>";
                echo "<script>setTimeout(function(){ window.location='galeri.php'; }, 2000);</script>";
            } else {
                echo "<div class='error'>❌ Error: " . mysqli_error($koneksi) . "</div>";
            }
            
            mysqli_close($koneksi);
        }
        ?>

        <div class="info">
            <strong>📌 Informasi:</strong><br>
            • Format gambar: JPG, PNG, atau GIF<br>
            • Ukuran maksimal: 5MB<br>
            • Gambar akan ditampilkan di halaman galeri
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Foto:</label>
                <input type="text" name="judul" required placeholder="Contoh: Testimoni Customer Setia">
            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" rows="5" required placeholder="Ceritakan tentang foto ini..."></textarea>
            </div>

            <div class="form-group">
                <label>Upload Gambar:</label>
                <input type="file" name="gambar" accept="image/*" required onchange="previewImage(event)">
                <img id="preview" class="preview" style="display:none;">
            </div>

            <button type="submit" name="submit">💾 Simpan ke Galeri</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>