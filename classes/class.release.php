<?php
class Order{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='rolly_db';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
 /* Create New Order*/ 	
	public function new_order($cid){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$cid,$NOW,$NOW,'1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_orderdetails(client_id,orderdetails_date_added,orderdetails_time_added,orderdetails_status) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}

/* List Orders*/ 		
	public function list_order(){
		$sql="SELECT * FROM tbl_orderdetails";
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
/* Get Order ID*/ 	
    function get_order_id($id){
		$sql="SELECT order_id FROM tbl_orderdetails WHERE client_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_id = $q->fetchColumn();
		return $order_id;
	}
/* Get Client ID*/ 
	function get_client_id($id){
		$sql="SELECT client_id FROM tbl_orderdetails WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$client_id = $q->fetchColumn();
		return $client_id;
	}
/* Get Order Date Added*/     
    function get_order_dateadded($id){
		$sql="SELECT orderdetails_date_added FROM tbl_orderdetails WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_dateadded = $q->fetchColumn();
		return $order_dateadded;
	} 
/* Get Save Order*/ 
    function get_order_save($id){
		$sql="SELECT order_save FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_saved = $q->fetchColumn();
		return $order_saved;
	}
/* Get Order Status*/ 
        function get_order_status($id){
		$sql="SELECT order_status FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_status= $q->fetchColumn();
		return $order_status;
	}
/* List Order Items*/ 
	public function list_order_items($id){
		$sql="SELECT * FROM tbl_order WHERE order_id = $id";
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
    
/* Add Order Item*/ 
	public function new_order_item($orderid,$pid,$qty,$amount){
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$orderid,$pid,$qty,$amount],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_order(order_id,product_id,quantity,amount) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}
    
/* Get Product Order ID*/ 
    function get_product_order_id($pid){
		$sql="SELECT order_id FROM tbl_order WHERE product_id = :pid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['pid' => $pid]);
		$porder_id = $q->fetchColumn();
		return $porder_id;
	}
/* Get Product ID*/ 
    function get_product_id($id){
		$sql="SELECT product_id FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_id = $q->fetchColumn();
		return $product_id;
	}
    
/* Get Order Quantity*/ 
    function get_order_qty($id, $pid, $amnt){
		$sql="SELECT quantity FROM tbl_order WHERE order_id = :id AND product_id =:pid AND amount =:amnt";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id, 'pid' => $pid, 'amnt' => $amnt]);
		$order_qty = $q->fetchColumn();
		return $order_qty;
	}  
/* Get Amount*/ 
    function get_amount($id){
		$sql="SELECT amount FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$amount = $q->fetchColumn();
		return $amount;
	}
/* Get Sum of the amount */ 
    function get_sum($id){
		$sql="SELECT SUM(amount) FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$sum = $q->fetchColumn();
		return $sum;
	}
/* Save Order Items*/ 
	public function save_order_items($cid){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$status = 1;
		$sql = "UPDATE tbl_order SET order_status=:order_status WHERE order_id=$cid";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':order_status'=>$status));
		return true;
	}
/* Save Order*/ 
	public function save_to_order($cid){
		$sql="SELECT * FROM tbl_order WHERE order_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO tbl_order(rel_id, prod_id, prod_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($rel_id,$prod_id,$rel_qty));
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}
}