<?php
    /**
     *	Author	  :  Shuvankar Paul
     *	Email     :  shuvoenr@gmail.com
     *	Website :  https://www.equaltrue.com
     */

	$jsonString = file_get_contents('application.json');
	$data = json_decode($jsonString, true);

	if (is_ajax()) {

	    if (isset($_POST["d_index"])) {
	    	
	    	$index = $_POST["d_index"];
	    	array_splice($data['application'], $index, 1);
			$newJsonString = json_encode($data);
			file_put_contents('application.json', $newJsonString);
	    }

	    //-- Edit Action
	    if (isset($_POST["e_index"])) {
            $index = $_POST["e_index"];

            $application_name_edit = $_POST["application_name_edit"];
            $category_edit = $_POST["category_edit"];
            $link_edit = $_POST["link_edit"];

            $data['application'][$index]['application_name']      = $application_name_edit;
            $data['application'][$index]['category']      = $category_edit;
            $data['application'][$index]['link'] = $link_edit;

            $newJsonString = json_encode($data);
            file_put_contents('application.json', $newJsonString);
	    }


	    if (isset($_POST["a_index"])) {
            $add_application_name      = $_POST["add_application_name"];
            $add_category      = $_POST["add_category"];
            $add_link = $_POST["add_link"];

            $already_status = 0;

            foreach ($data['application'] as $value) {
                if($value['link'] == $add_link){
                    $already_status = 1;
                    break;
                }else{
                    $already_status = 0;
                }
            }

            if($already_status == 1){
                echo false;
            }else{
                $new_data = array('application_name' => $add_application_name, 'category' => $add_category, 'link' => $add_link);
                array_push($data['application'], $new_data);
                $newJsonString = json_encode($data);
                file_put_contents('application.json', $newJsonString);
                echo true;
            }
    	}
	}



	//Detect AjAx Request
	function is_ajax() {
	    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}