<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;

// Instantiate an Amazon S3 client.
$s3Client = new S3Client([
'version' => 'latest',
'region'  => 'us-east-1',
'credentials' => [
'key' => 'YOUR_ACCESS_KEY',
'secret' => 'YOUR_SECRET_KEY'
]
]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0){

$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$filename = $_FILES["anyfile"]["name"];
$filetype = $_FILES["anyfile"]["type"];
$filesize = $_FILES["anyfile"]["size"];

$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!array_key_exists($ext, $allowed)) die("Error: Invalid File Format.");

$maxsize = 10 * 1024 * 1024;
if($filesize > $maxsize) die("Error: File too large.");

if(in_array($filetype, $allowed)){

if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "uploads/" . $filename)){

$bucket = 'your-s3-bucket-name';
$file_Path = __DIR__ . '/uploads/'. $filename;
$key = basename($file_Path);

try {
$result = $s3Client->putObject([
'Bucket' => $bucket,
'Key'    => $key,
'Body'   => fopen($file_Path, 'r'),
'ACL'    => 'public-read',
]);

echo "Image uploaded successfully: ". $result->get('ObjectURL');

} catch (Exception $e) {
echo "Error uploading to S3: ". $e->getMessage();
}

}else{
echo "Error uploading file.";
}

} 
} else{
echo "Upload error: ". $_FILES["anyfile"]["error"];
}
}
?>
