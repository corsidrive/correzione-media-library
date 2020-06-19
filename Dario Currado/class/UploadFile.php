<?php


class UploadFile {

    
    /*** attributo name del campo del tipo file */

    private $name; 

    private $destination;

    private $allowedTypes;

    public function __construct($name, $destination, $allowedTypes = []) {
        $this->name = $name;
        $this->destination = $destination;
        $this->allowedTypes = $allowedTypes;


        if(file_exists($destination)){

            // TODO: mette eccezione se non trova il file

            // Crea la cartella o Eccesione

        }
    }


    public function doUpload()
    {
       
            $original_file_name = $_FILES[$this->name]['name'];
            $error = $_FILES[$this->name]['error'];
            $tmp_path = $_FILES[$this->name]['tmp_name'];
            $destination = $this->destination. $original_file_name;
        
            if ($error == UPLOAD_ERR_OK) {
                
                
                move_uploaded_file($tmp_path, $destination);

                
            
            } else{

                // TODO eccezione per errore di caricamento

            }
        
          
        
    
        
    }

    public function isAllowed()
    {


        if(count($this->allowedTypes) != 0){

            $currenttype = $_FILES[$this->name]['type'];


            return in_array($currenttype, $this->allowedTypes);


        } else{

            return true;
        }


    }


}