<?php
/*
Plugin Name: Hestiacp Wordpress control plugin
was board with some time made this
Description: Hestiacp Wordpress DOMIAN info 
Version: 1.001
Author: Alex reznik
Author URI: http://palm-tree.finance
*/
// show username
//
//
//

function add_my_css_and_my_js_files(){
	wp_enqueue_style( 'new-style', plugins_url('/css/new-style.css', __FILE__), false, '1.0.7', 'all');
}
    add_action('wp_enqueue_scripts', "add_my_css_and_my_js_files");

add_shortcode('kiki-greet', 'kiki_greet');
function kiki_greet() {
    $user = wp_get_current_user();
    echo $user->display_name;
}
add_action('login_form_middle', 'add_lost_password_link');
if (!function_exists('vivid_login_page')) {
    function vivid_login_page() {
        echo '<h4>Already a member ?</h4>';
        echo '<a href="/wp-login.php">LOGIN</a>';
    }
    add_shortcode('vivid-login-page', 'vivid_login_page');
}
function packageupgrade_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    $default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3'];
    $default_paidsubname_5 = $hestia_wordpress_plugin_options['default_paidsubname_5'];
    // sanitize form values
    $hst_hostname = $server_ip_0;
    $hst_port = $port_1;
    $hst_hash = $api_hash_2;
    $hst_returncode = 'yes';
    $hst_command = 'v-change-user-package';
    $username = $current_user->user_login;
    $password = sanitize_text_field($_POST["cf-password"]);
    $email = $current_user->user_email;
    $package = $default_paidsubname_5;
    $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $package);
    $postdata = http_build_query($postvars);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    $answer = curl_exec($curl);
    // Check result
    if ($answer == 0) {
        
    } elseif ($answer == 4) {
        echo "Allready Upgraded";
    }
}
function rf_packageupgrade() {
    packageupgrade_now();
    return ob_get_clean();
}
function packageupgrade2_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    $default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3'];
    $default_paidsubname2_5 = $hestia_wordpress_plugin_options['default_paidsubname2_5'];
    // sanitize form values
    $hst_hostname = $server_ip_0;
    $hst_port = $port_1;
    $hst_hash = $api_hash_2;
    $hst_returncode = 'yes';
    $hst_command = 'v-change-user-package';
    $username = $current_user->user_login;
    $email = $current_user->user_email;
    $package = $default_paidsubname2_5;
    $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $package);
    $postdata = http_build_query($postvars);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    $answer = curl_exec($curl);
    // Check result
    if ($answer == 0) {
        
    } elseif ($answer == 4) {
        echo "Allready Upgraded";
    }
}
function rf_packageupgrade2() {
    packageupgrade2_now();
    return ob_get_clean();
}
function packageupgrade3_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    $default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3'];
    $default_paidsubname3_5 = $hestia_wordpress_plugin_options['default_paidsubname3_5'];
    // sanitize form values
    $hst_hostname = $server_ip_0;
    $hst_port = $port_1;
    $hst_hash = $api_hash_2;
    $hst_returncode = 'yes';
    $hst_command = 'v-change-user-package';
    $username = $current_user->user_login;
    $email = $current_user->user_email;
    $package = $default_paidsubname3_5;
    $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $package);
    $postdata = http_build_query($postvars);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    $answer = curl_exec($curl);
    // Check result
    if ($answer == 0) {
    } elseif ($answer == 4) {
        echo "Allready Upgraded";
    }
}
function rf_packageupgrade3() {
    packageupgrade3_now();
    return ob_get_clean();
}
add_action( 'woocommerce_payment_complete', 'check_user_subscriptions' );
function check_user_subscriptions() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $default_paidsub_5 = $hestia_wordpress_plugin_options['default_paidsub_5'];
    $default_paidsub2_5 = $hestia_wordpress_plugin_options['default_paidsub2_5'];
    $default_paidsub3_5 = $hestia_wordpress_plugin_options['default_paidsub3_5'];
    $user = wp_get_current_user();
	//$upgrademsg = 'Please upgrade your package';
    $has_sub1 = wcs_user_has_subscription($user->ID, $default_paidsub_5, 'active');
    $has_sub2 = wcs_user_has_subscription($user->ID, $default_paidsub2_5, 'active');
    $has_sub3 = wcs_user_has_subscription($user->ID, $default_paidsub3_5, 'active');
    if ($has_sub1) {
    rf_packageupgrade();   
    }if ($has_sub2) {
	rf_packageupgrade2();   
	}if ($has_sub3) {
	rf_packageupgrade3();   
	}
	else {
		echo $upgrademsg;
	}
}
function html_formdns_coded() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    $server_domain_5 = $hestia_wordpress_plugin_options['server_domain_5'];
    echo '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
    echo '<h2><strong>Set A DNS RECORD</strong></h2>';
    echo '<p>';
    echo '<input type="text" name="cf-registerdns" value="record"' . (isset($_POST["cf-registerdns"]) ? esc_attr($_POST["cf-registerdns"]) : '') . '" size="35" />';
    echo '.' . $server_domain_5 . '';
    echo '</p>';
    echo '<p>';
    echo '<input type="text" name="cf-registerdnsip"  value="ip"' . (isset($_POST["cf-registerdnsip"]) ? esc_attr($_POST["cf-registerdnsip"]) : '') . '" size="35" />';
    echo '</p>';
    echo '<p><input type="submit" name="cf-registerdns" value="register"></p>';
    do_action('anr_captcha_form_field');
    echo '</form>';
}
function registerdns_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $server_domain_5 = $hestia_wordpress_plugin_options['server_domain_5'];
    $current_user = wp_get_current_user();
    // if the submit button is clicked, send the email
    if (isset($_POST['cf-registerdns'])) {
        // sanitize form values
        $hst_hostname = $server_ip_0;
        $hst_port = $port_1;
        $hst_hash = $api_hash_2;
        $hst_returncode = 'yes';
        $hst_command = 'v-add-dns-record';
        $first_name = 'WordPress';
        $last_name = 'user';
        $username = $current_user->user_login;
        $domain = sanitize_text_field($_POST["cf-cf-registerdns"]) . $server_domain_5;
        $ip = sanitize_text_field($_POST["cf-registerdnsip"]);
        $record = 'A';
        $www = 'www';
        // Prepare POST query
        $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $domain, 'arg4' => $www, 'arg5' => $record, 'arg6' => $ip);
        // Send POST query via cURL
        $postdata = http_build_query($postvars);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        // Check result
        if ($answer == 0) {
            echo "<script>alert('registered successfully !');</script>";
        } else {
            echo "Query returned error code: " . $answer . "\n";
        }
    }
}
function rf_shortcodedns() {
    ob_start();
    registerdns_now();
    html_formdns_coded();
    return ob_get_clean();
}
add_shortcode('sitepoint_dns_form', 'rf_shortcodedns');
function html_form_code() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    $default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3'];
    $default_welcome_msg_4 = $hestia_wordpress_plugin_options['default_welcome_msg_4'];
	
    echo '<form style="border: 1px solid black;width: 480px;margin-left:auto;margin-right:auto;" action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
	echo '<div class=wpinstall style="new-style" >';
    echo "<h2 style=align: center;><strong>" . $default_welcome_msg_4 . "</strong><br></h2>";
    echo '<p> </p>';
    print "<strong>please choose a strong password.</strong>";
	print '<p>After registration the credentials will be sent to your email.</p>';
    echo '<h5><strong>Input a password for hosting</strong></h5>';
    echo 'password<br/>';
    echo '<input type="password" name="cf-password" pattern="[a-zA-Z0-9 ]+" value="' . (isset($_POST["cf-password"]) ? esc_attr($_POST["cf-password"]) : '') . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Confirm password<br/>';
    echo '<input type="password" name="cf-password" pattern="[a-zA-Z0-9 ]+" value="' . (isset($_POST["cf-password"]) ? esc_attr($_POST["cf-password"]) : '') . '" size="40" />';
    echo '</p>';
    echo '<p><input type="submit" name="cf-submitted" value="Register"></p>';
    do_action('anr_captcha_form_field');
    echo '</form>';
	echo '</div>';
}
function register_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    $default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3'];
    // if the submit button is clicked, send the email
    if (isset($_POST['cf-submitted'])) {
        echo "<meta http-equiv='refresh' content='0'>";
        // sanitize form values
        $hst_hostname = $server_ip_0;
        $hst_port = $port_1;
        $hst_hash = $api_hash_2;
        $hst_returncode = 'yes';
        $hst_command = 'v-add-user';
        $username = $current_user->user_login;
        $password = sanitize_text_field($_POST["cf-password"]);
        $email = $current_user->user_email;
        $package = $default_hosting_package_3;
        $first_name = 'WordPress';
        $last_name = 'user';
        $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $password, 'arg3' => $email, 'arg4' => $package, 'arg5' => $first_name, 'arg6' => $last_name);
        $postdata = http_build_query($postvars);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        // Check result
        if ($answer == 0) {
            echo "<script>alert('registered successfully !');</script>";
            $to = $email; //sendto@example.com
            $subject = 'Welcome to HestiaCP Your password is inside';
            $body = 'HI!, ' . $username . ' Your Password is: ' . $password;
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail($to, $subject, $body, $headers);
        } elseif ($answer == 4) {
            echo "Allready registered";
        }
    } else {
        //	  echo "Query returned error code: " .$answer. "\n";
        
    }
}
function rf_shortcode() {
    ob_start();
    register_now();
    html_form_code();
    return ob_get_clean();
}
add_shortcode('sitepoint_register_form', 'rf_shortcode');
function html_form_coded() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    $server_domain_5 = $hestia_wordpress_plugin_options['server_domain_5'];
	$default_shared_1 = $hestia_wordpress_plugin_options['default_shared_1'];
	$default_shared_2 = $hestia_wordpress_plugin_options['default_shared_2'];
    $current_user = wp_get_current_user();
	echo '<div class=subdomian style=new-style >';
    echo '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
	echo '<h2>Domain Deployer</h2>';
    echo '<h5>Choose your free domian</h5>';
    echo '<input type="text" name="cf-subdomian" pattern="[a-zA-Z][a-zA-Z0-9-_.]+" value="' . (isset($_POST["cf-subdomian"]) ? esc_attr($_POST["cf-subdomian"]) : '') . '" size="35" />';
	echo '<select id="my_options" name="my_options">';
	echo '<option value="'.$default_shared_1.'" title="title 1">'.$default_shared_1.'</option>';
	if($default_shared_2){
	echo '<option value="'.$default_shared_2.'" title="title 2">'.$default_shared_2.'</option>';
	}
	echo '</select>';
    echo '</p>';
    echo '<p><input type="submit" name="cf-submittedd" value="Register"></p>';
    do_action('anr_captcha_form_field');
    echo '</form>';
	echo '</div>';

}
function registerdomian_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $server_domain_5 = $hestia_wordpress_plugin_options['server_domain_5']; // API Hash
    $current_user = wp_get_current_user();
    // if the submit button is clicked, send the email
    if (isset($_POST['cf-submittedd'])) {
        echo "<meta http-equiv='refresh' content='0'>";
        // sanitize form values
        $hst_hostname = $server_ip_0;
        $hst_port = $port_1;
        $hst_hash = $api_hash_2;
        $hst_returncode = 'yes';
        $hst_command = 'v-add-domain';
        $first_name = 'WordPress';
        $last_name = 'user';
        $username = $current_user->user_login;
		$domain = sanitize_text_field($_POST["cf-subdomian"]) . '.' . sanitize_text_field( $_POST['my_options'] );
        $ip = $server_ip_0;
        // Prepare POST query
        $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $domain, 'arg3' => $ip);
        // Send POST query via cURL
        $postdata = http_build_query($postvars);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        // Check result
        if ($answer == 0) {
            echo "<script>alert('registered successfully !');</script>";
        } else {
            echo "Query returned error code: " . $answer . "\n";
        }
    }
}
function rf_shortcoded() {
    ob_start();
    registerdomian_now();
    html_form_coded();
    return ob_get_clean();
}
add_shortcode('sitepoint_registerd_form', 'rf_shortcoded');
function html_form_code_info() {
    $current_user = wp_get_current_user();
    echo '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
    echo '<p>';
    echo '<h2 style="text-align: center;"><span style="text-decoration: underline;"><strong>DOMAINS YOU OWN</strong></span></h2>';
    echo '</p>';
    echo '</form>';
}
function get_settings_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
}
function domaininfo_now() {
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    $default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3'];
    $default_welcome_msg_4 = $hestia_wordpress_plugin_options['default_welcome_msg_4'];
	$default_admin_login_1 = $hestia_wordpress_plugin_options['default_admin_login_1'];
	$default_menu_button_1 = $hestia_wordpress_plugin_options['default_menu_button_1'];
	$default_menu_button_2 = $hestia_wordpress_plugin_options['default_menu_button_2'];
	$default_menu_button_3 = $hestia_wordpress_plugin_options['default_menu_button_3'];
	$default_menu_button_4 = $hestia_wordpress_plugin_options['default_menu_button_4'];
	
	$default_menu_button_name_1 = $hestia_wordpress_plugin_options['default_menu_button_name_1'];
	$default_menu_button_name_2 = $hestia_wordpress_plugin_options['default_menu_button_name_2'];
	$default_menu_button_name_3 = $hestia_wordpress_plugin_options['default_menu_button_name_3'];
	$default_menu_button_name_4 = $hestia_wordpress_plugin_options['default_menu_button_name_4'];

	
    if (!isset($_SESSION)) session_start();
    $hst_hostname = $server_ip_0;
    $hst_port = $port_1;
    $hst_hash = $api_hash_2;
    $hst_returncode = 'no';
    $hst_command = 'v-list-user';
    $username = $current_user->user_login;
    $format = 'json';
    $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $format);
    $postdata = http_build_query($postvars);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    $answer = curl_exec($curl);
    // Parse JSON output
    $data = json_decode($answer, true);
	
echo '<a style="margin-bottom: 10px;margin-left: 10px;float: left;display: grid !important;grid-gap: 10px;width: 200px;height: 25px;background: #6b5b95;padding: 0px;text-align: center;border-radius: 5px;color: white;font-weight: bold;line-height: 25px;" href="'.$default_admin_login_1.'">LOGIN TO CONTROL PANEL</a>';

if ($default_menu_button_name_1){
	echo '<a style="margin-bottom: 10px;margin-left: 10px;float: left;display: grid !important;grid-gap: 10px;width: 200px;height: 25px;background: #feb236;padding: 0px;text-align: center;border-radius: 5px;color: white;font-weight: bold;line-height: 25px;" href="'.$default_menu_button_1.'">'.$default_menu_button_name_1.'</a>';
								  };
	if ($default_menu_button_name_2){
echo '<a style="margin-bottom: 10px;margin-left: 10px;float: left;display: grid !important;grid-gap: 10px;width: 200px;height: 25px;background: #92a8d1;padding: 0px;text-align: center;border-radius: 5px;color: white;font-weight: bold;line-height: 25px;" href="'.$default_menu_button_2.'">'.$default_menu_button_name_2.'</a>';
	}
		if ($default_menu_button_name_3){
echo '<a style="margin-bottom: 10px;margin-left: 10px;float: left;display: grid !important;grid-gap: 10px;width: 200px;height: 25px;background: #ff7b25;padding: 0px;text-align: center;border-radius: 5px;color: white;font-weight: bold;line-height: 25px;" href="'.$default_menu_button_3.'">'.$default_menu_button_name_3.'</a>';
		}
	if ($default_menu_button_name_4){
echo '<a style="margin-bottom: 10px;margin-left: 10px;float: left;display: grid !important;grid-gap: 10px;width: 200px;height: 25px;background: #feb236;padding: 0px;text-align: center;border-radius: 5px;color: white;font-weight: bold;line-height: 25px;" href="'.$default_menu_button_4.'">'.$default_menu_button_name_4.'</a>';
		}
	
	
    echo '<table>';
    foreach ($data as $result) {
        echo '<tr><td>NAME</td><td>EMAIL</td><td>PACKAGE</td><td>Root Folder</td><td>HDD SPACE</td><td>TRAFFIC</td><td>SUSPENDED STATUS</td></tr>';
        echo '<td>' . $result['NAME'] . '</td>';
        echo '<td>' . $result['CONTACT'] . '</td>';
        echo '<td>' . $result['PACKAGE'] . '</td>';
        echo '<td>' . $result['HOME'] . '</td>';
        echo '<td>' . $result['DISK_QUOTA'] . '</td>';
        echo '<td>' . $result['BANDWIDTH'] . '</td>';
        echo '<td>' . $result['SUSPENDED'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
	
    //echo '<h2><strong>You are using a Default free hosting package upgrade </strong><a href="/Packages">HERE</a></h2>';
    	foreach($data as $result){
    	if($result['PACKAGE'] == $default_hosting_package_3) {
			echo 'Please Upgrade Your Hosting Package & Get more'; 
			echo "<a href='".$shop_page_url."'> HERE</a>";
    }
    	}
    
}
function rf_shortcodeinfo() {
    ob_start();
    domaininfo_now();
    domaininfomore_now();
    domainlist_now();
    return ob_get_clean();
}
add_shortcode('sitepoint_info_form', 'rf_shortcodeinfo');
//forgot server fassword short code
function rf_shortcodepass() {
    ob_start();
    echo '<a href="https://"' . $server_ip_0 . ':8083/reset/" >Reset Your Password</a>';
    return ob_get_clean();
}
add_shortcode('sitepoint_pass_form', 'rf_shortcodepass');
/////////more
//
function domaininfomore_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    // if the submit button is clicked, send the email
    // if(!isset($_SESSION)) session_start();
    if (!isset($_SESSION)) session_start();
    // sanitize form values
    $hst_hostname = $server_ip_0;
    $hst_port = $port_1;
    $hst_hash = $api_hash_2;
    $hst_returncode = 'no';
    $hst_command = 'v-list-user-stats';
    $username = $current_user->user_login;
    $format = 'json';
    // Prepare POST query
    $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $format);
    // Send POST query via cURL
    $postdata = http_build_query($postvars);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    $answer = curl_exec($curl);
    // Parse JSON output
    $data = json_decode($answer, true);
    //foreach($json_decoded as $data){
    //print_r($data);
    //}
    echo '<table>';
	if($data){
    foreach ($data as $result) {
        echo '<tr><td>Your WebSites</td><td>DNS RECORDS</td><td>MAIL BOXS</td><td>DATABASES</td></tr>';
        echo '<td>' . $result['U_WEB_DOMAINS'] . '</td>';
        echo '<td>' . $result['U_DNS_RECORDS'] . '</td>';
        echo '<td>' . $result['U_DISK_MAIL'] . '</td>';
        echo '<td>' . $result['U_DISK_DB'] . '</td>';
        echo '</tr>';
    }
	}
    echo '</table>';
    foreach ($data as $result) {
        if ($result['U_WEB_DOMAINS'] == "0") {
            echo '<h2"><strong>Create Your First WebSite.Please Choose Your FREE DOMAIN NAME</strong></h2>';
        }
    }
    //print_r($data);
    if (json_decode($answer, true) == FALSE) {
        echo "[sitepoint_register_form]";
    }
}
function domainlist_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    // if the submit button is clicked, send the email
    // if(!isset($_SESSION)) session_start();
    if (!isset($_SESSION)) session_start();
    // sanitize form values
    $hst_hostname = $server_ip_0;
    $hst_port = $port_1;
    $hst_hash = $api_hash_2;
    $hst_returncode = 'no';
    $hst_command = 'v-list-web-domains';
    $username = $current_user->user_login;
    $format = 'json';
    // Prepare POST query
    $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $format);
    // Send POST query via cURL
    $postdata = http_build_query($postvars);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    $answer = curl_exec($curl);
    // Parse JSON output
    $data = json_decode($answer, true);
    //foreach($json_decoded as $data){
    //print_r($data);
    //}
    echo '<table>';
	            if ($data) {
    echo '<tr><td>DOMAINS</td><td>IP</td><td>SSL</td><td>DOCUMENT ROOT</td></tr>';
        }
    foreach ($data as $result => $item) {
        $domain = $result; // echo the "unknown" field name

            echo '<td>' . '<a target="_blank" href="http://' . $domain . '">' . $domain . '</a>' . '</td>';
            echo '<td>' . $item['IP'] . '</td>';
            echo '<td>' . $item['SSL'] . '</td>';
            echo '<td>' . $item['DOCUMENT_ROOT'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
	
            if ($key['SSL'] == "no") {
                echo "[sitepoint_wpssl_form]";
        }
		 
}
function rf_domainlist_now() {
    ob_start();
    domainlist_now();
    return ob_get_clean();
}
add_shortcode('sitepoint_domainlist_now', 'rf_domainlist_now');
// enable ssl
//
function html_form_wpssl() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
	echo '<div class=wpinstall style=new-style >';
    echo '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
    echo '<h2><strong>ssl-enabler</strong></h2>';
    echo '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
    echo '<h5><strong>Type-in Domain name to enable SSL Secure connection</label></h6>';
    echo '<input type="text" name="cf-domainnnssl"  value="' . (isset($_POST["cf-domainnnssl"]) ? esc_attr($_POST["cf-domainnnssl"]) : '') . '" size="30" />';
    echo '<p><input type="submit" name="cf-submittewpssl" value=" enable ssl"></p>';
    do_action('anr_captcha_form_field');
    echo '</form>';
	echo '</div>';

}
function sslwp_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    if (isset($_POST['cf-submittewpssl'])) {
        echo "<meta http-equiv='refresh' content='0'>";
        // sanitize form values
        $hst_hostname = $server_ip_0;
        $hst_port = $port_1;
        $hst_hash = $api_hash_2;
        $hst_returncode = 'no';
        $hst_command = 'v-install-wp-ssl-enable';
        $adminmail = sanitize_text_field($_POST["cf-adminmail"]);
        $adminuser = sanitize_text_field($_POST["cf-adminuser"]);
        $adminpass = sanitize_text_field($_POST["cf-adminpass"]);
        $wptitle = sanitize_text_field($_POST["cf-wptitle"]);
        $wpname = sanitize_text_field($_POST["cf-wpname"]);
        $wplname = sanitize_text_field($_POST["cf-wplname"]);
        $domiann = sanitize_text_field($_POST["cf-domainnnssl"]);
        $username = $current_user->user_login;
        $email = $current_user->user_email;
        $first_name = 'WordPress';
        $last_name = 'user';
        $path = '/';
        $https = 'no';
        $postvars = array('hash' => $hst_hash, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $domiann,);
        // Send POST query via cURL
        $postdata = http_build_query($postvars);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        // Check result
        echo "SSL Enabled Secessfuly successfully !'.$answer.'";
    }
}
function rf_shortcodssl() {
    ob_start();
    html_form_wpssl();
    sslwp_now();
    return ob_get_clean();
}
add_shortcode('sitepoint_wpssl_form', 'rf_shortcodssl');
// wordpress install
//
//depoly wp script
function html_form_wp() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    echo '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
    echo '<div class=wpinstall style=new-style >';
    echo '<h2><strong>Fast WordPress installer</strong></h2>';
    echo '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
    echo '<h5><strong>Confirm installation by entering wanted domain name</label></h5>';
    echo '<input type="text" name="cf-domainnn"  value="' . (isset($_POST["cf-domainnn"]) ? esc_attr($_POST["cf-domainnn"]) : '') . '" size="30" />';
    echo '<p><input type="submit" name="cf-submittewp" value="Deploy wordpress"></p>';
    do_action('anr_captcha_form_field');
    echo '</form>';
	    echo '</div>';

}
function deploywp_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    if (isset($_POST['cf-submittewp'])) {
        // sanitize form values
        $hst_hostname = $server_ip_0;
        $hst_port = $port_1;
        $hst_hash = $api_hash_2;
        $hst_returncode = 'no';
        $hst_command = 'v-install-wordpress';
        $adminmail = sanitize_text_field($_POST["cf-adminmail"]);
        $adminuser = sanitize_text_field($_POST["cf-adminuser"]);
        $adminpass = sanitize_text_field($_POST["cf-adminpass"]);
        $wptitle = sanitize_text_field($_POST["cf-wptitle"]);
        $wpname = sanitize_text_field($_POST["cf-wpname"]);
        $wplname = sanitize_text_field($_POST["cf-wplname"]);
        $domiann = sanitize_text_field($_POST["cf-domainnn"]);
        $username = $current_user->user_login;
        $email = $current_user->user_email;
        $first_name = 'WordPress';
        $last_name = 'user';
        $path = '/';
        $https = 'no';
        $postvars = array('hash' => $hst_hash, 'cmd' => $hst_command, 'arg1' => $username, 'arg2' => $domiann, 'arg3' => $path);
        // Send POST query via cURL
        $postdata = http_build_query($postvars);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        // Check result
        echo "registered successfully !'.$answer.'";
    }
}
function rf_shortcodee() {
    ob_start();
    html_form_wp();
    deploywp_now();
    return ob_get_clean();
}
add_shortcode('sitepoint_deploywp_form', 'rf_shortcodee');
//admin info
add_action('wp_dashboard_setup', 'server_dashboard_widgets');
function server_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('wp_dashboard_setup', 'Hestia Server Status', 'admininfo_now');
}
function admininfo_now() {
    $hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name');
    $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
    $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
    $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
    $current_user = wp_get_current_user();
    // if the submit button is clicked, send the email
    // if(!isset($_SESSION)) session_start();
    if (!isset($_SESSION)) session_start();
    // sanitize form values
    $hst_hostname = $server_ip_0;
    $hst_port = $port_1;
    $hst_hash = $api_hash_2;
    $hst_returncode = 'no';
    $hst_command = 'v-list-sys-info';
    $username = $current_user->user_login;
    $format = 'json';
    // Prepare POST query
    $postvars = array('hash' => $hst_hash, 'returncode' => $hst_returncode, 'cmd' => $hst_command, 'arg1' => $format);
    // Send POST query via cURL
    $postdata = http_build_query($postvars);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    $answer = curl_exec($curl);
    // Parse JSON output
    $data = json_decode($answer, true);
    //foreach($json_decoded as $data){
    //print_r($data);
    //}
    echo '<table>';
    foreach ($data as $result) {
        echo '<tr style="border:1px solid black;Font-size:18;Font-Weight:bold"><td>HOSTNAME</td><td>OS</td><td>HESTIA</td><td>UPTIME</td><td>AVERAGE LOAD</td></tr>';
        echo '<td>' . $result['HOSTNAME'] . '</td>';
        echo '<td>' . $result['OS'] . '</td>';
        echo '<td>' . $result['HESTIA'] . '</td>';
        echo '<td>' . $result['UPTIME'] . '</td>';
        echo '<td>' . $result['LOADAVERAGE'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
function rf_shortcodeadmininfo() {
    admininfo_now();
    return ob_get_clean();
}
add_shortcode('sitepoint_admininfo', 'rf_shortcodeadmininfo');

// Menu
//
class HestiaWordpressPlugin {
    private $hestia_wordpress_plugin_options;
    public function __construct() {
        add_action('admin_menu', array($this, 'hestia_wordpress_plugin_add_plugin_page'));
        add_action('admin_init', array($this, 'hestia_wordpress_plugin_page_init'));
    }
    public function hestia_wordpress_plugin_add_plugin_page() {
        add_menu_page('Hestia Wordpress Plugin', // page_title
        'Hestia Wordpress Plugin', // menu_title
        'manage_options', // capability
        'hestia-wordpress-plugin', // menu_slug
        array($this, 'hestia_wordpress_plugin_create_admin_page'), // function
        'dashicons-admin-generic', // icon_url
        2
        // position
        );
    }
    public function hestia_wordpress_plugin_create_admin_page() {
        $this->hestia_wordpress_plugin_options = get_option('hestia_wordpress_plugin_option_name'); ?>

		<div class="wrap">
				
			<h2>Hestia Wordpress Plugin</h2>
			<p>Please input server info</p>
			<h2>will show server info</h2>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
        settings_fields('hestia_wordpress_plugin_option_group');
        do_settings_sections('hestia-wordpress-plugin-admin');
        submit_button();
?>
			</form>
		</div>
	<?php
    }
    public function hestia_wordpress_plugin_page_init() {
        register_setting('hestia_wordpress_plugin_option_group', // option_group
        'hestia_wordpress_plugin_option_name', // option_name
        array($this, 'hestia_wordpress_plugin_sanitize') // sanitize_callback
        );
        add_settings_section('hestia_wordpress_plugin_setting_section', // id
        'Settings', // title
        array($this, 'hestia_wordpress_plugin_section_info'), // callback
        'hestia-wordpress-plugin-admin'
        // page
        );
        add_settings_field('server_ip_0', // id
        'Server IP', // title
        array($this, 'server_ip_0_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        add_settings_field('server_domain_5', // id
        'Domain', // title
        array($this, 'server_domain_5_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        add_settings_field('port_1', // id
        'port', // title
        array($this, 'port_1_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        add_settings_field('api_hash_2', // id
        'API Hash', // title
        array($this, 'api_hash_2_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        add_settings_field('default_hosting_package_3', // id
        'default Hosting Package', // title
        array($this, 'default_hosting_package_3_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        add_settings_field('default_welcome_msg_4', // id
        'default welcome msg', // title
        array($this, 'default_welcome_msg_4_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_admin_login_1', // id
        'Admin panel login', // title
        array($this, 'default_admin_login_1_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_menu_button_1', // id
        'Custom Button Link 1', // title
        array($this, 'default_menu_button_1_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_menu_button_name_1', // id
        'Custom Button Name 1', // title
        array($this, 'default_menu_button_name_1_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_menu_button_2', // id
        'Custom Button Link 2', // title
        array($this, 'default_menu_button_2_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_menu_button_name_2', // id
        'Custom Button Name 2', // title
        array($this, 'default_menu_button_name_2_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_menu_button_3', // id
        'Custom Button Link 3', // title
        array($this, 'default_menu_button_3_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		
		add_settings_field('default_menu_button_name_3', // id
        'Custom Button Name 3', // title
        array($this, 'default_menu_button_name_3_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_menu_button_4', // id
        'Custom Button Link 4', // title
        array($this, 'default_menu_button_4_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		
		add_settings_field('default_menu_button_name_4', // id
        'Custom Button Name 4', // title
        array($this, 'default_menu_button_name_4_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        add_settings_field('default_paidsub_5', // id
        '1st Paid Subscription Product ID', // title
        array($this, 'default_paidsub_5_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_paidsubname_5', // name
        '1st Paid Subscription Product name in server', // title
        array($this, 'default_paidsubname_5_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        add_settings_field('default_paidsub2_5', // id
        '2nd Paid Subscription Product ID', // title
        array($this, 'default_paidsub2_5_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_paidsubname2_5', // name
        '2nd Paid Subscription Product name in server', // title
        array($this, 'default_paidsubname2_5_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        add_settings_field('default_paidsub3_5', // id
        '3rd Paid Subscription Product ID', // title
        array($this, 'default_paidsub3_5_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
        
        add_settings_field('default_paidsubname3_5', // name
        '3rd Paid Subscription Product name in server', // title
        array($this, 'default_paidsubname3_5_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_sharedomian_1', // name
        '1st Shared Domain name', // title
        array($this, 'default_shared_1_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
		add_settings_field('default_sharedomian_2', // name
        '2st Shared Domain name', // title
        array($this, 'default_shared_2_callback'), // callback
        'hestia-wordpress-plugin-admin', // page
        'hestia_wordpress_plugin_setting_section'
        // section
        );
    }
    public function hestia_wordpress_plugin_sanitize($input) {
        $sanitary_values = array();
        if (isset($input['server_ip_0'])) {
            $sanitary_values['server_ip_0'] = sanitize_text_field($input['server_ip_0']);
        }
        if (isset($input['port_1'])) {
            $sanitary_values['port_1'] = sanitize_text_field($input['port_1']);
        }
        if (isset($input['api_hash_2'])) {
            $sanitary_values['api_hash_2'] = sanitize_text_field($input['api_hash_2']);
        }
        if (isset($input['default_hosting_package_3'])) {
            $sanitary_values['default_hosting_package_3'] = sanitize_text_field($input['default_hosting_package_3']);
        }
        if (isset($input['default_welcome_msg_4'])) {
            $sanitary_values['default_welcome_msg_4'] = esc_textarea($input['default_welcome_msg_4']);
        }
		if (isset($input['default_admin_login_1'])) {
            $sanitary_values['default_admin_login_1'] = esc_textarea($input['default_admin_login_1']);
        }
		if (isset($input['default_menu_button_1'])) {
            $sanitary_values['default_menu_button_1'] = esc_textarea($input['default_menu_button_1']);
        }
		if (isset($input['default_menu_button_2'])) {
            $sanitary_values['default_menu_button_2'] = esc_textarea($input['default_menu_button_2']);
        }
		if (isset($input['default_menu_button_3'])) {
            $sanitary_values['default_menu_button_3'] = esc_textarea($input['default_menu_button_3']);
        }
		if (isset($input['default_menu_button_4'])) {
            $sanitary_values['default_menu_button_4'] = esc_textarea($input['default_menu_button_4']);
        }
		if (isset($input['default_menu_button_name_1'])) {
            $sanitary_values['default_menu_button_name_1'] = esc_textarea($input['default_menu_button_name_1']);
        }
		if (isset($input['default_menu_button_name_2'])) {
            $sanitary_values['default_menu_button_name_2'] = esc_textarea($input['default_menu_button_name_2']);
        }
		if (isset($input['default_menu_button_name_3'])) {
            $sanitary_values['default_menu_button_name_3'] = esc_textarea($input['default_menu_button_name_3']);
        }
		if (isset($input['default_menu_button_name_4'])) {
            $sanitary_values['default_menu_button_name_4'] = esc_textarea($input['default_menu_button_name_4']);
        }
        if (isset($input['server_domain_5'])) {
            $sanitary_values['server_domain_5'] = sanitize_text_field($input['server_domain_5']);
        }
        if (isset($input['default_paidsub_5'])) {
            $sanitary_values['default_paidsub_5'] = sanitize_text_field($input['default_paidsub_5']);
        }
        if (isset($input['default_paidsubname_5'])) {
            $sanitary_values['default_paidsubname_5'] = sanitize_text_field($input['default_paidsubname_5']);
        }
        if (isset($input['default_paidsub2_5'])) {
            $sanitary_values['default_paidsub2_5'] = sanitize_text_field($input['default_paidsub2_5']);
        }
        if (isset($input['default_paidsubname2_5'])) {
            $sanitary_values['default_paidsubname2_5'] = sanitize_text_field($input['default_paidsubname2_5']);
        }
        if (isset($input['default_paidsub3_5'])) {
            $sanitary_values['default_paidsub3_5'] = sanitize_text_field($input['default_paidsub3_5']);
        }
        if (isset($input['default_paidsubname3_5'])) {
            $sanitary_values['default_paidsubname3_5'] = sanitize_text_field($input['default_paidsubname3_5']);
        }
		if (isset($input['default_shared_1'])) {
            $sanitary_values['default_shared_1'] = sanitize_text_field($input['default_shared_1']);
        }
		if (isset($input['default_shared_2'])) {
            $sanitary_values['default_shared_2'] = sanitize_text_field($input['default_shared_2']);
        }
        return $sanitary_values;
    }
    public function hestia_wordpress_plugin_section_info() {
    }
    public function server_ip_0_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[server_ip_0]" id="server_ip_0" value="%s">', isset($this->hestia_wordpress_plugin_options['server_ip_0']) ? esc_attr($this->hestia_wordpress_plugin_options['server_ip_0']) : '');
    }
    public function port_1_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[port_1]" id="port_1" value="%s">', isset($this->hestia_wordpress_plugin_options['port_1']) ? esc_attr($this->hestia_wordpress_plugin_options['port_1']) : '');
    }
    public function api_hash_2_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[api_hash_2]" id="api_hash_2" value="%s">', isset($this->hestia_wordpress_plugin_options['api_hash_2']) ? esc_attr($this->hestia_wordpress_plugin_options['api_hash_2']) : '');
    }
    public function default_hosting_package_3_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_hosting_package_3]" id="default_hosting_package_3" value="%s">', isset($this->hestia_wordpress_plugin_options['default_hosting_package_3']) ? esc_attr($this->hestia_wordpress_plugin_options['default_hosting_package_3']) : '');
    }
    public function default_welcome_msg_4_callback() {
        printf('<textarea class="large-text" rows="5" name="hestia_wordpress_plugin_option_name[default_welcome_msg_4]" id="default_welcome_msg_4">%s</textarea>', isset($this->hestia_wordpress_plugin_options['default_welcome_msg_4']) ? esc_attr($this->hestia_wordpress_plugin_options['default_welcome_msg_4']) : '');
    }
    public function server_domain_5_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[server_domain_5]" id="server_domain_5" value="%s">', isset($this->hestia_wordpress_plugin_options['server_domain_5']) ? esc_attr($this->hestia_wordpress_plugin_options['server_domain_5']) : '');
    }
	public function default_admin_login_1_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_admin_login_1]" id="default_admin_login_1" value="%s">', isset($this->hestia_wordpress_plugin_options['default_admin_login_1']) ? esc_attr($this->hestia_wordpress_plugin_options['default_admin_login_1']) : '');
    }
	public function default_menu_button_1_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_menu_button_1]" id="default_menu_button_1" value="%s">', isset($this->hestia_wordpress_plugin_options['default_menu_button_1']) ? esc_attr($this->hestia_wordpress_plugin_options['default_menu_button_1']) : '');
    }
	public function default_menu_button_2_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_menu_button_2]" id="default_menu_button_2" value="%s">', isset($this->hestia_wordpress_plugin_options['default_menu_button_2']) ? esc_attr($this->hestia_wordpress_plugin_options['default_menu_button_2']) : '');
    }
	public function default_menu_button_3_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_menu_button_3]" id="default_menu_button_3" value="%s">', isset($this->hestia_wordpress_plugin_options['default_menu_button_3']) ? esc_attr($this->hestia_wordpress_plugin_options['default_menu_button_3']) : '');
    }
	public function default_menu_button_4_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_menu_button_4]" id="default_menu_button_3" value="%s">', isset($this->hestia_wordpress_plugin_options['default_menu_button_4']) ? esc_attr($this->hestia_wordpress_plugin_options['default_menu_button_4']) : '');
    }
	public function default_menu_button_name_1_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_menu_button_name_1]" id="default_menu_button_name_1" value="%s">', isset($this->hestia_wordpress_plugin_options['default_menu_button_name_1']) ? esc_attr($this->hestia_wordpress_plugin_options['default_menu_button_name_1']) : '');
    }
	public function default_menu_button_name_2_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_menu_button_name_2]" id="default_menu_button_name_2" value="%s">', isset($this->hestia_wordpress_plugin_options['default_menu_button_name_2']) ? esc_attr($this->hestia_wordpress_plugin_options['default_menu_button_name_2']) : '');
    }
	public function default_menu_button_name_3_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_menu_button_name_3]" id="default_menu_button_name_3" value="%s">', isset($this->hestia_wordpress_plugin_options['default_menu_button_name_3']) ? esc_attr($this->hestia_wordpress_plugin_options['default_menu_button_name_3']) : '');
    }
	public function default_menu_button_name_4_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_menu_button_name_4]" id="default_menu_button_name_4" value="%s">', isset($this->hestia_wordpress_plugin_options['default_menu_button_name_4']) ? esc_attr($this->hestia_wordpress_plugin_options['default_menu_button_name_4']) : '');
    }
	public function default_paidsub_5_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_paidsub_5]" id="default_paidsub_5" value="%s">', isset($this->hestia_wordpress_plugin_options['default_paidsub_5']) ? esc_attr($this->hestia_wordpress_plugin_options['default_paidsub_5']) : '');
    }
    public function default_paidsubname_5_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_paidsubname_5]" id="default_paidsubname_5" value="%s">', isset($this->hestia_wordpress_plugin_options['default_paidsubname_5']) ? esc_attr($this->hestia_wordpress_plugin_options['default_paidsubname_5']) : '');
    }
    public function default_paidsub2_5_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_paidsub2_5]" id="default_paidsub2_5" value="%s">', isset($this->hestia_wordpress_plugin_options['default_paidsub2_5']) ? esc_attr($this->hestia_wordpress_plugin_options['default_paidsub2_5']) : '');
    }
    public function default_paidsubname2_5_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_paidsubname2_5]" id="default_paidsubname2_5" value="%s">', isset($this->hestia_wordpress_plugin_options['default_paidsubname2_5']) ? esc_attr($this->hestia_wordpress_plugin_options['default_paidsubname2_5']) : '');
    }
    public function default_paidsub3_5_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_paidsub3_5]" id="default_paidsub3_5" value="%s">', isset($this->hestia_wordpress_plugin_options['default_paidsub3_5']) ? esc_attr($this->hestia_wordpress_plugin_options['default_paidsub3_5']) : '');
    }
    public function default_paidsubname3_5_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_paidsubname3_5]" id="default_paidsubname3_5" value="%s">', isset($this->hestia_wordpress_plugin_options['default_paidsubname3_5']) ? esc_attr($this->hestia_wordpress_plugin_options['default_paidsubname3_5']) : '');
    }
    public function default_shared_1_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_shared_1]" id="default_shared_1" value="%s">', isset($this->hestia_wordpress_plugin_options['default_shared_1']) ? esc_attr($this->hestia_wordpress_plugin_options['default_shared_1']) : '');
    }
    public function default_shared_2_callback() {
        printf('<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_shared_2]" id="default_shared_2" value="%s">', isset($this->hestia_wordpress_plugin_options['default_shared_2']) ? esc_attr($this->hestia_wordpress_plugin_options['default_shared_2']) : '');
    }
}
if (is_admin()) $hestia_wordpress_plugin = new HestiaWordpressPlugin();
/*
 * Retrieve this value with:
 * $hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' ); // Array of All Options
 * $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
 * $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
 * $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
 * $default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3']; // default  Hosting Package
 * $default_paidsub_5 1st paid id
*/
?>
