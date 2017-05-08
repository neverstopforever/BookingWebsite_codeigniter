<?php
	/**
	* Author:Shoaib Anwar shoaib@codenterprise.com
	* This Class is the main factory class
	* It Contains all the factories such Rest, DB
	* It is also used to get the controller for specific component
	
	**/
	
	class factory{	
		static function getCEServiceInstance(){
			/*
			
				This function returns the CE SErvice instance
				you can make rest calls to Items service using this instance
			*/
			
			try{
				self::importRestClasses();
				$rest=new RestSkeleton(REST_CE_BASE_URL,REST_DEFAULT_HEADER);
				return $rest;
				
			}catch (Exception $e){
				
				throw new Exception($e->getMessage());
			}
		}
		

		static function importRestClasses(){				
				require_once("rest/rest.php");
				require_once("rest/restskeleton.php");
		}
		
		
		
		static function array_implode( $glue, $separator, $array ) {
			if ( ! is_array( $array ) ) return $array;
			$string = array();
			foreach ( $array as $key => $val ) {
				if ( is_array( $val ) )
					$val = implode( ',', $val );
				$string[] = "{$key}{$glue}{$val}";
				
			}
			return implode( $separator, $string );
    
		}
		
		static  function getBrowser()
	    {
	        $u_agent = $_SERVER['HTTP_USER_AGENT'];
	        $ub = '';
	        if(preg_match('/MSIE/i',$u_agent))
	        {
	            $ub = "IE";
	        }
	        elseif(preg_match('/Firefox/i',$u_agent))
	        {
	            $ub = "Mozilla";
	        }
	        elseif(preg_match('/Safari/i',$u_agent))
	        {
	            $ub = "Apple";
	        }
	        elseif(preg_match('/Chrome/i',$u_agent))
	        {
	            $ub = "Chrome";
	        }
	        elseif(preg_match('/Flock/i',$u_agent))
	         {
	            $ub = "Flock";
	        }
	        elseif(preg_match('/Opera/i',$u_agent))
	        {
	            $ub = "Opera";
	        }
	        elseif(preg_match('/Netscape/i',$u_agent))
	        {
	            $ub = "Netscape";
	        } 
	        return $ub;
	    }
		
	}
?>
