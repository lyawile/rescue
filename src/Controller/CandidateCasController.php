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
 * CandidateCas Controller
 *
 * @property \App\Model\Table\CandidateCasTable $CandidateCas
 *
 * @method \App\Model\Entity\CandidateCa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CandidateCasController extends AppController
{
	var $centreID;
	 public function initialize(){
        parent::initialize();
        
        // Include the FlashComponent  
        $this->loadComponent('Flash');
		$this->loadModel('Subjects');
		$this->loadModel('ExamTypes');
		$this->loadModel('Centres');
		$this->loadModel('Candidates');
		$this->loadModel('CentreExamTypes');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CandidateSubjects']
        ];
        $candidateCas = $this->paginate($this->CandidateCas);

        $this->set(compact('candidateCas'));
    }

    /**
     * View method
     *
     * @param string|null $id Candidate Ca id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidateCa = $this->CandidateCas->get($id, [
            'contain' => ['CandidateSubjects']
        ]);

        $this->set('candidateCa', $candidateCa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidateCa = $this->CandidateCas->newEntity();
        if ($this->request->is('post')) {
            $candidateCa = $this->CandidateCas->patchEntity($candidateCa, $this->request->getData());
            if ($this->CandidateCas->save($candidateCa)) {
                $this->Flash->success(__('The candidate ca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate ca could not be saved. Please, try again.'));
        }
        $candidateSubjects = $this->CandidateCas->CandidateSubjects->find('list', ['limit' => 200]);
        $this->set(compact('candidateCa', 'candidateSubjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate Ca id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidateCa = $this->CandidateCas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidateCa = $this->CandidateCas->patchEntity($candidateCa, $this->request->getData());
            if ($this->CandidateCas->save($candidateCa)) {
                $this->Flash->success(__('The candidate ca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate ca could not be saved. Please, try again.'));
        }
        $candidateSubjects = $this->CandidateCas->CandidateSubjects->find('list', ['limit' => 200]);
        $this->set(compact('candidateCa', 'candidateSubjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate Ca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidateCa = $this->CandidateCas->get($id);
        if ($this->CandidateCas->delete($candidateCa)) {
            $this->Flash->success(__('The candidate ca has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate ca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function templatedown()
    {	 
        if ($this->request->is('post')) 
		{
			echo $this->request->data['etype']; echo '<br>';
			echo $this->request->data['centre'];
			exit;
            $this->Flash->error(__('YOU Sir, have Posted'));
			
		}
        else 
		{
			 $this->Flash->set(__('Please Enter Only Marks/Grades in the Template, 
			 Do not alter the Template in anyway, add or remove any Sheet or Candidates or Row or Column. Use only downloaded Template, do not make yours!'));
		}
		
		
		$cnt = $this->get
		entres->find('all',array('fields' => array('id','number','name')));
		$cnt->innerJoinWith('Candidates', function ($q) { return $q->where(['1' => '1']);});
		
		if(!$cnt->isEmpty())
		{
			$centres=$cnt->toArray();
			$centre=array();
			$a=0;
			foreach($centres as $k=>$v)
			{
				if($a==0)$getexm=$v['id'];
				$centre[$v['id'].'-'.$v['number'].' - '.$v['name']]=$v['number'].' - '.$v['name'];
				$a++;
			}
			
			$this->centreID=$getexm;
			$etype=$this->getexam($getexm);
			$this->set('etypes',$etype);
			$this->set('centres', $centre);
		}
		else
		{
			$this->Flash->error(__('No Centres With Candidates Available'));
			$etype=array('No Exams');
			$centre=array('No Centres');
			$this->set('etypes',$etype);
			$this->set('centres', $centre);
		}
		
    }
	private function getexam($centid)
	{
		//echo $centid;exit;
		$ety = $this->ExamTypes->find('all',array('fields' => array('id','short_name')))->where(['has_ca' => 1]);//
		$ety->innerJoinWith('CentreExamTypes', function ($q) { return $q->where(['centre_id' => $this->centreID]);});
		$etypes=$ety->toArray();
		$etype=array();
		foreach($etypes as $k=>$v)$etype[$v['id'].'-'.$v['short_name']]= $v['short_name'];
		return $etype;
	}
	private function getsubjects($exam)
	{
		//echo $centid;exit;
		$subs = $this->Subjects->find('all',array('fields' => array('id','code','name')))->where(['exam_type_id' => $exam]);//
		$subjects=$subs->toArray();
		$subject=array();
		foreach($subjects as $k=>$v)$subject[$v['id'].'-'.$v['code']]= $v['name'];
		return $subject;
	}
	
	public function getcentres($distid)
	{
		$cnt = $this->Centres->find('all',array('fields' => array('id','number','name')))->where(['district_id' => $distid]);
		$cnt->innerJoinWith('Candidates', function ($q) { return $q->where(['1' => '1']);});
		if(!$cnt->isEmpty())
		{
			$centres=$cnt->toArray();
			$centre=array();
			$a=0;
			foreach($centres as $k=>$v)
			{
				$centre[$v['id'].'-'.$v['number'].' - '.$v['name']]=$v['number'].' - '.$v['name'];
				$a++;
			}
			return $centre;
		}
		return false;
	}
	
	public function getdistricts($regid)
	{
		$dst = $this->Centres->find('all',array('fields' => array('id','number','name')))->where(['region_id' => $regid]);
		if(!$dst->isEmpty())
		{
			$dists=$dst->toArray();
			$dist=array();
			$a=0;
			foreach($dists as $k=>$v)
			{
				$dist[$v['id'].'-'.$v['number'].' - '.$v['name']]=$v['number'].' - '.$v['name'];
				$a++;
			}
			return $dist;
		}
		return false;
	}
	
	public function getregions($distid)
	{
		$cnt = $this->Centres->find('all',array('fields' => array('id','number','name')))->where(['district_id' => $distid]);
		$cnt->innerJoinWith('Candidates', function ($q) { return $q->where(['1' => '1']);});
		if(!$cnt->isEmpty())
		{
			$centres=$cnt->toArray();
			$centre=array();
			$a=0;
			foreach($centres as $k=>$v)
			{
				if($a==0)$getexm=$v['id'];
				$centre[$v['id'].'-'.$v['number'].' - '.$v['name']]=$v['number'].' - '.$v['name'];
				$a++;
			}
			return $centre;
		}
		return false;
	}
	public function bulk()
    {
		 $uploadData = '';
		 $allowedtypes=array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		 
        if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
				
				if(in_array($this->request->data['file']['type'],$allowedtypes) )
				{
					$uploadPath = 'uploads/cas/';
					$uploadFile = $uploadPath.$fileName;
					//$ftype = $this->request->data['file']['name'];
					if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
						$msg=$this->importExcelfile($uploadFile);
						$msgs=explode(';',$msg);
						if($msgs[0]==0)$this->Flash->error(__($msgs[1]));
						else $this->Flash->success(__($msgs[1]));
						
					}else{
						$this->Flash->error(__('Unable to upload file, please try again.'));
					}
				}else{
						$this->Flash->error(__('Please Upload Only XLS,CSV and XLSX files'));
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
		ini_set('memory_limit', '512M');
		$spreadsheet = IOFactory::load($fname);
		$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
		$ans=$this->fileprocess($sheetData);
		return $ans;
	}
		
	private function fileprocess($data)
	{
		$alpha=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
		//TEMPLATES SET
		//-ID-KEYWORDS-DATA WIDTH-DATA CELLS
		/*************
		KEY: SIFA //0-no sifa, 1-csee (1 sifa/3 columns), 2-acsee+dse+gatce(3 sifaz/3 columns),	3-gatscce(1 sifa/1 columns)	
			sft- Sifa Type, sfb - Begining Column of Sifa, we- Work Experience, rep - Repeater, cmb - Combination
			subs - Beginning Column fo subjects, sube- ending column for subjects, pg - Parent/Guardian
		
		************/
	//CONTINUOUS ASSESSMENT FORM FOR SECONDARY  SCHOOLS									
	//CONTINUOUS ASSESSMENT FORM FOR TEACHER TRAINING COLLEGES								

	$templates=array(
	'CSEE'=>array(array('IV'),25
	,array('sft'=>1,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>20,'dis'=>21,'gp'=>23,'7n'=>false,'7y'=>false,'cmb'=>false)),
	'ACSEE'=>array(array('VI'),22
	,array('sft'=>2,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>16,'dis'=>17,'gp'=>20,'7n'=>false,'7y'=>false,'cmb'=>18)),
	'DSEE'=>array(array('DIPLOMA IN SECONDARY EDUCATION EXAMINATION'),26
	,array('sft'=>2,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>22,'dis'=>23,'gp'=>false,'7n'=>false,'7y'=>false,'cmb'=>false)),
	'DTE'=>array(array('DIPLOMA IN TECHNICAL EDUCATION EXAMINATION'),26
	,array('sft'=>2,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>22,'dis'=>23,'gp'=>false,'7n'=>false,'7y'=>false,'cmb'=>false)),
	'GATCE'=>array(array("GRADE 'A' TEACHER CERTIFICATE  EXAMINATION"),27
	,array('sft'=>2,'sfb'=>1,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>23,'dis'=>24,'gp'=>false,'7n'=>false,'7y'=>false,'cmb'=>false)),
	'GATSCCE'=>array(array("GRADE 'A' TEACHER SPECIAL COURSE CERTIFICATE  EXAMINATION"),25
	,array('sft'=>3,'sfb'=>1,'we'=>2,'rep'=>false,'sex'=>3,'nem'=>4,'dob'=>7,'subs'=>10,'sube'=>20,'dis'=>21,'gp'=>false,'7n'=>false,'7y'=>false,'cmb'=>false)));
	
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
				$metaDT=$templates[$examTP][2];
				
				
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
				
				//ARRAYS
				$complete=array();
				$incomplete=array();
				
								
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
				
				if($candname!='')
				{
					$bad=false;
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
						if($we>0)$bad=true;
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
					if($sex!='M' && $sex!='F')$bad=true;
					$ROW['sex']=$sex;
					
					//6) CANDIDADOS
					$c=$metaDT['nem'];
					$nem=array();
					$nem[]= trim($data[$rw][$alpha[$c]]);
					$nem[]= trim($data[$rw][$alpha[$c+1]]);
					$nem[]= trim($data[$rw][$alpha[$c+2]]);
					//Valid check
					if($nem[0]=='' ||  $nem[2]=='' )$bad=true;
					$ROW['name']=$nem;
					
					
					//7) DATE OF BIRTH
					$c=$metaDT['dob'];
					$d=intval($data[$rw][$alpha[$c]]);
					$m=intval($data[$rw][$alpha[$c+1]]);
					$Y=intval($data[$rw][$alpha[$c+2]]);
					
					
					$dob=$Y.'-'.$m.'-'.$d;
					//valid check
					if(!checkdate($m,$d,$Y))$bad=true;
					
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
					
					//TO ARRAY
					if($bad)$incomplete[]=$ROW;
					else $complete[]=$ROW;
			
				}//NO CANDIDATE NAME
				
			}//CANDS LOOP
			
			//FINALIZE READ
			if(empty($complete) && empty($incomplete))return '0;'."Empty Template : No Candidates found";
			else
			{
				//$this->chapa($incomplete);
				//HEADER
				$dataHead=array();
				$dataHead['exam']=$examTP;
				$dataHead['centre']=$examCT;
				
				if(!empty($complete))
				{
					$feedback=$this->dataInsert($dataHead,$complete);
				}
				else
				{
					//
					$feedback='Sorry, None of the Candidates Data met Registration Requirements. Please check the original Template Structure and Refer Registration Guidelines';
					return '0;'.$feedback;
				}
				return '2;'.$feedback.';'.implode('_',$dataHead);
				
			}
				
			}//TEMPLATE CHECKS 
			else return '0;'.implode(', ',$msg);

		}//ARRAY CHECK
		else return '0;'."Empty File : Could not Read Data";
	}
	private function dataInsert($dataHead,$dataBody)
	{
		//'sft'=>false,'sfb'=>false,'we'=>false,'rep'=>false,'sex'=>4,'nem'=>5,'dob'=>8,'subs'=>11,'sube'=>20,'dis'=>21,'gp'=>23,'7n'=>false,'7y'=>false,'cmb'=>false
		
		//1) CHECK SIFA
		
		//echo $dataHead['exam'].'      '.$dataHead['centre'].'<br>'.str_repeat('*',110).'<br>';
		//foreach($data as $line)
		//echo implode(',',$line).'<br>';
		
		//$this->chapa($data);
	//	exit;
		
		if(is_array($dataBody))
		{	$a=0;
			foreach($dataBody as $data)
			{
				$cent = $this->Centres->findByNumber($dataHead['centre'])->first();
				$exam = $this->ExamTypes->findByShortName($dataHead['exam'])->first();		
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
				
				$cand->centre_id=$cent->id; 
				$cand->exam_type_id=$exam->id; 
				$this->Candidates->save($cand);
				//  $sqllog = $this->Candidates->getDataSource()->getLog(false, false);       
 				 //debug($sqllog);
						
				//INSERT DISABILITIES
				if($data['dis'])
				{
					$replace=array(' ','.');
					$dis=str_replace($replace,'',strtoupper(trim($data['dis'])));
					$dis=$dis=='OTHERS'?ucfirst(strtolower($dis)):$dis;
					
					$disob= $this->Disabilities->findByShortname($dis)->first();
					$disab=$this->CandidateDisabilities->newEntity();
					$disab->disability_id=$disob->id;
				 	$disab->candidate_id=$cand->id;
					$this->CandidateDisabilities->save($disab);
					
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
						
				//INSERT SUBJECTS  
				foreach($data['subs'] as $sbj)
				{
					if($sbj!='' && $sbj!='00')
					{
					$subo = $this->Subjects->findByCode(intval($sbj))->first();
					if($subo!=NULL)
					{
						//SUBJECT FOUND
						$candsub = $this->CandidateSubjects->newEntity();
						$candsub->candidate_id=$cand->id;
						$candsub->subject_id=$subo->id;
						$this->CandidateSubjects->save($candsub);
					}
					}
				}//FOREACH SUBS
				
				$a++;
			}//FOREACH
			return $a.' - Candidates Data Inserted';
		} //DATA CHECK
		
	}
	public function cadown()
	{
		$this->write();
	}
	
	private function write()
	{
		$subs= array('031'=>'PHYSICS','032'=>'CHEMISRTY','033'=>'BIOLOGY','040'=>'MATHEMATICS','013'=>'GEOGRAPHY');
		$dwnpath='downloads/ca/';
		$head=array();
		$head['A1']='THE NATIONAL EXAMINATIONS COUNCIL OF TANZANIA';
		$head['A2']='CONTINUOUS ASSESSMENT FORM FOR SECONDARY  SCHOOLS';
		
		$head['D3']='FORM C.A. 1';
		$head['F3']='Phone No:';
		$head['H3']='766232987';
		
		$head['A4']='CENTRE NUMBER:';
		$head['B4']='S0788';
		$head['C4']='NAME:';
		$head['D4']='BUTURI SECONDARY SCHOOL';
		$head['E4']='YEAR:';
		$head['F4']='2018';
		
		//
		$head['A5']='SUBJECT CODE:';
		//$head['B5']=$ksb;
		$head['C5']='NAME:';
		//$head['D5']=$sub;
		$head['E5']='YEAR:';
		$head['F5']='2018';
		
		//
		$head['A6']="STUDENT'S";
		$head['B6']='NAME OF STUDENT';
		$head['C6']='F-3/5';
		$head['D6']='F-3/5';
		$head['E6']='PROJECT %';
		
		//
		$head['A7']='IDENTIFICATION No.';
		$head['B7']='FORM II EXAM No.';
		$head['E7']='FIRST NAME';
		$head['F7']='MIDDLE NAME';
		$head['G7']='SURNAME';
		$head['H7']='T1 %';
		$head['I7']='T2 %';
		$head['J7']='T1 %';
		
		$spreadsheet = new Spreadsheet();
		$helper = new Helper\Sample();
		$helper ->log( 'Create new Spreadsheet object' );
		$spreadsheet  = new Spreadsheet();
		//Set document properties 
		$helper ->log('Set document properties');
		$spreadsheet ->getProperties()
		->setCreator('shubh ')
		->setLastModifiedBy('Arjun')
		->setTitle('TCA')
		->setSubject('SCA')
		->setDescription('DCA')
		->setKeywords('office PhpSpreadsheet php')
		->setCategory('catCA');
		// Add some data 
		$helper ->log('Add some data');
		$a=0;
		foreach($subs as $ksb=>$sub)
		{
			$head['B5']=$ksb;
			$head['D5']=ucfirst(strtolower($sub));
			if($a>0)$spreadsheet ->createSheet();
			foreach($head as $k=>$v)
			{
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue($k, $v);
			}
			$spreadsheet->getActiveSheet()->mergeCells('$A1:$H1');
			$spreadsheet->getActiveSheet()->mergeCells('$A2:$H2');			
			/*foreach(range('A','H') as $columnID) 
			{
				$spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			}*/
			$spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
			$spreadsheet->getActiveSheet()->getStyle('H8:J20') ->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			
			$validation = $spreadsheet->getActiveSheet()->getCell('H8') ->getDataValidation();
			$validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_WHOLE );
			$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP );
			$validation->setAllowBlank(true);
			$validation->setShowInputMessage(true);
			$validation->setShowErrorMessage(true);
			$validation->setErrorTitle('Input error');
			$validation->setError('Number is not allowed!');
			$validation->setPromptTitle('Allowed input');
			$validation->setPrompt('Only numbers between 0 and 100 are allowed.');
			$validation->setFormula1(0.00);
			$validation->setFormula2(100.00);

			/*$spreadsheet ->setActiveSheetIndex(0)
			->setCellValue('A1', 'Hello')
			->setCellValue('B1', 'world!')
			->setCellValue('A2', 'Hello')
			->setCellValue('B2', 'world!');
			$helper ->log('Rename worksheet');*/
			$spreadsheet ->getActiveSheet()
			->setTitle($ksb.'-'.$sub);
			$a++;	
		}
		$writer = new Xlsx($spreadsheet);
		$writer ->save($dwnpath.'CA'.date('Y').'.xlsx');
		die;
		
	}
	
	private function chapa($dt)
	{
		echo '<pre>';
		var_dump($dt);
		echo '</pre>';
		die("<br>------------------------|-----------------<br>");
	}
}
