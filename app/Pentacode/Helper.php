<?php

namespace App\Pentacode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

use Hashids\Hashids;

class Helper{
	
	public static function generateSlug($name){
		$name = strtolower($name);
		$name = preg_replace('/[^a-z_\-0-9]/i', '-', $name);
		// $name = str_replace(' ', '-', $name);

		return $name;
	}
	
	public static function initPath($path){
		$arrPath = explode('/', $path);
		
		$cur = '';
		foreach($arrPath as $val){
			$cur .= '/'.$val;
			if(!Storage::disk('public')->exists($cur))
				Storage::disk('public')->makeDirectory($cur);
		}
		// dd($arrPath);
	}
	
	public static function prettyDateDiff($date1, $date2){
		// $translator = \Carbon\Translator::get('id');
		// $translator->setMessages('id', [
			// 'ago' => ':time',
		// ]);

		$diff = $date1->diffInHours($date2);
		if($diff > 2*24)
			return $date1->format('d M Y - h.i');
		
		return $date1->locale('id')->diffForHumans();
	}
}