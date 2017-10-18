<?php

namespace App\Helpers;

/**
 * CodeIgniter Text Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/text_helper.html
 */

// ------------------------------------------------------------------------

class Text{
	public static function _stringify_attributes(){
		//
	}

	/**
	 * Word Limiter
	 *
	 * Limits a string to X number of words.
	 *
	 * @param	string
	 * @param	int
	 * @param	string	the end character. Usually an ellipsis
	 * @return	string
	 */
	public static function word_limiter($str, $limit = 100, $end_char = '&#8230;'){
		if(trim($str) === ''){
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if(strlen($str) === strlen($matches[0])){
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}

	// ------------------------------------------------------------------------

	public static function full_name($first_name,$last_name){
		return $first_name . ', '. $last_name;   
	}

	// ------------------------------------------------------------------------

	/**
	 * Remove all HTML tags
	 *
	 * @param	string
	 * @param	string
	 * @param	boolean
	 * @return	string
	 */
	public static function strip_tags_content($text, $tags = '', $invert = FALSE){
		preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
		$tags = array_unique($tags[1]);

		if(is_array($tags) AND count($tags) > 0) {
			if($invert == FALSE) {
				return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
			}else{
				return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
			}
		}elseif($invert == FALSE){
			return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
		}
		return $text;
	}
}