<?php
/**
 * SafeNet Audit theme functions and definitions
 *
 * @package SafeNetAudit
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'safenetaudit_setup' ) ) {
/**
 * Sets up theme defaults and registers support for WordPress features.
 */
function safenetaudit_setup() {
// Make theme available for translation.
load_theme_textdomain( 'safenetaudit', get_template_directory() . '/languages' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

// Let WordPress manage the document title.
add_theme_support( 'title-tag' );

// Enable support for Post Thumbnails on posts and pages.
add_theme_support( 'post-thumbnails' );

// Register navigation menus.
register_nav_menus(
array(
'primary' => esc_html__( 'Primary Menu', 'safenetaudit' ),
)
);

// Switch default core markup for search form, comment form, and comments to output valid HTML5.
add_theme_support(
'html5',
array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
);

// Customize selective refresh widgets.
add_theme_support( 'customize-selective-refresh-widgets' );

// Custom logo support.
add_theme_support(
'custom-logo',
array(
'height'      => 120,
'width'       => 120,
'flex-height' => true,
'flex-width'  => true,
)
);
}
}
add_action( 'after_setup_theme', 'safenetaudit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function safenetaudit_content_width() {
$GLOBALS['content_width'] = 860;
}
add_action( 'after_setup_theme', 'safenetaudit_content_width', 0 );

/**
 * Register widget area.
 */
function safenetaudit_widgets_init() {
register_sidebar(
array(
'name'          => esc_html__( 'Footer Widgets', 'safenetaudit' ),
'id'            => 'footer-1',
'description'   => esc_html__( 'Widgets displayed in the footer.', 'safenetaudit' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget'  => '</div>',
'before_title'  => '<h3 class="widget-title">',
'after_title'   => '</h3>',
)
);
}
add_action( 'widgets_init', 'safenetaudit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function safenetaudit_scripts() {
wp_enqueue_style( 'safenetaudit-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', array(), null );

wp_enqueue_style( 'safenetaudit-tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/tailwind.min.css', array(), '3.4.1' );
wp_enqueue_style( 'safenetaudit-custom', get_template_directory_uri() . '/assets/css/custom.css', array( 'safenetaudit-tailwind' ), '1.0.0' );

wp_enqueue_script( 'safenetaudit-gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), '3.12.5', true );
wp_enqueue_script( 'safenetaudit-gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array( 'safenetaudit-gsap' ), '3.12.5', true );

wp_enqueue_script( 'safenetaudit-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery', 'safenetaudit-gsap', 'safenetaudit-gsap-scrolltrigger' ), '1.0.0', true );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'wp_enqueue_scripts', 'safenetaudit_scripts' );

/**
 * Add meta description for SEO from Customizer setting.
 */
function safenetaudit_meta_description() {
$description = get_theme_mod( 'safenetaudit_meta_description', esc_html__( 'SafeNet Audit – eksperci w audytach bezpieczeństwa i testach penetracyjnych.', 'safenetaudit' ) );

printf( '<meta name="description" content="%s" />' . "\n", esc_attr( $description ) );
printf( '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n" );
printf( '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n" );
}
add_action( 'wp_head', 'safenetaudit_meta_description', 1 );

/**
 * Registers Customizer settings for editable one-page content.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function safenetaudit_customize_register( $wp_customize ) {
// Hero section.
$wp_customize->add_section(
'safenetaudit_hero_section',
array(
'title'       => esc_html__( 'Hero Section', 'safenetaudit' ),
'priority'    => 10,
'description' => esc_html__( 'Ustawienia głównej sekcji hero.', 'safenetaudit' ),
)
);

$wp_customize->add_setting(
'safenetaudit_hero_title',
array(
'default'           => esc_html__( 'Zabezpiecz swoje cyfrowe środowisko', 'safenetaudit' ),
'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control(
'safenetaudit_hero_title',
array(
'label'   => esc_html__( 'Nagłówek', 'safenetaudit' ),
'section' => 'safenetaudit_hero_section',
'type'    => 'text',
)
);

$wp_customize->add_setting(
'safenetaudit_hero_subtitle',
array(
'default'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.', 'safenetaudit' ),
'sanitize_callback' => 'wp_kses_post',
)
);

$wp_customize->add_control(
'safenetaudit_hero_subtitle',
array(
'label'   => esc_html__( 'Opis', 'safenetaudit' ),
'section' => 'safenetaudit_hero_section',
'type'    => 'textarea',
)
);

$wp_customize->add_setting(
'safenetaudit_hero_cta_text',
array(
'default'           => esc_html__( 'Umów audyt', 'safenetaudit' ),
'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control(
'safenetaudit_hero_cta_text',
array(
'label'   => esc_html__( 'Tekst przycisku CTA', 'safenetaudit' ),
'section' => 'safenetaudit_hero_section',
'type'    => 'text',
)
);

$wp_customize->add_setting(
'safenetaudit_hero_cta_link',
array(
'default'           => '#kontakt',
'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control(
'safenetaudit_hero_cta_link',
array(
'label'   => esc_html__( 'Link przycisku CTA', 'safenetaudit' ),
'section' => 'safenetaudit_hero_section',
'type'    => 'url',
)
);

// About section.
$wp_customize->add_section(
'safenetaudit_about_section',
array(
'title'    => esc_html__( 'Sekcja O nas', 'safenetaudit' ),
'priority' => 20,
)
);

$wp_customize->add_setting(
'safenetaudit_about_title',
array(
'default'           => esc_html__( 'Kim jesteśmy?', 'safenetaudit' ),
'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control(
'safenetaudit_about_title',
array(
'label'   => esc_html__( 'Nagłówek sekcji', 'safenetaudit' ),
'section' => 'safenetaudit_about_section',
'type'    => 'text',
)
);

$wp_customize->add_setting(
'safenetaudit_about_description',
array(
'default'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'safenetaudit' ),
'sanitize_callback' => 'wp_kses_post',
)
);
$wp_customize->add_control(
'safenetaudit_about_description',
array(
'label'   => esc_html__( 'Opis sekcji', 'safenetaudit' ),
'section' => 'safenetaudit_about_section',
'type'    => 'textarea',
)
);

// Services.
$wp_customize->add_section(
'safenetaudit_services_section',
array(
'title'    => esc_html__( 'Usługi', 'safenetaudit' ),
'priority' => 30,
)
);

for ( $i = 1; $i <= 3; $i++ ) {
$wp_customize->add_setting(
"safenetaudit_service_title_{$i}",
array(
'default'           => sprintf( esc_html__( 'Usługa %d', 'safenetaudit' ), $i ),
'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control(
"safenetaudit_service_title_{$i}",
array(
'label'   => sprintf( esc_html__( 'Tytuł usługi %d', 'safenetaudit' ), $i ),
'section' => 'safenetaudit_services_section',
'type'    => 'text',
)
);

$wp_customize->add_setting(
"safenetaudit_service_description_{$i}",
array(
'default'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'safenetaudit' ),
'sanitize_callback' => 'wp_kses_post',
)
);
$wp_customize->add_control(
"safenetaudit_service_description_{$i}",
array(
'label'   => sprintf( esc_html__( 'Opis usługi %d', 'safenetaudit' ), $i ),
'section' => 'safenetaudit_services_section',
'type'    => 'textarea',
)
);
}

// Technologies section.
$wp_customize->add_section(
'safenetaudit_tech_section',
array(
'title'    => esc_html__( 'Technologie i narzędzia', 'safenetaudit' ),
'priority' => 40,
)
);

for ( $i = 1; $i <= 4; $i++ ) {
$wp_customize->add_setting(
"safenetaudit_tech_title_{$i}",
array(
'default'           => sprintf( esc_html__( 'Technologia %d', 'safenetaudit' ), $i ),
'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control(
"safenetaudit_tech_title_{$i}",
array(
'label'   => sprintf( esc_html__( 'Nazwa technologii %d', 'safenetaudit' ), $i ),
'section' => 'safenetaudit_tech_section',
'type'    => 'text',
)
);

$wp_customize->add_setting(
"safenetaudit_tech_description_{$i}",
array(
'default'           => esc_html__( 'Krótki opis narzędzia.', 'safenetaudit' ),
'sanitize_callback' => 'wp_kses_post',
)
);
$wp_customize->add_control(
"safenetaudit_tech_description_{$i}",
array(
'label'   => sprintf( esc_html__( 'Opis technologii %d', 'safenetaudit' ), $i ),
'section' => 'safenetaudit_tech_section',
'type'    => 'textarea',
)
);
}

// Contact section.
$wp_customize->add_section(
'safenetaudit_contact_section',
array(
'title'    => esc_html__( 'Kontakt', 'safenetaudit' ),
'priority' => 50,
)
);

$wp_customize->add_setting(
'safenetaudit_contact_title',
array(
'default'           => esc_html__( 'Skontaktuj się z nami', 'safenetaudit' ),
'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control(
'safenetaudit_contact_title',
array(
'label'   => esc_html__( 'Nagłówek kontaktu', 'safenetaudit' ),
'section' => 'safenetaudit_contact_section',
'type'    => 'text',
)
);

$wp_customize->add_setting(
'safenetaudit_contact_description',
array(
'default'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Wypełnij formularz, aby otrzymać wycenę audytu.', 'safenetaudit' ),
'sanitize_callback' => 'wp_kses_post',
)
);
$wp_customize->add_control(
'safenetaudit_contact_description',
array(
'label'   => esc_html__( 'Opis kontaktu', 'safenetaudit' ),
'section' => 'safenetaudit_contact_section',
'type'    => 'textarea',
)
);

$wp_customize->add_setting(
'safenetaudit_contact_form_shortcode',
array(
'default'           => '[contact-form-7 id="123" title="Formularz kontaktowy"]',
'sanitize_callback' => 'sanitize_textarea_field',
)
);
$wp_customize->add_control(
'safenetaudit_contact_form_shortcode',
array(
'label'   => esc_html__( 'Shortcode formularza', 'safenetaudit' ),
'section' => 'safenetaudit_contact_section',
'type'    => 'text',
)
);

// Meta description.
$wp_customize->add_section(
'safenetaudit_seo_section',
array(
'title'    => esc_html__( 'SEO', 'safenetaudit' ),
'priority' => 60,
)
);

$wp_customize->add_setting(
'safenetaudit_meta_description',
array(
'default'           => esc_html__( 'SafeNet Audit – eksperci w audytach bezpieczeństwa i testach penetracyjnych.', 'safenetaudit' ),
'sanitize_callback' => 'wp_kses_post',
)
);
$wp_customize->add_control(
'safenetaudit_meta_description',
array(
'label'   => esc_html__( 'Meta description', 'safenetaudit' ),
'section' => 'safenetaudit_seo_section',
'type'    => 'textarea',
)
);

// Social media.
$wp_customize->add_section(
'safenetaudit_social_section',
array(
'title'    => esc_html__( 'Social Media', 'safenetaudit' ),
'priority' => 70,
)
);

$social_networks = array( 'linkedin', 'twitter', 'github' );

foreach ( $social_networks as $network ) {
$wp_customize->add_setting(
"safenetaudit_social_{$network}",
array(
'default'           => '',
'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control(
"safenetaudit_social_{$network}",
array(
'label'   => sprintf( esc_html__( 'URL profilu %s', 'safenetaudit' ), ucfirst( $network ) ),
'section' => 'safenetaudit_social_section',
'type'    => 'url',
)
);
}
}
add_action( 'customize_register', 'safenetaudit_customize_register' );

/**
 * Add additional body class for dark theme.
 *
 * @param array $classes Body classes.
 * @return array
 */
function safenetaudit_body_classes( $classes ) {
$classes[] = 'bg-safenet-navy text-slate-100';
return $classes;
}
add_filter( 'body_class', 'safenetaudit_body_classes' );

