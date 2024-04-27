<?php
class TeacherController extends BaseController{
    public  $model, $action;
    function __construct(){
        $this->model = new TeacherModel;
        $action = getIndex('action', 'index');
		//print_r($_GET);
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
    }
    public function index(){
        $teachers = $this->model->getAll();
        

        return $this->view('teachers.index', [
            'pageTitle' => 'Giáo viên',
            'teachers' => $teachers
        ]);
    }

    function searchByName() {
        $teacher = postIndex("hotengv");
        if ($teacher != Null) {
            $data = $this->model->selectQuery("select * from giaovien where HoTenGV like ?", array($teacher));
        }
        else {
            $data = $this->model->getAll();
        }
        return $this->view('teachers.index', [
            'pageTitle' => 'Sinh vien',
            'teachers' => $data
        ]);
    }

    public function insert() {
        $arr = array();
        $arr[] = postIndex('MaGV');
        $arr[] = postIndex("HoTenGV");
        $arr[] = postIndex("GioiTinh");
        $arr[] = postIndex("ChuyenMon");
        $arr[] = postIndex("TrinhDo");
        $sql = "INSERT INTO giaovien VALUES (?, ?, ?, ?, ?)";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm giáo viên ". $arr[0];
            header("location:index.php?controller=TeacherController");
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
        $arr[] = getIndex("MaGV");
        if (!empty($arr)) {
            $sql = "DELETE FROM giaovien WHERE MaGV = ?";

            $n = $this->model->updateQuery($sql, $arr);
            
            if ($n == 1) {
                $_SESSION['info']="Đã thêm sách mã ". $arr[0];
                header("location:index.php?controller=TeacherController");
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
        $arr[] = postIndex("HoTenGV");
        $arr[] = postIndex("GioiTinh");
        $arr[] = postIndex("ChuyenMon");
        $arr[] = postIndex("TrinhDo");
        $arr[] = postIndex('MaGV');
        $sql = "UPDATE giaovien SET HoTenGV = ?, GioiTinh = ?, ChuyenMon = ?, TrinhDo = ? WHERE MaGV = ?";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm giáo viên ". $arr[0];
            header("location:index.php?controller=TeacherController");
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