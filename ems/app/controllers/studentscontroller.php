<?php
 
class StudentsController extends Controller
{
	
    public function __construct($model, $action, $query)
    {
		
        parent::__construct($model, $action, $query);
        $this->_setModel($model);
		$this->_resetView("dashboard/", $action, $query, true);
    }
    
    public function index($query)
	{
		if($_SESSION["role_id"] !=1)
		{
        try 
		{
			if($query != "")
			{
				$this->_view->set('message', $query);
			}
			else
			{
				$this->_view->set('message', "");
			}
            $this->_view->set('title', 'students');
            $students = $this->_model->getstudents(null);
            $this->_view->set('students', $students);
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	

	public function deleteStudent($query)
    {
		if($query != "")
		{
			$_SESSION["deleteStudentId"] = $query;
			$this->_view->set('title', 'deleteStudent1');
			$delete = $this->_model->studentDelete($query);
			//$course = $this->_model->getCourses($query);
			//$this->_view->set('course', $course[0]);
			header("Location: ".BaseURL."students/index/Success");
			return $this->_view->output();
		}

			else
			{
				header("Location: ".BaseURL."students/index/Failed");
			}
		
		
	}
	public function editStudent($query)
    {
		if($_SESSION["role_id"] ==3)
		{
			if($query != "")
			{
				$this->_view->set('title', 'editStudent');
				$student = $this->_model->getStudents($query);
				$courses = $this->_model->getAllCourses();
				$this->_view->set('courses', $courses);
				$trainers = $this->_model->getAllTrainers();
				$this->_view->set('trainers', $trainers);
				$this->_view->set('student', $student[0]);
				$_SESSION["editStudentId"] = $query;
				return $this->_view->output();
			}
			elseif($_POST["name"])
			{
				if($this->_model->updateStudent($_POST))
				{
					header("Location: ".BaseURL."students/index/Success");
				}
				else
				{
					header("Location: ".BaseURL."students/index/Failed");
				}
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	
}