
<?php

/**
 * Register the Theme Settings menu page in the WordPress dashboard.
 */
function register_theme_settings_menu_page() {
    add_menu_page(
        'Apollo Blind Theme Settings',          // Page title
        'Apollo Blind Theme',                   // Menu title
        'manage_options',                   // Capability required
        'theme-settings',                   // Menu slug
        'apolloblind_render_settings_page',   // Callback function to display the settings page
        'dashicons-store',
        2                              // Menu position (set to 3 to appear in the top three)
    );
}
add_action('admin_menu', 'register_theme_settings_menu_page');


// Add a custom menu item under Appearance menu for theme settings
// function apolloblind_add_menu_item() {
//     add_theme_page('Theme Settings', 'Theme Settings', 'manage_options', 'theme-settings', 'apolloblind_render_settings_page');
// }
// add_action('admin_menu', 'apolloblind_add_menu_item');

// Render the theme settings page
function apolloblind_render_settings_page() {
    ?>
    <div class="wrap" style="padding: 60px 40px">
        <h1 style="font-size: 40px">Welcome To <span style="color :#87c7c8">Apollo Blind Theme</span> Settings Page</h1>
        <h3 style="line-height: 1.5rem; margin-bottom: 5rem"> Unleash your website's potential with Apollo Blind Theme! 
            Customize your site to match your branding style and <br />
            embark on a journey to World Web Domination 😃. 
            Easily manage all settings in the WordPress Customizer - <br />
            <a href="<?php echo esc_url(admin_url('customize.php')); ?>">
            click here
            </a> 
            to begin customizing your theme.
        </h3>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
            settings_fields('apolloblind_settings');
            do_settings_sections('theme-settings');
            ?>
        </form>
    </div>
    <?php
}

// Register and define the settings fields
function apolloblind_register_settings() {
    // Logo Image Upload
    add_settings_section('apolloblind_logo_section', 'Company Logo', 'apolloblind_logo_section_callback', 'theme-settings');
    add_settings_field('apolloblind_logo', '', 'apolloblind_logo_callback', 'theme-settings', 'apolloblind_logo_section');

    // Phone Number
    add_settings_section('apolloblind_contact_section', 'Contact Information', 'apolloblind_contact_section_callback', 'theme-settings');
    add_settings_field('apolloblind_phone', 'Phone Number', 'apolloblind_phone_callback', 'theme-settings', 'apolloblind_contact_section');
    register_setting('apolloblind_settings', 'apolloblind_phone');

    // Email Addr
    add_settings_field('apolloblind_email', 'Email Address', 'apolloblind_email_callback', 'theme-settings', 'apolloblind_contact_section');
    register_setting('apolloblind_settings', 'apolloblind_email');
    
    // Fax Number
    add_settings_field('apolloblind_fax', 'Fax Number', 'apolloblind_fax_callback', 'theme-settings', 'apolloblind_contact_section');
    register_setting('apolloblind_settings', 'apolloblind_fax');

    // Address Information
    add_settings_field('apolloblind_address', 'Address', 'apolloblind_address_callback', 'theme-settings', 'apolloblind_contact_section');
    register_setting('apolloblind_settings', 'apolloblind_address');

    // Social Media Links
    add_settings_section('apolloblind_social_section', 'Social Media Links', 'apolloblind_social_section_callback', 'theme-settings');
    add_settings_field('apolloblind_facebook', 'Facebook', 'apolloblind_facebook_callback', 'theme-settings', 'apolloblind_social_section');
    register_setting('apolloblind_settings', 'apolloblind_facebook');
    add_settings_field('apolloblind_twitter', 'Twitter', 'apolloblind_twitter_callback', 'theme-settings', 'apolloblind_social_section');
    register_setting('apolloblind_settings', 'apolloblind_twitter');
	add_settings_field('apolloblind_linkedin', 'Linkedin', 'apolloblind_linkedin_callback', 'theme-settings', 'apolloblind_social_section');
    register_setting('apolloblind_settings', 'apolloblind_linkedin');
	add_settings_field('apolloblind_pinterest', 'Pinterest', 'apolloblind_pinterest_callback', 'theme-settings', 'apolloblind_social_section');
    register_setting('apolloblind_settings', 'apolloblind_pinterest');
}
add_action('admin_init', 'apolloblind_register_settings');


// Callback function to render logo 
function apolloblind_logo_section_callback() {
    if(has_custom_logo()) {
        echo '<p>Current Logo</p>';
    }else {
        echo '<p>Upload your logo image.</p>';
    }
    
}

// Callback function to render and modify logo 
function apolloblind_logo_callback() {
    $logo = esc_attr(get_option('apolloblind_logo'));
    $site_logo = the_custom_logo();
    $query['autofocus[control]'] = 'custom_logo';
    $section_link = add_query_arg($query, admin_url('customize.php'));
    $button_text = has_custom_logo() ? 'Edit logo' : 'Add A Logo';
    echo '<div>
            <button style="margin-top: 10px; padding: 10px 12px; border-radius: 2p">
                <a href="' .$section_link .'" target="blank"> ' . $button_text . ' 
                </a>
            </button>
        </div>';
}


// Callback function to render contact info 
function apolloblind_contact_section_callback() {
    echo '<p>Enter your contact information.</p>';
}

// Callback function to render phone 
function apolloblind_phone_callback() {
    $phone = esc_attr(get_theme_mod( 'setting_contact_phone'));
    echo '<input type="text" name="apolloblind_phone" disabled value="' . $phone . '">';
}

// Callback function to render email 
function apolloblind_email_callback() {
    $email = esc_attr(get_theme_mod( 'setting_contact_email'));
    echo '<input type="email" disabled name="apolloblind_email" value="' . $email . '">';
}

// Callback function to render Fax 
function apolloblind_fax_callback() {
    $fax = esc_attr(get_theme_mod( 'setting_contact_fax'));
    echo '<input type="text" name="apolloblind_fax" disabled value="' . $fax . '">';
}

// Callback to render Contact Address 
function apolloblind_address_callback() {
    $address = esc_attr(get_theme_mod( 'setting_contact_address'));
    echo '<textarea name="apolloblind_address" disabled>' . $address . '</textarea>';
    $query['autofocus[control]'] = 'control_address';
    $section_link = add_query_arg($query, admin_url('customize.php'));
    echo '<div>
            <button style="margin-top: 10px; padding: 10px 12px; border-radius: 2px">
                <a href="' .$section_link .'" target="blank"> Edit Company Address Info 
                </a>
            </button>
        </div>';
}

// Callback function to render Social Media Channel Heading 
function apolloblind_social_section_callback() {
    echo '<p>Usernames to your social media channels.</p>';
}

// Callback function to render facebook 
function apolloblind_facebook_callback() {
    $facebook = esc_attr(get_theme_mod('setting_social_facebook'));
    echo '<input type="text" name="apolloblind_facebook" disabled value="' . $facebook . '">';
}


// Callback function to render twitter 
function apolloblind_twitter_callback() {
    $twitter = esc_attr(get_theme_mod('setting_social_twitter'));
    echo '<input type="text" name="apolloblind_twitter" disabled value="' . $twitter . '">';
}

// Callback function to render Linkedin 
function apolloblind_linkedin_callback() {
    $linkedin = esc_attr(get_theme_mod('setting_social_linkedin'));
    echo '<input type="text" name="apolloblind_linkedin" disabled value="' . $linkedin . '">';
}

// Callback function to render Pinterest 
function apolloblind_pinterest_callback() {
    $pinterest = esc_attr(get_theme_mod('setting_social_pinterest'));
    echo '<input type="text" name="apolloblind_pinterest" disabled value="' . $pinterest . '">';
    $query['autofocus[section]'] = 'section_social_links';
    $section_link = add_query_arg($query, admin_url('customize.php'));
    echo '<div>
            <button style="margin-top: 10px; padding: 10px 12px; border-radius: 2p">
                <a href="' .$section_link .'" target="blank"> Manage Social Medial Links 
                </a>
            </button>
        </div>';

}
