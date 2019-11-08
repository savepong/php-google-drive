<?php
include('init.php');


$filePath = 'files/your-file-name.pdf';


$fileMetadata = new Google_Service_Drive_DriveFile(array(
  'name' => 'My Report',
  'mimeType' => 'application/pdf',
  'parents' => array('your-parent-id')
));
$content = file_get_contents($filePath);
$file = $service->files->create($fileMetadata, array(
  'data' => $content,
  'mimeType' => '*/*',
  'uploadType' => 'multipart',
  'fields' => 'id'
));
printf("File ID: %s\n", $file->id);
