<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class News extends CI_Controller {  
       
       /**
     * get_news_by_filters
     */
    public function get_news_by_filters()
    {
        $news = $this->news_model->get_news_by_ajax();
        // var_dump($news);
        // exit;

        // # Return our data back to ajax with Json format (json_encode)
        // you must use "echo" for returning the result you want back to Ajax call
        echo json_encode($news);
    }
     
        
 }  