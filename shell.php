<?php
  $output = shell_exec('ls -lah');
  echo $output;

  $pwd = shell_exec('pwd');
  echo " <pre>$pwd</pre>";

  $check = file_exists("test");
if ($check) {
  $checkDir = is_dir("test");
  if ($checkDir) {
    echo "This exists and is a directory!";
  }
  else {
    echo "This exists, but it's not a directory.";
  }
}
else {
  mkdir("test");
}

$test = "test/";

for ($i=0; $i < 4; $i++) {
  $files[$i] = scandir($test, $i);
}

echo $files;
 ?>
