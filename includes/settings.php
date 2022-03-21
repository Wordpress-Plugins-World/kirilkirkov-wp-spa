<?php

function spa_register_settings() {
    add_option('kk_wp_spa_option_dir_name', '');
    add_option('kk_wp_spa_option_enabled', '');
    add_option('kk_wp_spa_bundle_version', '');
    register_setting('kk_wp_spa_options_group', 'kk_wp_spa_option_dir_name', 'spa_callback');
    register_setting('kk_wp_spa_options_group', 'kk_wp_spa_option_enabled', 'spa_callback');
    register_setting('kk_wp_spa_options_group', 'kk_wp_spa_bundle_version', 'spa_callback');
}
add_action('admin_init', 'spa_register_settings');

function spa_register_options_page() {
    add_options_page('Page Title', 'KirilKirkov WP Spa', 'manage_options', 'kirilkirkov-wp-spa', 'spa_options_page');
}
add_action('admin_menu', 'spa_register_options_page');

function spa_options_page() {
?>
    <h2>Single Page App Settings</h2>
    <p>Define main settings for the single page application</p>
    <form action="options.php" method="post">
        <?php settings_fields('kk_wp_spa_options_group'); ?>
        
        <table class="form-table" role="presentation">
            <tbody>
            <tr>
                <th scope="row">
                        <label for="kk_wp_spa_option_enabled">Enabled</label>
                    </th>
                    <td>
                        <input type="checkbox" id="kk_wp_spa_option_enabled" name="kk_wp_spa_option_enabled" <?php if((int)get_option('kk_wp_spa_option_enabled') === 1) { ?> checked="checked" <?php } ?> value="1" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="kk_wp_spa_option_dir_name">Directory name of the theme</label>
                    </th>
                    <td>
                        <input type="text" id="kk_wp_spa_option_dir_name" name="kk_wp_spa_option_dir_name" value="<?php echo get_option('kk_wp_spa_option_dir_name'); ?>" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="kk_wp_spa_bundle_version">Update bundle version (set time/string/etc. get param)</label>
                    </th>
                    <td>
                        <input type="text" id="kk_wp_spa_bundle_version" name="kk_wp_spa_bundle_version" value="<?php echo get_option('kk_wp_spa_bundle_version'); ?>" />
                        <p>Add get param: <b>"?v=&lt;?= get_option('kk_wp_spa_bundle_version') ?&gt;"</b> after your css/js include</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php submit_button(); ?>
    </form>
<?php
}
