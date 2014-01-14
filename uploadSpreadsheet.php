<?php
$allowedExts = array("csv", "txt", "xls", "xlsx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

echo $allowedExts;
echo $temp;
echo $extension;

$filesize_limit = 20000; // file size limit of 20kB
if ((($_FILES["file"]["type"] == "text/csv")
|| ($_FILES["file"]["type"] == "text/txt")
|| ($_FILES["file"]["type"] == "application/vnd.ms-excel/xls")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet/xlsx"))
&& ($_FILES["file"]["size"] < $filesize_limit) 
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>