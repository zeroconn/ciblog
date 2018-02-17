<?php

class Posts extends CI_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

	public function index($offset=0){
		$config['base_url'] = base_url().'posts/index/';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;


		$this->pagination->initialize($config);

		$data['title'] = 'Latest Posts';
		$data['posts'] = $this->Post_Model->get_posts(FALSE,$config['per_page'],$offset);

		$this->load->view('templates/header');
		$this->load->view('posts/index',$data);
		$this->load->view('templates/footer');
	}

	public function view($slug=NULL){
		$data['post'] = $this->Post_Model->get_posts($slug);
		$post_id = $data['post']['id'];
		$data['comments'] = $this->Comment_Model->get_comments($post_id);

		if(empty($data['post'])){
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view',$data);
		$this->load->view('templates/footer');
	}

	public function create(){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$data['title'] = 'Create Post';
		$data['categories'] = $this->Post_Model->get_categories();
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');
		//$this->form_validation->set_rules('userfile','File','required');

		if($this->form_validation->run()===FALSE){
			$this->load->view('templates/header');
			$this->load->view('posts/create',$data);
			$this->load->view('templates/footer');
		}else{
			//Upload Image
			$cat_image_name = $_FILES["userfile"]["name"];
			$config['upload_path'] = './assets/images/posts/';
			//$config['upload_path'] = './assets/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 4096;
			$config['max_width'] = 1600;
			$config['max_height'] = 1600;
			$config['attributes'] = array('class'=>'pagination-link');

			$this->load->library('upload',$config);

			if(!$this->upload->do_upload('userfile',FALSE)){
				$errors = array('error' => $this->upload->display_errors());
				$cat_image_name  = 'noimage.png';
			}else{
				$data = array('upload_data' => $this->upload->data());
				$category_image_ipad = $data['upload_data']['file_name'];
				$img_extension = $data['upload_data']['file_ext'];

			}

			$this->Post_Model->create_post($cat_image_name);
			$this->session->set_flashdata('post_created','Your post has been created');
			redirect('posts');
		}
	}

	public function delete($id){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$this->Post_Model->delete_post($id);
		$this->session->set_flashdata('post_deleted','Your post has been deleted');
		redirect('posts');
	}

	public function edit($slug){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$data['post'] = $this->Post_Model->get_posts($slug);

		if($this->session->userdata('user_id')!=$this->Post_Model->get_posts($slug)['user_id']){
			redirect('posts');
		}

		$data['categories'] = $this->Post_Model->get_categories();

		if(empty($data['post'])){
			show_404();
		}

		$data['title'] = 'Edit Post';

		$this->load->view('templates/header');
		$this->load->view('posts/edit',$data);
		$this->load->view('templates/footer');
	}

	public function update(){
		/*echo $this->input->post('id');
		echo "<pre>";*/
		$currentPost = $this->Post_Model->get_posts($_POST['slug']);
		
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		if($_FILES["userfile"]["name"]){

			//Upload Image
			$cat_image_name = $_FILES["userfile"]["name"];
			$config['upload_path'] = './assets/images/posts/';
			//$config['upload_path'] = './assets/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 4096;
			$config['max_width'] = 1600;
			$config['max_height'] = 1600;
			$config['attributes'] = array('class'=>'pagination-link');

			$this->load->library('upload',$config);

			if(!$this->upload->do_upload('userfile',FALSE)){
				$errors = array('error' => $this->upload->display_errors());
				$cat_image_name  = $currentPost['post_image'];
			}else{
				$data = array('upload_data' => $this->upload->data());
				$category_image_ipad = $data['upload_data']['file_name'];
				$img_extension = $data['upload_data']['file_ext'];
				$post_image = $_FILES["userfile"]["name"];

				$yol = '././assets/images/posts/'.$currentPost['post_image'];

				if(unlink($yol)){
					//echo "silindi";
				}else{
					echo "silinmedi";
				}
				//exit;
			}

		}else{
			$cat_image_name  = $currentPost['post_image'];
		}




		$this->Post_Model->update_post($cat_image_name);
		$this->session->set_flashdata('post_updated','Your post has been updated');
		redirect('posts');
	}
}