<?php /**
 * Description of uploader
 *
 * @author Rana
 */
class txtuploader {
    var $config;
    public function __construct($foldername) {
        $this->ci =& get_instance();
        $newFileName = $_FILES['userfile']['name'];
        $random = rand(10000, 99999);
        $fileExt = array_pop(explode(".", $newFileName));
        $filename = time()."-".$random.".".$fileExt;
        
        
        $this->config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/images/".$foldername."/",
                  'upload_url'      => base_url()."images/".$foldername."/",
                  'allowed_types'   => "gif|jpg|png|jpeg",
                  'overwrite'       => FALSE,
                  'max_size'        => "9048KB",
                  'file_name'       => $filename
                );
    }
    
    public function do_upload(){
        
        //$this->remove_dir($this->config["upload_path"], false); //remove all images
        
        $this->ci->load->library('upload', $this->config);
        if($this->ci->upload->do_upload())
        {   $this->ci->data['status']->message = "File Uploaded Successfully";
            $this->ci->data['status']->success = TRUE;
            $this->ci->data["uploaded_file"] = $this->ci->upload->data();
           
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