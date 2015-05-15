<?php
/**
 * Format comments and posts
 * @package Helpers
 * @author Nathan Johnson
 */

/* No direct access allowed */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('format_post')) {
  function format_post($text) {
    $CI =& get_instance();
    $CI->load->helper('bbcode');
    // Html entities
    $text = htmlspecialchars($text);
    // Convert line breaks to <br>
    $text = nl2br($text);
    // Parse BBCode (deprecated)
    // $text = bbcode($text);
    // Make links clickable
    $text = auto_link($text, 'url', true);
    // Parse &tags
    $text = str_replace('&amp;', '&', $text);
    $text = preg_replace(REGEX_TAG, '<a href="'.base_url().'search?q=%26$1">&amp;$1</a>', $text);
    // Parse mentions
    $CI->load->library('mentions');
    $CI->load->library('markdown');

    $mentions = $CI->mentions->list_mentions($text);
    $text = $CI->markdown->parse($text);

    if ($mentions) {
      foreach ($mentions as $m) {
        if ($CI->mentions->user_exists($m)) {
          $text = str_replace("@$m", '<a href="'.base_url().'people/'.$m.'">@'.$m.'</a>', $text);
        }
      }
    }

    return $text;
  }
}

if(!function_exists('short_number')) {
  /**
   * Format numbers greater than 1000
   *
   * Turn big numbers into decimals and add suffixes.
   * Examples:
   * - 6,000 => 6k
   * - 4,300 => 4.3k
   * - 2,200,000 => 2.2M
   * 
   * @param  int $number The number to format
   * @return int The formatted number
   * @link http://stackoverflow.com/a/2703903/507629
   */
  function short_number($number) {
      $prefixes = 'kMGTPEZY';
      if ($number >= 1000) {
          for ($i=-1; $number>=1000; ++$i) {
              $number /= 1000;
          }
          return round($number, 1) . $prefixes[$i];
      }
      return $number;
  }
}

/* End of format_post_helper.php */