<?php

// Datbase Access Object

// include the class file
require_once 'dto.php';

// User Database Object
// would be used to check login, signing up, modify user info etc.
class UserDao {
	// Database MySQL server information
	//private $servername = "awsdb.crqri6xcz2ih.ap-northeast-2.rds.amazonaws.com"; // AWS RDS server
	//private $username = "root";
	//private $password = "ywmj2015";
	//private $dbname = "awsdb";

	// connection object
	private $pdo = null;

	// Connectiong method
	public function connect() {
		try{
			$this->pdo = new PDO('mysql:host=awsdb.crqri6xcz2ih.ap-northeast-2.rds.amazonaws.com;dbname=awsdb;charset=utf8', 'root', 'ywmj2015');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}catch (PDOException $e){
			print $e->getMessage();
		}
	}

	// Disconnectiong method
	public function disconnect() {
		$this->pdo = null;
	}

	// would be used to add users
	function insert($u) {
		$this->connect(); // connect

		try { // insert data

			$sql = "INSERT INTO User(`id`, `pw`, `name`) VALUES (?, ?, ?);";

			$stm = $this->pdo->prepare($sql);

			$stm->bindValue(1, $u->getId());
			$stm->bindValue(2, $u->getPw());
			$stm->bindValue(3, $u->getName());

			$stm->execute();

		} catch (PDOException $e){						
			print $e->getMessage();
		}

		$this->disconnect(); // disconnect
	}

	// would be used to check login
	public function select($id) {
		$u = null;
		$this->connect(); // connect db

		try{
			$sql = "SELECT * FROM User WHERE id=?";
			
			$stm = $this->pdo->prepare($sql);

			$stm->bindValue(1, $id);

			$stm->execute();

			$cnt = $stm->rowCount();
			// if the row's count is over 0
			if($cnt > 0 ) {
				$row = $stm->fetch(PDO::FETCH_ASSOC);
				$u = new User($row['id'], $row['pw'], $row['name']);	

				$u->setTopLength($row['top']);
				$u->setShoulder($row['shoulder']);
				$u->setChest($row['chest']);
				$u->setArmhole($row['armhole']);
				$u->setArm($row['arm']);

				$u->setBottomLength($row['bottom']);
				$u->setWaist($row['waist']);
				$u->setHip($row['hip']);
				$u->setThigh($row['thigh']);
				$u->setCrotch($row['crotch']);

				$u->setHeight($row['height']);
				$u->setWeight($row['weight']);
			}

		} catch (PDOException $e){
			print $e->getMessage();
		}

		$this->disconnect(); // disconnect

		return $u; // return user instance
	}

	// Update method
	// would be used to edit user information
	public function update($u) {
		$this->connect();

		try {
			$sql = "UPDATE User set pw=?, name=?, top=?, shoulder=?, chest=?, armhole=?, arm=?, bottom=?, waist=?, hip=?, thigh=?, crotch=?, height=?, weight=? WHERE id=?";

			$stm = $this->pdo->prepare($sql);

			$stm->bindValue(1, $u->getPw());
			$stm->bindValue(2, $u->getName());

			$stm->bindValue(3, $u->getTopLength());
			$stm->bindValue(4, $u->getShoulder());
			$stm->bindValue(5, $u->getChest());
			$stm->bindValue(6, $u->getArmhole());
			$stm->bindValue(7, $u->getArm());

			$stm->bindValue(8, $u->getBottomLength());
			$stm->bindValue(9, $u->getWaist());
			$stm->bindValue(10, $u->getHip());
			$stm->bindValue(11, $u->getThigh());
			$stm->bindValue(12, $u->getCrotch());

			$stm->bindValue(13, $u->getHeight());
			$stm->bindValue(14, $u->getWeight());

			$stm->bindValue(15, $u->getId());

			$stm->execute();

		} catch (PDOException $e){									
			print $e->getMessage();
		}

		$this->disconnect();
	}

}

// Product database connection object
class ProductDao {

	// connection object
	private $pdo = null;

	// Connectiong method
	public function connect() {
		try{
			$this->pdo = new PDO('mysql:host=awsdb.crqri6xcz2ih.ap-northeast-2.rds.amazonaws.com;dbname=awsdb;charset=utf8', 'root', 'ywmj2015');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}catch (PDOException $e){
			print $e->getMessage();
		}
	}

	// Disconnectiong method
	public function disconnect() {
		$this->pdo = null;
	}

	// would be used to get product detail info
	public function select($id) {
		$p = null;
		$this->connect(); // connect db

		try{
			$sql = "SELECT * FROM Product WHERE id=?";
			
			$stm = $this->pdo->prepare($sql);

			$stm->bindValue(1, $id);

			$stm->execute();

			$cnt = $stm->rowCount();

			// if the row's count is over 0
			if($cnt > 0 ) {
				$row = $stm->fetch(PDO::FETCH_ASSOC);
				$p = new Product($row['id'], $row['name'], $row['price']);	
			}

		} catch (PDOException $e){
			print $e->getMessage();
		}

		$this->disconnect(); // disconnect

		return $p; // return product instance
	}

	// would be used to get all products
	public function selectAll() {
		$arr = new ProductList();
		$this->connect();
		$sql = "SELECT * FROM Product";

		try {
			$result = $this->pdo->query($sql);
			$cnt = $result->rowCount();

			if($cnt > 0) {
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$p = new Product($row['id'], $row['name'], $row['price']);
					$arr->add($p);
				}
			}

		} catch (PDOException $e) {
			print $e->getMessage();
		}

		$this->disconnect();

		return $arr;
	}

	public function selectAllTop() {
		$arr = new ProductList();
		$this->connect();
		$sql = "SELECT * FROM Product WHERE id LIKE 'T%'";

		try {
			$result = $this->pdo->query($sql);
			$cnt = $result->rowCount();

			if($cnt > 0) {
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$t = new Product($row['id'], $row['name'], $row['price']);
					$arr->add($t);
				}
			}

		} catch (PDOException $e) {
			print $e->getMessage();
		}

		$this->disconnect();

		return $arr;
	}	

	public function selectAllBottom() {
		$arr = new ProductList();
		$this->connect();
		$sql = "SELECT * FROM Product WHERE id LIKE 'B%'";

		try {
			$result = $this->pdo->query($sql);
			$cnt = $result->rowCount();

			if($cnt > 0) {
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$b = new Product($row['id'], $row['name'], $row['price']);
					$arr->add($b);
				}
			}

		} catch (PDOException $e) {
			print $e->getMessage();
		}

		$this->disconnect();

		return $arr;
	}		

	public function selectAllDress() {
		$arr = new ProductList();
		$this->connect();
		$sql = "SELECT * FROM Product WHERE id LIKE 'D%'";

		try {
			$result = $this->pdo->query($sql);
			$cnt = $result->rowCount();

			if($cnt > 0) {
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$d = new Product($row['id'], $row['name'], $row['price']);
					$arr->add($d);
				}
			}

		} catch (PDOException $e) {
			print $e->getMessage();
		}

		$this->disconnect();

		return $arr;
	}	

	public function selectTopDetailAll($pid, $pname, $price) {
		$arr = new TopDetailList();
		$this->connect();
		$sql = "SELECT * FROM Top WHERE id= '" . $pid ."'";

		try {
			$result = $this->pdo->query($sql);
			$cnt = $result->rowCount();

			if($cnt > 0) {
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$t = new Top($pid, $pname, $price, $row['size'], $row['toplength'], $row['shoulder'], $row['chest'], $row['armhole'], $row['arm'], $row['instock']);
					$arr->add($t);
				}
			} 

		} catch(PDOException $e) {
			print $e->getMessage();
		}

		$this->disconnect();

		return $arr;
	}

	public function selectDressDetailAll($pid, $pname, $price) {
		$arr = new DressDetailList();
		$this->connect();
		$sql = "SELECT * FROM Dress WHERE id= '" . $pid ."'";

		try {
			$result = $this->pdo->query($sql);
			$cnt = $result->rowCount();

			if($cnt > 0) {
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$d = new Dress($pid, $pname, $price, $row['size'], $row['dresslength'], $row['shoulder'], $row['chest'], $row['armhole'], $row['arm'], $row['instock']);
					$arr->add($d);
				}
			} 

		} catch(PDOException $e) {
			print $e->getMessage();
		}

		$this->disconnect();

		return $arr;
	}

	public function selectBottomDetailAll($pid, $pname, $price) {
		$arr = new DressDetailList();
		$this->connect();
		$sql = "SELECT * FROM Bottom WHERE id= '" . $pid ."'";

		try {
			$result = $this->pdo->query($sql);
			$cnt = $result->rowCount();

			if($cnt > 0) {
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$b = new Bottom($pid, $pname, $price, $row['size'], $row['bottomlength'], $row['waist'], $row['hip'], $row['thigh'], $row['crotch'], $row['instock']);
					$arr->add($b);
				}
			} 

		} catch(PDOException $e) {
			print $e->getMessage();
		}

		$this->disconnect();

		return $arr;
	}	

}

?>