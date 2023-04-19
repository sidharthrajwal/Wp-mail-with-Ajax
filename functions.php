
function training_requirement(){
	
	$fname = str_replace("\'", "'", $_POST['fname']);
	$lname = str_replace("\'", "'", $_POST['lname']);
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$textmessage = $_POST['message'];
	$pagename = $_POST['pagename'];
	$author = $_POST['author'];
	$user = get_user_by('login', $author);
	/*** Admin Mail ****/
	 $currentyear = date("Y");
	 $adminName = get_user_meta($user->data->ID,'first_name');
	 if(!empty($adminName[0])){
		 $locationAdmin = $adminName[0];
	 }else{
	   $locationAdmin = $username;
	 }
	if ( ! function_exists( 'wp_handle_upload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}
	// $file = $_FILES['my-file'];
	//  $attachments = array($file['tmp_name']);

$uploadedfile = $_FILES['file_data'];
print_r($uploadedfile);
$upload_overrides = array( 'test_form' => false );
 print_r($upload_overrides);
$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
	print_r($movefile);
 $attachments = $movefile;
	 $headers = "Content-Type: text/html; charset=UTF-8'" . "\r\n";
	 $headers .= 'From: Searsol <info@searsol.com>' . "\r\n";
	 $subject = "New request from ".$pagename." Page Contact Form";
	 $fileUrl = get_template_directory_uri()."/template/email/training-requirement.html";
	 $message = file_get_contents($fileUrl);
	 $message = str_replace('{{LOGOURL}}', site_url().'/wp-content/uploads/2021/02/main-logo.png', $message);
	 $msg = "Here are the details.";
	 $message = str_replace('{{NAME}}', $locationAdmin, $message);
	 $message = str_replace('{{msg}}', $msg, $message);
	 $message = str_replace('{{fname}}', $fname, $message);
	 $message = str_replace('{{lname}}', $lname, $message);
	 $message = str_replace('{{email}}', $email, $message);
	 $message = str_replace('{{phone}}', $phone, $message);
	 $message = str_replace('{{textmessage}}', $textmessage, $message);
	 $message = str_replace('{{location}}', $location, $message);
	 $message = str_replace('{{CURRENTYEAR}}', $currentyear, $message);
	if(!empty ($uploadedfile[ 'name' ])){
     $message = str_replace('{{file_data}}', "File Attached :".$uploadedfile[ 'name' ], $message);
	}
	else{
		
		$message = str_replace('{{file_data}}', "File Not Attached" , $message);
	}
	 $headers = "Content-Type: text/html; charset=UTF-8";
	
// 	 $return = wp_mail($user->data->user_email, $subject, $message, $headers);
	 $return = wp_mail("shalini@weoinfotech.com", $subject, $message, $headers, $attachments[ 'file' ]);
// 	print_r($return);
 
	 if($return == true){
		 $response['message'] = 'true'; 
	 }else{
		 $response['message'] = 'false'; 
	 }
	 
	 /** Email End **/
	echo json_encode($response);
	exit;
 
 }
 add_action( 'wp_ajax_training_requirement', 'training_requirement' ); 
 add_action( 'wp_ajax_nopriv_training_requirement', 'training_requirement' );
