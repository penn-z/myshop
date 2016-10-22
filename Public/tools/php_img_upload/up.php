<?php



$uploaddir = './uploadfiles/';

$uploadfile = $uploaddir. $_FILES['_img']['name'][0];

//var_dump($_FILES['_img']);
print "<pre>";
if (move_uploaded_file($_FILES['_img']['tmp_name'][0], $uploaddir . $_FILES['_img']['name'][0])) {
    print "File is valid, and was successfully uploaded.  Here's some more debugging info:\n";
    print_r($_FILES);
} else {
    print "Possible file upload attack!  Here's some debugging info:\n";
    print_r($_FILES);
}
print "</pre>";

?>
