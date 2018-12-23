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
		$st = false;
		if(!empty($this->request->getSession()->read('centreId'))){
		if(!empty($this->request->getSession()->read('examTypeId'))){
        $this->paginate = [
            'contain' => ['ExamTypes', 'Centres']
        ];
        $candidates = $this->paginate($this->Candidates->find()->where(['exam_type_id'=>$this->request->getSession()->read('examTypeId'), 'centre_id'=>$this->request->getSession()->read('centreId')]));
		$st = true;
        $this->set(compact('candidates'));
		} else $this->Flash->error(__('Please Select Exam'));
		} else $this->Flash->error(__('Please Select Centre'));
		$this->set('seth',$st);
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
            'contain' => ['ExamTypes', 'Centres', 'BillItemCandidates', 'CandidateDisabilities', 'CandidateQualifications', 'CandidateSubjects']
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
			
			$data = $this->request->getData();
			//$this->chapa($data); //
			if(!empty($data['exam_type_id']) && !empty($data['centre_id']))
			{
				$currexm = $this->ExamTypes->get($data['exam_type_id']);
				$temps = $this->getTemplate($currexm->short_name);
				$metaDT=$temps[2];
				
					$fname = trim($data["first_name"]);
					$oname = trim($data["other_name"]);
					$sname = trim($data["surname"]);
					
	  
					if($fname !='' && $sname !='')
					{
						if(trim($data['date_of_birth'])!='')
						{
							$bad=false;
							$resn = array();
							//1)NAMBA
							$ROW['ref']=$data["number"];
							
							//2)SIFA
							$sifa=array();
							//0-no sifa, 1-csee (1 sifa/3 columns), 2-acsee+dse+gatce(3 sifaz/3 columns),	3-gatscce(1 sifa/1 columns)	 
							switch($metaDT['sft'])
							{
								case 0: $ROW['sifa']=false;
								break;
								default: $ct = 0; $chksf=false;
										 foreach($data["year"] as $yr)
										 {
											 $schono = trim($data["cntno"][$ct]);
											 $candno = trim($data["candno"][$ct]); 
											 if(preg_match("/^[E|S][0-9]{3,4}/i",$schono) && preg_match("/^[0-9]{3}/i",$candno))
											 {
												 $chksf=true;
												 $sifa[]=$schono[0].substr('0'.substr($schono,1,strlen($schono)),-4).'/'.$candno.'/'.$yr;
											 }
											 $ct++; 
										 }
										 if($chksf)$ROW['sifa']=$sifa; else {$ROW['sifa']=false; $bad=true; $resn[]='Incorrect Qualifications';}					
								break;
							} 
							
							
							//3) WORK EXPERIENCE integer
							if($metaDT['we'])
							{
								//$bad
								$we=intval($data["work_experience"]);
								if(!$we>0){ $bad=true; $resn[]='No work experience';}
								else if($we<3){ $bad=true; $resn[]='Insuficient work experience';}
								$ROW['we']=$we;
							}
							else $ROW['we']=false;
							
							//4) REPEATER integer
							if($metaDT['rep'])
							{
								$ROW['rep']=intval($data["is_repeater"]);
							}
							else $ROW['rep']=false;
							//5)SEX
							$ROW['sex']=$data["sex"];
							
							//6) CANDIDADOS
							$ROW['name']=array($fname,$oname,$sname);
							
							//7) DATE OF BIRTH 
							$dt = explode('/',$data['date_of_birth']);						
							$dob=$dt[2].'-'.$dt[0].'-'.$dt[1];
							//valid check
							if(!checkdate($dt[0],$dt[1],$dt[2])){$bad=true; $resn[]='Date of birth not correct';}
							$ROW['dob']=$dob;
								
							//8) SUBJECTS
							$subar=array();
							$substart=$data['insubs'];
							if(!empty($data['insubs']))
							{
								foreach($substart as $onesub)
								{
									if(preg_match("/^[0-9]{3}/i", $onesub))
									{
										$subar[]=$onesub;
									}
								}
							}
							$ROW['subs']=$subar;
							
							//9) DISABILITY
							$disar=array();
							if(!empty($data['indisbs']))
							{
								$disstart=$data['indisbs'];
								foreach($disstart as $onedisab)
								{
									if(preg_match("/^[A-Z]{2}/i", $onedisab))
									{
										$disar[]=$onedisab;
									}
								}
								$ROW['dis']=$disar;
							}
							else $ROW['dis']=false;
							
							//10) PARENT / GUARDIAN
							if($metaDT['gp'])
							{
								$ROW['gp']=$data['guardian_phone'];
							}
							else $ROW['gp']=false;
							
							//11) PSLE NUMBER
							$pslen = trim($data['PSLE_number']);
							if($metaDT['7n'] && preg_match("/^[0-9]{11}/i", $pslen))
							{
								$ROW['psle']=$pslen;
							}
							else $ROW['psle']=false;
							
							//12) PSLE YEAR
							$psleyr = intval(trim($data['PSLE_year']));
							
							if($metaDT['7y'] && ($psleyr>2015 && $psleyr<date('Y')))
							{
								$ROW['psley']=$psleyr;
							}
							else $ROW['psley']=false;
							
							//13) COMBINATION
							$cmb= strtoupper(trim($data['combination']));
							if($metaDT['cmb'] && preg_match("/^[A-Z]{3}/i", $cmb))
							{
								$ROW['cmb']=$cmb;
							}
							else $ROW['cmb']=false;
							
							//SAVE			
							if(!$bad)
							{
								$in = $this->dataInsert(array($data['exam_type_id'],$data['centre_id']),$ROW); 
								if($in[0] == 1)
								{
									$this->Flash->success(__('Candidate  Registered'));;
								}
								else if($in[0] == 2)
								{
									//SIFA DONT
									$bad = true;
									$resn[]=$in[1];
								}
								else if($in[0] == 3)
								{
									$this->Flash->error(__('Duplicate Names : Candidate already exists'));
								}
							}
							
							if($bad)
							{
								$ROW['resn'] = implode(',',$resn);
								$in = $this->dataInsertInc(array($data['exam_type_id'],$data['centre_id']),$ROW);
								if($in == 1)
								{
									$this->Flash->error(__('Candidate has been Disqualified; Please see the reason in Disqualified List.'));
								}
								else if($in == 3)
								{
									$this->Flash->error(__('Candidate already exists in Disqualified List.'));
								}
							}
						} else $this->Flash->error(__('Please Provide Date of Birth'));
					} else $this->Flash->error(__('Firstname and or Surname Empty!'));
				
				}//NO CANDIDATE NAME
				else $this->Flash->error(__('Select Exam and or Centre'));
        }
        $examTypes = $this->Candidates->ExamTypes->find('list', ['limit' => 200])->where(['id'=>$this->request->getSession()->read('examTypeId')]);
        $centres = $this->Candidates->Centres->find('list', ['limit' => 200])->where(['id'=>$this->request->getSession()->read('centreId')]);
		$subjects = $this->getsubjects($this->request->getSession()->read('examTypeId'));
		$disabs = $this->getDisabilies();
		// $this->Candidates->CandidateDisabilities->Disabilities->find('list', ['limit' => 200]);
		
        $this->set(compact('candidate', 'examTypes', 'centres', 'subjects','disabs'));
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
	
	private function getsubjects($exam)
	{
		//echo $centid;exit;
		$subs = $this->Subjects->find('all',array('fields' => array('id','code','name')))->where(['exam_type_id' => $exam]);//
		$subjects=$subs->toArray();
		$subject=array();
		foreach($subjects as $k=>$v)$subject[$v['code']]= $v['name'];
		return $subject;
	}
	
	private function getDisabilies()
	{
		//echo $centid;exit;
		$ds = $this->Disabilities->find('all',array('fields' => array('id','shortname')));//
		$disab=$ds->toArray();
		$dsb=array();
		foreach($disab as $k=>$v)$dsb[$v['id']]= $v['shortname'];
		return $dsb;
	}
	
	public function bulk()
    {
		 $uploadData = '';
		 $allowedtypes=array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		 
        if ($this->request->is('post')) {
			if(!empty($this->request->getSession()->read('centreId'))){
			if(!empty($this->request->getSession()->read('examTypeId'))){
				
				$reqdata = $this->request->getData();
				$etype =  $this->ExamTypes->get($this->request->getSession()->read('examTypeId'));
				$exam = $etype->short_name;
				
            	if(!empty($reqdata['file']['name'])){
                $fileName = $reqdata['file']['name'];
				$exam = $this->request->data['exam'];
								
					if(in_array($reqdata['file']['type'],$allowedtypes) )
					{
						$uploadPath = 'uploads'.DS.'files'.DS;
						$uploadFile = $uploadPath.$fileName;
						//$ftype = $this->request->data['file']['name'];
							if(move_uploaded_file($reqdata['file']['tmp_name'],$uploadFile)){
								$msg=$this->importExcelfile($uploadFile, $exam);
								$msgs=explode(';',$msg);
								if($msgs[0]==0)$this->Flash->error(__($msgs[1]));
								else $this->Flash->success(__($msgs[1]));
								//$this->chapa($msgs[2]);
								if(isset($msgs[2]))
								{
									$cands = explode('+INCO',$msgs[2]);
									if($cands[0]!='')$this->set('comp',$cands[0]);
									if($cands[1]!='')$this->set('incomp',$cands[1]);
								}
								
								
							}else{
								$this->Flash->error(__('Unable to upload file, please try again.'));
							}
					}else{
							$this->Flash->error(__('Please Upload Only XLS,CSV and XLSX files'));
					}
				}else{
					$this->Flash->error(__('Please choose a file to upload.'));
				}
			  }else{
				$this->Flash->error(__('Please Select Exam'));
			  }
			}else{
				$this->Flash->error(__('Please Select Centre'));
			  }
        }//post
		
        $cent = $this->getcentres($this->request->getSession()->read('centreId'));
		$centid = '';
		if($cent!='Select Centre')
		{
			$c=explode('_',$cent);
			$cent=$c[1];
			$centid = $c[0].'_'.$c[1];
		}
        $this->set('centre', $cent);
		$this->set('centreid', $centid);
		$exams=$this->getexam();
		$this->set('etypes',$exams);
    }
	public function getcentres($centid)
	{
		$cnt = $this->Centres->find('all',array('fields' => array('id','number','name')))->where(['id' => $centid]);
		if(!$cnt->isEmpty())
		{
			$centres=$cnt->toArray();
			$a=0;
			foreach($centres as $k=>$v)
			{
				$centre=$v['id'].'_'.$v['number'].'_'.$v['name'];
				$a++;
			}
			return $centre;
		}
		return 'Select Centre';
	}
	
	private function getexam()
	{
		//echo $centid;exit;
		$ety = $this->ExamTypes->find('all',array('fields' => array('id','short_name')));//
		$ety->innerJoinWith('CentreExamTypes', function ($q) { return $q->where(['centre_id' => $this->request->getSession()->read('centreId')]);});
		if(!$ety->isEmpty())
		{
			$etypes=$ety->toArray();
			$etype=array();
			foreach($etypes as $k=>$v)$etype[$v['id'].'_'.$v['short_name']]= $v['short_name'];
			return $etype;
		}
		return array(-1=>'No Exams');
	}
	
	private function importExcelfile ($fname, $exam){
		ini_set('memory_limit', '512M');
		$spreadsheet = IOFactory::load($fname);
		$sheetData = $spreadsheet->getSheet(0)->toArray(null, true, true, true);
		$ans=$this->fileprocess($sheetData, $exam);
		return $ans;
	}
	private function getTemplate($exam=false)
	{
		$templates=array(
	'CSEE'=>array(array('CSEE'),25
	,array('sft'=>1,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>20,'dis'=>21,'gp'=>23,'7n'=>false,'7y'=>false,'cmb'=>false)),
	'ACSEE'=>array(array('ADVANCED CERTIFICATE OF SECONDARY EDUCATION EXAMINATION'),22
	,array('sft'=>2,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>16,'dis'=>17,'gp'=>20,'7n'=>false,'7y'=>false,'cmb'=>18)),
	'FTNA'=>array(array('FTNA'),27
	,array('sft'=>0,'sfb'=>1,'we'=>false,'rep'=>1,'sex'=>2,'nem'=>3,'dob'=>6,'subs'=>9,'sube'=>20,'dis'=>21,'gp'=>23,'7n'=>24,'7y'=>25,'cmb'=>false)),
	'DSEE'=>array(array('DIPLOMA IN SECONDARY EDUCATION EXAMINATION'),26
	,array('sft'=>2,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>22,'dis'=>23,'gp'=>false,'7n'=>false,'7y'=>false,'cmb'=>false)),
	'DTE'=>array(array('DIPLOMA IN TECHNICAL EDUCATION EXAMINATION'),26
	,array('sft'=>2,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>22,'dis'=>23,'gp'=>false,'7n'=>false,'7y'=>false,'cmb'=>false)),
	'GATCE'=>array(array("GRADE 'A' TEACHER CERTIFICATE  EXAMINATION"),27
	,array('sft'=>2,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>23,'dis'=>24,'gp'=>false,'7n'=>false,'7y'=>false,'cmb'=>false)),
	'GATSCCE'=>array(array("GRADE 'A' TEACHER SPECIAL COURSE CERTIFICATE  EXAMINATION"),25
	,array('sft'=>3,'sfb'=>1,'we'=>2,'rep'=>false,'sex'=>3,'nem'=>4,'dob'=>7,'subs'=>10,'sube'=>20,'dis'=>21,'gp'=>false,'7n'=>false,'7y'=>false,'cmb'=>false)));
		return $exam?$templates[$exam]:$templates;
	}
		
	private function fileprocess($data, $exam)
	{
		$alpha=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
		//TEMPLATES SET
		//-ID-KEYWORDS-DATA WIDTH-DATA CELLS
		/*************
		KEY: SIFA //0-no sifa, 1-csee (1 sifa/3 columns), 2-acsee+dse+gatce(3 sifaz/3 columns),	3-gatscce(1 sifa/1 columns)	
			sft- Sifa Type, sfb - Begining Column of Sifa, we- Work Experience, rep - Repeater, cmb - Combination
			subs - Beginning Column fo subjects, sube- ending column for subjects, pg - Parent/Guardian
		
		************/
	
		$templates = $this->getTemplate();
		$csee=array('31','32','33');
		$disabs=array('BR', 'LV', 'HI', 'II', 'Others');
		
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
										if (stripos($cell,$sub) !== false)
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
										if (stripos(strtoupper($cell),$st) !== false)
										{
											$checkDT=true;
											$dataStart=$j+2;
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
			else if($examTP!=$exam)
			{
				$msg[]='Selected Exam does not match Template Exam. Template : '.$examTP.' - Selected : '.$exam;
				$keepRead=false;
			}
			else if($tWidth!=$exmWidth)
			{
				$thsmsg=($tWidth>$exmWidth)?'Exceeds':'is Less than';
				$msg[]='WARNING: Template Issue: Column Count '.$thsmsg.' Count expected for '.$examTP.' Template';
				//$keepRead=false;
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
			//Data Presence
			if(sizeof($data)<$dataStart)
			{
				$msg[]="No Registration Data Found";
				$keepRead=false;
			}
			
			

			
			if($keepRead)
			{
				$temps = $this->getTemplate($examTP);
				$metaDT=$temps[2];
				//EXAM ID
				$dbexm = $this->ExamTypes->find()->where(['short_name' => $examTP])->first();
				if(!empty($dbexm))
				{
					$dbexamid=$dbexm->id;
				}else
				{
					$msg[]="Database Error";
					 return '0;'.implode(', ',$msg);
				}
				
				//GET CENTRE ID 
				$dbcnt = $this->Centres->find()->where(['number' => $examCT])->first();
				if(!empty($dbcnt))
				{
					$dbcentid=$dbcnt->id;
					if($dbcentid != ($this->request->getSession()->read('centreId'))) return '0;'."Selected Centre does not match Template Centre";
					
				}else 
				{
					$msg[]="Template Exam Centre not recognised";
					 return '0;'.implode(', ',$msg);
				}
				
				
				if($examTP=='CSoEE')
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
				}
				
				//CHECKERS
				$comp=0;
				$incomp=0;
				
				$dupcomp=array();
				$dupincomp=array();
				
								
			for($rw=$dataStart; $rw<sizeof($data);$rw++)
			{
				
				//BEGIN
				$ROW=array();
				//6) CANDIDADOS
				$c=$metaDT['nem'];
				$nem=array();
				$nem[]= trim($data[$rw][$alpha[$c]]);
				$nem[]= trim($data[$rw][$alpha[$c+1]]);
				$nem[]= trim($data[$rw][$alpha[$c+2]]);
				
				$candname=implode('',$nem);
				
				if($nem[0]!='' && $nem[2]!='')
				{
					$bad=false;
					$resn = array();
					//1)NAMBA
					$refNO=$data[$rw][$alpha[0]];
					$ROW['ref']=$refNO;
					
					//2)SIFA
					
					$sifa=array();
					//0-no sifa, 1-csee (1 sifa/3 columns), 2-acsee+dse+gatce(3 sifaz/3 columns),	3-gatscce(1 sifa/1 columns)	 
					switch($metaDT['sft'])
					{
						case 1: $c=$metaDT['sfb'];
								$sifa[]= $data[$rw][$alpha[$c++]].'/'.$data[$rw][$alpha[$c++]].'/'.$data[$rw][$alpha[$c++]];
						break;
						case 2: $c=$metaDT['sfb'];
								$sifa[]= $data[$rw][$alpha[$c++]];
								$sifa[]= $data[$rw][$alpha[$c++]];
								$sifa[]= $data[$rw][$alpha[$c++]];
						break;
						case 3: $c=$metaDT['sfb'];
								$sifa[]= $data[$rw][$alpha[$c++]];
						break;
						default: $sifa=false;							
						break;
					} 
					$ROW['sifa']=$sifa;
					
					//3) WORK EXPERIENCE integer
					if($metaDT['we'])
					{
						//$bad
						$we=intval($data[$rw][$alpha[$metaDT['we']]]);
						if(!$we>0){ $bad=true; $resn[]='No work experience';}
						else if($we<3){ $bad=true; $resn[]='Insuficient work experience';}
						$ROW['we']=$we;
					}
					else $ROW['we']=false;
					
					//4) REPEATER integer
					if($metaDT['rep'])
					{
						$ROW['rep']=intval($data[$rw][$alpha[$metaDT['rep']]]);
					}
					else $ROW['rep']=false;
					//5)SEX
					$sex=strtoupper(trim($data[$rw][$alpha[$metaDT['sex']]])); //sex
					if($sex!='M' && $sex!='F'){$bad=true; $resn[]='Unrecognised sex information';}
					$ROW['sex']=$sex;
					
					//6) CANDIDADOS
					$c=$metaDT['nem'];
					$nem=array();
					$nem[]= trim($data[$rw][$alpha[$c]]);
					$nem[]= trim($data[$rw][$alpha[$c+1]]);
					$nem[]= trim($data[$rw][$alpha[$c+2]]);
					//Valid check
					if($nem[0]=='' ||  $nem[2]=='' ){$bad=true; $resn[]='Required Surname and Firstname';}
					$ROW['name']=$nem;
					
					
					//7) DATE OF BIRTH
					$c=$metaDT['dob'];
					$d=intval($data[$rw][$alpha[$c]]);
					$m=intval($data[$rw][$alpha[$c+1]]);
					$Y=intval($data[$rw][$alpha[$c+2]]);
					
					
					$dob=$Y.'-'.$m.'-'.$d;
					//valid check
					if(!checkdate($m,$d,$Y)){$bad=true; $resn[]='Date of birth not correct';}
					
					/*$date=DateTime :: createFromFormat('m/d/Y',$dob);
					$date_errors= DateTime :: getLastErrors();
					
					if($date_errors['warning_count'] + $date_errors['error_count']>0) $bad=true;*/
					
					$ROW['dob']=$dob;
					
					//8) SUBJECTS
					$subar=array();
					$substart=intval($metaDT['subs']);
					$substop=intval($metaDT['sube']);
					for($a=$substart;$a<=$substop;$a++)
					{
						$subar[]=substr('00'.trim($data[$rw][$alpha[$a]]),-3);
					}
					
					$ROW['subs']=$subar;
					//9) DISABILITY
					if(trim($data[$rw][$alpha[$metaDT['dis']]])!='')
					{
						$ROW['dis']=trim($data[$rw][$alpha[$metaDT['dis']]]);
					}
					else $ROW['dis']=false;
					
					//10) PARENT / GUARDIAN
					if($metaDT['gp'])
					{
						$ROW['gp']=trim($data[$rw][$alpha[$metaDT['gp']]]);
					}
					else $ROW['gp']=false;
					
					//11) PSLE NUMBER
					if($metaDT['7n'])
					{
						$ROW['psle']=$data[$rw][$alpha[$metaDT['7n']]];
					}
					else $ROW['psle']=false;
					
					//12) PSLE YEAR
					if($metaDT['7y'])
					{
						$ROW['psley']=$data[$rw][$alpha[$metaDT['7y']]];
					}
					else $ROW['psley']=false;
					
					//13) COMBINATION
					if($metaDT['cmb'])
					{
						$ROW['cmb']=$data[$rw][$alpha[$metaDT['cmb']]];
					}
					else $ROW['cmb']=false;
					
					//SAVE			
					if(!$bad)
					{
						$in = $this->dataInsert(array($dbexamid,$dbcentid),$ROW);
						if($in[0] == 1)
						{
							$comp++;
						}
						else if($in[0] == 2)
						{
							//SIFA DONT
							$bad = true;
							$resn[]=$in[1];
						}
						else if($in[0] == 3)
						{
							$dupcomp[] = implode(' ', $nem);
						}
					}
					
					if($bad)
					{
						$ROW['resn'] = implode(',',$resn);
						$in = $this->dataInsertInc(array($dbexamid,$dbcentid),$ROW);
						if($in == 1)
						{
							$incomp++;
						}
						else if($in == 3)
						{
							$dupincomp[] = implode(' ', $nem);
						}
					}
					
			
				}//NO CANDIDATE NAME
				
			}//CANDS LOOP
			
			//FINALIZE READ
			if($incomp+$comp == 0)
			{
				if(empty($dupcomp) && empty($dupincomp))return '0;'."Empty Template : No Candidates found";
				else return '0;'."0 Candidates Saved ;".(empty($dupcomp)?'':implode(',', $dupcomp)).'+INCO'.(empty($dupincomp)?'':implode(',', $dupincomp));
			}
			else if($comp == 0)
			{
				return '0;'.$incomp." Candidates Disqualified;".(empty($dupcomp)?'':implode(',', $dupcomp)).'+INCO'.(empty($dupincomp)?'':implode(',', $dupincomp));
			}
			else if($incomp == 0)
			{
				return '2;'.$comp." Candidates Saved;".(empty($dupcomp)?'':implode(',', $dupcomp)).'+INCO'.(empty($dupincomp)?'':implode(',', $dupincomp));
			}
			else
			{
				return '2;'.$comp." Candidates Saved".$incomp." Candidates Disqualified
				;".(empty($dupcomp)?'':implode(',', $dupcomp)).'+INCO'.(empty($dupincomp)?'':implode(',', $dupincomp));
			}
			//END FINALIZE
				
				
			}//TEMPLATE CHECKS 
			else return '0;'.implode(', ',$msg);

		}//ARRAY CHECK
		else return '0;'."Empty File : Could not Read Data";
	}
	
	
	private function dataInsert($head,$data)
	{
		 // 1 - ins, 2 - sifa , 3- duplicate
		
		if(!empty($data))
		{	$a=0;
				$exist = array();
				//GET CANDIDATE
			$where=array('first_name'=>$data['name'][0],'other_name'=>$data['name'][1],'surname'=>$data['name'][2],'centre_id'=>$head[1],'exam_type_id'=>$head[0]);
			$cands = $this->Candidates->find()->select(array('id', 'exam_type_id'))->where($where)->first();
					if(empty($cands))
					{ 
						$exm = $this->ExamTypes->get($head[0]);
						$vsifa = $this->sifaVerify($data['name'],$data['sifa'],$exm->short_name);
						if($vsifa[0])
						{
							//INSERT CANDIDATE
							$cand=$this->Candidates->newEntity();
							$cand->number=$data['ref'];
							$cand->sex=$data['sex'];
							$cand->first_name=$data['name'][0];
							$cand->other_name=$data['name'][1];
							$cand->surname=$data['name'][2]; 
							$cand->guardian_phone=$data['gp'];
							
							$cand->date_of_birth=$data['dob'];
							$cand->work_experience=$data['we']?$data['we']:'NULL';
							$cand->combination=$data['cmb']?$data['cmb']:'NULL';
							$cand->PSLE_number=$data['psle']?$data['psle']:'NULL';
							$cand->PSLE_year=$data['psley']?$data['psley']:'NULL';
							$cand->is_repeater=$data['rep']?$data['rep']:'0';
							
							$cand->centre_id=$head[1]; 
							$cand->exam_type_id=$head[0]; 
							$this->Candidates->save($cand);
							//  $sqllog = $this->Candidates->getDataSource()->getLog(false, false);       
							 //debug($sqllog);
									
							//INSERT DISABILITIES
							if(!empty($data['dis']))
							{
								foreach($data['dis'] as $datadis)
								{
								$replace=array(' ','.');
								$dis=str_replace($replace,'',strtoupper(trim($datadis)));
								$dis=$dis=='OTHERS'?ucfirst(strtolower($dis)):$dis;
								
								$disob= $this->Disabilities->findByShortname($dis)->first();
								$disab=$this->CandidateDisabilities->newEntity();
								$disab->disability_id=$disob->id;
								$disab->candidate_id=$cand->id;
								$this->CandidateDisabilities->save($disab);
								}
							}
							
									
							//INSERT QUALIFICATIONS
							if($data['sifa'])
							{
							//	$this->chapa($data['sifa']);
								foreach($data['sifa'] as $sifa)
								{
									if(trim($sifa)!='')
									{
										$sf=explode('/',$sifa);
										$candQ=$this->CandidateQualifications->newEntity();
										$candQ->centre_number=$sf[0];
										$candQ->candidate_number=$sf[1];
										$candQ->exam_year=$sf[2];
										$candQ->candidate_id=$cand->id;
										$this->CandidateQualifications->save($candQ);
									}
								}
							}
							//	$this->chapa($data['subs']);	
							//INSERT SUBJECTS  
							foreach($data['subs'] as $sbj)
							{
								if($sbj!='' && $sbj!='00')
								{
								$subo = $this->Subjects->findByCode($sbj)->first();
								if($subo!=NULL)
								{
									echo $subo->id.'<br>';
									//SUBJECT FOUND
									$candsub = $this->CandidateSubjects->newEntity();
									$candsub->candidate_id=$cand->id;
									$candsub->subject_id=$subo->id;
									$this->CandidateSubjects->save($candsub);
								}
								}
							}exit;//FOREACH SUBS
							return array(1,'');
						}
						else return  array(2,$vsifa[1]); //SIFA DONT
					}
					else return  array(3,'') ;
		} //DATA CHECK
		
	}
	
	private function dataInsertInc($head,$data)
	{
		if(!empty($data))
		{	$a=0;
				//GET CANDIDATE
			$where=array('first_name'=>$data['name'][0],'other_name'=>$data['name'][1],'surname'=>$data['name'][2],'centre_id'=>$head[1],'exam_type_id'=>$head[0]);
					$cands = $this->DisqualifiedCandidates->find()->select(array('id', 'exam_type_id'))->where($where)->first();
					if(empty($cands))
					{ 
						//INSERT CANDIDATE
						$cand=$this->DisqualifiedCandidates->newEntity();
						$cand->number=$data['ref'];
						$cand->sex = $data['sex'];
						$cand->first_name = $data['name'][0];
						$cand->other_name = $data['name'][1];
						$cand->surname = $data['name'][2];
						$cand->guardian_phone=$data['gp'];
						
						$cand->date_of_birth = $data['dob'];
						$cand->work_experience = $data['we']?$data['we']:'NULL';
						$cand->combination = $data['cmb']?$data['cmb']:'NULL';
						$cand->PSLE_number = $data['psle']?$data['psle']:'NULL';
						$cand->PSLE_year = $data['psley']?$data['psley']:'NULL';
						$cand->is_repeater = $data['rep']?$data['rep']:'0';
						
						$cand->reason = $data['resn'];
						$cand->disabilities = implode(';',$data['dis']);
						$cand->subjects = implode(';',$data['subs']);
						//if($data['sifa'])$cand->sifa = implode(';',$data['sifa']);
						
						$cand->centre_id=$head[1]; 
						$cand->exam_type_id=$head[0]; 
						$this->DisqualifiedCandidates->save($cand); //DisqualifiedCandidateQualifications
						
						//INSERT QUALIFICATIONS
							if($data['sifa'])
							{
							//	$this->chapa($data['sifa']);
								foreach($data['sifa'] as $sifa)
								{
									if(trim($sifa)!='')
									{
										$sf=explode('/',$sifa);
										$candQ=$this->DisqualifiedCandidateQualifications->newEntity();
										$candQ->centre_number=$sf[0];
										$candQ->candidate_number=$sf[1];
										$candQ->exam_year=$sf[2];
										$candQ->disqualified_candidate_id=$cand->id;
										$this->DisqualifiedCandidateQualifications->save($candQ);
									}
								}
							}
						return 1;
					}
					else return 3;
		} //DATA CHECK
		
	}
	
	private function sifaVerify($names,$sifa,$exam)
	{
		if(is_array($sifa)&&!empty($sifa))
		{
			switch($exam)
			{
				case 'FTNA': return array(true,'');
				break;
				case 'CSEE': $scon = ConnectionManager::get('sifaftwo');
								$comnt = array();
								foreach($sifa as $ones)
								{
									$sf = explode('/',$ones);
									//1: Year Less Than 2
									if(date('Y') - intval($sf[2]) >= 2)
									{
									
										$query = $scon->newQuery();
										$query->select(['full_name','sex','avg','grade'])->from('tbl_form_two_data')
											->where(['candno' => $sf[0].'/'.$sf[1], 'exam_year'=>$sf[2]]);
											
										$rows = $query->execute()->fetchAll('assoc');
										$resn = '';
										if(!empty($rows))
										{
											foreach ($rows as $row) 
											{
												//2: Names Not Match
												//if(stripos($row['full_name'])) !== false) echo '=yee<br>';
												//echo $names[0].' '.$names[2].'<br>'.$row['full_name']; exit;
												if(stripos($row['full_name'],trim($names[0])) !== false && stripos($row['full_name'],trim($names[2])) !== false)
												{
													//3: Qualification
													if($row['avg']>30)
													{
														return array(true,'');
													}
													else $resn = $ones.' : Candidate has no Required Qualification';
												}
												else $resn = $ones.' : Registered name and Qualification name did not match';
											}
											$comnt[] = $resn;
										}
										else $comnt[] = $ones.' : Incorrect Qualification';
									}//1
									else $comnt[] = $ones.' : Qualification Year Less Than Required';
								}//FOREACH
								if(!empty($comnt)) return array(false,implode(', ',$comnt));
				break;
				default : return array(false,'Sorry, No Verification for '.$exam.' Qualifications Yet');
				break;
			}
		}
		else return 'Invalid Qualification Details';
	}
	
	private function chapa($dt)
	{
		echo '<pre>';
		var_dump($dt);
		echo '</pre>';
		die("<br>------------------------|-----------------<br>");
	}
}
