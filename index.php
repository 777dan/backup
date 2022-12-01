<?php
$path = 'site';
$backupPath = 'backup';
$fileList = scandir($path);
if (!is_dir($backupPath)) {
  mkdir($backupPath);
}
$zip = new ZipArchive();
$zipName = $backupPath . "/" . "b_" . date("d_m_Y") . ".zip";
$zip->open($zipName, ZIPARCHIVE::CREATE);
for ($i = 0; $i < count($fileList); $i++) {
  if ($fileList[$i] != '.' && $fileList[$i] != '..') {
    $zip->addFile($path . "/" . $fileList[$i], $fileList[$i]);
    echo "Добавляю файл " . $fileList[$i] . " в архив\n";
  } else {
    echo "Невозможно добавить файл " . $fileList[$i] . " в архив\n";
  }
}
$zip->close();