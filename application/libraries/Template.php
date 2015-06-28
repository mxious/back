<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Template library
 *
 * Use this to load a full page in a controller, rather than loading 
 * each view (header, footer, etc.) individually
 * 
 * @package Libraries
 * @author Nathan Johnson
 */

class Template {

    /**
     * Data to pass to the template
     * @var array
     */
    private $template_data = array();

    /**
     * Add an item to template_data
     * 
     * @param string $name 
     * @param string $value
     * @return void
     */
    private function set($name, $value) {
      $this->template_data[$name] = $value;
    }

    /**
     * Load a view into the main template
     * @param  string  $view      The view to load
     * @param  array   $settings  Array of page settings
     * @param  array   $variables Variables to pass to the view
     * @param  string  $template  The template to load the view into
     * @param  boolean $return    Whether or not to return the output as a HTML string
     * @return void|string
     */
    public function load($view = '', $settings = array(), $variables = array(), $template = 'templates/master', $return = FALSE) {

      $CI =& get_instance();

      $variables['session'] = $CI->php_session;
      $variables['loggedin'] = $CI->php_session->get('loggedin');

      $title = $settings['title'];
      // apply the title suffix
      $title = sprintf("%s %s", $title, TITLE_SUFFIX);
      $this->set('title', $title);

      $CI->load->helper('html');

      // Pass extra meta tags to header if defined
      $meta = '';
      if(isset($settings['meta'])) {
        $meta = meta($settings['meta']);
      }

      if (isset($settings['fixed_container'])) {
        $this->set('fixed_container', true);
        if (isset($settings['fixed_container_title'])) {
         $this->set('fctitle', $settings['fixed_container_title']);         
        }
      } else {
        $this->set('fixed_container', false);        
      }

      if(isset($settings['parallax'])) {
        $this->set('parallax', $settings['parallax']);
      } else { 
        $this->set('parallax', false);
      }
      
      $this->set('extra_meta', $meta);

      $contents = $CI->load->view($view, $variables, true);
      $this->set('contents', $contents);

      // Pass extra stylesheets (link tags) to header if defined
      $stylesheets = '';
      if(isset($settings['extra_stylesheets'])) {
        foreach($settings['extra_stylesheets'] as $href) {
          $stylesheets .= link_tag($href) . "\n";
        }
      }

      $msg_box_data = array('msg' => show_msg());
      $msg_box = $CI->load->view('templates/msg_box', $msg_box_data, true);
      $this->set('msg', $msg_box);

      $this->set('extra_stylesheets', $stylesheets);

      $output = $CI->load->view($template, $this->template_data, true);

      if($return) return $output;
      else echo $output;
    }
}

/* End of file Template.php */
/* Location: ./application/libraries/template.php */