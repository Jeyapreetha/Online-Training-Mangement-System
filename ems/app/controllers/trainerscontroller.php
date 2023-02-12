<?php
 
class TrainersController extends Controller
{
	
    public function __construct($model, $action, $query)
    {
		
        parent::__construct($model, $action, $query);
        $this->_setModel($model);
		$this->_resetView("dashboard/", $action, $query, true);
    }
    
    public function index($query)
	{
		if($_SESSION["role_id"] ==3)
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
				$this->_view->set('title', 'trainers');
				$trainers = $this->_model->getTrainers(null);
				$this->_view->set('trainers', $trainers);
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
	
	public function addTrainer()
    {	
		if($_SESSION["role_id"] ==3)
		{
			$this->_view->set('msg', '');
			$roles = $this->_model->getAllRoles();
			$this->_view->set('roles', $roles);
			if(isset($_POST["name"]))
			{
			$trainerAdd = $this->_model->addTrainer($_POST);
			if($trainerAdd)
				{
					$this->_view->set('msg', "Saved Successfully");
				}
				else
				{
					$this->_view->set('msg', "Save Failed");
				}
			}
			return $this->_view->output();
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}	
    }
	public function deleteTrainer($query)
    {
		if($query != "")
		{
			$_SESSION["deleteTrainerId"] = $query;
			$this->_view->set('title', 'deleteTrainer1');
			$delete = $this->_model->trainerDelete($query);
			//$trainer = $this->_model->gettrainers($query);
			//$this->_view->set('trainer', $trainer[0]);
			header("Location: ".BaseURL."trainers/index/Success");
			return $this->_view->output();
		}
			else
			{
				header("Location: ".BaseURL."trainers/index/Failed");
			}
		
		
	}
	public function editTrainer($query)
    {
		if($_SESSION["role_id"] ==3)
		{
			if($query != "")
			{
				$this->_view->set('title', 'editTrainer');
				$roles = $this->_model->getAllRoles();
				$this->_view->set('roles', $roles);
				$trainer = $this->_model->getTrainers($query);
				$this->_view->set('trainer', $trainer[0]);
				$_SESSION["editTrainerId"] = $query;
				return $this->_view->output();
			}
			elseif($_POST["name"])
			{
				if($this->_model->updateTrainer($_POST))
				{
					header("Location: ".BaseURL."trainers/index/Success");
				}
				else
				{
					header("Location: ".BaseURL."trainers/index/Failed");
				}
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	
}