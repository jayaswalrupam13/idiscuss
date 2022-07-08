<?php
class process{
	
	function getCategories($obj){
		$sql = "SELECT * FROM categories";
		return $obj->selectNoWhere($sql);
	}
	
	function checkUserExists($obj, $email){
		$sql = "SELECT * FROM users WHERE user_email = :user_email";
		$array = ['user_email' => $email];
		$result = $obj->selectWhereClause($sql,$array);
		if(!empty($result)){
			return $result[0];
		}
		return false;
	}
	
	function checkValidUser($obj, $email){
		$email = password_verify($userPwd, $dbPwd);
		$sql = "SELECT * FROM users WHERE user_email = :user_email AND user_pass = :user_pass";
		$array = ['user_email' => $email];
		$result = $obj->selectWhereClause($sql,$array);
		if(!empty($result)){
			return $result[0];
		}
		return false;
	}
	
	function getCategoryDetails($obj,$details){
		$sql    = "SELECT * FROM categories WHERE category_id = :category_id";
		$array  = ['category_id' => $details['category_id']];
		$result = $obj->selectWhereClause($sql,$array);
		if(!empty($result)){
			return $result[0];
		}
		return false;		
	}
	
	function getFewThreadsByCategory($obj,$details,$start,$offset){
		$sql   = "SELECT user_email,`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp` FROM `threads`,users WHERE thread_cat_id = :thread_cat_id AND threads.thread_user_id = users.user_id  LIMIT :start, :offset";		
		$array = ['thread_cat_id' => $details['category_id'],'start' => $start,'offset' => $offset];		
		return $obj->selectWhereClause($sql,$array);	
		//$stmt->bind_param("sss", $firstname, $lastname, $email);		
	}
	
	function getAllThreadsByCategory($obj,$details){
		$sql   = "SELECT user_email,`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp` FROM `threads`,users WHERE thread_cat_id = :thread_cat_id AND threads.thread_user_id = users.user_id";
		$array = ['thread_cat_id' => $details['category_id']];		
		return $obj->selectWhereClause($sql,$array);		
	}
	
	function countThreadsByCategory($obj,$details){
		$sql    = "SELECT count(1) FROM `threads` WHERE thread_cat_id = :thread_cat_id";
		$array  = ['thread_cat_id' => $details['category_id']];		
		$result = $obj->selectWhereClause($sql,$array);	
		return $result[0]['count(1)'];	
	}
	
	function getThreadDetails($obj,$details){
		$sql   = "SELECT user_email,`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp` FROM threads,users WHERE thread_id = :thread_id AND threads.thread_user_id = users.user_id";
		$array = ['thread_id' => $details['thread_id']];
		$result = $obj->selectWhereClause($sql,$array);
		if(!empty($result)){
			return $result[0];
		}
		return false;
	}
	
	function getComments($obj,$details){
		$sql   = "SELECT user_email,`comment_id`, `comment_content`, `comment_time`, `thread_id`, `comment_by` FROM `comments`,users WHERE thread_id = :thread_id AND comments.comment_by = users.user_id";
		$array = ['thread_id' => $details['thread_id']];
		return $obj->selectWhereClause($sql,$array);		
	}
	
	function createThread($obj,$input){
		$array = array('thread_title' => $input['thread_title'], 'thread_desc' => $input['thread_desc'], 'thread_cat_id' => $input['category_id'], 'thread_user_id' => $input['thread_user_id']);
		$sql = "INSERT INTO threads(thread_title, thread_desc, thread_cat_id, thread_user_id) VALUES( :thread_title, :thread_desc, :thread_cat_id, :thread_user_id)";
	    return $obj->insertPrepare($sql,$array);
	}
	
	function addComment($obj,$input){
		$array = array('comment_content' => $input['comment'], 'comment_by' => $input['comment_by'], 'thread_id' => $input['thread_id']);
		$sql = "INSERT INTO comments(comment_content, comment_by, thread_id) VALUES( :comment_content, :comment_by, :thread_id)";
	    return $obj->insertPrepare($sql,$array);
	}
	
	function addUser($obj,$input){
		$input['user_pass'] = password_hash($input['user_pass'],PASSWORD_DEFAULT);
		$array = array('user_email' => $input['user_email'], 'user_pass' => $input['user_pass']);
		$sql = "INSERT INTO users(user_email, user_pass) VALUES( :user_email, :user_pass)";
	    return $obj->insertPrepare($sql,$array);
	}
	
	function matchPwd($userPwd,$dbPwd){		
		return password_verify($userPwd, $dbPwd);
	}
	
	function searchByUser($obj,$keyword){
		$array = ['keyword' => $keyword];	
		$sql   = "SELECT * FROM `threads` WHERE match (thread_title, thread_desc) against (:keyword)";	
		return $obj->selectWhereClause($sql,$array);
	}
	
	function checkCaptcha(){
		global $G_CAPTCHA_API_URL, $G_CAPTCHA_SECRET_KEY;		
		$remoteIP       = $_SERVER['REMOTE_ADDR'];
		$verifyResponse = file_get_contents($G_CAPTCHA_API_URL.'secret=' . $G_CAPTCHA_SECRET_KEY . '&response=' . $_POST['g-recaptcha-response'] .'&remoteip=' .$remoteIP);
		$responseData   = json_decode($verifyResponse, true);
		return $responseData;
	}
	
	function validation($value){

        $value = mysqli_real_escape_string($this->conn, trim(stripslashes(strip_tags($value))));
        return $value;

    }
	
	
}
?>