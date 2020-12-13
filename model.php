<?php

	/**
	 * Model
	 */
	class Model
	{
		private $server = 'mysql:host=localhost; dbname=oop_crud';
		private $user = 'root';
		private $password = '';
		private $conn;
		public  $data  = array();
		function __construct()
		{
			try {
				$this->conn =  new Pdo($this->server,$this->user, $this->password);
			}
			catch (Exception $e) {
				//echo 'failed' . $e->getMessage();
				$this->data['message'] = "something went wrong";
				$this->data['failed'] = 'success';
				echo json_encode($this->data);
				exit;
			}
		}

		public function insert() {
			if (isset($_POST['insert'])) {
				if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['mobile'])) {
					if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['mobile'])) {
						$name = $_POST['name'];
						$email = $_POST['email'];
						$address = $_POST['address'];
						$mobile = $_POST['mobile'];
						$add_product = "INSERT INTO test(name, email, address, mobile) VALUES (:name, :email, :address, :mobile)";
						$insert = $this->conn->prepare($add_product);

						$sql = $insert->execute(['name' => $name, 'email' => $email, 'address' => $address, 'mobile' => $mobile]);
						if ($sql) {
							$this->data['message'] = "create successful";
						    $this->data['status'] = 'success';
							echo json_encode($this->data);
						}
					} else {
						$this->data['message'] = "empty";
					    $this->data['status'] = 'faild';
						echo json_encode($this->data);
					}
				}
			}
		}

		public getAllRecords() {

		}

		public getRecordsById($id) {
			
		}
		
 	}

$model = new Model();
$model->insert();

?>