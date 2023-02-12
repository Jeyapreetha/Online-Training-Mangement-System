<?php
 
class UsersController extends Controller
{
    public function __construct($model, $action, $query)
    {
        parent::__construct($model, $action, $query);
		$this->_setModel($model);
        $this->_resetView($action, $query);
		
    }
     
    public function index()
    {
        try 
		{
			$this->_setView("index");
            $this->_view->set('title', 'Login');
            $users = $this->_model->getUsers();
            $this->_view->set('users', $users);
            $this->_view->set('title', 'Users from the database');
             
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
	public function login()
	{
		$this->_view->set('title', 'Login');
		$this->_view->set('msg', '');
		return $this->_view->output();
	}
	public function loginPost()
	{
		$this->_view->set('title', 'Login');
		if($this->_model->checkLogin($_POST))
		{

			header("Location: ".BaseURL."syllabus/index");
		}
		else
		{
			$this->_setView("login");
			$this->_view->set('msg', 'Invalid Credentials');
            $this->_view->set('title', 'Login');
		}
		return $this->_view->output();
	}
	public function register()
	{
		$this->_view->set('title', 'register');
		
		$courses = $this->_model->getAllCourses();
		$this->_view->set('courses', $courses);
		return $this->_view->output();
	}
	public function registerPost()
	{
		$this->_view->set('title', 'register');
		if(isset($_POST["name"]))
		{
			if($this->_model->register($_POST))
			{
				header("Location: ".BaseURL."Dashboard");
			}
			else
			{
				header("Location: ".BaseURL."register");
			}
		}
		
	}
	public function logout()
	{
		session_destroy();
		header("Location: ".BaseURL."users/login");
	}
}