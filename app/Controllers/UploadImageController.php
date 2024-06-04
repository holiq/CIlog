<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UploadImageController extends Controller
{
    public function uploadImage()
    {
        helper('froala');

        $file = $this->request->getFile('file');
        $result = upload_image($file);

        return $this->response->setJSON($result);
    }

    public function deleteImage()
    {
        helper('froala');

        $src = $this->request->getBody();

        $result = delete_image(json_decode($src));

        return $this->response->setJSON($result);
    }
}
