<?php
// database connection link
require_once("../../common_files/php/database.php");
$get_data = "SELECT brand_name,brand_domain,brand_email,brand_address,brand_mobile_1,brand_mobile_2,brand_twitter,brand_facebook,brand_instagram,brand_whatsapp,brand_privacy,brand_about,brand_cookie,brand_terms  FROM branding";
$response = $db -> query($get_data);
if($response){
$data = $response -> fetch_assoc();
echo json_encode($data);
}else{
echo "Theare Is No Data";
}

?>