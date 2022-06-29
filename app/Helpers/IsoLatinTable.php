<?php
namespace App\Helpers;

class IsoLatinTable
{
	public $old = [];
	public $new = [];
	public $converted_string;

	function __construct($str) {
    	$this->table = array(
			'á' => 'Ã¡',

			'À' => 'Ã€',
			'ä' => 'Ã¤',
			'Ä' => 'Ã„',
			'ã' => 'Ã£',
			'å' => 'Ã¥',
			'Å' => 'Ã…',
			'æ' => 'Ã¦',
			'Æ' => 'Ã†',
			'ç' => 'Ã§',
			'Ç' => 'Ã‡',
			'é' => 'Ã©',
			'É' => 'Ã‰',
			'è' => 'Ã¨',
			'È' => 'Ãˆ',
			'ê' => 'Ãª',
			'Ê' => 'ÃŠ',
			'ë' => 'Ã«',
			'Ë' => 'Ã‹',
			'í' => 'Ã-­­',
			'Í' => 'Ã',
			'ì' => 'Ã¬',
			'Ì' => 'ÃŒ',
			'î' => 'Ã®',
			'Î' => 'ÃŽ',
			'ï' => 'Ã¯',
			'Ï' => 'Ã',
			'ñ' => 'Ã±',
			'Ñ' => 'Ã‘',
			'ó' => 'Ã³',
			'Ó' => 'Ã“',
			'ò' => 'Ã²',
			'Ò' => 'Ã’',
			'ô' => 'Ã´',
			'Ô' => 'Ã”',
			'ö' => 'Ã¶',
			'Ö' => 'Ã–',
			'õ' => 'Ãµ',
			'Õ' => 'Ã•',
			'ø' => 'Ã¸',
			'Ø' => 'Ã˜',
			'œ' => 'Å“',
			'Œ' => 'Å’',
			'ß' => 'ÃŸ',
			'ú' => 'Ãº',
			'Ú' => 'Ãš',
			'ù' => 'Ã¹',
			'Ù' => 'Ã™',
			'û' => 'Ã»',
			'Û' => 'Ã›',
			'ü' => 'Ã¼',
			'Ü' => 'Ãœ',
			'€' => 'â‚¬',
			'’' => 'â€™',
			'‚' => 'â€š',
			'ƒ' => 'Æ’',
			'„' => 'â€ž',
			'…' => 'â€¦',
			'‡' => 'â€¡',
			'ˆ' => 'Ë†',
			'‰' => 'â€°',
			'Š' => 'Å ',
			'‹' => 'â€¹',
			'Ž' => 'Å½',
			'‘' => 'â€˜',
			'“' => 'â€œ',
			'•' => 'â€¢',
			'–' => 'â€“',
			'—' => 'â€”',
			'˜' => 'Ëœ',
			'™' => 'â„¢',
			'š' => 'Å¡',
			'›' => 'â€º',
			'ž' => 'Å¾',
			'Ÿ' => 'Å¸',
			'¡' => 'Â¡',
			'¢' => 'Â¢',
			'£' => 'Â£',
			'¤' => 'Â¤',
			'¥' => 'Â¥',
			'¦' => 'Â¦',
			'§' => 'Â§',
			'¨' => 'Â¨',
			'©' => 'Â©',
			'ª' => 'Âª',
			'«' => 'Â«',
			'¬' => 'Â¬',
			'®' => 'Â®',
			'¯' => 'Â¯',
			'°' => 'Â°',
			'±' => 'Â±',
			'²' => 'Â²',
			'³' => 'Â³',
			'´' => 'Â´',
			'µ' => 'Âµ',
			'¶' => 'Â¶',
			'·' => 'Â·',
			'¸' => 'Â¸',
			'¹' => 'Â¹',
			'º' => 'Âº',
			'»' => 'Â»',
			'¼' => 'Â¼',
			'½' => 'Â½',
			'¾' => 'Â¾',
			'¿' => 'Â¿',
			'à' => 'Ã ',
			'†' => 'â€ ',
			'”' => 'â€',
			'Á' => 'Ã',
			'â' => 'Ã¢',
			'Â' => 'Ã‚',
			'Ã' => 'Ãƒ',
		);
		$this->get_conversion_table();
		$this->isoLatinToUTF8($str);
  	}

  	public function get_conversion_table()
	{
		foreach( $this->table as $key => $value ) {
		   array_push($this->new, $key);
		   array_push($this->old, $value);
		}
	}	

  	function isoLatinToUTF8($str)
  	{
  		$this->converted_string = str_replace( $this->old, $this->new, $str);
  	}  	
}