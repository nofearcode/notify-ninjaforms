<?php

function notify_ninja_regsettings() {
    register_setting('notify_ninja_settings_group', 'notify_ninja_userid');
    register_setting('notify_ninja_settings_group', 'notify_ninja_apikey');
    register_setting('notify_ninja_settings_group', 'notify_ninja_senderid');
}

function notify_ninja_options() {
    add_submenu_page('options-general.php', 'Notify for Ninja', 'Notify for Ninja', 'manage_options', 'notify_ninja_options', 'notify_ninja_options_page');
    add_action('admin_init', 'notify_ninja_regsettings');
}

add_action('admin_menu', 'notify_ninja_options');

function notify_ninja_options_page() {
    ?>
    <div class="wrap">
        <h1>Notify.Lk SMS for Ninja Forms</h1>
        <form method="post" action="options.php">
	    <?php settings_fields('notify_ninja_settings_group'); ?>
	    <?php do_settings_sections('notify_ninja_settings_group'); ?>
    	<table class="form-table">
    	    <tr valign="top">
    		<th scope="row">Notify.Lk User ID</th>
    		<td><input type="text" class="regular-text" name="notify_ninja_userid" value="<?php echo esc_attr(get_option('notify_ninja_userid')); ?>" /></td>
    	    </tr>

    	    <tr valign="top">
    		<th scope="row">Notify.Lk API Key</th>
    		<td><input type="text" class="regular-text" name="notify_ninja_apikey" value="<?php echo esc_attr(get_option('notify_ninja_apikey')); ?>" /></td>
    	    </tr>

    	    <tr valign="top">
    		<th scope="row">Notify.Lk Sender ID</th>
    		<td><input type="text" class="regular-text" name="notify_ninja_senderid" value="<?php echo esc_attr(get_option('notify_ninja_senderid')); ?>" /></td>
    	    </tr>

    	    <tr>
    		<td colspan="2">

    		</td>
    	    </tr>
    	</table>

	    <?php submit_button(); ?>

        </form>

        <div class="log_viewer">
    	<div>
	    <textarea style="width:100%;" rows="8"><?php
		$log = fopen(trailingslashit(dirname(__FILE__)) . "log.txt", "r");
		echo fread($log, filesize(trailingslashit(dirname(__FILE__))));
		fclose($log);
		?></textarea>
		
    	</div>
        </div>
    </div>
    <?php
}
