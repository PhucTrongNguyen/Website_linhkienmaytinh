<?php
class DepartmentController extends BaseController{
    public  $model, $action;
    function __construct(){
        $this->loadModel('DepartmentModel');
        $this->model = new DepartmentModel;
        $action = getIndex('action', 'index');
		//print_r($_GET);
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
		
    }
    public function index(){
        $departments = $this->model->getAll();
        

        return $this->view('departments.index', [
            'pageTitle' => 'Phòng học',
            'departments' => $departments
        ]);
    }
    function searchByName() {
        $department = postIndex("TenPhong");
        if ($department != Null) {
            $data = $this->model->selectQuery("select * from phonghoc where TenPhong like ?", array($department));
        }
        else {
            $data = $this->model->getAll();
        }
        return $this->view('departments.index', [
            'pageTitle' => 'Phòng học',
            'departments' => $data
        ]);
    }
    public function insert() {
        $arr = array();
        $arr[] = postIndex('MaPH');
        $arr[] = postIndex("TenPH");
        $arr[] = postIndex("DiaChiPH");
        $sql = "INSERT INTO phonghoc VALUES (?, ?, ?)";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm lớp học phần ". $arr[0];
            header("location:index.php?controller=DepartmentController");
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
        $arr[] = getIndex("MaPH");
        if (!empty($arr)) {
            $sql = "DELETE FROM phonghoc WHERE MaPH = ?";

            $n = $this->model->updateQuery($sql, $arr);
            
            if ($n == 1) {
                $_SESSION['info']="Đã thêm sách mã ". $arr[0];
                header("location:index.php?controller=DepartmentController");
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
        
        $arr[] = postIndex("TenPH");
        $arr[] = postIndex("DiaChiPH");
        $arr[] = postIndex('MaPH');
        $sql = "UPDATE phonghoc SET TenPH = ?, DiaChiPH = ? WHERE MaPH = ?";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm lớp học phần ". $arr[0];
            header("location:index.php?controller=DepartmentController");
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