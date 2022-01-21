<?php
namespace App\Controllers;
use CodeIgniter\Files\File;
class Upload extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        return view('upload_form', ['errors' => []]);
    }
    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,300]'
                    . '|max_dims[userfile,1500,1000]',
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('upload_form', $data);
        }  
        $img = $this->request->getFile('userfile');
        $caption = $_REQUEST['image_title'];
        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store(); 
            $data = ['uploaded_flleinfo' => new File($filepath)]; 
            $db = \Config\Database::connect();
            $path_array = explode("/", $filepath);
            $filename = $path_array[count($path_array)-2]."/".$path_array[count($path_array)-1];
            $sql = "INSERT INTO images (userfile, image_title) VALUES (".$db->escape($filename).", ".$db->escape($caption).")";
            $db->query($sql);
            $db->close();      
            return view('upload_success', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];
            return view('upload_form', $data );
        }  
    }
}


