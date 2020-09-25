<?php 

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require_once '../init.php';


$post_arr = array();
$post_arr['data'] =array();
function tambahData($data){
	$table = 'mahasiswa';
	$db = new Database();
	$query = "INSERT INTO mahasiswa VALUES 
	('',:nama, :nrp, :email, :jurusan)";

	$db->query($query);
	$db->bind('nama', $data['nama']);
	$db->bind('nrp', $data['nrp']);
	$db->bind('email', $data['email']);
	$db->bind('jurusan', $data['jurusan']);

	$db->execute();

	return $db->rowCount();
}

$data = json_decode(file_get_contents("php://input"),true);

if(isset($data)){
	tambahData($data);
	print_r("data ditambahkan");
}else{
	var_dump('null');
}
