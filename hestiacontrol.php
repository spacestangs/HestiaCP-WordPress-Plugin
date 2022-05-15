<?php
/*
Plugin Name: Hestiacp Wordpress control plugin
was board with some time made this
Description: Hestiacp Wordpress DOMIAN info 
Version: 1.0001
Author: Alex reznik
Author URI: http://palm-tree.finance
*/
// Menu
// 
 
function html_form_code() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();
	$default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3'];
	$default_welcome_msg_4 = $hestia_wordpress_plugin_options['default_welcome_msg_4'];

	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	
	echo '<h2><strong>Wellcome to Your Panel</strong></h2>';
	print "<strong>".$default_welcome_msg_4."</strong><br>";
	echo '<p> </p>';	
	print "<strong>please choose a strong password.</strong>";
	print " Password will be sent to your email.";
	echo '<h5><strong>Your Username Will stay the same</strong></strong></h5>';
	echo '<h5><br/><strong>Input a password for hosting</strong><br/></h5>';
	echo 'password<br/>';
	echo '<input type="password" name="cf-password" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-password"] ) ? esc_attr( $_POST["cf-password"] ) : '' ) . '" size="40" />';
	echo '</p>';
	
	echo '<p>';
	echo 'Confirm password<br/>';
	echo '<input type="password" name="cf-password" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-password"] ) ? esc_attr( $_POST["cf-password"] ) : '' ) . '" size="40" />';
	echo '</p>';
	

	echo '<p><input type="submit" name="cf-submitted" value="Register"></p>';
	do_action( 'anr_captcha_form_field' );
	
	echo '</form>';
}

function register_now() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();
	$default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3'];


	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted'] ) ) {
		echo "<meta http-equiv='refresh' content='0'>";

		// sanitize form values
		$hst_hostname = $server_ip_0;
		$hst_port = $port_1;
		$hst_hash= $api_hash_2;
		$hst_returncode = 'yes';
		$hst_command = 'v-add-user';
		
		$username = $current_user->user_login;
		$password = sanitize_text_field( $_POST["cf-password"] );
		$email = $current_user->user_email;
		$package = $default_hosting_package_3;
		$first_name = 'WordPress';
		$last_name = 'user';
		

		$postvars = array(
    		'hash' => $hst_hash,
    		'returncode' => $hst_returncode,
    		'cmd' => $hst_command,
    		'arg1' => $username,
    		'arg2' => $password,
    		'arg3' => $email,
    		'arg4' => $package,
    		'arg5' => $first_name,
    		'arg6' => $last_name
    		);

		$postdata = http_build_query($postvars);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
		$answer = curl_exec($curl);

    	// Check result
		if($answer == 0) {
    echo "registered successfully\n";
			$to = $email; //sendto@example.com
			$subject = 'Welcome to HestiaCP Your password is inside';
			$body = 'HI!, '.$username.' Your Password is: '.$password;
			$headers = array('Content-Type: text/html; charset=UTF-8');
			wp_mail( $to, $subject, $body, $headers );
		
} elseif($answer == 4)  {
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
add_shortcode( 'sitepoint_register_form', 'rf_shortcode' );


function html_form_coded() {
	
	
	
	$current_user = wp_get_current_user();
	
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	
	echo '<p>';
	echo '<input type="text" name="cf-subdomian" pattern="[a-zA-Z][a-zA-Z0-9-_.]+" value="' . ( isset( $_POST["cf-subdomian"] ) ? esc_attr( $_POST["cf-subdomian"] ) : '' ) . '" size="35" /> .palm-tree.finance' ;
	echo '</p>';
	

	echo '<p><input type="submit" name="cf-submittedd" value="Register"></p>';
	do_action( 'anr_captcha_form_field' );
	echo '</form>';
}

function registerdomian_now() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();


	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submittedd'] ) ) {

		// sanitize form values
		$hst_hostname = $server_ip_0;
		$hst_port = $port_1;
		$hst_hash= $api_hash_2;
		$hst_returncode = 'yes';
		$hst_command = 'v-add-domain';
		
		$first_name = 'WordPress';
		$last_name = 'user';
		
		$username = $current_user->user_login;
		$domain = sanitize_text_field( $_POST["cf-subdomian"] ) . '.palm-tree.finance';
		$ip = $server_ip_0;
		// Prepare POST query
	$postvars = array(
		'hash' => $hst_hash,
    	'returncode' => $hst_returncode,
    	'cmd' => $hst_command,
    	'arg1' => $username,
    	'arg2' => $domain,
		'arg3' => $ip
	);

	// Send POST query via cURL
	$postdata = http_build_query($postvars);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	$answer = curl_exec($curl);

	// Check result
	if($answer == 0) {
		echo "<script>alert('registered successfully !');</script>";
	} else {
		echo "Query returned error code: " .$answer. "\n";
	}
	}
}
function rf_shortcoded() {
	ob_start();
	registerdomian_now();
	html_form_coded();

	return ob_get_clean();
}
add_shortcode( 'sitepoint_registerd_form', 'rf_shortcoded' );

class HestiaWordpressPlugin {
	private $hestia_wordpress_plugin_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'hestia_wordpress_plugin_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'hestia_wordpress_plugin_page_init' ) );
	}

	public function hestia_wordpress_plugin_add_plugin_page() {
		add_menu_page(
			'Hestia Wordpress Plugin', // page_title
			'Hestia Wordpress Plugin', // menu_title
			'manage_options', // capability
			'hestia-wordpress-plugin', // menu_slug
			array( $this, 'hestia_wordpress_plugin_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			2 // position
		);
	}

	public function hestia_wordpress_plugin_create_admin_page() {
		$this->hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' ); ?>

		<div class="wrap">
				
			<h2>Hestia Wordpress Plugin</h2>
			<p>Please input server info</p>
			<h2>will show server info</h2>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'hestia_wordpress_plugin_option_group' );
					do_settings_sections( 'hestia-wordpress-plugin-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function hestia_wordpress_plugin_page_init() {
		register_setting(
			'hestia_wordpress_plugin_option_group', // option_group
			'hestia_wordpress_plugin_option_name', // option_name
			array( $this, 'hestia_wordpress_plugin_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'hestia_wordpress_plugin_setting_section', // id
			'Settings', // title
			array( $this, 'hestia_wordpress_plugin_section_info' ), // callback
			'hestia-wordpress-plugin-admin' // page
		);

		add_settings_field(
			'server_ip_0', // id
			'Server IP', // title
			array( $this, 'server_ip_0_callback' ), // callback
			'hestia-wordpress-plugin-admin', // page
			'hestia_wordpress_plugin_setting_section' // section
		);

		add_settings_field(
			'port_1', // id
			'port', // title
			array( $this, 'port_1_callback' ), // callback
			'hestia-wordpress-plugin-admin', // page
			'hestia_wordpress_plugin_setting_section' // section
		);

		add_settings_field(
			'api_hash_2', // id
			'API Hash', // title
			array( $this, 'api_hash_2_callback' ), // callback
			'hestia-wordpress-plugin-admin', // page
			'hestia_wordpress_plugin_setting_section' // section
		);

		add_settings_field(
			'default_hosting_package_3', // id
			'default Hosting Package', // title
			array( $this, 'default_hosting_package_3_callback' ), // callback
			'hestia-wordpress-plugin-admin', // page
			'hestia_wordpress_plugin_setting_section' // section
		);

		add_settings_field(
			'default_welcome_msg_4', // id
			'default welcome msg', // title
			array( $this, 'default_welcome_msg_4_callback' ), // callback
			'hestia-wordpress-plugin-admin', // page
			'hestia_wordpress_plugin_setting_section' // section
		);
	}

	public function hestia_wordpress_plugin_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['server_ip_0'] ) ) {
			$sanitary_values['server_ip_0'] = sanitize_text_field( $input['server_ip_0'] );
		}

		if ( isset( $input['port_1'] ) ) {
			$sanitary_values['port_1'] = sanitize_text_field( $input['port_1'] );
		}

		if ( isset( $input['api_hash_2'] ) ) {
			$sanitary_values['api_hash_2'] = sanitize_text_field( $input['api_hash_2'] );
		}

		if ( isset( $input['default_hosting_package_3'] ) ) {
			$sanitary_values['default_hosting_package_3'] = sanitize_text_field( $input['default_hosting_package_3'] );
		}

		if ( isset( $input['default_welcome_msg_4'] ) ) {
			$sanitary_values['default_welcome_msg_4'] = esc_textarea( $input['default_welcome_msg_4'] );
		}

		return $sanitary_values;
	}

	public function hestia_wordpress_plugin_section_info() {
		
	}

	public function server_ip_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[server_ip_0]" id="server_ip_0" value="%s">',
			isset( $this->hestia_wordpress_plugin_options['server_ip_0'] ) ? esc_attr( $this->hestia_wordpress_plugin_options['server_ip_0']) : ''
		);
	}

	public function port_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[port_1]" id="port_1" value="%s">',
			isset( $this->hestia_wordpress_plugin_options['port_1'] ) ? esc_attr( $this->hestia_wordpress_plugin_options['port_1']) : ''
		);
	}

	public function api_hash_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[api_hash_2]" id="api_hash_2" value="%s">',
			isset( $this->hestia_wordpress_plugin_options['api_hash_2'] ) ? esc_attr( $this->hestia_wordpress_plugin_options['api_hash_2']) : ''
		);
	}

	public function default_hosting_package_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="hestia_wordpress_plugin_option_name[default_hosting_package_3]" id="default_hosting_package_3" value="%s">',
			isset( $this->hestia_wordpress_plugin_options['default_hosting_package_3'] ) ? esc_attr( $this->hestia_wordpress_plugin_options['default_hosting_package_3']) : ''
		);
	}

	public function default_welcome_msg_4_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="hestia_wordpress_plugin_option_name[default_welcome_msg_4]" id="default_welcome_msg_4">%s</textarea>',
			isset( $this->hestia_wordpress_plugin_options['default_welcome_msg_4'] ) ? esc_attr( $this->hestia_wordpress_plugin_options['default_welcome_msg_4']) : ''
		);
	}

}
if ( is_admin() )
	$hestia_wordpress_plugin = new HestiaWordpressPlugin();

/* 
 * Retrieve this value with:
 * $hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' ); // Array of All Options
 * $server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
 * $port_1 = $hestia_wordpress_plugin_options['port_1']; // port
 * $api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
 * $default_hosting_package_3 = $hestia_wordpress_plugin_options['default_hosting_package_3']; // default  Hosting Package 
 */



function html_form_code_info() {
	
	$current_user = wp_get_current_user();
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo '<h2 style="text-align: center;"><span style="text-decoration: underline;"><strong>DOMAINS YOU OWN</strong></span></h2>';
	echo '</p>';
	echo '</form>';
}
function get_settings_now() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();
}

function domaininfo_now() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();

	if(!isset($_SESSION)) session_start();


		$hst_hostname = $server_ip_0;
		$hst_port = $port_1;
		$hst_hash= $api_hash_2;
		$hst_returncode = 'no';
		$hst_command = 'v-list-user';
		$username = $current_user->user_login;
		$format = 'json';


$postvars = array(
	'hash' => $hst_hash,
    'returncode' => $hst_returncode,
    'cmd' => $hst_command,
	'arg1' => $username,
    'arg2' => $format
);

$postdata = http_build_query($postvars);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
$answer = curl_exec($curl);


// Parse JSON output

$data = json_decode($answer, true);
	echo '<table>';
        foreach($data as $result){
          echo '<tr><td>NAME</td><td>EMAIL</td><td>PACKAGE</td><td>Root Folder</td><td>HDD SPACE</td><td>TRAFFIC</td><td>SUSPENDED STATUS</td></tr>';
            echo '<td>'. $result['NAME'] .'</td>';
			echo '<td>'. $result['CONTACT'] .'</td>';
			echo '<td>'. $result['PACKAGE'] .'</td>';
			echo '<td>'. $result['HOME'] .'</td>';
			echo '<td>'. $result['DISK_QUOTA'] .'</td>';
			echo '<td>'. $result['BANDWIDTH'] .'</td>';
			echo '<td>'. $result['SUSPENDED'] .'</td>';


          echo '</tr>';
        }
        echo '</table>';
}


function rf_shortcodeinfo() {
	ob_start();
	domaininfo_now();
	domaininfomore_now();
	domainlist_now();


	return ob_get_clean();
}
add_shortcode( 'sitepoint_info_form', 'rf_shortcodeinfo' );

function rf_shortcodepass() {
	ob_start();
	echo '<a href="https://"'.$server_ip_0.':8083/reset/" target="_blank">Reset Your Password</a>';

	return ob_get_clean();
}
add_shortcode( 'sitepoint_pass_form', 'rf_shortcodepass' );
/////////more
//
function domaininfomore_now() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();


	// if the submit button is clicked, send the email
	// if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION)) session_start();

		// sanitize form values
		$hst_hostname = $server_ip_0;
		$hst_port = $port_1;
		$hst_hash= $api_hash_2;
		$hst_returncode = 'no';
		$hst_command = 'v-list-user-stats';
		$username = $current_user->user_login;
		$format = 'json';

// Prepare POST query
$postvars = array(
	'hash' => $hst_hash,
    'returncode' => $hst_returncode,
    'cmd' => $hst_command,
	'arg1' => $username,
    'arg2' => $format
);

// Send POST query via cURL
$postdata = http_build_query($postvars);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
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
        foreach($data as $result){
          echo '<tr><td>Your WebSites</td><td>DNS RECORDS</td><td>MAIL BOXS</td><td>DATABASES</td></tr>';
            echo '<td>'. $result['U_WEB_DOMAINS'] .'</td>';
			echo '<td>'. $result['U_DNS_RECORDS'] .'</td>';
			echo '<td>'. $result['U_DISK_MAIL'] .'</td>';
			echo '<td>'. $result['U_DISK_DB'] .'</td>';


          echo '</tr>';
        }
        echo '</table>';
		foreach($data as $result){
	if($result['U_WEB_DOMAINS'] == "0") {
		echo '<h2"><strong>Create Your First WebSite On PalmTree Choose Your FREE DOMAIN NAME</strong></h2>';
		echo "[sitepoint_registerd_form]";
	} 

	}
	
	//print_r($data);
	if(json_decode($answer, true) == FALSE)  {
		echo "[sitepoint_register_form]";
	}



function domainlist_now() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();

	// if the submit button is clicked, send the email
	// if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION)) session_start();

		// sanitize form values
		$hst_hostname = $server_ip_0;
		$hst_port = $port_1;
		$hst_hash= $api_hash_2;
		$hst_returncode = 'no';
		$hst_command = 'v-list-web-domains';
		$username = $current_user->user_login;
		$format = 'json';

// Prepare POST query
$postvars = array(
	'hash' => $hst_hash,
    'returncode' => $hst_returncode,
    'cmd' => $hst_command,
	'arg1' => $username,
    'arg2' => $format
);

// Send POST query via cURL
$postdata = http_build_query($postvars);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
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
foreach ($data as $key => $item) {
    $domain = $key; // echo the "unknown" field name
    $domain2 = $item['classid']; // echo any field value
}
        echo '<table>';
        foreach($data as $result){
          echo '<tr><td>DOMAINS</td><td>IP</td><td>SSL</td><td>DOCUMENT ROOT</td></tr>';
            echo '<td>'. '<a target="_blank" href="http://'.$domain.'">'.$domain.'</a>' .'</td>'; 
			echo '<td>'. $result['IP'] .'</td>';
			echo '<td>'. $result['SSL'] .'</td>';
			echo '<td>'. $result['DOCUMENT_ROOT'] .'</td>';


          echo '</tr>';
        }
        echo '</table>';
	}
	
	
	
	
	// wordpress install
	// 
function html_form_wp() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();

	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	
	echo '<h2><strong>Fast WordPress installer</strong></h2>';
	echo '<p> example : v-install-wordpress spacestangs anan.media spacestangs@gmail.com admin a963852711 / "My Title" Azad Shaikh no</p>';	
	
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	
	echo '<label><strong>domain</label></h6>';
	echo '<input type="text" name="cf-domainnn"  value="' . ( isset( $_POST["cf-domainnn"] ) ? esc_attr( $_POST["cf-domainnn"] ) : '' ) . '" size="30" />' ;

	echo '<h6><strong>admin mail</strong></h6>';
	echo '<input type="text" name="cf-adminmail" value="' . ( isset( $_POST["cf-adminmail"] ) ? esc_attr( $_POST["cf-adminmail"] ) : '' ) . '" size="30" />' ;

	echo '<h6><strong>admin user</strong></h6>';
	echo '<input type="text" name="cf-adminuser" value="' . ( isset( $_POST["cf-adminuser"] ) ? esc_attr( $_POST["cf-adminuser"] ) : '' ) . '" size="30" />' ;
	
	echo '<h6><strong>admin pass</strong></h6>';
	echo '<input type="text" name="cf-adminpass" value="' . ( isset( $_POST["cf-adminpass"] ) ? esc_attr( $_POST["cf-adminpass"] ) : '' ) . '" size="30" />' ;
	
	echo '<h6><strong>Wordpress Title</strong></h6>';
	echo '<input type="text" name="cf-wptitle"  value="' . ( isset( $_POST["cf-wptitle"] ) ? esc_attr( $_POST["cf-wptitle"] ) : '' ) . '" size="30" />' ;

	echo '<h6><strong>name</strong></h6>';
	echo '<input type="text" name="cf-wpname" pattern="[a-zA-Z][a-zA-Z0-9-_.]+" value="' . ( isset( $_POST["cf-wpname"] ) ? esc_attr( $_POST["cf-wpname"] ) : '' ) . '" size="30" />' ;

	
	echo '<h6><strong>last name</strong></h6>';
	echo '<input type="text" name="cf-wplname" pattern="[a-zA-Z][a-zA-Z0-9-_.]+" value="' . ( isset( $_POST["cf-wplname"] ) ? esc_attr( $_POST["cf-wplname"] ) : '' ) . '" size="30" height="10" />' ;


	echo '<p><input type="submit" name="cf-submittewp" value="Deploy wordpress"></p>';
	do_action( 'anr_captcha_form_field' );
	echo '</form>';
}

function deploywp_now() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();



	if ( isset( $_POST['cf-submittewp'] ) ) {
		echo "<meta http-equiv='refresh' content='0'>";

		// sanitize form values
		$hst_hostname = $server_ip_0;
		$hst_port = $port_1;
		$hst_hash= $api_hash_2;
		$hst_returncode = 'yes';
		$hst_command = 'v-install-wordpress';
		
		$adminmail = sanitize_text_field( $_POST["cf-adminmail"] );
		$adminuser = sanitize_text_field( $_POST["cf-adminuser"] );
		$adminpass = sanitize_text_field( $_POST["cf-adminpass"] );
		$wptitle = sanitize_text_field( $_POST["cf-wptitle"] );
		$wpname = sanitize_text_field( $_POST["cf-wpname"] );
		$wplname = sanitize_text_field( $_POST["cf-wplname"] );
		$domiann = sanitize_text_field( $_POST["cf-domainnn"] );
		$username = $current_user->user_login;
		$email = $current_user->user_email;
		$first_name = 'WordPress';
		$last_name = 'user';
		$path = '/';
		$https = 'no';

		
//	echo '<p> example : v-install-wordpress spacestangs anan.media spacestangs@gmail.com admin a963852711 / "My Title" Azad Shaikh no</p>';	

		$postvars = array(
    	'hash' => $hst_hash,
    	'cmd' => $hst_command,
    	'arg1' => $username,
    	'arg2' => $domiann,
		'arg3' => $adminmail,
		'arg4' => $adminuser,
		'arg5' => $adminpass,
		'arg6' => $path,
		'arg7' => $wptitle,
		'arg8' => $wpname,
		'arg9' => $wplname,
		'arg10' => $https
	);

	// Send POST query via cURL
	$postdata = http_build_query($postvars);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	$answer = curl_exec($curl);

	// Check result
	if($answer == 0) {
		echo "<script>alert('registered successfully !'.$answer.);</script>";
	} else {
		echo "<script>alert('error !'.$answer.);</script>";
	}
	}
}
	

function rf_shortcodee() {
	ob_start();
	html_form_wp();
	deploywp_now();


	return ob_get_clean();
}
add_shortcode( 'sitepoint_deploywp_form', 'rf_shortcodee' );
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//admin info
	
	function admininfo_now() {
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();

	// if the submit button is clicked, send the email
	// if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION)) session_start();

		// sanitize form values
		$hst_hostname = $server_ip_0;
		$hst_port = $port_1;
		$hst_hash= $api_hash_2;
		$hst_returncode = 'no';
		$hst_command = 'v-list-sys-info';
		$username = $current_user->user_login;
		$format = 'json';

// Prepare POST query
$postvars = array(
	'hash' => $hst_hash,
    'returncode' => $hst_returncode,
    'cmd' => $hst_command,
	'arg1' => $format
);

// Send POST query via cURL
$postdata = http_build_query($postvars);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
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
        foreach($data as $result){
          echo '<tr><td>HOSTNAME</td><td>OS</td><td>HESTIA</td><td>UPTIME</td><td>AVERAGE LOAD</td></tr>';
			echo '<td>'. $result['HOSTNAME'] .'</td>';
			echo '<td>'. $result['OS'] .'</td>';
			echo '<td>'. $result['HESTIA'] .'</td>';
			echo '<td>'. $result['UPTIME'] .'</td>';
			echo '<td>'. $result['LOADAVERAGE'] .'</td>';
          echo '</tr>';
        }
        echo '</table>';
	}
	function rf_shortcodeadmininfo() {
	admininfo_now();
	return ob_get_clean();
}
add_shortcode( 'sitepoint_admininfo', 'rf_shortcodeadmininfo' );
	//change pass
	//
	function changepass_now() {

	$current_user = wp_get_current_user();
	
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	
	echo '<p>';
	echo '<p>Choose a new password</p>';
	echo '<input type="text" name="cf-changepass" pattern="[a-zA-Z][a-zA-Z0-9-_.]+" value="' . ( isset( $_POST["cf-changepass"] ) ? esc_attr( $_POST["cf-changepass"] ) : '' ) . '" size="35" /> ' ;
	echo '</p>';
	

	echo '<p><input type="submit" name="cf-changepass" value="changepass"></p>';
	do_action( 'anr_captcha_form_field' );
	echo '</form>';

		
	$hestia_wordpress_plugin_options = get_option( 'hestia_wordpress_plugin_option_name' );
	$server_ip_0 = $hestia_wordpress_plugin_options['server_ip_0']; // Server IP
	$port_1 = $hestia_wordpress_plugin_options['port_1']; // port
	$api_hash_2 = $hestia_wordpress_plugin_options['api_hash_2']; // API Hash
	$current_user = wp_get_current_user();
	// if the submit button is clicked, send the email
	// if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION)) session_start();

		// sanitize form values
		$hst_hostname = $server_ip_0;
		$hst_port = $port_1;
		$hst_hash= $api_hash_2;
		$hst_returncode = 'no';
		$hst_command = 'v-change-user-password';
		$username = $current_user->user_login;
		$format = 'json';

// Prepare POST query
$postvars = array(
	'hash' => $hst_hash,
    'returncode' => $hst_returncode,
    'cmd' => $hst_command,
	'arg1' => $username,
    'arg2' => $changepass
);

// Send POST query via cURL
$postdata = http_build_query($postvars);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://' . $hst_hostname . ':' . $hst_port . '/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
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
	}
}








?>