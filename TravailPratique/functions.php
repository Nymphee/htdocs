<?php
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');

    //title
    add_theme_support('title-tag');

    //ajout du menu
    add_theme_support( 'menus' );

    add_action( 'after_setup_theme', 'register_my_menu' );

    function register_my_menu(){
        register_nav_menu( 'main-menu', 'Menu principal' );
    }

    //hook pour la page option
    add_action('admin_menu', 'addMenu');

    //hook ajout autres options
    add_action('admin_init', 'registerMySettings');


    function addMenu(){
        add_menu_page( 'Mes options', 'Mes options',
            'manage_options', 'mes_options', 'createMesOptionsPage');
    }

    function createMesOptionsPage(){
        ?>
            <h1>Paramètres du site</h1>

            <form action="options.php" method="POST">
                <?php
                settings_fields('mes_options'); do_settings_sections('mes_options'); submit_button();
                ?> 
            </form>
        <?php 
    }

    function registerMySettings(){
        register_setting('mes_options', 'mes_options_facebook');
        add_settings_section('mes_options_parametres', 'Paramètres', 'createMySection', 'mes_options');
        add_settings_field('mes_options_facebook', "Lien Facebook", 'createMyFieldFacebook', 'mes_options', 'mes_options_parametres' );
    }

    function createMySection() {
        echo "Complétez les paramètres de votre site ici.";
    }
        
    function createMyFieldFacebook() { 
        ?>
            <input name="mes_options_facebook" style="width:100%"><?= get_option('mes_options_facebook'); ?></input>
        <?php 
    }
