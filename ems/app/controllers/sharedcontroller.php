<?php
 
class SharedController extends Controller
{
    public function __construct($model, $action, $query)
    {
        parent::__construct($model, $action, $query);
        $this->_setModel($model);
    }
     
    public function index()
    {
        try 
		{
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

	public function getCourses()
	{
		$courses = $this->_model->getCourses($_POST);
		if($courses)
		{
			foreach($courses as $course)
			{
				echo '<option value="'.$course->id.'">'.$course->name.'</option>';
			}
		}
	}
	
}