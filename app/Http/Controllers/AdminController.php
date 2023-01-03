<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    //

public function index(){

    return view('admin.home');
}


public function saveTinymceImage(Request $request){

    $url = array("http://localhost");

    reset($_FILES);
    $temp = current($_FILES);

    if ($temp) {

        $oldWidth  = getimagesize($temp['tmp_name'])[0];
        $oldHeight = getimagesize($temp['tmp_name'])[1];
    }

    $max_height = $oldHeight;
    $max_width = $oldWidth;

     if ($temp['tmp_name']) {
        $imageFile = $temp['tmp_name'];
        $dataHW    = $this->resizeTheImage($imageFile, $max_width, $max_height); //SAMIR COMMENTED - 04 OCT 2017
        //$dataHW = $this->resizeTheImage($imageFile, $oldWidth, $oldHeight);
        $iWidth      = @$dataHW['width'];
        $iHeight     = @$dataHW['height']; // desired image result dimensions
        $iJpgQuality = 60;
        $iPngQuality = 9;
        $iWebpQuality = 80;

        if ($temp['tmp_name']) {
            // if no errors and size less than 600kb
            if ($temp['tmp_name']) {
                // echo 'hisfsdfds'; die;
                if (is_uploaded_file($temp['tmp_name'])) {
                    // new unique filename
                    if (!file_exists(TINYMCE_IMAGE_UPLOAD_PATH())) {
                        mkdir(TINYMCE_IMAGE_UPLOAD_PATH(), 0755, true);
                    }
                    $fName = "post__" . md5(time() . rand());
                    $sTempFileName = TINYMCE_IMAGE_UPLOAD_PATH().$fName;
                    // move uploaded file into cache folder
                    move_uploaded_file($temp['tmp_name'], $sTempFileName);
                    // change file permission to 644
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info

                        // check for image type
                        switch ($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';
                                // create a new image from file
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;

                            case IMAGETYPE_PNG:
                                $sExt = '.png';
                                // create a new image from file
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;

                            case IMAGETYPE_WEBP:
                                $sExt = '.webp';
                                // create a new image from file
                                $vImg = @imagecreatefromwebp($sTempFileName);
                                break;

                            default:
                                echo "notJpgOrPng";
                                @unlink($sTempFileName);
                                return;
                        }
                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor($iWidth, $iHeight);
                        imagealphablending($vDstImg, false);
                        imagesavealpha($vDstImg, true);
                        // copy and resize part of an image with resampling
                        imagecopyresampled($vDstImg, $vImg, 0, 0, 0, 0, $iWidth, $iHeight, $oldWidth, $oldHeight);
                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;
                        // output image to file
                        switch ($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                                break;
                            case IMAGETYPE_PNG:
                                imagepng($vDstImg, $sResultFileName, $iPngQuality);
                                break;
                            case IMAGETYPE_WEBP:
                                imagewebp($vDstImg, $sResultFileName, $iWebpQuality);
                                break;
                        }
                        @unlink($sTempFileName);
                        $fNameURL = TINYMCE_IMAGE_UPLOAD_URL().$fName.$sExt;
                        $arrayData = array("file_path" => $fNameURL);
                        $jsonData = $arrayData;
                        return $jsonData;
                    }
                }
            }
        }
    }
 }


}
