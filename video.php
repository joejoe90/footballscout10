<?php

$folder  = isset($_POST["course"]);
$message = "1";

define('DESTINATION_FOLDER','/$folder);

define('MAX_FILE_SIZE', 0);

// Upload success URL. User will be redirected to this page after upload.
define('SUCCESS_URL','learn.learnbrix.com');

// Allowed file extensions. Will only allow these extensions if not empty.
// Example: $exts = array('avi','mov','doc');
$exts = array();

// rename file after upload? false - leave original, true - rename to some unique filename
define('RENAME_FILE', true);

$message = "renamed";
// put a string to append to the uploaded file name (after extension);
// this will reduce the risk of being hacked by uploading potentially unsafe files;
// sample strings: aaa, my, etc.
define('APPEND_STRING', '~');

$message = "string append";
// Need uploads log? Logs would be saved in the MySql database.
define('DO_LOG', false);





CREATE TABLE _uploads_log (
  log_id int(11) unsigned NOT NULL auto_increment,
  log_filename varchar(128) default '',
  log_size int(10) default 0,
  log_ip varchar(24) default '',
  log_date timestamp,
  PRIMARY KEY  (log_id),
  KEY (log_filename)
);

*/

####################################################################
###  END OF SETTINGS.   DO NOT CHANGE BELOW
####################################################################

// Allow script to work long enough to upload big files (in seconds, 2 days by default)
@set_time_limit(172800);

// following may need to be uncommented in case of problems
// ini_set("session.gc_maxlifetime","10800");

function showUploadForm($message='') {
  $max_file_size_tag = '';
  if (MAX_FILE_SIZE > 0) {
    // convert to bytes
    $max_file_size_tag = "<input name='MAX_FILE_SIZE' value='".(MAX_FILE_SIZE*1024)."' type='hidden' >\n";
  }

  // Load form template
  include ('upload.html');
}

// errors list
$errors = array();

$message = '';

// we should not exceed php.ini max file size
$ini_maxsize = ini_get('upload_max_filesize');
if (!is_numeric($ini_maxsize)) {
  if (strpos($ini_maxsize, 'M') !== false)
    $ini_maxsize = intval($ini_maxsize)*1024*1024;
  elseif (strpos($ini_maxsize, 'K') !== false)
    $ini_maxsize = intval($ini_maxsize)*1024;
  elseif (strpos($ini_maxsize, 'G') !== false)
    $ini_maxsize = intval($ini_maxsize)*1024*1024*1024;
}
if ($ini_maxsize < MAX_FILE_SIZE*1024) {
  $errors[] = "Alert! Maximum upload file size in php.ini (upload_max_filesize) is less than script's MAX_FILE_SIZE";
}

// show upload form
if (!isset($_POST['submit'])) {
  showUploadForm(join('',$errors));
}
