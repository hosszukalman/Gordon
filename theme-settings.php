<?php
// $Id$
/**
 * @file
 *
 *
 *
 * @author Kálmán Hosszu - hosszu.kalman@gmail.com - http://www.kalman-hosszu.com
 */

/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   array An array of saved settings for this theme.
 * @return
 *   array A form array.
 */
function gordon_settings($saved_settings) {
  $form = array();

  $defaults = array(
    'gordon_ie6nomore' => 1,
  );

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  // Create the form
  $form['gordon_ie6nomore'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable IE6 no more script'),
    '#description' => t('Show IE6 no more toolbar if the user use Internet Explorer 6. See details: !url',
        array('!url' => l('http://www.ie6nomore.com/', 'http://www.ie6nomore.com', array('attributes' => array('target' => '_blank'))))),
    '#default_value' => $settings['gordon_ie6nomore'],
  );

  return $form;
}