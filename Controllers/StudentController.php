<?php
class StudentController extends BaseController{
    public  $model, $action;
    public $class;
    function __construct(){
        $this->model = new StudentModel;
        $action = getIndex('action', 'index');
        $this->class = $this->model->getClass();
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
		
    }
    public function index(){
        $students = $this->model->getAll();
        

        return $this->view('students.index', [
            'pageTitle' => 'Sinh viên',
            'students' => $students,
            'classes' => $this->class
        ]);
    }

    function searchByName() {
        $student = postIndex("hotensv");
        if ($student != Null) {
            $data = $this->model->selectQuery("select * from sinhvien where HoTenSV like ?", array($student));
        }
        else {
            $data = $this->model->getAll();
        }
        return $this->view('students.index', [
            'pageTitle' => 'Sinh viên',
            'students' => $data
        ]);
    }

    public function insert() {
        $arr = array();
        $arr[] = postIndex('MaSV');
        $arr[] = postIndex("HoTenSV");
        $arr[] = postIndex("GioiTinh");
        $arr[] = postIndex("NgaySinh");
        $arr[] = postIndex("LopNienChe");
        $arr[] = postIndex("Sdt");
        $arr[] = postIndex("Email");
        $arr[] = postIndex("DiaChi");
        $arr[] = postIndex("Khoa");
        $arr[] = postIndex("Nganh");
        $sql = "INSERT INTO sinhvien VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $n = $this->model->updateQuery($sql, $arr);

        $arr2 = array();
        $arr2[] = $arr[0];
        $arr2[] = postIndex("LopHocPhan");
        $sql = "INSERT INTO sinhvien_lophocphan VALUES (?, ?)";

        $this->model->updateQuery($sql, $arr2);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm sách mã ". $arr[0];
            header("location:index.php?controller=StudentController");
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
        $arr[] = getIndex("MaSV");
        if (!empty($arr)) {
            $sql = "DELETE FROM sinhvien WHERE MaSV = ?";

            $n = $this->model->updateQuery($sql, $arr);
            
            if ($n == 1) {
                $_SESSION['info']="Đã thêm sách mã ". $arr[0];
                header("location:index.php?controller=StudentController");
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
        $arr[] = postIndex("HoTenSV");
        $arr[] = postIndex("GioiTinh");
        $arr[] = postIndex("NgaySinh");
        $arr[] = postIndex("LopNienChe");
        $arr[] = postIndex("Sdt");
        $arr[] = postIndex("Email");
        $arr[] = postIndex("DiaChi");
        $arr[] = postIndex("Khoa");
        $arr[] = postIndex("Nganh");
        $arr[] = postIndex('MaSV');
        $sql = "UPDATE sinhvien SET HoTenSV = ?, GioiTinh = ?, NgaySinh = ?, LopNienChe = ?, Sdt = ?, Email = ?, DiaChi = ?, Khoa = ?, Nganh = ? WHERE MaSV = ?";

        $n = $this->model->updateQuery($sql, $arr);

        $arr2 = array();
        $arr2[] = $arr[9];
        $arr2[] = postIndex("LopHocPhan");
        $sql = "INSERT INTO sinhvien_lophocphan VALUES (?, ?)";

        $this->model->updateQuery($sql, $arr2);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm sách mã ". $arr[0];
            header("location:index.php?controller=StudentController");
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