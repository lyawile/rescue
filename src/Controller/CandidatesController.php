<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Cake\ORM\TableRegistry;
use App\Model\Table\User; // <—My model
use Cake\Datasource\ConnectionManager;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require ROOT.DS.'vendor' .DS. 'phpoffice/phpspreadsheet/src/Bootstrap.php';


/**
 * Candidates Controller
 *
 * @property \App\Model\Table\CandidatesTable $Candidates
 *
 * @method \App\Model\Entity\Candidate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CandidatesController extends AppController
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
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ExamTypes', 'Centres']
        ];
        $candidates = $this->paginate($this->Candidates);

        $this->set(compact('candidates'));
    }

    /**
     * View method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => ['ExamTypes', 'Centres']
        ]);

        $this->set('candidate', $candidate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidate = $this->Candidates->newEntity();
        if ($this->request->is('post')) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData());
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
        }
        $examTypes = $this->Candidates->ExamTypes->find('list', ['limit' => 200]);
        $centres = $this->Candidates->Centres->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'examTypes', 'centres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData());
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
        }
        $examTypes = $this->Candidates->ExamTypes->find('list', ['limit' => 200]);
        $centres = $this->Candidates->Centres->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'examTypes', 'centres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidate = $this->Candidates->get($id);
        if ($this->Candidates->delete($candidate)) {
            $this->Flash->success(__('The candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function bulk()
    {
		 $uploadData = '';
        if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath.$fileName;
				//$ftype = $this->request->data['file']['name'];
                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
					$msg=$this->importExcelfile($uploadFile);
					$msgs=explode(';',$msg);
					if($msgs[0]==0)$this->Flash->error(__($msgs[1]));
					
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
		$ans=$this->fileprocess($sheetData);
		return $ans;
	}
		
	private function fileprocess($data)
	{
		$alpha=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
		//TEMPLATES SET
		//-ID KEYWORDS-DATA WIDTH-
		$templates=array('CSEE'=>array(array('CSEE'),25,array()),
						 'ACSEE'=>array(array('ADVANCED CERTIFICATE OF SECONDARY EDUCATION EXAMINATION'),22),
						 'FTNA'=>array(array('FTNA'),27),
						 'DSE'=>array(array('DIPLOMA IN SECONDARY EDUCATION EXAMINATION'),26),
						 'DTE'=>array(array('DIPLOMA IN TECHNICAL EDUCATION EXAMINATION'),26),
						 'GATCE'=>array(array("GRADE 'A' TEACHER CERTIFICATE  EXAMINATION"),27),
						 'GATSCCE'=>array(array("GRADE 'A' TEACHER SPECIAL COURSE CERTIFICATE  EXAMINATION"),25));
						 
		$csee=array('31','32','33');
		
		//DATA START INDICATORS
		$dataIC=array('INDEX NO','IDENTIFICATION NO','EXAM INDEX NO');
		
		$checkET=false;
		$checkCT=false;
		$checkDT=false;
		$dataStart=0;
		$tWidth=sizeof($data[1]);
		$exmWidth=0;
		$msg=array();
		$keepRead=true;
			
		if(is_array($data))
		{
			// 1) RECONCILIATE EXAM TYPES and CENTRE number
					$tempLength=sizeof($data);
					$endcheck=19;
					$bAT=($endcheck<$tempLength)?$endcheck:$tempLength;
					for($j=1;$j<19;$j++)
					{
						if($j>$bAT)break;
						foreach($data[$j] as $cell)
						{
							if($j<7)
							{
								foreach($templates as $k=>$ext)
								{
									foreach($ext[0] as $sub)
									{
										//exam type
										if (strpos($cell,$sub) !== false)
										{
											$checkET=true;
											$examTP=$k;
											$exmWidth=$ext[1];
										}
									}
								}
								//centre
								$rep=array('.',' ');
								$cent=str_replace($rep,'',$cell);
								if(preg_match("/^[E|S][0-9]{3,4}/i", trim($cent)))
								{
									$checkCT=true;
									$examCT=$cent[0].substr('0'.substr($cent,1,strlen($cent)),-4);
								}
							}
							else if($j>11)
							{
								foreach($dataIC as $st)
								{
									//exam type
										if (strpos(strtoupper($cell),$st) !== false)
										{
											$checkDT=true;
											$dataStart=$j;
										}
								}
							}
						}
					}
					
			//exam type and template width		
			if(!$checkET)
			{
				$msg[]='Invalid Template : No Examination Type';
				$keepRead=false;
			}
			else if($tWidth!=$exmWidth)
			{
				$thsmsg=($tWidth>$exmWidth)?'Exceeds':'is Less than';
				$msg[]='Invalid Template : Column Count '.$thsmsg.' Count expected for '.$examTP.' Template';
				$keepRead=false;
			}
			
			//Exam Centre
			if(!$checkCT)
			{
				$msg[]='Examination Centre Number not found in the Template';
				$keepRead=false;
			}
			
			//Data beginning
			if(!$checkDT)
			{
				$msg[]="Candidates' Index number Column not found";
				$keepRead=false;
			}
			
			

			
			if($keepRead)
			{
				echo 'Exam is '.$examTP.' and centre = '.$examCT.' data starts at row '.$dataStart.' Template Width '.sizeof($data[$dataStart]);
				exit;
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
				
			}//CANDS LOOP
			
			}//TEMPLATE CHECKS 
			else return '0;'.implode(', ',$msg);

		}//ARRAY CHECK
	}
	private function chapa($dt)
	{
		echo '<pre>';
		var_dump($dt);
		echo '</pre>';
		die("<br>------------------------|-----------------<br>");
	}
}
