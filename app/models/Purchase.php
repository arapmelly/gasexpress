<?php

class Purchase extends \Eloquent {

	// Add your validation rules here
	
	protected $fillable = [];


	public function erporder(){

		return $this->belongsTo('Erporder');
	}

}