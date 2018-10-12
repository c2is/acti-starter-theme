<?php
/**
 * The template for displaying home page
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$contentBuilder = new \ContentBuilder\ContentBuilder($post);
$post = new TimberPost();

$context = Timber::get_context();
$context['post'] = $post;
$context['contentBuilder'] = $contentBuilder;

Timber::render( array( 'front-page.twig', 'page.twig' ), $context);
