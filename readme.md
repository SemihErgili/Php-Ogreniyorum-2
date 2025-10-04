# PHP Pascal Üçgeni Hesaplama

Bu proje, kullanıcı tarafından girilen satır sayısına göre **Pascal Üçgeni** hesaplayan ve web üzerinde görsel olarak gösteren bir PHP uygulamasıdır. Derslerde **faktöriyel, binom katsayısı ve recursive fonksiyonlar** konularını öğrenmek için hazırlanmıştır.

---

## Proje Adı
**PHP Ders 2 - Pascal Üçgeni**

---

## Açıklama

Pascal Üçgeni, matematikte her elemanı üstteki iki elemanın toplamı olan bir üçgendir ve binom katsayılarını temsil eder.  
Uygulama kullanıcıdan bir sayı alır ve bu sayı kadar satırdan oluşan Pascal Üçgeni’ni hesaplar ve ekranda gösterir.  

- Binom katsayısı formülü:  
  `C(n,k) = n! / (k! × (n-k)!)`
- Faktöriyel fonksiyonu recursive olarak hesaplanır.
- Maksimum 12 satır ekranda görselleştirilir; daha fazla satır için uyarı mesajı gösterilir.

---

## Özellikler

- Kullanıcıdan sayı alarak Pascal Üçgeni hesaplar.
- Binom katsayılarını hesaplamak için **recursive faktöriyel fonksiyonu** kullanılır.
- Şık ve modern tasarım: 
  - Gradient arka plan
  - Hover efektli butonlar
  - Animasyonlu sonuç ve satırlar
- Responsive: Mobil ve masaüstü uyumlu.
- Büyük sayılar için performans uyarısı.

---

## Kullanım

1. Dosyaları bir PHP sunucusuna yükleyin (XAMPP, MAMP veya canlı sunucu).
2. Tarayıcıda `deneme.php` dosyasını açın.
3. Formdan satır sayısını girin ve **Hesapla** butonuna tıklayın.
4. Pascal Üçgeni ekranda görüntülenecektir.
