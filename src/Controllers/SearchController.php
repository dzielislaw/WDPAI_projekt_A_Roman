<?php
require_once 'AppController.php';
class SearchController extends AppController
{
    public function search(): void
    {
        if(!isset($_POST['tool_select'])){
            $this->render('dashboard');
            return;
        }

        $url = "https://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/equipments");
    }

}