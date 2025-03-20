<?php
function theme_tp_customize_register($wp_customize) {
  // Le code pour ajouter des sections, des réglages et des contrôles ira ici.
  //////////////// Création d'une nouvelle section dans le customizer.//////////////////////
  $wp_customize->add_section('hero_section', array(
    'title' => __('Section Hero', 'theme_tp'),
    'priority' => 30,
  ));
  ///////////////////////////////////////////////////// Ajout de la donnée auteur.
  $wp_customize->add_setting('hero_auteur', array(
    'default' => __('Juba Ameziane', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  //////////////////////////////////////////////////// Ajout du contrôle de la donnée Num. téléphone.
  $wp_customize->add_control('hero_auteur', array(
    'label' => __('Auteur', 'theme_tp'),
    'section' => 'hero_section',
    'type' => 'text',
  ));
    ///////////////////////////////////////////////////// Ajout de la donnée Num. téléphone.
    $wp_customize->add_setting('hero_telephone', array(
      'default' => __('438-883-8261', 'theme_tp'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    //////////////////////////////////////////////////// Ajout du contrôle de la donnée auteur.
    $wp_customize->add_control('hero_telephone', array(
      'label' => __('Num. Téléphone', 'theme_tp'),
      'section' => 'hero_section',
      'type' => 'text',
    ));
  /////////////////////////////////////////////////// Ajout de la donnée image en arriere plan.
  $wp_customize->add_setting('hero_background', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  /////////////////////////////////////////////////// Ajout du contrôle de la donnée du background
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
    'label' => __('Hero Background Image', 'theme_31w'),
    'section' => 'hero_section',
  )));
    ///////////////////////////////////////////////////// Ajout de la donnée pour le controle du courriel.
    $wp_customize->add_setting('hero_courriel', array(
      'default' => __('jubaame@icloud.com', 'theme_tp'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    //////////////////////////////////////////////////// Ajout du contrôle de la donnée du courriel.
    $wp_customize->add_control('hero_courriel', array(
      'label' => __('Auteur', 'theme_tp'),
      'section' => 'hero_section',
      'type' => 'text',
    ));
      /////////////////////////////////////////////////// Ajout de la donnée couleur des textes.
  $wp_customize->add_setting('hero_couleur', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  /////////////////////////////////////////////////// Ajout du contrôle de la donnée de la couleur des textes.
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_couleur', array(
    'label' => __('Hero Couleur Textes', 'theme_31w'),
    'section' => 'hero_section',
  )));
  ////////////////// Création de la section footer dans le customizer: ///////////////////////////////////3
  $wp_customize->add_section('footer_section', array(
    'title' => __('Section Footer', 'theme_tp'),
    'priority' => 30,
  ));
  //////////////////////////////////////////////// Ajout de la donnée de changement des icones SVG dans le footer
  $wp_customize->add_setting('footer_couleurIcones', array(
    'default' => __('0000', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  ////////////////////////////////////////////// Ajout du controle de la donnée.
  $wp_customize->add_control('footer_couleurIcones', array(
    'label' => __('Couleur des Icones', 'theme_tp'),
    'section' => 'footer_section',
    'type' => 'text',
  ));
  //////////////////////////////////////////////// Ajout de la donnée de changement dela mission dans le footer
  $wp_customize->add_setting('footer_mission', array(
    'default' => __('La mission', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  ////////////////////////////////////////////// Ajout du controle de la donnée.
  $wp_customize->add_control('footer_mission', array(
    'label' => __('Mission', 'theme_tp'),
    'section' => 'footer_section',
    'type' => 'text',
  ));
    //////////////////////////////////////////////// Ajout de la donnée de changement de l'adresse dans le footer
    $wp_customize->add_setting('footer_adresse', array(
      'default' => __('adresse', 'theme_tp'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    ////////////////////////////////////////////// Ajout du controle de la donnée.
    $wp_customize->add_control('footer_adresse', array(
      'label' => __('Adresse', 'theme_tp'),
      'section' => 'footer_section',
      'type' => 'text',
    ));
       ///////////////////////////////////////////////////// Ajout de la donnée pour le controle du courriel.
       $wp_customize->add_setting('footer_courriel', array(
        'default' => __('jubaame@icloud.com', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
      ));
      //////////////////////////////////////////////////// Ajout du contrôle de la donnée du courriel.
      $wp_customize->add_control('footer_courriel', array(
        'label' => __('Auteur', 'theme_tp'),
        'section' => 'footer_section',
        'type' => 'text',
      ));
      //////////////////////////////////////////////// Ajout de la donnée de changement du numéro de téléphone dans le footer
  $wp_customize->add_setting('footer_telephone', array(
    'default' => __('Numero Téléphone', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  ////////////////////////////////////////////// Ajout du controle de la donnée.
  $wp_customize->add_control('footer_telephone', array(
    'label' => __('Telephone', 'theme_tp'),
    'section' => 'footer_section',
    'type' => 'text',
  ));
  }
  add_action('customize_register', 'theme_tp_customize_register');
?>