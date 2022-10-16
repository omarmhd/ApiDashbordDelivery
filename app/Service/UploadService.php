<?php

namespace  App\Service;

class UploadService
{

    public function upload($file, $path)
    {

        $input_file = $file->getClientOriginalName();
        $file_name = pathinfo($input_file, PATHINFO_FILENAME);

        $extension = $file->getClientOriginalExtension();
        $uniqid = uniqid();
        $fileName = $file_name . "-" .$uniqid. time() . "." . $extension;
        $file->move($path . '/', $fileName);
        return $fileName;
    }
    public function uploadWithPath($file, $path)
    {

        $fileName = $this->upload($file,$path);
        return $path.'/'.$fileName;
    }
}
