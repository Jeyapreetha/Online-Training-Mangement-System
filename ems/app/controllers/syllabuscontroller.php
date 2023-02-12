<?php
 
class syllabusController extends Controller
{
	
    public function __construct($model, $action, $query)
    {
		
        parent::__construct($model, $action, $query);
        $this->_setModel($model);
		$this->_resetView("dashboard/", $action, $query, true);
    }
    
    public function index($query)
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
            $this->_view->set('title', 'syllabus');
            $syllabus = $this->_model->getSyllabus(null);
            $this->_view->set('syllabus', $syllabus);
			
			/*$object = new stdClass;
			$object->subject = "test";
			$object->htmlmsg = "Msg1";
			$object->textmsg = "Text";
			
			$addresses = array();
			
			$address = new stdClass;
			$address->email = "jeyapreetha95@gmail.com";
			$address->name = "jeyapreetha";
			array_push($addresses,$address);
			
			$address = new stdClass;
			$address->email = "trbc.82@gmail.com";
			$address->name = "Ramesh";
			array_push($addresses,$address);

			
			
			$object->address = $addresses;
			
			$this->postEmail($object);*/
			
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
	public function viewSyllabus($query)
	{
	    try 
		{ 
			if($query != "")
			{
				$syllabus = $this->_model->getSyllabus($query);
				$ext= pathinfo($syllabus[0]->file_name,PATHINFO_EXTENSION);
				$this->_view->set('syllabus', $syllabus[0]);
				$this->_view->set('query', $query);
				$this->_view->set('ext', $ext);
				$this->_view->set('message', "");
			switch($ext)
			{
				case "ppt": 
					$files = scandir("content/PPT".$query);
					$this->_view->set('files', $files);
				break;
				
				case "docx": 
					$docxs = scandir("content/DOC".$query);
					$this->_view->set('docxs', $docxs);
				break;
				
			}
				
			}
			else
			{
				$this->_view->set('message', "");
			}
            $this->_view->set('title', 'syllabus');
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
	public function addSyllabus()
    { 
		if($_SESSION["role_id"] !=1)
		{
			$this->_view->set('message', "");
			if(isset($_FILES["productImage"]))
			{
			$fileName=$_FILES["productImage"]["name"];
			$productTempImage=$_FILES["productImage"]["tmp_name"];
			$productImageSize=$_FILES["productImage"]["size"];
			if($productImageSize>0)
				{
					
				$ext=pathinfo($fileName,PATHINFO_EXTENSION);
				if($ext=="jpg" || $ext=="png" || $ext=="bmp" || $ext=="gif" || $ext=="pdf" || $ext=="mp4" || $ext=="zip" || $ext=="rar" || $ext=="ppt"  || $ext=="docx")
					{
						
						if(!file_exists("content/".$fileName))
					{
						
						move_uploaded_file($productTempImage,"content/".$fileName);
						$syllabusAdd = $this->_model->addSyllabus($fileName, $_POST);
					if($syllabusAdd>0)
					{
						if($ext=="ppt")
						{
							$ppApp = new COM("PowerPoint.Application");
							$ppApp->Visible = True;
							$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); 
							$ppName = "content/".$fileName;
							$FileName = "PPT".$syllabusAdd;
							$ppApp->Presentations->Open(realpath($ppName));
							$ppApp->ActivePresentation->SaveAs($strPath."/content/".$FileName,17);  
							$ppApp->Quit;
							$ppApp = null;
						}
						elseif($ext=="docx"||$ext=="doc")
						{
							$word = new COM("word.application") or die ("Could not initialise MS Word object."); 
							$word->Documents->Open(realpath("content/".$fileName)); 
							$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); 
							$FileName = "Word".$syllabusAdd;
							$word->ActiveDocument->ExportAsFixedFormat($strPath."\content/".$FileName, 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
							$word->ActiveDocument->Close(false); 
							$word->Quit(); 
							$word = null; 
							unset($word); 
							$imagick = new Imagick(); 
							$imagick->setResolution( 300, 300 ); 
							if(!file_exists($strPath."\\content\\DOC".$syllabusAdd."\\"))
							{
								mkdir($strPath."\\content\\DOC".$syllabusAdd."\\");
							}
							$imagick->readImage($strPath."\\content\\".$FileName.'.pdf'); 
							$imagick->writeImages($strPath."\\content\\DOC".$syllabusAdd."\\".$FileName.'.jpg', false); 
						}
					}						
					$this->_view->set('message', "success");
					//header("Location: ".BaseURL."syllabus/index/Success");
					}
					}
				}
			}
			if(!isset($_FILES["productImage"]))
			{
			$this->_view->set('message', "");
			}
			$this->_view->set('title', 'addSyllabus');
			$topics = $this->_model->getAllTopics();
			$this->_view->set('topics', $topics);
			return $this->_view->output();
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
	}
	public function deleteSyllabus($query)
    {
		if($query != "")
		{
			$_SESSION["deleteSyllabusId"] = $query;
			$this->_view->set('title', 'deleteSyllabus');
			$delete = $this->_model->syllabusDelete($query);
			header("Location: ".BaseURL."syllabus/index/Success");
			return $this->_view->output();
		}
			else
			{
				header("Location: ".BaseURL."syllabus/index/Failed");
			}
	}
	public function downloadpdfAction()   
	{
	$params = $this->getRequest()->getParams();
	$this->view->paramfile = $params[‘file’];
	}
	public function downloadSyllabus($query)
	{
		$file = $this->_model->downloadFile($query);
		$path = "content/".$file->file_name;
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$ext = strtolower($ext);
		switch($ext)
		{
			case ".jpg":
				header('Content-Type: image/jpeg');
			break;
			case ".png":
				header('Content-Type: image/png');
			break;
			case ".bmp":
				header('Content-Type: image/x-portable-bitmap');
			break;
			case ".gif":
				header('Content-Type: image/gif');
			break;
			case ".pdf":
				header('Content-Type: application/pdf');
			break;
			case ".mp4":
				header('Content-Type: video/mp4');
			break;
			case ".zip":
				header('Content-Type: application/zip');
			break;
			case ".rar":
				header('Content-Type: application/octet-stream');
			break;
			case ".ppt":
				header('Content-Type: application/vnd.ms-powerpoint');
			break;
			case ".txt":
				header('Content-Type: text/plain');
			break;
			case ".docx":
				header('Content-Type: application/msword');
			break;
		}
		
		header('Content-Disposition: attachment; filename="'.$path.'"');
		readfile($path);
		
		return $this->_view->output();
	}

	public function editSyllabus($query)
    {  
		if($_SESSION["role_id"] ==3)
		{
		if($query != "")
		{
			$this->_view->set('title', 'editSyllabus');
			$syllabus = $this->_model->getSyllabus($query);
			$this->_view->set('syllabus', $syllabus[0]);
			$topics = $this->_model->getAllTopics();
			$this->_view->set('topics', $topics);
			$_SESSION["editSyllabusId"] = $query;
			return $this->_view->output();
		}
		elseif($_POST["name"])
		{
			$fileName = "";
			$existDbFile = $this->_model->getSyllabus($_SESSION["editSyllabusId"])[0]->content;
			if(isset($_FILES["productImage"]))
			{
				$fileName=$_FILES["productImage"]["name"];
				if($fileName != "")
				{
					$productTempImage=$_FILES["productImage"]["tmp_name"];
					$productImageSize=$_FILES["productImage"]["size"];
					if($productImageSize>0)
					{
						$ext=pathinfo($fileName,PATHINFO_EXTENSION);
						if($ext=="jpg" || $ext=="png" || $ext=="bmp" || $ext=="gif" || $ext=="pdf"||  $ext=="mp4" || $ext=="zip" || $ext=="rar" || $ext=="ppt" || $ext=="txt" || $ext=="docx" )
						{
							if(!file_exists($fileName))
							{
								if($existDbFile != "")
								{
									if(file_exists("content/".$existDbFile))
									{
										unlink("content/".$existDbFile);
									}
								}
								move_uploaded_file($productTempImage,"content/".$fileName);
							}
						}
					}
				}
			}
			if($this->_model->updateSyllabus($_POST, $fileName))
			{
				header("Location: ".BaseURL."syllabus/index/Success");
			}
			else
			{
				header("Location: ".BaseURL."syllabus/index/Failed");
			}
		}
		
    }
	else
	{
		header("Location: ".BaseURL."users/login/Failed");
	}
}
}