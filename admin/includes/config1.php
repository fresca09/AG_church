<?php 
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'church_files');

	$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	// if ($conn) {
	// 	echo "Connected!!!";
	// }
	// else
	// {
	// 	echo "Not connected!!!";
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

            if($img_size > 5000000){ $result = "image is too large"; }

            else{
                $valid_extensions = array("jpg", "jpeg", "gif", "png");
                $img_ext_arr = explode("/",$img_type);
                $img_ext = strtolower(end($img_ext_arr));
                /**RENAME THE IMAGE FILE HERE
                 * USE rand() AND time() FUNCTIONS TO GET A UNIQUE TIMESTAMP
                 * @var $new_img_name
                 **/
                $new_img_name = rand(8,8).time().".".$img_ext;

                if(!in_array($img_ext, $valid_extensions)) $result = "wrong file type, only jpg, jpeg, png & gif";

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



function checkFile($file, $thumbnail_width, $thumbnail_height, $savePath){
    $result = "";
    //check to see if the upload went well
    if(is_string($savePath) && is_int($thumbnail_height) && is_int($thumbnail_width)){

        if($file['error']== 0){
            $file_size = $file['size'];
            $file_name = $file['name'];
            $file_type = $file['type'];
            $file_tmp_path = $file['tmp_name'];

            if($file_size > 2000){ $result = "file is too large"; }

            else{
                $valid_extensions = array("pdf");
                $file_ext_arr = explode("/",$file_type);
                $file_ext = strtolower(end($file_ext_arr));
                /**RENAME THE file FILE HERE
                 * USE rand() AND time() FUNCTIONS TO GET A UNIQUE TIMESTAMP
                 * @var $new_file_name
                 **/
                $new_file_name = rand(8,8).time().".".$file_ext;

                if(!in_array($file_ext, $valid_extensions)) $result = "wrong file type, only jpg, jpeg, png & gif";

                else{
                    $file_path = $savePath.basename($new_file_name); //CORRECT THE PATH TO SPE
                    move_uploaded_file($file_tmp_path, $file_path);

                    if(isset($thumbnail_width, $thumbnail_height) ){
                        //cropping of small file starts here
                        $magicObj = new imageLib($file_path);
                        $magicObj->resizeImage($thumbnail_width, $thumbnail_height);
                        $magicObj->saveImage($file_path, 100);
                        $result = $file_path;
                    }
                }
            }
        }
    }
    else $result = "parameters do not match";

    return (string)$result;
}
 ?>