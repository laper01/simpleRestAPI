<?php 

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

require_once '../init.php';


function ubahData($data){

	$table = 'mahasiswa';
	$db = new Database();
	$query = "UPDATE mahasiswa SET 
					nama = :nama,
					nrp = :nrp,
					email = :email,
					jurusan = :jurusan
					WHERE id = :id";

	$db->query($query);
	$db->bind('nama', $data['nama']);
	$db->bind('nrp', $data['nrp']);
	$db->bind('email', $data['email']);
	$db->bind('jurusan', $data['jurusan']);
	$db->bind('id', $data['id']);

	$db->execute();

	return $db->rowCount();
}

	$data = json_decode(file_get_contents("php://input"),true);

if(isset($data)){
	ubahData($data);
	print_r("data ditambahkan");
}else{
	var_dump('null');
}
