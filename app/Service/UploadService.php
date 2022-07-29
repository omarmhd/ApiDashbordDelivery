<?php

namespace  App\Service;

Class UploadService{



    public  function upload($file,$path){

        $input_file = $file->getClientOriginalName();
        $file_name = pathinfo($input_file, PATHINFO_FILENAME);


        $extension = $file->getClientOriginalExtension();
        $fileName = $file_name ."-".time() . "." . $extension;
        $file->move($path . '/', $fileName);
        return $fileName;
    }



}