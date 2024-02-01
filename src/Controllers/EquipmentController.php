<?php
require_once 'AppController.php';
#namespace Controllers;

class EquipmentController extends AppController {
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '../public/uploads/';

    private $messages = [];

    public function addEquipment(): void
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
            #TODO
            #return $this->render()
        }
        $this->render('addEquipment', ['messages' => $this->messages]);
    }

    public function validate(array $file) : bool {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large for destination file system';
            return false;
        }

        if( !(isset($file['type'])) && !in_array($file['type'], self::SUPPORTED_TYPES) ){
            $this->messages[] = 'File type is not supported by this system';
            return false;
        }
        return true;
    }

}