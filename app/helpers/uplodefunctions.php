<?php


// UplodeImage Function
// @arguments
/* [1] $request->file
**/
function uplode_img($file)
{
  $name = rand(11111, 99999).md5('tgrbty'). '.' . $file->getClientOriginalExtension();
  $file->move(public_path('storage/imgs'), $name);
  return $name;
}
