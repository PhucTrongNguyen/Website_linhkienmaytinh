<?php
class SubjectController extends BaseController{
    public  $model, $action;
    function __construct(){
        $this->model = new SubjectModel;
        $action = getIndex('action', 'index');
		//print_r($_GET);
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
		
    }
    public function index(){
        $subjects = $this->model->getAll();
        

        return $this->view('subjects.index', [
            'pageTitle' => 'Môn học',
            'subjects' => $subjects
        ]);
    }
    function searchByName() {
        $subject = postIndex("TenMH");
        if ($subject != Null) {
            $data = $this->model->selectQuery("select * from monhoc where TenMH like ?", array($subject));
        }
        else {
            $data = $this->model->getAll();
        }
        return $this->view('subjects.index', [
            'pageTitle' => 'Môn học',
            'subjects' => $data
        ]);
    }
    public function insert() {
        $arr = array();
        $arr[] = postIndex('MaMH');
        $arr[] = postIndex("TenMH");
        $arr[] = postIndex("SoTietLT");
        $arr[] = postIndex("SoTietTH");
        $arr[] = (int)postIndex("SoTietLT") + (int)postIndex("SoTietTH");
        $arr[] = postIndex("SoTinChi");
        $sql = "INSERT INTO monhoc VALUES (?, ?, ?, ?, ?, ?)";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm lớp học phần ". $arr[0];
            header("location:index.php?controller=SubjectController");
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
        $arr[] = getIndex("MaMH");
        if (!empty($arr)) {
            $sql = "DELETE FROM monhoc WHERE MaMH = ?";

            $n = $this->model->updateQuery($sql, $arr);
            
            if ($n == 1) {
                $_SESSION['info']="Đã thêm sách mã ". $arr[0];
                header("location:index.php?controller=SubjectController");
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
        
        $arr[] = postIndex("TenMH");
        $arr[] = postIndex("SoTietLT");
        $arr[] = postIndex("SoTietTH");
        $arr[] = (int)postIndex("SoTietLT") + (int)postIndex("SoTietTH");
        $arr[] = postIndex("SoTinChi");
        $arr[] = postIndex('MaMH');
        $sql = "UPDATE monhoc SET TenMH = ?, SoTietLyThuyet = ?, SoTietThucHanh = ?, TongSoTiet = ?, SoTinChi = ? WHERE MaMH = ?";

        $n = $this->model->updateQuery($sql, $arr);

        if ($n == 1) {
            $_SESSION['info']="Đã thêm lớp học phần ". $arr[0];
            header("location:index.php?controller=SubjectController");
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