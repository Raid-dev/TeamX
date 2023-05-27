 <?php
class Database{
    private $dsn = "mysql:host=localhost;dbname=test_db";
    private $dbuser  = "root";
    private $dbpass = "";

    public $conn;
    
    public function __construct(){
        try{
            $this->conn = new PDO($this->dsn,$this->dbuser,$this->dbpass);
        }
        catch(PDOException $e){
            echo 'Error : '.$e->getMessage();
            echo "Salam";
        }

        return $this->conn;
    }
}

$ob = new Database();

?> 