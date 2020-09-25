<?php 

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

require_once '../init.php';


$post_arr = array();
$post_arr['data'] =array();

function hapusData($data){

	$table = 'mahasiswa';
	$db = new Database();

	$query = "DELETE FROM mahasiswa WHERE id = :id";
	$db->query($query);
	$db->bind('id', $data['id']);
	
	$db->execute();

	return $db->rowCount();
}

	$data = json_decode(file_get_contents("php://input"),true);

if(isset($data)){
	hapusData($data);
	print_r("data dihapus");
}else{
	var_dump('null');
}
