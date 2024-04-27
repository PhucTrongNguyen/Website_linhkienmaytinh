<?php
class SchedulController extends BaseController{
    public  $model, $action;
    function __construct(){
        $this->model = new SchedulModel;
        $action = getIndex('action', 'index');
		//print_r($_GET);
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
		
    }
    public function index(){
        $scheduls = $this->model->getAll();
        

        return $this->view('scheduls.index', [
            'pageTitle' => 'Buổi học',
            'scheduls' => $scheduls
        ]);
    }
    function searchByName() {
        $schedul = postIndex("TenBH");
        if ($schedul != Null) {
            $data = $this->model->selectQuery("select * from buoihoc where TenBH like ?", array($schedul));
        }
        else {
            $data = $this->model->getAll();
        }
        return $this->view('scheduls.index', [
            'pageTitle' => 'Buổi học',
            'scheduls' => $data
        ]);
    }
    public function insert() {
        $arr = array();
        $arr[] = postIndex('MaBH');
        $arr[] = postIndex("GioBD");
        $arr[] = postIndex("GioKT");
        $arr[] = postIndex("NgayBD");
        $arr[] = postIndex("NgayKT");
        $sql = "INSERT INTO buoihoc VALUES (?, ?, ?, ?, ?)";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm lớp học phần ". $arr[0];
            header("location:index.php?controller=SchedulController");
        }
        else {
            $_SESSION['info']="Lỗi thêm... ". $arr[0];
            ?>
            <script type="text/javascript">
                window.history.go(-1);
            </script>
            <?php
        }
    }
    public function delete() {
        $arr = array();
        $arr[] = getIndex("MaBH");
        if (!empty($arr)) {
            $sql = "DELETE FROM buoihoc WHERE MaBH = ?";

            $n = $this->model->updateQuery($sql, $arr);
            
            if ($n == 1) {
                $_SESSION['info']="Đã thêm sách mã ". $arr[0];
                header("location:index.php?controller=SchedulController");
            }
            else {
                $_SESSION['info']="Lỗi thêm... ". $arr[0];
                ?>
                <script type="text/javascript">
                    window.history.go(-1);
                </script>
                <?php
            }
        }
    }
    public function update() {
        $arr = array();
        
        $arr[] = postIndex("GioBD");
        $arr[] = postIndex("GioKT");
        $arr[] = postIndex("NgayBD");
        $arr[] = postIndex("NgayKT");
        $arr[] = postIndex('MaBH');
        $sql = "UPDATE buoihoc SET GioBD = ?, GioKT = ?, NgayBD = ?, NgayKT = ? WHERE MaBH = ?";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm lớp học phần ". $arr[0];
            header("location:index.php?controller=SchedulController");
        }
        else {
            $_SESSION['info']="Lỗi thêm... ". $arr[0];
            ?>
            <script type="text/javascript">
                window.history.go(-1);
            </script>
            <?php
        }
    }
}