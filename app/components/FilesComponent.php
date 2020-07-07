<?php


namespace app\components;


class FilesComponent
{
    private static $maxSize = 1024 * 1024 * 10;
    private static $error;

    public static function uploadImage($file, $folder = "uploads")
    {
        $path = $file['tmp_name'];
        $error = $file['error'];
        $size = $file['size'];
        $name = $file['name'];

        if (self::checkError($path, $error)) {

            if ($size > self::$maxSize) {
                return ['status' => false, 'error' => 'Файл слишком большой'];
            }
            else {
                $md5name = md5(time() . $name);

                if (move_uploaded_file($path, HOME . $folder . "/" . $md5name)) {
                    return ['status' => true, 'filename' => $md5name];
                }
                else {
                    return ['status' => false, 'error' => 'Ошибка при загрузке файла!'];
                }
            }
        }
        else {
            return ['status' => false, 'error' => self::$error];
        }
    }

    public static function deleteFile($filename, $folder = "uploads")
    {
        return unlink(HOME . $folder . "/{$filename}");
    }

    private static function checkError($path, $error)
    {
        if ($error !== UPLOAD_ERR_OK || !is_uploaded_file($path)) {

            $errorMessages = [
                UPLOAD_ERR_INI_SIZE   => 'Файл слишком большой',
                UPLOAD_ERR_FORM_SIZE  => 'Файл слишком большой',
                UPLOAD_ERR_PARTIAL    => 'Загружаемый файл повреждён.',
                UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
                UPLOAD_ERR_NO_TMP_DIR => 'Ошибка #1001',
                UPLOAD_ERR_CANT_WRITE => 'Не удалось сохранить файл на сервере.',
                UPLOAD_ERR_EXTENSION  => 'Сервер прервал загрузку файла.',
            ];

            $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

            $outputMessage = isset($errorMessages[$error]) ? $errorMessages[$error] : $unknownMessage;

            self::$error = $outputMessage;

            return false;
        }
        else {
            return true;
        }
    }
}