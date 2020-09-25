<?php 
	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');


require_once '../init.php';


$post_arr = array();
$post_arr['data'] =array();


function getById($nama){
	$table = 'mahasiswa';
	$db = new Database();
	$db->query('SELECT id, nama, nrp, email FROM ' . $table . ' WHERE nama LIKE :nama');
	// idnya ndak langsung di masukin untuk menghindari sql injection
	$db->bind('nama',"%$nama%");
	// var_dump($db->resultSet());
	return $db->resultSet();

}

if(isset($_GET['id'])){
	$hasils = getById($_GET['id']);

	foreach ($hasils as $hasil) {
		extract($hasil);
		$post_item = array(
			'id'=>$id,
			'nama'=>$nama,
			'nrp'=>$nrp,
			'email'=>$email
		);
		// memasukan data
		array_push($post_arr['data'],$post_item);
	}
	// mengubah  ke json
	print_r(json_encode($post_arr));
}else{
	// tidak ada dat
	echo json_encode(array('message'=> 'No Data Found'));
}

