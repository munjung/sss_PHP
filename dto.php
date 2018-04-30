<?php
// DTO.php
// Data transfer object
// this file contents all classes which would be used in the whole program.

// User Class
// instance would be created when user login and kept in session
class User {
	// Basic information
	private $id;
	private $pw;
	private $name;

	// Size information
	private $topLength;
	private $shoulder;
	private $chest;
	private $armhole;
	private $arm;

	private $bottomLength;
	private $waist;
	private $hip;
	private $thigh;
	private $crotch;

	private $height;
	private $weight;

	// Construct
	public function __construct($id, $pw, $name) {
		$this->id = $id;
		$this->pw = $pw;
		$this->name = $name;
	}

	// Construct
	/*
	public function __construct($id, $pw, $name, $topLength, $shoulder, $chest, $armhole, $arm, $bottomLength, $waist, $hip, $thigh, $crotch, $height, $weight) {
		$this->id = $id;
		$this->pw = $pw;
		$this->name = $name;

		$this->topLength = $topLength;
		$this->shoulder = $shoulder;
		$this->chest = $chest;
		$this->armhole = $armhole;
		$this->arm = $arm;

		$this->bottomLength = $bottomLength;
		$this->waist = $waist;
		$this->hip = $hip;
		$this->thigh = $thigh;
		$this->crotch $crotch;

		$this->height = $height;
		$this->weight = $weight;
	}*/

	// Getters and setters
	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setPw($pw) {
		$this->pw = $pw;
	}

	public function getPw() {
		return $this->pw;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setTopLength($topLength) {
		$this->topLength = $topLength;
	}

	public function getTopLength() {
		return $this->topLength;
	}

	public function setShoulder($shoulder) {
		$this->shoulder = $shoulder;
	}

	public function getShoulder() {
		return $this->shoulder;
	}

	public function setChest($chest) {
		$this->chest = $chest;
	}

	public function getChest() {
		return $this->chest;
	}

	public function setArmhole($armhole) {
		$this->armhole = $armhole;
	}

	public function getArmhole() {
		return $this->armhole;
	}

	public function setArm($arm) {
		$this->arm = $arm;
	}

	public function getArm() {
		return $this->arm;
	}

	public function setBottomLength($bottomLength) {
		$this->bottomLength = $bottomLength;
	}

	public function getBottomLength() {
		return $this->bottomLength;
	}

	public function setWaist($waist) {
		$this->waist = $waist;
	}

	public function getWaist() {
		return $this->waist;
	}

	public function setHip($hip) {
		$this->hip = $hip;
	}

	public function getHip() {
		return $this->hip;
	}

	public function setThigh($thigh) {
		$this->thigh = $thigh;
	}

	public function getThigh() {
		return $this->thigh;
	}

	public function setCrotch($crotch) {
		$this->crotch = $crotch;
	}

	public function getCrotch() {
		return $this->crotch;
	}	

	public function setHeight($height) {
		$this->height = $height;
	}

	public function getHeight() {
		return $this->height;
	}	

	public function setWeight($weight) {
		$this->weight = $weight;
	}

	public function getWeight() {
		return $this->weight;
	}		
}

// Top Class
class Top {
	// id+size = primary key
	private $pid;
	private $pname;
	private $price;

	// Size information
	private $size;

	private $topLength;
	private $shoulder;
	private $chest;
	private $armhole;
	private $arm;

	private $instock;

	// Constructor
	public function __construct($pid, $pname, $price, $size, $topLength, $shoulder, $chest, $armhole, $arm, $instock) {
		$this->pid = $pid;
		$this->pname = $pname;
		$this->price = $price;

		$this->size = $size;

		$this->topLength = $topLength;
		$this->shoulder = $shoulder;
		$this->chest = $chest;
		$this->armhole = $armhole;
		$this->arm = $arm;

		$this->instock = $instock;
	}

	public function setId($pid) {
		$this->pid = $pid;
	}

	public function getId() {
		return $this->pid;
	}

	public function setName($pname) {
		$this->pname = $pname;
	}

	public function getName() {
		return $this->pname;
	}

	public function setPrice($price) {
		$this->price = $price;
	}

	public function getPrice() {
		return $this->price;
	}

	public function setSize($size) {
		$this->size = $size;
	}

	public function getSize() {
		return $this->size;
	}	

	public function setTopLength($topLength) {
		$this->topLength = $topLength;
	}

	public function getTopLength() {
		return $this->topLength;
	}

	public function setShoulder($shoulder) {
		$this->shoulder = $shoulder;
	}

	public function getShoulder() {
		return $this->shoulder;
	}

	public function setChest($chest) {
		$this->chest = $chest;
	}

	public function getChest() {
		return $this->chest;
	}

	public function setArmhole($armhole) {
		$this->armhole = $armhole;
	}

	public function getArmhole() {
		return $this->armhole;
	}

	public function setArm($arm) {
		$this->arm = $arm;
	}

	public function getArm() {
		return $this->arm;
	}	

	public function setInStock($instock) {
		$this->instock = $instock;
	}

	public function getInStock() {
		return $this->instock;
	}
}

// Bottom Class
class Bottom {

	private $id;
	private $name;
	private $price;
	private $size;

	// Size information
	private $bottomLength;
	private $waist;
	private $hip;
	private $thigh;
	private $crotch;

	private $instock;

	// Constructor
	public function __construct($id, $name, $price, $size, $bottomLength, $waist, $hip, $thigh, $crotch, $instock) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->size = $size;

		$this->bottomLength = $bottomLength;
		$this->waist = $waist;
		$this->hip = $hip;
		$this->thigh = $thigh;
		$this->crotch = $crotch;

		$this->instock = $instock;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}	

	public function setPrice($price) {
		$this->price = $price;
	}

	public function getPrice() {
		return $this->price;
	}	

	public function setSize($size) {
		$this->size = $size;
	}

	public function getSize() {
		return $this->size;
	}

	public function setBottomLength($bottomLength) {
		$this->bottomLength = $bottomLength;
	}

	public function getBottomLength() {
		return $this->bottomLength;
	}

	public function setWaist($waist) {
		$this->waist = $waist;
	}

	public function getWaist() {
		return $this->waist;
	}

	public function setHip($hip) {
		$this->hip = $hip;
	}

	public function getHip() {
		return $this->hip;
	}

	public function setThigh($thigh) {
		$this->thigh = $thigh;
	}

	public function getThigh() {
		return $this->thigh;
	}

	public function setCrotch($crotch) {
		$this->crotch = $crotch;
	}

	public function getCrotch() {
		return $this->crotch;
	}	

	public function setInStock($instock) {
		$this->instock = $instock;
	}

	public function getInStock() {
		return $this->instock;
	}

}

// Dress Class
class Dress {
	private $pid;
	private $pname;
	private $price;

	private $size;

	// Size information
	private $dressLength;
	private $shoulder;
	private $chest;
	private $armhole;
	private $arm;

	private $instock;
 
	// Constructor
	public function __construct($pid, $pname, $price, $size, $dressLength, $shoulder, $chest, $armhole, $arm, $instock) {
		$this->pid = $pid;
		$this->pname = $pname;
		$this->price = $price;
		$this->size = $size;

		$this->dressLength = $dressLength;
		$this->shoulder = $shoulder;
		$this->chest = $chest;
		$this->armhole = $armhole;
		$this->arm = $arm;

		$this->instock = $instock;
	}

	public function setId($pid) {
		$this->pid = $pid;
	}

	public function getId() {
		return $this->pid;
	}

	public function setName($pname) {
		$this->pname = $pname;
	}

	public function getName() {
		return $this->pname;
	}	

	public function setPrice($price) {
		$this->price = $price;
	}

	public function getPrice() {
		return $this->price;
	}	

	public function setSize($size) {
		$this->size = $size;
	}

	public function getSize() {
		return $this->size;
	}	

	public function setDressLength($dressLength) {
		$this->dressLength = $dressLength;
	}

	public function getDressLength() {
		return $this->dressLength;
	}

	public function setShoulder($shoulder) {
		$this->shoulder = $shoulder;
	}

	public function getShoulder() {
		return $this->shoulder;
	}

	public function setChest($chest) {
		$this->chest = $chest;
	}

	public function getChest() {
		return $this->chest;
	}

	public function setArmhole($armhole) {
		$this->armhole = $armhole;
	}

	public function getArmhole() {
		return $this->armhole;
	}

	public function setArm($arm) {
		$this->arm = $arm;
	}

	public function getArm() {
		return $this->arm;
	}	

	public function setInStock($instock) {
		$this->instock = $instock;
	}

	public function getInStock() {
		return $this->instock;
	}
}

// Product Class 
// Would be used to display all clothes on the main page
class Product {

	private $id;
	private $name;
	private $price;

	// Constructor
	public function __construct($id, $name, $price) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
	}

	// Getters and sstter
	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setName($name) {
		$this->id = $id;
	}

	public function getName() {
		return $this->name;
	}

	public function setPrice($price) {
		$this->price = $price;
	}

	public function getPrice() {
		return $this->price;
	}

}

class ProductList {
	private $productList;

	public function __construct() {
		$this->productList = array();
	}

	public function add($p) {
		array_push($this->productList, $p);
	}

	public function get($index) {
		return $this->productList[$index];
	}

	public function getLength() {
		return count($this->productList);
	}
}

class TopList{
	private $topList;

	public function __construct($topList) {
		$this->topList = $topList;
	}

	// push a Top instance at the end of the array
	public function add($t){
		array_push($this->topList, $t);
	}

	public function get($index) {
		return $this->topList[$index];
	}
}

// classes for detail page
class TopDetailList{
	private $topDetailList;

	public function __construct() {
		$this->topDetailList = array();
	}

	// push a Top instance at the end of the array
	public function add($td){
		array_push($this->topDetailList, $td);
	}

	public function get($index) {
		return $this->topDetailList[$index];
	}

	public function getLength() {
		return count($this->topDetailList);
	}
}

class DressDetailList {
	private $dressDetailList;

	public function __construct() {
		$this->dressDetailList = array();
	}

	// push a Dress instance at the end of the array
	public function add($dd) {
		array_push($this->dressDetailList, $dd);
	}

	public function get($index) {
		return $this->dressDetailList[$index];
	}

	public function getLength() {
		return count($this->dressDetailList);
	}
}

class BottomDetailList {
	private $bottomDetailLst;

	public function __construct() {
		$this->bottomDetailList = array();
	}

	// push a Bottom instance at the end of the array
	public function add($bd) {
		array_push($this->bottomDetailList, $bd);
	}

	public function get($index) {
		return $this->bottomDetailList[$index];
	}

	public function getLength() {
		return count($this->bottomDetailList);
	}
}

?>