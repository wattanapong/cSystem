<?php
$cs = Yii::app()->getClientScript();
$cs->registerCss('css','
		div.hero-unit{
		margin:0px auto;
		padding:20px;
}'
);
/* @var $this SiteController */
$this->pageTitle = Yii::app ()->name . ' - About';
$this->breadcrumbs = array (
		'About' 
);
?>
<div class="hero-unit text-center">
<h1>ผู้จัดทำ</h1>
<p>
<a href="www.ict.up.ac.th/wattanapong.su"><h3>นายวัฒนพงศ์ สุทธภักดิ์</h3></a><br>
	สาขาวิชาวิศวกรรมซอฟต์แวร์<br> คณะเทคโนโลยีสารสนเทศและการสื่อสาร<br>
	มหาวิทยาลัยพะเยา<br> email : wattanapong.su@outlook.com<br>
	โทร.0-5446-6666 <br>(2297).
</p>
</div>

<div class="hero-unit text-center">
<h2>ชื่อโครงการวิจัย</h2>
<p>พัฒนาระบบเสริมทักษะการพัฒนาโปรแกรมภาษาซี</p>
<p>Development practicing C-programming implementation system</p>
</div>

<div class="hero-unit text-center">
<h2>แหล่งงบประมาณวิจัย</h2>
<p>งบประมาณรายได้ คณะเทคโนโลยีสารสนเทศและการสื่อสาร
ประจำปีงบประมาณ 2557</p>
</div>

<div class="hero-unit text-center">
<h2>ประเภทงานวิจัย</h2>
<p>นวัตกรรม สิ่งประดิษฐ์</p>
</div>

<div class="hero-unit text-center">
<h2>วัตถุประสงค์ของงานวิจัย</h2>
<p>1 เพื่อออกแบบและพัฒนาระบบช่วยสอนของอาจารย์</p>
<p>2. เพื่อเพิ่มศักยภาพในการเรียน การสอน</p>
</div>