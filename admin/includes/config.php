<?php 
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'church_db');

	$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	// if ($conn) {
	// echo "Connected!!!";
	// }
	// else
	// {
	// echo "Not connected!!!";
	// }


	function checkImage($image, $thumbnail_width, $thumbnail_height, $savePath){
    $result = "";
    //check to see if the upload went well
    if(is_string($savePath) && is_int($thumbnail_height) && is_int($thumbnail_width)){

        if($image['error']== 0){
            $img_size = $image['size'];
            $img_name = $image['name'];
            $img_type = $image['type'];
            $img_tmp_path = $image['tmp_name'];

            if($img_size > 5000000){ 
                $result = "image is too large"; 
            }
            else{
                $valid_extensions = array("jpg", "jpeg", "gif", "png");
                $img_ext_arr = explode("/",$img_type);
                $img_ext = strtolower(end($img_ext_arr));
                /**RENAME THE IMAGE FILE HERE
                 * USE rand() AND time() FUNCTIONS TO GET A UNIQUE TIMESTAMP
                 * @var $new_img_name
                 **/
                $new_img_name = rand(3,2).time().".".$img_ext;

                if(!in_array($img_ext, $valid_extensions)) {
                    $result = "wrong file type, only jpg, jpeg, png & gif needed...";
                }
                else{
                    $img_path = $savePath.basename($new_img_name); //CORRECT THE PATH TO SPE
                    move_uploaded_file($img_tmp_path, $img_path);

                    if(isset($thumbnail_width, $thumbnail_height) ){
                        //cropping of small images starts here
                        $magicObj = new imageLib($img_path);
                        $magicObj->resizeImage($thumbnail_width, $thumbnail_height);
                        $magicObj->saveImage($img_path, 100);
                        $result = $img_path;
                    }
                }
            }
        }
    }
    else $result = "parameters do not match";

    return (string)$result;
}


function checkPdf(Array $pdf_file, $path = ""){
    $result = null;
    if(!empty($pdf_file) && !$pdf_file == null){
         $fileType = $pdf_file["type"];
         $fileSize = $pdf_file["size"];

        if($pdf_file["error"] == 0){
            //check to see if the file-type is a pdf
            if(preg_match("/pdf$/i", $fileType)){
                
                //check out to see if the file-size is below 5mb
                if($pdf_file["size"] < 50000000){
                    move_uploaded_file($pdf_file["tmp_name"], $path."/".$pdf_file["name"]);
                    $result= $path."/".$pdf_file["name"];

                }
                else $result = "ERROR: PDF FILE IS TOO LARGE";

            }
            else $result = "ERROR: WRONG FILE TYPE, ONLY PDF ACCEPTED";

        }
        else $result = "ERROR: THE FILE HAS AN ISSUE";

    }
    else $result = "ERROR: Please insert a pdf file";

    return (String)$result;
}


function checkAudio(Array $audio_file, $audio_path = ""){
    $result = null;
    if(!empty($audio_file) && !$audio_file == null){
         $audioType = $audio_file["type"];
         $audioSize = $audio_file["size"];

        if($audio_file["error"] == 0){
            //check to see if the file-type is a audio
            if(preg_match("/mp3$/i", $audioType)){
                
                //check out to see if the file-size is below 5mb
                if($audioSize < 50000000){
                    move_uploaded_file($audio_file["tmp_name"], $audio_path."/".$audio_file["name"]);
                    $result= $audio_path."/".$audio_file["name"];

                }
                else $result = "ERROR: audio FILE IS TOO LARGE";

            }
            else $result = "ERROR: WRONG FILE TYPE, ONLY audio ACCEPTED";

        }
        else $result = "ERROR: THE FILE HAS AN ISSUE";

    }
    else $result = "ERROR: Please insert a audio file";

    return (String)$result;
}

function check_aud(Array $aud_file, $path = ""){
    $result = null;
    if(!empty($aud_file) && !$aud_file == null){
        $fileType = $aud_file["type"];
        $fileSize = $aud_file["size"];

        if($aud_file["error"] == 0){
            //check to see if the file-type is a pdf
            if(preg_match("/pdf$/i", $fileType)){

                //check out to see if the file-size is below 5mb
                if($aud_file["size"] < 50000000){
                    move_uploaded_file($aud_file["tmp_name"], $path."/".$aud_file["name"]);
                    $result= $path."/".$aud_file["name"];

                }
                else $result = "ERROR: PDF FILE IS TOO LARGE";

            }
            else $result = "ERROR: WRONG FILE TYPE, ONLY PDF ACCEPTED";

        }
        else $result = "ERROR: THE FILE HAS AN ISSUE";

    }
    else $result = "ERROR: Please insert a pdf file";

    return (String)$result;
}

 ?>


