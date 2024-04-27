<?php
class DB {
    private $conn = NULL;
    private $result = NULL;

    function __construct(){
        try {
            $this->conn = new PDO("mysql:host=". HOST_DB .";dbname=". DB, USER_DB, PASS_DB);
            $this->conn->query('set names utf8');
        }catch(PDOException $ex) {
            echo $ex;
            exit;
        }
    }

    function getTable($tableName) {
        $stm = $this->conn->prepare("select * from $tableName");
		$stm->execute();
		return $stm->fetchAll();
    }
    
    function getTableClass($tableName) {
        $stm = $this->conn->prepare("SELECT MaLop, TenLop, SiSo, HoTenGV, TenMH, TenPH FROM $tableName INNER JOIN giaovien ON lophocphan.MaGV = giaovien.MaGV INNER JOIN monhoc ON lophocphan.MaMH = monhoc.MaMH INNER JOIN phonghoc ON lophocphan.MaPH = phonghoc.MaPH");
		$stm->execute();
		return $stm->fetchAll();
    }

    public function insertData($tbl) {
        $sql = "INSERT INTO $tbl() VALUES ()";
    }

    function selectQuery($sql, $arr=array())
	{
		$stm = $this->conn->prepare($sql);
		$stm->execute($arr);
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

    function updateQuery($sql, $arr=array()) {
        $stm = $this->conn->prepare($sql);
        $stm->execute($arr);

        return $stm->rowCount();
    }
}
