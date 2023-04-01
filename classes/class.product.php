<?php
class Product{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='rolly_db';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
/* Add a new Product */
	public function new_product($pname,$category,$price){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$pname,$category,$price,$NOW,$NOW,'1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_product (product_name, category_name, product_price, product_date_added, product_time_added, product_status) VALUES (?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}
 /* Update the product */   
	public function update_product($pname,$category,$price,$pid){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_product SET product_name=:product_name, category_name=: category_name,product_price=:product_price,product_date_updated=:product_date_updated,product_time_updated=:product_time_updated WHERE product_id=:product_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':product_name'=>$pname, ':category_name'=>$category,':product_price'=>$price,':product_date_updated'=>$NOW,':product_time_updated'=>$NOW,':product_id'=>$pid));
		return true;
	}
 /*List the products */ 
	public function list_product(){
		$sql="SELECT * FROM tbl_product";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}
 /* Get the Product ID */ 
	function get_product_id($pname){
		$sql="SELECT product_id FROM tbl_product WHERE product_name = :pname";	
		$q = $this->conn->prepare($sql);
		$q->execute(['pname' => $pname]);
		$product_id = $q->fetchColumn();
		return $product_id;
	}
 /* Get the Product Name */ 
	function get_product_name($pid){
		$sql="SELECT product_name FROM tbl_product WHERE product_id = :pid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['pid' => $pid]);
		$product_name = $q->fetchColumn();
		return $product_name;
	}
 /* Get the Product Category */ 
	function get_product_category($pid){
		$sql="SELECT category_name FROM tbl_product WHERE product_id = :pid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['pid' => $pid]);
		$category_name = $q->fetchColumn();
		return $category_name;
	}
 /* Get the Product Price */ 
	function get_product_price($pid){
		$sql="SELECT product_price FROM tbl_product WHERE product_id = :pid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['pid' => $pid]);
		$product_price = $q->fetchColumn();
		return $product_price;
	}
 /* Get the Product Status */ 
	function get_product_status($pid){
		$sql="SELECT product_status FROM tbl_product WHERE product_id = :pid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['pid' => $pid]);
		$product_status = $q->fetchColumn();
		return $product_status;
	}
 /* Change the Product Status */ 
    public function change_product_status($id,$status){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_products SET product_status=:product_status,product_date_updated=:product_date_updated,product_time_updated=:product_time_updated WHERE product_id=:product_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':product_status'=>$status,':product_date_updated'=>$NOW,':product_time_updated'=>$NOW,':product_id'=>$id));
		return true;
	}

}