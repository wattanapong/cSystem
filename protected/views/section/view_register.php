<?php if ($from!="view") die(); ?>
<div id="layer1">
		<div class="row-fluid">
			<div class="well bs-layout span6">
				<span class="bs-layout-header">อาจารย์ผู้สอน</span>
			<?php
			$pid1 = Yii::app ()->user->getPrivilegeId ( 'teacher' );
			
			$searchResult = $modelM->searchSelectUser ( array (
					$pid1 
			), "", $model->id, true, false );
			
			$members [$pid1] = array ();
			foreach ( $searchResult->data as $s ) {
				$members [$pid1] [] = $s->id;
			}
			
			$searchResult = $modelM->searchSelectUser ( array (
					$pid1 
			), "", $model->id, true, array (
					'pageSize' => 10 
			) );
			$this->renderPartial ( '/member/selectUser', array (
					'model' => $modelM,
					'pid' => $pid1,
					'pname' => 'teacher',
					'secid' => $model->id,
					'sec' => true,
					'searchResult' => $searchResult 
			) );
			?>
	</div>

			<div class="well bs-layout span6">
				<span class="bs-layout-header">นิสิตที่ลงทะเบียน</span>
			<?php
			$pid2 = Yii::app ()->user->getPrivilegeId ( 'student' );
			
			$searchResult = $modelM->searchSelectUser ( array (
					$pid2 
			), "", $model->id, true, false );
			
			$members [$pid2] = array ();
			foreach ( $searchResult->data as $s ) {
				$members [$pid2] [] = $s->id;
			}
			$searchResult = $modelM->searchSelectUser ( array (
					$pid2 
			), "", $model->id, true, array (
					'pageSize' => 10 
			) );
			$this->renderPartial ( '/member/selectUser', array (
					'model' => $modelM,
					'pid' => $pid2,
					'pname' => 'student',
					'opt' => 'hasCode',
					'secid' => $model->id,
					'sec' => true,
					'searchResult' => $searchResult 
			) );
			;
			?>
	</div>
		</div>

		<div class="row-fluid">
			<div class="well bs-layout span6">
				<span class="bs-layout-header">อาจารย์ทั้งหมด</span>
			<?php
			$searchResult = $modelM->searchSelectUser ( array (
					$pid1 
			), "", $model->id, false, array (
					'pageSize' => 10 
			), $members [$pid1] );
			$this->renderPartial ( '/member/selectUser', array (
					'model' => $modelM,
					'pid' => $pid1,
					'pname' => 'teacher',
					'secid' => $model->id,
					'sec' => false,
					'members' => $members [$pid1],
					'searchResult' => $searchResult 
			) );
			?>
	</div>

			<div class="well bs-layout span6">
				<span class="bs-layout-header">นิสิตทั้งหมด</span>
			<?php
			$searchResult = $modelM->searchSelectUser ( array (
					$pid2 
			), "hasCode", $model->id, false, array (
					'pageSize' => 10 
			), $members [$pid2] );
			$this->renderPartial ( '/member/selectUser', array (
					'model' => $modelM,
					'pid' => $pid2,
					'pname' => 'student',
					'opt' => 'hasCode',
					'secid' => $model->id,
					'sec' => false,
					'members' => $members [$pid2],
					'searchResult' => $searchResult 
			) );
			?>
	</div>
		</div>
	</div>