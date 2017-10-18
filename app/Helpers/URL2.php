<?php
namespace App\Helpers;

class URL2{
	/**
	 * Mailto Link
	 *
	 * @param	string	the email address
	 * @param	string	the link title
	 * @param	mixed	any attributes
	 * @return	string
	 */
	public static function mailto($email, $title = '', $attributes = ''){
		$title = (string) $title;

		if ($title === ''){
			$title = $email;
		}

		return '<a href="mailto:'.$email.'">'.$title.'</a>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Encoded Mailto Link
	 *
	 * Create a spam-protected mailto link written in Javascript
	 *
	 * @param	string	the email address
	 * @param	string	the link title
	 * @param	mixed	any attributes
	 * @return	string
	 */
	public static function safe_mailto($email, $title = '', $attributes = ''){
		$title = (string) $title;

		if ($title === ''){
			$title = $email;
		}

		$x = str_split('<a href="mailto:', 1);

		for ($i = 0, $l = strlen($email); $i < $l; $i++){
			$x[] = '|'.ord($email[$i]);
		}

		$x[] = '"';

		if ($attributes !== ''){
			if (is_array($attributes)){
				foreach ($attributes as $key => $val){
					$x[] = ' '.$key.'="';
					for ($i = 0, $l = strlen($val); $i < $l; $i++){
						$x[] = '|'.ord($val[$i]);
					}
					$x[] = '"';
				}
			}else{
				for ($i = 0, $l = strlen($attributes); $i < $l; $i++){
					$x[] = $attributes[$i];
				}
			}
		}

		$x[] = '>';

		$temp = array();
		for ($i = 0, $l = strlen($title); $i < $l; $i++){
			$ordinal = ord($title[$i]);

			if ($ordinal < 128){
				$x[] = '|'.$ordinal;
			}else{
				if (count($temp) === 0){
					$count = ($ordinal < 224) ? 2 : 3;
				}

				$temp[] = $ordinal;
				if (count($temp) === $count){
					$number = ($count === 3)
							? (($temp[0] % 16) * 4096) + (($temp[1] % 64) * 64) + ($temp[2] % 64)
							: (($temp[0] % 32) * 64) + ($temp[1] % 64);
					$x[] = '|'.$number;
					$count = 1;
					$temp = array();
				}
			}
		}

		$x[] = '<'; $x[] = '/'; $x[] = 'a'; $x[] = '>';

		$x = array_reverse($x);

		$output = "<script type=\"text/javascript\">\n"
			."\t//<![CDATA[\n"
			."\tvar l=new Array();\n";

		for ($i = 0, $c = count($x); $i < $c; $i++){
			$output .= "\tl[".$i."] = '".$x[$i]."';\n";
		}

		$output .= "\n\tfor (var i = l.length-1; i >= 0; i=i-1) {\n"
			."\t\tif (l[i].substring(0, 1) === '|') document.write(\"&#\"+unescape(l[i].substring(1))+\";\");\n"
			."\t\telse document.write(unescape(l[i]));\n"
			."\t}\n"
			."\t//]]>\n"
			.'</script>';

		return $output;
	}

	// ------------------------------------------------------------------------

	/**
	 * Tel Link
	 *
	 * @param	string	the phone number
	 * @param	string	the link title
	 * @param	mixed	any attributes
	 * @return	string
	 */
	public static function tel($tel, $title = '', $attributes = ''){
		$title = (string) $title;

		if ($title === ''){
			$title = $tel;
		}

		return '<a href="tel:+'.$tel.'" target="_blank">'.$title.'</a>';
	}

	// ------------------------------------------------------------------------

	/**
	 * PIN BBM Link
	 *
	 * @param	string	the BlackBerry Messenger PIN
	 * @param	string	the link title
	 * @param	mixed	any attributes
	 * @return	string
	 */
	public static function pin_bbm($pin, $title = '', $attributes = ''){
		$title = (string) $title;

		if ($title === ''){
			$title = $pin;
		}

		return '<a href="http://pin.bbm.com/'.$pin.'" target="_blank">'.$title.'</a>';
	}
}