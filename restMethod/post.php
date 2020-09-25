<?php 

	header('Access-Control-Allow-Origin:*');
	header('Content-Type: application/json');

require_once '../init.php';
 $table = 'mahasiswa';

 $db = new Database();

$db->query('SELECT id, nama, nrp, email, jurusan FROM mahasiswa');
$hasils = $db->resultSet();
$num = $db->rowCount();

$post_arr = array();
$post_arr['data'] =array();
$post_arr['mee'] = 'jnjsa';

if($num>0){
	foreach ($hasils as $hasil) {
		extract($hasil);
		$post_item = array(
			'id'=>$id,
			'nama'=>$nama,
			'nrp'=>$nrp,
			'email'=>$email,
			'jurusan'=>$jurusan
		);
		// memasukan data
		array_push($post_arr['data'],$post_item);
	}
	// mengubah  ke json
	echo json_encode($post_arr);
}else{
	// tidak ada dat
	echo json_encode(array('message'=> 'No Data Found'));
}

