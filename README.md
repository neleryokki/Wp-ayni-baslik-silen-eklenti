WP AYNI BASLIK SİLEN EKLENTİ

WordPress'te aynı başlığa sahip yazıları (post/page) bulup silmenizi sağlayan basit ve kullanışlı bir araç eklentisi.

📋 Açıklama
WP AYNI BASLIK SİLEN EKLENTİ, WordPress sitenizde aynı başlığa sahip birden fazla yazı veya sayfa olup olmadığını kontrol eder ve bunları kolayca silmenize olanak tanır. Özellikle içerik migrasyonları, otomatik içerik çekme veya birden fazla yazarın olduğu sitelerde oluşan mükerrer içerik sorununu çözmek için idealdir.

✨ Özellikler
Aynı başlığa sahip tüm yayındaki (publish) yazıları listeler

Yazı (post) ve sayfa (page) türlerini destekler

Her başlık grubunda ilk yazıyı korur, diğerlerini seçili olarak sunar

Toplu seçim / seçimi kaldır özelliği

Silme işlemi öncesi onay mesajı

Çoklu yazı silme işlemi sonrası kaç yazının silindiğini gösterir

🔧 Kurulum
Eklenti dosyalarını indirin ve /wp-content/plugins/same-title-cleaner/ klasörüne yükleyin veya WordPress admin panelinden "Eklenti Yükle" ile yükleyin

WordPress admin panelinde Eklentiler sayfasından eklentiyi aktifleştirin

Araçlar → Aynı Başlık Temizleyici menüsüne gidin

Aynı başlığa sahip yazıları görüntüleyin ve silmek istediklerinizi seçin

"Seçili Yazıları Sil" butonuna tıklayın

🖥️ Kullanım
Araçlar menüsünden Aynı Başlık Temizleyici'ye tıklayın

Eklenti otomatik olarak aynı başlığa sahip tüm yazıları listeleyecektir

Her grupta ilk yazı hariç diğerleri otomatik seçilidir (ilk yazı korunur)

Dilerseniz elle seçim yapabilir veya "Tümünü Seç" kutucuğunu kullanabilirsiniz

"Seçili Yazıları Sil" butonuna tıklayın ve onaylayın

Silinen yazıların sayısı başarı mesajı olarak gösterilecektir

📝 Gereksinimler
WordPress 4.0 veya üzeri

PHP 5.6 veya üzeri

MySQL 5.0 veya üzeri

⚠️ Uyarı
Bu eklenti ile sildiğiniz yazılar kalıcı olarak silinir (çöp kutusuna gönderilmez). Silme işlemini gerçekleştirmeden önce yedek almanız önerilir.

🔧 Geliştirici Bilgileri
Eklenti kodunu düzenlemek isterseniz:

Silme işlemini çöp kutusuna yönlendirmek için: wp_delete_post($post_id, false) kullanın

Farklı post türlerini dahil etmek için: post_type IN ('post', 'page', 'custom_type') satırını düzenleyin

Taslakları da dahil etmek için: post_status = 'publish' satırını kaldırın

📄 Lisans
GPL v2 veya sonrası

