<?php
/**
 * Created by PhpStorm.
 * User: mng05
 * Date: 8/12/2016
 * Time: 2:10 PM
 */

namespace APP\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;

class UploadComponent extends Component
{


    public function send($data){
        foreach($data as $file){
            $filename= $file['name'];
            $file_tmp_name=$file['tmp_name'];
            $dir= WWW_ROOT.'img'.DS.'uploads';
            $allowed = array('png','jpg','jpeg');
            if(!in_array(substr(strrchr( $filename,'.'),1),$allowed)){
                throw new InternalErrorException("Error Processing Request",1);
            }else if (is_uploaded_file($file_tmp_name)){
                move_uploaded_file($file_tmp_name,$dir.DS.Text::uuid().'-'.$filename);

            }
        }
    }
}