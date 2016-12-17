<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->deny();
		$this->Auth->allow(['index',  'view', 'brands']);
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($maincate=null, $cate=null, $subcate=null)
    {
        if($this->request->is('post')){
            $price=$this->request->data['price'];
            $arrPrice=explode('-', $price);
            $param_min_price=str_replace('$', '', trim($arrPrice[0]));
            $param_max_price=str_replace('$', '', trim($arrPrice[1]));
            
            $param_brands=isset($this->request->data['brands'])?$this->request->data['brands']:0;
            $param_styles=isset($this->request->data['styles'])?$this->request->data['styles']:0;
            $param_materials=isset($this->request->data['materials'])?$this->request->data['materials']:0;
            
        }
        
        if($subcate!==null){
			// Set category title
			$this->loadModel('Subcategory');
			$cate_info=$this->Subcategory->get($subcate);
			$cate_title=$cate_info['name'];

			// Set sub category list
			$subcate_list=array($subcate);
		}elseif($cate!==null){
			// Set category title
			$this->loadModel('Category');
			$cate_info=$this->Category->get($cate);
			$cate_title=$cate_info['cate_name'];

			// Set sub category list
			$this->loadModel('Subcategory');
			$subcategory=$this->Subcategory->find()
							->select(array('id'))
							->where(array('category_id'=>$cate));

			$subcate_list=array();
			if($subcategory->count()>0){
				foreach($subcategory as $sub){
					$subcate_list[]=$sub->id;
				}
			}else{
				$subcate_list[]=0;
			}
		}else{
            // Set category title
			$this->loadModel('Maincategory');
			$cate_info=$this->Maincategory->get($maincate);
			$cate_title=$cate_info['name'];

			// Set sub category list
			$this->loadModel('Category');
			$subcategory=$this->Category->find()
							->select(array('Subcategory.id'))
                            ->join([
                                'table'=>'subcategory', 
                                'alias'=>'subcategory', 
                                'conditions'=>['Category.id=Subcategory.category_id'],
                                'type'=> 'inner'
                            ])
							->where(array('maincategory_id'=>$maincate));

			$subcate_list=array();
			if($subcategory->count()>0){
				foreach($subcategory as $sub){
					$subcate_list[]=$sub->Subcategory['id'];
				}
			}else{
				$subcate_list[]=0;
			}
        }
        
        //Get max price
        $this->loadModel('Products');
        $max_price_result=$this->Products->find('all');
        $max_price_result->select(['max_price' => $max_price_result->func()->max('sale_price')])
                    ;
        $max_price=0;
        //echo '<pre>'; print_r($max_price_result); exit;
        foreach($max_price_result as $m){
            $max_price=$m->max_price;
        }
        
        //brand list
        $this->loadModel('Brands');
        $brands=$this->Brands->find('list');

        //material list
        $this->loadModel('Material');
        $materials=$this->Material->find('list');

        //style list
        $this->loadModel('Style');
        $styles=$this->Style->find('list');

		//Get Product list
		$products = $this->Products->find()
											->where(['active'=>1]);
		if(isset($subcate_list)){
			$products->where(array('subcategory_id IN'=>$subcate_list));
		}
        //echo $min_price;
        if(isset($param_min_price)){
            $products->where([
                'Products.sale_price BETWEEN :min_price AND :max_price'
            ])
            ->bind(':min_price', $param_min_price)
            ->bind(':max_price',   $param_max_price);
        }
        
        if($this->request->is('post')){
            if($param_brands){
                $products->where([
                    'Products.brands_id IN'=>$param_brands
                ]);
            }
            
            if($param_styles){
                $products->where([
                    'Products.style_id IN'=>$param_styles
                ]);
            }
            
            if($param_materials){
                $products->where([
                    'Products.material_id IN'=>$param_materials
                ]);
            }
        }
        
		//debug($products);
        $products = $this->paginate($products);

		$this->set('cate_title', $cate_title);
        $this->set(compact('products', 'brands', 'materials', 'styles', 'max_price', 'param_min_price', 'param_max_price'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Category');
        $this->loadModel('Style');
        $this->loadModel('Material');
        $product = $this->Products->find('all')
							->select($this->Products)
							->select($this->Category)
							->select($this->Products->Subcategory)
							->select($this->Products->Suppliers)
							->select($this->Products->Brands)
							->select($this->Material)
							->select($this->Style)
							->join(array(
								'table'=>'subcategory',
								'alias'=>'Subcategory',
								'conditions'=>array('Products.subcategory_id=Subcategory.id'),
								'type'=>'LEFT OUTER'
								))
							->join(array(
								'table'=>'category',
								'alias'=>'Category',
								'conditions'=>array('Category.id=Subcategory.category_id'),
								'type'=>'LEFT OUTER'
								))
							->join(array(
								'table'=>'suppliers',
								'alias'=>'suppliers',
								'conditions'=>array('Products.suppliers_id=suppliers.id'),
								'type'=>'LEFT OUTER'
							))
							->join(array(
								'table'=>'brands',
								'alias'=>'brands',
								'conditions'=>array('Products.brands_id=brands.id'),
								'type'=>'LEFT OUTER'
							))
                            ->join(array(
								'table'=>'material',
								'alias'=>'material',
								'conditions'=>array('Products.material_id=material.id'),
								'type'=>'LEFT OUTER'
							))
                            ->join(array(
								'table'=>'style',
								'alias'=>'style',
								'conditions'=>array('Products.style_id=style.id'),
								'type'=>'LEFT OUTER'
							))
							->where(array('Products.id'=>$id))
							->first();

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

	public function get_category(){
		$this->loadModel('Maincategory');
		$this->loadModel('Category');
		$this->loadModel('Subcategory');

		$maincate = $this->Maincategory->find()->order(array('id'=>'ASC'));
		$category = $this->Category->find()->order(array('id'=>'ASC'));
		$subcate = $this->Subcategory->find()->order(array('id'=>'ASC'));

		$result=array();
		if($maincate->count()>0){
			foreach($maincate as $main){
				$result[$main->id]['name']=$main->name;

				if($category->count()>0){
					foreach($category as $cate){
						if($main->id == $cate->maincategory_id){
							$result[$main->id]['children'][$cate->id]['name']= $cate->cate_name;

							if($subcate->count()>0){
								foreach($subcate as $sub){
									if($cate->id == $sub->category_id){
										$result[$main->id]['children'][$cate->id]['children'][]=array('id'=>$sub->id, 'name'=>$sub->name);
									}
								}
							}
						}
					}
				}
			}
		}

		// debug($result);
		return $result;
	}

	public function check_qty($id, $qty){
		$check=$this->Products->find()
			->where(array('id'=>$id, 'qty >= '=>$qty))
			->count();
		return $check;
	}

	public function adminIndex($maincate=null, $cate=null, $subcate=null)
    {
		$this->viewBuilder()->layout('admin');

		//Get Category list
		$category=$this->get_category();

		//Set conditions for product list

		if($subcate!==null){
			$subcate_list=array($subcate);
		}elseif($cate!==null){
			$this->loadModel('Subcategory');
			$subcategory=$this->Subcategory->find()
							->select(array('id'))
							->where(array('category_id'=>$cate));

			$subcate_list=array();
			if($subcategory->count()>0){
				foreach($subcategory as $sub){
					$subcate_list[]=$sub->id;
				}
			}else{
				$subcate_list[]=0;
			}
		}

		//Get Product list
		$products = $this->Products->find();
		if(isset($subcate_list)){
			$products->where(array('subcategory_id IN'=>$subcate_list));
		}
		//debug($products);
        $products = $this->paginate($products);

		$this->set('category', $category);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

	public function adminView($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $product = $this->Products->get($id);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->viewBuilder()->layout('admin');
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {



			/* Image Upload */
			$image=$this->request->data['image'];
			$image2=$this->request->data['image2'];
			$image3=$this->request->data['image3'];
			$image4=$this->request->data['image4'];
			$image5=$this->request->data['image5'];
			//print_r($image);exit;

			$target_dir = "img/uploads/";
			if(!$image['error']){
				$file_name=basename($image["name"]);
				$target_file = $target_dir . $file_name;

				// Check if file already exists
				if (file_exists($target_file)) {
					$arrFilename = explode('.', $file_name);
					$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
					$target_file = $target_dir . $file_name;
				}

				if (move_uploaded_file($image["tmp_name"], $target_file)) {
					$this->request->data['image']='uploads/'.$file_name;
				} else {
					echo "Sorry, there was an error uploading your file.";exit;
				}
			}

			if(!$image2['error']){
				$file_name=basename($image2["name"]);
				$target_file = $target_dir . $file_name;

				// Check if file already exists
				if (file_exists($target_file)) {
					$arrFilename = explode('.', $file_name);
					$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
					$target_file = $target_dir . $file_name;
				}

				if (move_uploaded_file($image2["tmp_name"], $target_file)) {
					$this->request->data['image2']='uploads/'.$file_name;
				} else {
					echo "Sorry, there was an error uploading your file.";exit;
				}
			}

			if(!$image3['error']){
				$file_name=basename($image3["name"]);
				$target_file = $target_dir . $file_name;

				// Check if file already exists
				if (file_exists($target_file)) {
					$arrFilename = explode('.', $file_name);
					$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
					$target_file = $target_dir . $file_name;
				}

				if (move_uploaded_file($image3["tmp_name"], $target_file)) {
					$this->request->data['image3']='uploads/'.$file_name;
				} else {
					echo "Sorry, there was an error uploading your file.";exit;
				}
			}

			if(!$image4['error']){
				$file_name=basename($image4["name"]);
				$target_file = $target_dir . $file_name;

				// Check if file already exists
				if (file_exists($target_file)) {
					$arrFilename = explode('.', $file_name);
					$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
					$target_file = $target_dir . $file_name;
				}

				if (move_uploaded_file($image4["tmp_name"], $target_file)) {
					$this->request->data['image4']='uploads/'.$file_name;
				} else {
					echo "Sorry, there was an error uploading your file.";exit;
				}
			}

			if(!$image5['error']){
				$file_name=basename($image5["name"]);
				$target_file = $target_dir . $file_name;

				// Check if file already exists
				if (file_exists($target_file)) {
					$arrFilename = explode('.', $file_name);
					$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
					$target_file = $target_dir . $file_name;
				}

				if (move_uploaded_file($image5["tmp_name"], $target_file)) {
					$this->request->data['image5']='uploads/'.$file_name;
				} else {
					echo "Sorry, there was an error uploading your file.";exit;
				}
			}
			//print_r($this->request->data);exit;

			$product = $this->Products->patchEntity($product, $this->request->data);

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'adminIndex']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }

				//subcategory list
				$this->loadModel('Subcategory');
				$subcategory=$this->Subcategory->find('list');

				//brand list
				$this->loadModel('Brands');
				$brands=$this->Brands->find('list');

				//supplier list
				$this->loadModel('Suppliers');
				$suppliers=$this->Suppliers->find('list');
        
                //material list
				$this->loadModel('Material');
				$materials=$this->Material->find('list');
        
                //style list
				$this->loadModel('Style');
				$styles=$this->Style->find('list');
        
                

        //$subcategory = $this->Products->Subcategory->find('list', ['limit' => 200]);
        $this->set(compact('product', 'subcategory', 'brands', 'suppliers', 'materials', 'styles'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $product = $this->Products->get($id, [
            'contain' => []
        ]);

				if ($this->request->is(['patch', 'post', 'put'])) {
					/* Image Upload */
					$image=$this->request->data['image'];
					$image2=$this->request->data['image2'];
					$image3=$this->request->data['image3'];
					$image4=$this->request->data['image4'];
					$image5=$this->request->data['image5'];
					//print_r($image);exit;

					$target_dir = "img/uploads/";
					if(!$image['error']){
						$file_name=basename($image["name"]);
						$target_file = $target_dir . $file_name;

						// Check if file already exists
						if (file_exists($target_file)) {
							$arrFilename = explode('.', $file_name);
							$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
							$target_file = $target_dir . $file_name;
						}

						if (move_uploaded_file($image["tmp_name"], $target_file)) {
							$this->request->data['image']='uploads/'.$file_name;
						} else {
							echo "Sorry, there was an error uploading your file.";exit;
						}
					}else{
						unset($this->request->data['image']);
					}

					if(!$image2['error']){
						$file_name=basename($image2["name"]);
						$target_file = $target_dir . $file_name;

						// Check if file already exists
						if (file_exists($target_file)) {
							$arrFilename = explode('.', $file_name);
							$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
							$target_file = $target_dir . $file_name;
						}

						if (move_uploaded_file($image2["tmp_name"], $target_file)) {
							$this->request->data['image2']='uploads/'.$file_name;
						} else {
							echo "Sorry, there was an error uploading your file.";exit;
						}
					}else{
						unset($this->request->data['image2']);
					}

					if(!$image3['error']){
						$file_name=basename($image3["name"]);
						$target_file = $target_dir . $file_name;

						// Check if file already exists
						if (file_exists($target_file)) {
							$arrFilename = explode('.', $file_name);
							$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
							$target_file = $target_dir . $file_name;
						}

						if (move_uploaded_file($image3["tmp_name"], $target_file)) {
							$this->request->data['image3']='uploads/'.$file_name;
						} else {
							echo "Sorry, there was an error uploading your file.";exit;
						}
					}else{
						unset($this->request->data['image3']);
					}

					if(!$image4['error']){
						$file_name=basename($image4["name"]);
						$target_file = $target_dir . $file_name;

						// Check if file already exists
						if (file_exists($target_file)) {
							$arrFilename = explode('.', $file_name);
							$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
							$target_file = $target_dir . $file_name;
						}

						if (move_uploaded_file($image4["tmp_name"], $target_file)) {
							$this->request->data['image4']='uploads/'.$file_name;
						} else {
							echo "Sorry, there was an error uploading your file.";exit;
						}
					}else{
						unset($this->request->data['image4']);
					}

					if(!$image5['error']){
						$file_name=basename($image5["name"]);
						$target_file = $target_dir . $file_name;

						// Check if file already exists
						if (file_exists($target_file)) {
							$arrFilename = explode('.', $file_name);
							$file_name = $arrFilename[0].'_'.time().'.'.$arrFilename[1];
							$target_file = $target_dir . $file_name;
						}

						if (move_uploaded_file($image5["tmp_name"], $target_file)) {
							$this->request->data['image5']='uploads/'.$file_name;
						} else {
							echo "Sorry, there was an error uploading your file.";exit;
						}
					}else{
						unset($this->request->data['image5']);
					}

            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'adminIndex']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }

				//subcategory list
				$this->loadModel('Subcategory');
				$subcategory=$this->Subcategory->find('list');

				//brand list
				$this->loadModel('Brands');
				$brands=$this->Brands->find('list');

				//supplier list
				$this->loadModel('Suppliers');
				$suppliers=$this->Suppliers->find('list');
        
                //material list
				$this->loadModel('Material');
				$materials=$this->Material->find('list');
        
                //style list
				$this->loadModel('Style');
				$styles=$this->Style->find('list');

        $this->set(compact('product', 'subcategory', 'brands', 'suppliers', 'materials', 'styles'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'adminIndex']);
    }

		public function brands($brand_id)
    {
			//Get Brands detail
			$this->loadModel('Brands');
			$brand=$this->Brands->get($brand_id);
    	//Get Product list
			$products = $this->Products->find()
											->where(['brands_id'=>$brand_id]);

	    $products = $this->paginate($products);

	        $this->set(compact('products', 'brand'));
	        $this->set('_serialize', ['products']);
	  }
}
