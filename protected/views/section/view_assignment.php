<?php if ($from!="view") die(); ?>
<div id="layer2">
		<div class="row-fluid">
			<div class="well bs-layout span12">
				<span class="bs-layout-header">Assignment ในหมู่เรียนนี้</span>
				<?php 
				$searchResult = $modelAiS->searchSection();
				$this->renderPartial('/assignmentInSection/manage',
					 array('model'=> $modelAiS,'searchResult'=>$searchResult,'secid'=>$model->id));
				?>
			</div>
		</div>

		<div class="row-fluid">			
			<div class="well bs-layout">
				<span class="bs-layout-header">เพิ่ม Assignment ในหมู่เรียนนี้</span>
				<?php 
				$this->renderPartial('/assignmentInSection/outerCreate',
					 array('model'=> $modelAiS,'modelA'=> $modelA,'secid'=>$model->id));
			?>
			</div>
		</div>
		
		<div class="row-fluid" id="asm-sec">			
			<div class="well bs-layout">
				<span class="bs-layout-header">เลือก Assignment</span>
				<?php 
				$searchResult = $modelA->search();
				$this->renderPartial('/assignment/outerSelect',
						array('model'=> $modelA,'searchResult'=>$searchResult,'secid'=>$model->id));
				?>
			</div>
		</div>
	</div>