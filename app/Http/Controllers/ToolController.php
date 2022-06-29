<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\IsoLatinTable;

class ToolController extends Controller
{
    public function __construct()
    {
        $this->max_textsize = 50000;
        $this->validations = [
            'str' => 'max:50000|required',
            'mode' => ''
        ];
    }

    public function htmlEntities(Request $request)
	{
        $postData = $this->validate($request, $this->validations);        
		if (strlen($postData['str']) > $this->max_textsize) {
			return response()->json(['response' => 'The length of the text should not exceed ' . $this->max_textsize . ' characters.']);
		}
		if ($postData['mode'] == 'encode') {
			$string = str_replace(array("&lt;", "&gt;"), array("<", ">"), htmlentities($postData['str'], ENT_NOQUOTES, 'UTF-8', FALSE));
			$response_as_array = array('response' => $string);
		} else {
			$response_as_array = array('response' => html_entity_decode($postData['str']));
		}
		return response()->json($response_as_array);
	}

    public function setIsolatin(Request $request)
	{
        $postData = $this->validate($request, $this->validations);
		if (strlen($postData['str']) > $this->max_textsize) {
			return response()->json(['response' => 'The length of the text should not exceed ' . $this->max_textsize . ' characters.']);
		}
		$isolatin_str = new IsoLatinTable($postData['str']);
        return response()->json(['response' => $isolatin_str->converted_string]);
	}
}
