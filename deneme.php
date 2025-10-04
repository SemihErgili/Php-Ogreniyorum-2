<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Ders 2 - Pascal Üçgeni</title>
    <style>
        /* Sayfa arka planı - Güzel gradient efekti */
        body {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 50%, #6c5ce7 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        
        /* Form container - Beyaz arka plan ile öne çıkarma */
        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            text-align: center;
        }
        
        /* Başlık stili */
        h2 {
            color: #2d3436;
            margin-bottom: 20px;
            font-size: 24px;
        }
        
        /* Hesapla butonu stili */
        .btn{
            padding: 12px;
            width: 250px;
            background: linear-gradient(45deg, #00b894, #00cec9);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.2s;
            margin: 0 auto;
            display: block;
        }
        
        /* Buton hover efekti */
        .btn:hover {
            transform: translateY(-2px);
        }
        
        /* Input alanı stili */
        .input{
            padding: 12px;
            width: 226px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            margin: 0 auto 15px auto;
            transition: border-color 0.3s;
            display: block;
        }
        
        /* Input focus efekti */
        .input:focus {
            border-color: #74b9ff;
            outline: none;
        }
        
        /* Sonuç gösterme alanı */
        .result {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
            padding: 15px;
            width: 226px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            margin: 0 auto 20px auto;
            text-align: center;
            animation: fadeIn 0.5s ease-in;
        }
        
        /* Sonuç animasyonu */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Polinom üçgen görünümü */
        .triangle {
            background: linear-gradient(135deg, #a29bfe, #6c5ce7);
            color: white;
            padding: 20px;
            width: 226px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            margin: 20px auto;
            text-align: center;
            animation: fadeIn 0.7s ease-in;
        }
        
        .triangle-row {
            margin: 5px 0;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔺 Pascal Üçgeni</h2>
        
        <?php
        /**
         * PASCAL ÜÇGENİ HESAPLAMA PROGRAMI
         * Bu program matematikteki Pascal üçgenini hesaplar
         * Pascal üçgeni: Her eleman üstteki iki elemanın toplamıdır
         * Binom katsayılarını temsil eder: C(n,k) = n! / (k! * (n-k)!)
         */
        
        // Faktöriyel hesaplama fonksiyonu
        // Örnek: 5! = 5 * 4 * 3 * 2 * 1 = 120
        function faktoriyel($n) {
            // Temel durum: 0! = 1, 1! = 1
            if ($n <= 1) return 1;
            
            // Recursive (kendini çağıran) fonksiyon
            // n! = n * (n-1)!
            return $n * faktoriyel($n - 1);
        }
        
        /**
         * Binom Katsayısı Hesaplama Fonksiyonu
         * Formül: C(n,k) = n! / (k! * (n-k)!)
         * Bu formül "n tane şeyden k tanesini seçme" sayısını verir
         * Pascal üçgenindeki her eleman bir binom katsayısıdır
         */
        function binomKatsayisi($n, $k) {
            // Eğer k > n ise sonuç 0'dır (imkansız durum)
            if ($k > $n) return 0;
            
            // Kenar durumlar: C(n,0) = 1 ve C(n,n) = 1
            // Pascal üçgeninin kenarları her zaman 1'dir
            if ($k == 0 || $k == $n) return 1;
            
            // Ana formül: C(n,k) = n! / (k! * (n-k)!)
            return faktoriyel($n) / (faktoriyel($k) * faktoriyel($n - $k));
        }
        
        /**
         * Pascal Üçgeni Oluşturma Fonksiyonu
         * Her satır binom katsayılarından oluşur
         * Satır n, sütun k için değer C(n,k)'dır
         */
        function pascalUcgeni($n) {
            // Üçgeni saklamak için 2 boyutlu dizi
            $ucgen = [];
            
            // Her satır için döngü (0'dan n-1'e kadar)
            for ($satir = 0; $satir < $n; $satir++) {
                // Her satır için boş dizi oluştur
                $ucgen[$satir] = [];
                
                // Her sütun için döngü (0'dan satır numarasına kadar)
                // Pascal üçgeninde satır n'de n+1 tane eleman vardır
                for ($sutun = 0; $sutun <= $satir; $sutun++) {
                    // Binom katsayısı formülü ile hesapla: C(satır, sütun)
                    $ucgen[$satir][$sutun] = binomKatsayisi($satir, $sutun);
                }
            }
            
            // Hesaplanan üçgeni geri döndür
            return $ucgen;
        }
        
        // Form verisi gönderildi mi kontrol et
        if ($_POST) {
            // Kullanıcının girdiği sayıyı al
            $sayi = $_POST["sayi"];
            
            // Sonuç gösterme alanını başlat
            echo "<div class='triangle'>";
            echo "<h4>🔺 Pascal Üçgeni ($sayi satır)</h4>";
            echo "<small>Formül: C(n,k) = n! / (k! * (n-k)!)</small><br><br>";
            
            // Performans için maksimum 12 satır göster
            // Büyük sayılarda faktöriyel hesaplama çok yavaş olur
            $maxSatir = min($sayi, 12);
            
            // Pascal üçgenini hesapla
            $pascalUcgen = pascalUcgeni($maxSatir);
            
            // Hesaplanan üçgeni ekranda göster
            foreach ($pascalUcgen as $satirIndex => $satir) {
                echo "<div class='triangle-row'>";
                
                // Her satırdaki elemanları yazdır
                foreach ($satir as $sutunIndex => $deger) {
                    // Değeri ve hangi C(n,k) olduğunu göster
                    echo "$deger ";
                }
                
                echo "</div>";
            }
            
            // Büyük sayılar için uyarı mesajı
            if ($_POST["sayi"] > 12) {
                echo "<small>⚠️ Performans için ilk 12 satır gösterildi</small>";
            }
            
            echo "</div>";
        }
        ?>
        
        <!-- HTML Form - Kullanıcıdan sayı girişi alır -->
        <form action="deneme.php" method="post">
            <!-- Number input - Sadece sayı girişine izin verir -->
            <input type="number" name="sayi" placeholder="Bir sayı giriniz..." class="input" required>
            <br><br>
            <!-- Submit butonu - Formu gönderir -->
            <input type="submit" value="🧮 Hesapla" class="btn">
        </form>
        
        <p style="color: #636e72; font-size: 12px; margin-top: 20px;">💡 PHP Ders 2 - Binom Katsayıları ve Pascal Üçgeni<br>
        Formül: C(n,k) = n! / (k! × (n-k)!) - Faktöriyel ve Recursive Fonksiyonlar</p>
    </div>
</body>
</html>