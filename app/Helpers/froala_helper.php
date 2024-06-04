<?php

use CodeIgniter\Files\File;

if (!function_exists('upload_image')) {
    function upload_image($file)
    {
        if (!$file->hasMoved()) {
            $newName = $file->getRandomName();

            $file->move(FCPATH . 'uploads', $newName);

            return [
                'status' => 'success',
                'link' => base_url('uploads/' . $newName),
            ];
        }

        return [
            'status' => 'error',
            'message' => 'The file has already been moved.',
        ];
    }
}

if (!function_exists('delete_image')) {
    function delete_image($src)
    {
        $filename = basename($src->src);

        $filepath = FCPATH . 'uploads/' . $filename;

        if (file_exists($filepath)) {
            if (unlink($filepath)) {
                return [
                    'status' => 'success',
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'File deletion failed.',
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'File not found.',
            ];
        }
    }
}
