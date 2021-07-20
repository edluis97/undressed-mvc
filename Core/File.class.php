<?php

class File {


	public static function isAllowedFormat($fileFullName, $alllowedFileFormats) {

		$nameExploded = explode('.', $fileFullName);

		//strtolower so it doesn´t make a diference if it is e.g. jpeg or JPEG
		$extension = strtolower(end($nameExploded));

		if(in_array($extension, $alllowedFileFormats)) {
			return true;
		} else {
			return false;
		}

	}

}