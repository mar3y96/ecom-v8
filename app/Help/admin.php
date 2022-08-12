<?php 
	function settings(){
		return \App\Model\Admin\Setting::orderBy('id','desc')->first();
	}
?>