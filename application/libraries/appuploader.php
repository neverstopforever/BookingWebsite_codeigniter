<?php /**
 * Description of uploader
 *
 * @author Rana
 */
class appuploader {
    var $config;
    public function __construct($filedetail) {
        $this->ci =& get_instance();
		$file_post_name=$filedetail['filename'];
		$foldername=$filedetail['foldername'];
		
		$newFileName = $_FILES[$file_post_name]['name'];
        $random = rand(10000, 99999);
        $fileExt = array_pop(explode(".", $newFileName));
        $filename = time()."-".$random.".".$fileExt;
        
        
        $this->config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/data/apps/".$foldername."/",
                  'upload_url'      => base_url()."data/".$foldername."/",
                  'allowed_types'   => "*",
                  'overwrite'       => FALSE,
                  //'max_size'        => "9000KB",
                  'file_name'       => $filename,
                  'file_post_name' => $file_post_name
                );
				
				
	
    }
	
    
    public function do_upload(){
        $this->config['upload_path']= $this->ci->session->userdata('upload_path');
		$this->config['upload_url']= $this->ci->session->userdata('upload_url');
		$this->config['file_name']= $this->ci->session->userdata('file_name'); 
		$this->config['file_post_name']= $this->ci->session->userdata('file_post_name');
		
		//exit;
        //$this->remove_dir($this->config["upload_path"], false); //remove all images
        $this->ci->load->library('upload', $this->config);
		$this->ci->upload->initialize($this->config);
		
        if($this->ci->upload->do_upload($this->config['file_post_name']))
        {
        	   $this->ci->data['status']->message = "File Uploaded Successfully";
            $this->ci->data['status']->success = TRUE;
            $this->ci->data["uploaded_file"] = $this->ci->upload->data();
           $this->ci->upload->initialize($this->config);
		//print_r($this->config);
        }
        else
        {
            $this->ci->data['status']->message = $this->ci->upload->display_errors();
            $this->ci->data['status']->success = FALSE;
        }
        
        return $this->ci->data;
    }
    
    function remove_dir($dir, $DeleteMe) {
        if(!$dh = @opendir($dir)) return;
        while (false !== ($obj = readdir($dh))) {
            if($obj=='.' || $obj=='..') continue;
            if (!@unlink($dir.'/'.$obj)) $this->remove_dir($dir.'/'.$obj, true);
        }
		
        closedir($dh);
        if ($DeleteMe){
            @rmdir($dir);
        }
    
    }
}
?>