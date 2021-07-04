<?php

Class pagesModel
{

	public function getPageInfo($pageID) {
		$pageID = DB::escape_string($pageID);
		//Assuming there is a pages table with an id field
		$sql = "SELECT * FROM pages WHERE id = $pageID";
		return DB::querySingleResult($sql);
	}


}