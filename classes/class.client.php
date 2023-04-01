<?php
class Client{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='rolly_db';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_client($name,$address,$number,$access){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$name, $address,$number,$NOW,$NOW,'1', $access],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_client (client_name, client_address, client_number, client_date_added, client_time_added, client_status, client_access) VALUES (?,?,?,?,?,?,?)");
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
    /* Change Client Status */
public function change_client_status($cid,$status){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_client SET client_status=:client_status,client_date_updated=:client_date_updated,client_time_updated=:client_time_updated WHERE client_id=:client_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':client_status'=>$status,':client_date_updated'=>$NOW,':client_time_updated'=>$NOW,':client_id'=>$cid));
		return true;
	}
/* List Clients */
	public function list_client(){
		$sql="SELECT * FROM tbl_client";
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
    /* Update Clients */
    	public function update_client($name,$number,$address,$access,$client_id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_client SET client_name=:client_name,client_number=:client_number,client_address=:client_address,client_date_updated=:client_date_updated,client_time_updated=:client_time_updated,client_access=:client_access WHERE client_id=:client_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':client_name'=>$name, ':client_address'=>$address,':client_number'=>$number,':client_date_updated'=>$NOW,':client_time_updated'=>$NOW,':client_access'=>$access,':client_id'=>$client_id));
		return true;
	}
/* Get the Client ID */
	function get_client_id($address){
		$sql="SELECT client_id FROM tbl_client WHERE client_address = :address";	
		$q = $this->conn->prepare($sql);
		$q->execute(['address' => $address]);
		$user_id = $q->fetchColumn();
		return $client_id;
	}
/* Get the Client Address */
	function get_client_address($cid){
		$sql="SELECT client_address FROM tbl_client WHERE client_id = :cid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['cid' => $cid]);
		$client_address = $q->fetchColumn();
		return $client_address;
	}
/* Get the Client Name */
	function get_client_name($cid){
		$sql="SELECT client_name FROM tbl_client WHERE client_id = :cid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['cid' => $cid]);
		$client_name = $q->fetchColumn();
		return $client_name;
	}
/* Get the Client Number */
	function get_client_number($cid){
		$sql="SELECT client_number FROM tbl_client WHERE client_id = :cid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['cid' => $cid]);
		$client_number = $q->fetchColumn();
		return $client_number;
	}
/* Get the Client Access */
	function get_client_access($cid){
		$sql="SELECT client_access FROM tbl_client WHERE client_id = :cid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['cid' => $cid]);
		$client_access = $q->fetchColumn();
		return $client_access;
	}
/* Get the Client Status */
	function get_client_status($cid){
		$sql="SELECT client_status FROM tbl_client WHERE client_id = :cid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['cid' => $cid]);
		$client_status = $q->fetchColumn();
		return $client_status;
	}
}