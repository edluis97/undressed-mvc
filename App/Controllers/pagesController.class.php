<?php

Class pagesController
{


  public function someMethod() {
    if (isset($_REQUEST['id'])) {
     	//Calling getPageInfo method from pagesModel (site/App/Models/pagesModel.class.php)
    	$pagesModel = new pagesModel();
    	$pageInfo = $pagesModel->getPageInfo($_REQUEST['id']);

    	view('pages/page', array(
    		"info"	=> $pageInfo, //will the $info inside the view
    	));
    	//Calling the view (site/App/Views/pages/page.view.php)

    	//Sending JSON instead
    	/*
			json_return(200, $pageInfo);
			//1st -> http status
			//2nd -> data (this will be converted into json)
    	*/

    }
  }


}