<?php
/**
Bu proje **NELER YOK Kİ** Tarafından sevgi ile yapılmıstır.
Github sayfası: https://github.com/neleryokki/Wp-ayn-basl-k-silen-eklenti
 */

// Admin menüsüne ekle
add_action('admin_menu', 'stc_add_admin_menu');

function stc_add_admin_menu() {
    add_management_page(
        'Aynı Başlık Temizleyici',
        'Aynı Başlık Temizleyici',
        'manage_options',
        'same-title-cleaner',
        'stc_admin_page'
    );
}

// Admin sayfası içeriği
function stc_admin_page() {
    if (!current_user_can('manage_options')) {
        wp_die('Yetkiniz yok.');
    }

    // Silme işlemi
    if (isset($_POST['stc_delete']) && isset($_POST['post_ids']) && is_array($_POST['post_ids'])) {
        $deleted_count = 0;
        foreach ($_POST['post_ids'] as $post_id) {
            if (wp_delete_post(intval($post_id), true)) {
                $deleted_count++;
            }
        }
        echo '<div class="notice notice-success"><p>' . $deleted_count . ' yazı başarıyla silindi.</p></div>';
    }

    // Aynı başlıktaki yazıları bul
    global $wpdb;

    $query = "
        SELECT post_title, GROUP_CONCAT(ID) as ids, COUNT(*) as count
        FROM {$wpdb->posts}
        WHERE post_type IN ('post', 'page') 
          AND post_status = 'publish'
        GROUP BY post_title
        HAVING count > 1
        ORDER BY count DESC
    ";

    $duplicates = $wpdb->get_results($query);

    ?>
    <div class="wrap">
        <h1>Aynı Başlığa Sahip Yazılar</h1>

        <?php if (empty($duplicates)): ?>
            <p>Aynı başlığa sahip hiçbir yazı bulunamadı.</p>
        <?php else: ?>
            <form method="post">
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th width="50"><input type="checkbox" id="stc-select-all"></th>
                            <th>Başlık</th>
                            <th>Tekrar Sayısı</th>
                            <th>Yazı ID'leri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($duplicates as $item): 
                            $ids = explode(',', $item->ids);
                        ?>
                        <tr>
                            <td>
                                <?php 
                                // İlk ID hariç hepsini checkbox yap
                                array_shift($ids); 
                                foreach ($ids as $id): 
                                ?>
                                <input type="checkbox" name="post_ids[]" value="<?php echo esc_attr($id); ?>" class="stc-checkbox">
                                <?php endforeach; ?>
                            </td>
                            <td><strong><?php echo esc_html($item->post_title); ?></strong></td>
                            <td><?php echo $item->count; ?></td>
                            <td><?php echo implode(', ', explode(',', $item->ids)); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p style="margin-top: 20px;">
                    <button type="submit" name="stc_delete" class="button button-primary" onclick="return confirm('Seçili yazıları kalıcı olarak silmek istediğinize emin misiniz?')">Seçili Yazıları Sil</button>
                </p>
            </form>

            <script>
            document.getElementById('stc-select-all').addEventListener('change', function(e) {
                var checkboxes = document.querySelectorAll('.stc-checkbox');
                for (var cb of checkboxes) {
                    cb.checked = e.target.checked;
                }
            });
            </script>
        <?php endif; ?>
    </div>
    <?php
}
