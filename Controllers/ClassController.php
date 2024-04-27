<?php
class ClassController extends BaseController{
    public  $model, $action;
    public $subjects, $departments, $teachers;
    function __construct(){
        $this->model = new ClassModel;
        $this->teachers = $this->model->getTeacher();
        $this->subjects = $this->model->getSubject();
        $this->departments = $this->model->getDepartment();
        $action = getIndex('action', 'index');
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
		
    }
    public function index(){
        $classes = $this->model->getAll();
        

        return $this->view('classes.index', [
            'pageTitle' => 'Lớp học phần',
            'classes' => $classes,
            'subjects' => $this->subjects,
            'departments' => $this->departments,
            'teachers' => $this->teachers
        ]);
    }
    function searchByName() {
        $class = postIndex("TenLop");
        if ($class != Null) {
            $data = $this->model->selectQuery("select * from lophocphan where TenLop like ?", array($class));
        }
        else {
            $data = $this->model->getAll();
        }
        return $this->view('classes.index', [
            'pageTitle' => 'Lớp học phần',
            'classes' => $data
        ]);
    }
    public function insert() {
        $arr = array();
        $arr[] = postIndex('MaLop');
        $arr[] = postIndex("TenLop");
        $arr[] = postIndex("SiSo");
        $arr[] = postIndex("MaGV");
        $arr[] = postIndex("MaMH");
        $arr[] = postIndex("MaPH");
        $sql = "INSERT INTO lophocphan VALUES (?, ?, ?, ?, ?, ?)";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm lớp học phần ". $arr[0];
            header("location:index.php?controller=ClassController");
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
        $arr[] = getIndex("MaLop");
        if (!empty($arr)) {
            $sql = "DELETE FROM lophocphan WHERE MaLop = ?";

            $n = $this->model->updateQuery($sql, $arr);
            
            if ($n == 1) {
                $_SESSION['info']="Đã thêm sách mã ". $arr[0];
                header("location:index.php?controller=ClassController");
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
        
        $arr[] = postIndex("TenLop");
        $arr[] = postIndex("SiSo");
        $arr[] = postIndex("MaGV");
        $arr[] = postIndex("MaMH");
        $arr[] = postIndex("MaPH");
        $arr[] = postIndex('MaLop');
        $sql = "UPDATE lophocphan SET TenLop = ?, SiSo = ?, MaGV = ?, MaMH = ?, MaPH = ? WHERE MaLop = ?";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm lớp học phần ". $arr[0];
            header("location:index.php?controller=ClassController");
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