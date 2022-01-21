<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Files\File;

class View extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $db = \Config\Database::connect();
        $query = ['result'=>$db->query("SELECT * FROM images;")];
        $db->close();
        return view('view_data',$query);
    }
    
}

?>
