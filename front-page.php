<?php
/**
 * The template for displaying home page
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */


use ContentBuilder\Handler\ContentBuilder;

$contentBuilder = new ContentBuilder($post);
$post = new TimberPost();

$context = Timber::get_context();
$context['post'] = $post;
$context['contentBuilder'] = $contentBuilder->getContentHtml();

Timber::render( array( 'front-page.twig', 'page.twig' ), $context);
