<?php
namespace app\core;

class imageLoadResize {
    protected $fileType;
    protected $fileName;
    protected $fileTmpName;
    protected $uploaddir;
    protected $image;
    protected $tmp;

    function __construct($fileName, $fileTmpName, $fileType) {

        $this->fileName = $fileName;
        $this->fileTmpName = $fileTmpName;
        $this->fileType = $fileType;
        $this->uploaddir =  'upload/'.$fileName;
    }

    function moveFile() {

        if(self::imgTypeCheck()) {
            if(!file_exists('upload/')) mkdir("upload/", 0777);
            if(!file_exists($this->uploaddir)) {
                if (!move_uploaded_file($this->fileTmpName, $this->uploaddir))
                {
                    throw new \Error('Ошибка! Не удалось загрузить файл на сервер!');
                }

            } else {
                echo '<h1>Изображение с таки именем существует, вы будете перенаправлены на главную.<h1>';
                header("refresh: 3; url=http://".$_SERVER['SERVER_NAME'].":8080/");//убрать порт
                die();
            }
        }
    }

    function imgResize() {

        list($width, $height) = getimagesize($this->uploaddir);
        $newwidth = 320;
        $newheight = 240;

        $newwidth = ($width > $newwidth) ? $newwidth : $width;
        $newheight = ($height > $newheight) ? $newheight : $height;

        $this->image = imagecreatefromstring(file_get_contents($this->uploaddir));
        $this->tmp = imagecreatetruecolor($newheight, $newheight);
        imagecopyresampled($this->tmp, $this->image, 0,0,0,0, $newwidth, $newheight, $width, $height);

        self::saveImg();
    }

    private function saveImg() {

        if ($this->fileType == 'image/jpeg') {
            imagejpeg($this->tmp, $this->uploaddir, 100);
        } elseif ($this->fileType == 'image/png') {
            imagepng($this->tmp, $this->uploaddir, 0);
        } elseif ($this->fileType == 'image/gif') {
            imagegif($this->tmp, $this->uploaddir);
        } else echo 'Неверный формат файла!';

        imagedestroy($this->image);
        imagedestroy($this->tmp);
    }

    private function imgTypeCheck () {

        return ($this->fileType == 'image/jpeg') || ($this->fileType == 'image/gif') || ($this->fileType == 'image/png');
    }

}