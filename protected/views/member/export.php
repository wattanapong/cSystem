<?php
// Some data

$gradName = array('ปริญญาตรี','ปริญญาโท','ปริญญาเอก');
$g_lvl_id [0] = GraduateLevel::model ()->find ( array (
		'condition' => ' valueTh = \''.$gradName[0].'\''
) )->id;
$g_lvl_id [1] = GraduateLevel::model ()->find ( array (
		'condition' => ' valueTh = \''.$gradName[1].'\''
) )->id;
$g_lvl_id [2] = GraduateLevel::model ()->find ( array (
		'condition' => ' valueTh = \''.$gradName[2].'\''
) )->id;

$member = Member::model ()->findAll ();
$j = 0;
$hGrad = "";
$grad = array('','','');

foreach ( $member as $m ) {
	
	for($i = 0; $i < 3; $i ++) {
		foreach ( $m->graduate as $gm ) {
			if ($gm->graduatelevel_id == $g_lvl_id [$i]) {
				$grad [$i] = $gm->valueTh;
				$hGrad = $gradName[$i];
				break;
			}
		}
	}
	
	$memberList [$j++] = array (
			'prefix' => Prefix::model ()->findByPk ( $m->prefix_id )->valueTh,
			'name' => $m->name,
			'lName' => $m->surname,
			'position' => Position::model ()->findByPk ( $m->position_id )->valueTh,
			'jobDescription' => JobDescription::model ()->findByPk ( (Position::model ()->findByPk ( $m->position_id )->jobDescription_id) )->valueTh,
			'dateStart' => convertDate ( $m->date_start ),
			'dateRegistered' => convertDate ( $m->date_registered ),
			'grad' => $hGrad,
			'grad1' => $grad[0],
			'grad2' => $grad[1],
			'grad3' => $grad[2],
			'state' => Status::model()->findByPk($m->status_id)->value
	);
}

$r = new YiiReport ( array (
		'template' => 'memberList.xls' 
) );

$r->load ( array (
		array (
				'id' => 'h1',
				'data' => array (
						'name' => 'ทะเบียนประวัติบุคลากรคณะเภสัชศาสตร์' 
				) 
		),
		array (
				'id' => 'h2',
				'data' => array (
						'name' => 'มหาวิทยาลัยพะเยา' 
				) 
		),
		array (
				'id' => 'h3',
				'data' => array (
						'name' => 'สาขาวิชาบริบาลเภสัชกรรม' 
				) 
		),
		array (
				'id' => 'm',
				'repeat' => true,
				'data' => $memberList,
				'minRows' => 2 
		) 
) );

echo $r->render ( 'excel5', 'memberList' );
?>

