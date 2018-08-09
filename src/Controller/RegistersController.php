<?php
// src/Controller/HomeController.php

namespace App\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Cake\ORM\TableRegistry;
use App\Model\Table\User; // <—My model
use Cake\Datasource\ConnectionManager;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require ROOT.DS.'vendor' .DS. 'phpoffice/phpspreadsheet/src/Bootstrap.php';

class RegistersController extends AppController
{
    public function initialize(){
        parent::initialize();
        
        // Include the FlashComponent
        $this->loadComponent('Flash');
		
		$this->loadModel('Disabilities');
		
		$this->loadModel('Subjects');
		$this->loadModel('ExamTypes');
		
		//centres  
		$this->loadModel('Centres');
		$this->loadModel('Practicals');
		
		//candidates
		$this->loadModel('Candidates');
		$this->loadModel('CandidateQualifications');
		$this->loadModel('CandidateSubjects');
		$this->loadModel('CandidateDisabilities');
		
		//disaqualified candidates
		$this->loadModel('DisqualifiedCandidates');
		$this->loadModel('DisabilityDisqualifiedCandidates');
		$this->loadModel('DisqualifiedCandidateQualifications');
		$this->loadModel('DisqualifiedCandidateSubjects');
  
        // Set the layout
      //  $this->layout = 'frontend';
    }
    
    public function index(){
        $uploadData = '';
        if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath.$fileName;
				//$ftype = $this->request->data['file']['name'];
                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
                  	/*$uploadData = $this->Files->newEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");*/
					/*
                    if ($this->Files->save($uploadData)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                    }else{
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    } 
					*/
					$this->importExcelfile($uploadFile);
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'));
            }
            
        }
		
        $this->set('uploadData', $uploadData);
         $this->set('cmx', 'HOlla');
       // $files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $filesRowNum = 0; //$files->count();
      //  $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);
    }
	private function importExcelfile ($fname){
		
		$spreadsheet = IOFactory::load($fname);
		$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
		$this->dbinsert($sheetData);
	}
		
	private function dbinsert($data)
	{
		$alpha=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
		$csee=array('31','32','33');
		if(is_array($data))
		{
			//AREAS
			$reg = $data[2]['F'];
			$dist = $data[2]['M'];
			$scho = $data[4]['H'];
			$schoNo = $data[4]['F'];
			echo 'MKOA : '.$reg.', WILAYA : '.$dist.', SHULE : '.$scho.' NAMBA : '.$schoNo; echo '<br>';
			
			//CENTRE
			$phone1 = $data[6]['C'];
			$phone2 = $data[6]['C'];
			echo 'PHONE 1 : '.$phone1.', PHONE 2 : '.$phone2; echo '<br>';
			
			$phys_practA = $data[7]['P'];
			$phys_practB = $data[7]['Q'];
			$phys_practC = $data[7]['R'];
			$phys_practTotal = $data[7]['S'];
			//alt 2, live -1.
			$phys_practType = trim($data[7]['G'])=='√'?2:(trim($data[7]['I'])=='√'?1:0);
			
			$chem_practA = $data[8]['P'];
			$chem_practB = $data[8]['Q'];
			$chem_practC = $data[8]['R'];
			$chem_practTotal = $data[8]['S'];
			$chem_practType = trim($data[8]['G'])=='√'?2:(trim($data[8]['I'])=='√'?1:0);
			
			$bio_practA = $data[9]['P'];
			$bio_practB = $data[9]['Q'];
			$bio_practC = $data[9]['R'];
			$bio_practTotal = $data[9]['S'];
			$bio_practType = trim($data[9]['G'])=='√'?2:(trim($data[9]['I'])=='√'?1:0);
			
			
			echo 'A : '.$phys_practA.', B : '.$phys_practB.', C : '.$phys_practC.' T : '.$phys_practTotal.' PRACTICAL Physics : '.$phys_practType; echo '<br>';
			echo 'A : '.$chem_practA.', B : '.$chem_practB.', C : '.$chem_practC.' T : '.$chem_practTotal.' PRACTICAL Chemistry : '.$chem_practType; echo '<br>';
			echo 'A : '.$bio_practA.', B : '.$bio_practB.', C : '.$bio_practC.' T : '.$bio_practTotal.' PRACTICAL Biology : '.$bio_practType; echo '<br>';
			
			//CENTRE AND ASSOCIATIONS TO DB //$this->Centres->newEntity(); 
			
			$cent = $this->Centres->findByNumber($schoNo)->first();
			$exam = $this->ExamTypes->findByShortName('CSEE')->first();
			
			//PRACTICALS
			
			$sub_phy= $this->Subjects->findByCode($csee[0])->first();
			$pract_phy=$this->Practicals->newEntity();
			$pract_phy->subjects_id=$sub_phy->id; 
			$pract_phy->centres_id=$cent->id;
			$pract_phy->practical_type=$phys_practType;
			$pract_phy->group_A=$phys_practA;
			$pract_phy->group_B=$phys_practB;
			$pract_phy->group_C=$phys_practC;
			$pract_phy->total=$phys_practTotal;
			$this->Practicals->save($pract_phy);
			
			$sub_chem= $this->Subjects->findByCode($csee[1])->first();
			$pract_chem=$this->Practicals->newEntity();
			$pract_chem->subjects_id=$sub_chem->id; 
			$pract_chem->centres_id=$cent->id;
			$pract_chem->practical_type=$chem_practType;
			$pract_chem->group_A=$chem_practA;
			$pract_chem->group_B=$chem_practB;
			$pract_chem->group_C=$chem_practC;
			$pract_chem->total=$chem_practTotal;
			$this->Practicals->save($pract_chem);
			
			$sub_bio= $this->Subjects->findByCode($csee[2])->first();
			$pract_bio=$this->Practicals->newEntity();
			$pract_bio->subjects_id=$sub_bio->id; 
			$pract_bio->centres_id=$cent->id;
			$pract_bio->practical_type=$bio_practType;
			$pract_bio->group_A=$bio_practA;
			$pract_bio->group_B=$bio_practB;
			$pract_bio->group_C=$bio_practC;
			$pract_bio->total=$bio_practTotal;
			$this->Practicals->save($pract_bio);
			
			echo ' <br><br> CENTRE '.$cent->id.'<br>';						
			$count=19; //CANDIDATE DATA ROW BEGINING
			
			//$this->chapa($data);
			for($rw=$count; $rw<sizeof($data);$rw++)
			{
				//CANDIDADOS
				$c=0; //CANDIDATE DATA COLUMN BEGINING
				
				//idnumber  
				echo $refNO=$data[$rw][$alpha[$c++]];
				echo ' -|- ';
				//SIFA
				echo $sfcent=$data[$rw][$alpha[$c++]];
				echo $sfcand=$data[$rw][$alpha[$c++]];
				echo $sfyear=$data[$rw][$alpha[$c++]];
				echo ' -|- ';
				//sex
				echo $sex=$data[$rw][$alpha[$c++]];
				echo ' -|- ';
				//NAMES
				echo $fname=$data[$rw][$alpha[$c++]];
				echo $oname=$data[$rw][$alpha[$c++]];
				echo $sname=$data[$rw][$alpha[$c++]];
				echo ' -|- ';
				//DOB
				echo $day=$data[$rw][$alpha[$c++]];
				echo $mon=$data[$rw][$alpha[$c++]];
				echo $year=$data[$rw][$alpha[$c++]];
				echo ' -|- ';
				//SUBCODES
				$subarray=array();
				for($a=$c;$a<(10+$c);$a++)$subarray[]=$data[$rw][$alpha[$a]];
				var_dump($subarray);
				$c=$a;
				echo ' -|- ';
				
				//DISABILITY
				echo $dis=$data[$rw][$alpha[$c++]];
				echo ' -|- ';
				//GUARDIAN PHONE
				$c++;//FEES JUMP
				echo $gphone=$data[$rw][$alpha[$c++]];
				echo '<BR>';
				
				//INSERT CANDIDATE
				$cand=$this->Candidates->newEntity();
				$cand->number=$refNO;
				$cand->sex=$sex;
				$cand->first_name=$fname;
				$cand->other_name=$oname;
				$cand->surname=$sname;
				$cand->guardian_phone=$gphone;
				$cand->centres_id=$cent->id;
				$cand->exam_types_id=$exam->id;
				$this->Candidates->save($cand);
				
				//INSERT DISABILITIES
				$replace=array(' ','.');
				$dis=$dis=='Others'?'PI':str_replace($replace,'',strtoupper(trim($dis)));
				$dis=$dis==''?'PI':$dis;
				$disob= $this->Disabilities->findByShortname($dis)->first();
				$disab=$this->CandidateDisabilities->newEntity();
				$disab->disabilities_id=$disob->id;
				$disab->candidates_id=$cand->id;
				$this->CandidateDisabilities->save($disab);
				
				//INSERT QUALIFICATIONS
				$candQ=$this->CandidateQualifications->newEntity();
				$candQ->centre_number=$sfcent;
				$candQ->candidate_number=$sfcand;
				$candQ->exam_year=$sfyear;
				$candQ->candidates_id=$cand->id;
				$this->CandidateQualifications->save($candQ);
				
				//INSERT SUBJECTS 
				foreach($subarray as $sbj)
				{
					$subo = $this->Subjects->findByCode(intval($sbj))->first();
					$candsub = $this->CandidateSubjects->newEntity();
					$candsub->candidates_id=$cand->id;
					$candsub->subjects_id=$subo->id;
					$this->CandidateSubjects->save($candsub);
				}
				
				
				//$this->chapa($data[$rw]);
				
			}
			exit;


		$cand=$this->Candidates->newEntity();
		$cand->name='';
		$cand->Disability->name='';
		}
	}
	private function chapa($dt)
	{
		echo '<pre>';
		var_dump($dt);
		echo '</pre>';
		die("<br>------------------------|-----------------<br>");
	}
}