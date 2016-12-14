<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ],
            'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'Main',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Main',
                'action' => 'index'
            ]
        ]);

        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow();

    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] == 1) {
            return true;
        }

        // Default deny
        return false;
    }


    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $productObj = new ProductsController;
        $categories = $productObj->get_category();
        $this->set(compact('categories'));

        $this->loadModel('Brands');
        $global_brands = $this->Brands->find('list');
        $this->set(compact('global_brands'));
    }


    function uploadFiles($folder, $formdata, $itemId = null)
    {
        //this function is called from add and edit actions of HorseController.php with the following method call
        //$fileOK = $this->uploadFiles('img/horse_images', $this->data['Horse']['horse_image']);
        // setup dir names absolute and relative
        //WWW_ROOT is a CakePHP constant which returns the full path to the webroot folder
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

//    var_dump($formdata);

        // if itemId is set create an item folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types
        $permitted = array('image/gif', 'image/jpeg', 'image/jpg', 'image/png');

        // replace spaces with underscores
        for ($i = 0; $i < count($formdata); $i++) :
//            debug($i);
            $filename = str_replace(' ', '_', $formdata[$i]['name']);
            //        debug($formdata['name']);
            // assume filetype is false
            $typeOK = false;
            // check filetype is ok
            foreach ($permitted as $type) {
                if ($type == $formdata[$i]['type']) {
                    $typeOK = true;
                    break;
                }
            }
            // if file type ok upload the file
            if ($typeOK) {
                // switch based on error code
                switch ($formdata[$i]['error']) {
                    case 0:
                        // create full filename
                        $full_url = $folder_url . '/' . $formdata[$i]['name'];
                        $url = $rel_url . '/' . $formdata[$i]['name'];
                        // upload the file - overwrite existing file
//                        Check if file exist
//                        debug($url);

                        $name = $formdata[$i]['name'];
                        if (is_file($url)) {
//                            $arr = explode('.',$formdata[$i]['name']);
//                            $len = count($arr);

                            $actual_name = pathinfo($formdata[$i]['name'], PATHINFO_FILENAME);
                            $original_name = $actual_name;
                            $extension = pathinfo($formdata[$i]['name'], PATHINFO_EXTENSION);

                            $j = 1;
                            while (file_exists($rel_url . '/' . $actual_name . "." . $extension)) {
                                $actual_name = (string)$original_name . $j;
                                $name = $actual_name . "." . $extension;
                                $j++;
                            }
//                            $success = false;
//                            debug($url);
                        }

                        $formdata[$i]['name'] = $name;
                        $success = move_uploaded_file($formdata[$i]['tmp_name'], $rel_url . '/' . $name);

                        // if upload was successful
                        if ($success) {
                            //save the filename of the file
                            $result['urls'][] = $formdata[$i]['name'];
                        } else {
                            $result['errors'][] = "Error uploaded " . $formdata[$i]['name'] . "Please try again.";
                        }
                        break;
                    case 3:
                        // an error occurred
                        $result['errors'][] = "Error uploading " . $formdata[$i]['name'] . " Please try again.";
                        break;
                    default:
                        // an error occurred
                        $result['errors'][] = "System error uploading " . $formdata[$i]['name'] . "Contact webmaster.";
                        break;
                }
            } elseif ($formdata[$i]['error'] == 4) {
                // no file was selected for upload
                $result['nofiles'][] = "No file Selected";
            } else {
                // unacceptable file type
                $result['errors'][] = $formdata[$i]['name'] . " cannot be uploaded. Acceptable file types: gif, jpg, png.";
            }
        endfor;
        return $result;

    }
}