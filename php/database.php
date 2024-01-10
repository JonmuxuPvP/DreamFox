<?php
	/**
	 * Represents a SQL's Database in the PDO format
	 **/
	class Database
	{
		private $pdo;
		
		/**
		 * Construts a PDO object by calling this class' private method connect
		 **/
		public function __construct()
		{
			$this->pdo = $this->connect();
		}

		/**
		 * Connects the current PDO instance to MySQL's database
		 *
		 * This method should not be called from outside since it's already being used
		 * by the constructor of this class, hence the private visibility.
		 *
		 * @return pdo - Instance of a PDO object
		 **/
		private function connect()
		{
			$server = "localhost";
			$name = "dreamfox";
			$user = "jonmuxu";
			$password = "CSqRFEMxA7aTc8";

			$pdo;
			$connection = "mysql:host=$server;dbname=$name";

			try {
				$pdo = new PDO($connection, $user, $password);
				$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			} catch (PDOException $exception) {
				echo $exception;
			}

			return $pdo;
		}

		public function query($query) 
		{
			$statement = $query;
			$preparedStatement = $this->pdo->prepare($statement);
			$preparedStatement->execute();

			return $preparedStatement;
		}

		/**
		 * Closes PDO connection of the current instance.
		 * This method should always be called at the end of this instance's tasks.
		 **/
		public function close()
		{
			$this->pdo = null;
		}

		public function test() 
		{
			$statement = "SELECT * FROM user WHERE username = 'Jonmuxu'";
			$stmt = $this->pdo->prepare($statement);
			$stmt->execute();

			$row = $stmt->fetch();
			echo var_dump($row);
		}
	}
?>