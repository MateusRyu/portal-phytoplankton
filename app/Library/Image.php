<?php
namespace App\Library;

class Image{
    public static $uploadDir;
    public static $uploadPublicDir;

    function __construct()
    {
        $config = require(APP_DIR.'/configurations/app.php');
        self::$uploadDir = APP_DIR.'/../public'.$config["uploadDir"];
        self::$uploadPublicDir = $config["uploadDir"];
    }

    public function save($filename, $file): bool
    {
        $folderPath = self::$uploadDir;
        if (!file_exists($folderPath)) {
            mkdir($folderPath);
        }
        $filePath = $folderPath.'/'.$filename;
        $success = move_uploaded_file($file, $filePath);
        return $success;
    }

    public function delete(string $path): bool
    {        
        if (file_exists(self::$uploadDir.'/'.$path)) {
            return unlink(self::$uploadDir.'/'.$path);
        }
        return false;
    }        
}