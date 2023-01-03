<?php

function getStatusIcon($data){
	if ($data->status == 1) {
		return '<span title="Are you sure want to change status?" class="btn btn-xs btn-success" id="active_inactive"
		status="1" data-id="'.\Crypt::encrypt($data->id).'">Active</span>';
	}else{
		return '<span title="Click on button to change status" class="btn btn-xs btn-danger" id="active_inactive"
		status="0" data-id="'.\Crypt::encrypt($data->id).'">Inactive</span>';
	}
}

function makeslug($text, string $divider = '-'){

     // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;

}

function TINYMCE_IMAGE_UPLOAD_PATH(){

    return UPLOAD_AND_DOWNLOAD_PATH().'/upload/pages/';
}
function PAGES_IMAGE_UPLOAD_URL(){

    return UPLOAD_AND_DOWNLOAD_URL().'public/upload/pages/';
}
?>
