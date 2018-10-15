<?php 


if($_SERVER['REQUEST_METHOD']=="POST"){
	$pdf_file = $_FILES['file_pdf'];
	// $pdf_file = ($_FILES['file_pdf']==null) ? "update table " : "update without im";

	echo pdfStuff($pdf_file, "church_files");

	print_r($pdf_file);

}

function pdfStuff(Array $pdf_file, $path = ""){
	$result = null;
	if(!empty($pdf_file) && !$pdf_file == null){
		 $fileType = $pdf_file["type"];
		 $fileSize = $pdf_file["size"];

		if($pdf_file["error"] == 0){
            //check to see if the file-type is a PDF
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


 ?>