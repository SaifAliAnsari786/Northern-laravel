<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageUploadController extends Controller
{
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // Return MIME type a la the 'mimetype' extension
            $mimeType = finfo_file($finfo, $request->file('upload'));
            finfo_close($finfo);
            $size = $request->file('upload')->getSize();
            $size = round($size / 1024,4);
            if (($mimeType == 'image/jpeg' || $mimeType == 'image/png' || $mimeType == 'image/svg+xml' || $mimeType == 'image/gif' || $mimeType == 'image/webp') && $size < 2000) {
                // Get the uploaded file
                $file = $request->file('upload');

                // Create an Intervention Image instance
                $image = Image::make($file);

                // Check if the file contains a malicious payload
                if ($image->filesize() > 1000000) {
                    // If the file size is too large, it may contain a malicious payload
                    return redirect()->back()->withErrors('The image file is too large and may contain a malicious payload.');
                }

                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
                // Save the image file
                $image->save('images/media/' . $fileName);
                $url = asset('images/media/' . $fileName);
                return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url, 'size' => $size]);
            }
        }
    }

    public function storeImageQuill(Request $request)
    {
        if ($request->hasFile('image')) {
            $count = rand(1000, 99999);
            $extension = \request()->file('image')->getClientOriginalExtension();
            $directory = 'images/media/';
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = $originName.'_'.date('YYYmmdddHms').$count.'.'.$extension;
            request()->file('image')->move($directory, $fileName);
            $url = asset('images/media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function storeImageOld(Request $request)
    {
        if ($request->hasFile('upload')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // Return MIME type a la the 'mimetype' extension
            $mimeType = finfo_file($finfo, $request->file('upload'));
            finfo_close($finfo);
            $size = $request->file('upload')->getSize();
            $size = round($size / 1024,4);
            if (($mimeType == 'image/jpeg' || $mimeType == 'image/png' || $mimeType == 'image/svg+xml' || $mimeType == 'image/gif' || $mimeType == 'image/webp') && $size < 2000) {
                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
                $request->file('upload')->move(public_path('images/media'), $fileName);
                $url = asset('images/media/' . $fileName);
                return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url, 'size' => $size]);
            }
        }
    }

    public function storeImage1(Request $request)
    {
        if ($request->hasFile('upload')) {
            $size = $request->file('upload')->getClientSize();
            $mimeType = $request->file('upload')->getClientMimeType();

            if($size )
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images/media'), $fileName);

            $url = asset('images/media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function storeImage2(Request $request)
    {
        //Define file upload path
        $upload_dir = array(
            'img'=> 'uploads/',
        );

        // Allowed image properties
        $imgset = array(
            'maxsize' => 2000,
//                'maxwidth' => 1024,
//                'maxheight' => 800,
//                'minwidth' => 10,
//                'minheight' => 10,
            'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png'),
        );

        // If 0, will OVERWRITE the existing file
        define('RENAME_F', 1);

        /**
         * Set filename
         * If the file exists, and RENAME_F is 1, set "img_name_1"
         *
         * $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename
         */
        function setFName($p, $fn, $ex, $i){
            if(RENAME_F ==1 && file_exists($p .$fn .$ex)){
                return setFName($p, F_NAME .'_'. ($i +1), $ex, ($i +1));
            }else{
                return $fn .$ex;
            }
        }

        $re = '';
        if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) {

            define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($_FILES['upload']['name'])));

            // Get filename without extension
            $sepext = explode('.', strtolower($_FILES['upload']['name']));
            $type = end($sepext);    /** gets extension **/

            // Upload directory
            $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio'];
            $upload_dir = trim($upload_dir, '/') .'/';

            // Validate file type
            if(in_array($type, $imgset['type'])){
                // Image width and height
                list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);

                if(isset($width) && isset($height)) {
                    if($width > $imgset['maxwidth'] || $height > $imgset['maxheight']){
                        $re .= '\\n Width x Height = '. $width .' x '. $height .' \\n The maximum Width x Height must be: '. $imgset['maxwidth']. ' x '. $imgset['maxheight'];
                    }

                    if($width < $imgset['minwidth'] || $height < $imgset['minheight']){
                        $re .= '\\n Width x Height = '. $width .' x '. $height .'\\n The minimum Width x Height must be: '. $imgset['minwidth']. ' x '. $imgset['minheight'];
                    }

                    if($_FILES['upload']['size'] > $imgset['maxsize']*1000){
                        $re .= '\\n Maximum file size must be: '. $imgset['maxsize']. ' KB.';
                    }
                }
            }else{
                $re .= 'The file: '. $_FILES['upload']['name']. ' has not the allowed extension type.';
            }

            // File upload path
            $f_name = setFName($_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir, F_NAME, ".$type", 0);
            $uploadpath = $upload_dir . $f_name;

            // If no errors, upload the image, else, output the errors
            if($re == ''){
                if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                    $url = 'ckeditor/'. $upload_dir . $f_name;
                    $msg = F_NAME .'.'. $type .' successfully uploaded: \\n- Size: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB';
                    $re = in_array($type, $imgset['type']) ? "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>":'<script>var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(\' \', \'unfiltered_html\'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();dialog.hide();</script>';
                }else{
                    $re = '<script>alert("Unable to upload the file")</script>';
                }
            }else{
                $re = '<script>alert("'. $re .'")</script>';
            }
        }

        // Render HTML output
        @header('Content-type: text/html; charset=utf-8');
        return $re;
    }
}
