<?php
// $Id$
/**
 * Override search form theme.
 *
 * Disable title and modify submit button to image.
 *
 * @param array $form
 * @return The rendered form
 */
function phptemplate_search_theme_form($form) {
  unset($form['search_theme_form']['#title']);
  $form['search_theme_form']['#value'] = t('Search');
  $form['submit']['#type'] = 'image_button';
  $form['submit']['#src'] = drupal_get_path('theme', 'gordon') . '/img/search_btn.png';
  return drupal_render($form);
}

/**
 * Change the breadcrumb
 *
 * @param array $breadcrumb
 * @return string
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">' . implode('<span></span>', $breadcrumb) . '</div>';
  }
}
