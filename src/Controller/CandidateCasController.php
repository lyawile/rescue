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
		$this->loadModel('Districts');
		$this->loadModel('Regions');
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
			$etype =  explode('_',$this->request->data['etype']);
			$cent = explode('_',$this->request->data['centre']);
			$subs = $this->request->data['chksub'];
			if($cent[0]<1 )$this->Flash->error(__('Please Select Centre'));
			else if($etype[0]<1)$this->Flash->error(__('Please Select Exam'));
			else
			{
				$this->write($etype[1],$cent[0],$cent[2].'_'.$cent[1],$subs);
			}
			
		}
        else 
		{
			 $this->Flash->set(__('Please Enter Only Marks/Grades in the Template, 
			 Do not alter the Template in anyway, add or remove any Sheet or Candidates or Row or Column. Use only downloaded Template, do not make yours!'));
		}
		
		$reg=$this->getregions();//
		$this->set('burl',$this->base);
		$this->set('regions',$reg);
		$this->set('districts', array('Select Region'));
		$this->set('etypes',array('Select Centre'));
		$this->set('centres', array('Select District'));		
		
		if(isset($reg[-1]))$this->Flash->error(__('No Regions Available'));
    }
	
	public function loaddistricts($reg)
	{
		$dsts=$this->getdistricts($reg);
		$a=1;
		$out='{"option0":{"value":"0","text":"District"}';
		foreach($dsts as $k=>$v)
		{
			$out.=',"option'.$a.'":{"value":"'.$k.'","text":"'.$v.'"}';
			$a++;
		}
		$out.='}';
		echo $out;
		exit();
	}
	public function loadcentres($dist)
	{
		
		$cnts=$this->getcentres($dist);
		
		$a=1;
		$out='{"option0":{"value":"0","text":"Centre"}';
		foreach($cnts as $k=>$v)
		{
			$k=str_replace('"',"'",$k);
			$v=str_replace('"',"'",$v);
			
			$out.=',"option'.$a.'":{"value":"'.$k.'","text":"'.$v.'"}';
			$a++;
		}
		$out.='}';
		echo $out;
		exit();
	}
	
	public function loadexams($cent)
	{
		$this->centreID=$cent;
		$cnts=$this->getexam($cent);
		$a=1;
		$out='{"option0":{"value":"0","text":"Exams"}';
		foreach($cnts as $k=>$v)
		{
			$k=str_replace('"',"'",$k);
			$v=str_replace('"',"'",$v);
			
			$out.=',"option'.$a.'":{"value":"'.$k.'","text":"'.$v.'"}';
			$a++;
		}
		$out.='}';
		echo $out;
		exit();
	}
	
	public function loadsubjects($exam)
	{
		$cnts=$this->getsubjects($exam);
		$a=1;
		$out='{"option0":{"value":"0","text":"Exams"}';
		foreach($cnts as $k=>$v)
		{
			$k=str_replace('"',"'",$k);
			$v=str_replace('"',"'",$v);
			
			$out.=',"option'.$a.'":{"value":"'.$k.'","text":"'.$v.'"}';
			$a++;
		}
		$out.='}';
		echo $out;
		exit();
	}
		
	private function getexam($centid)
	{
		//echo $centid;exit;
		$ety = $this->ExamTypes->find('all',array('fields' => array('id','short_name')))->where(['has_ca' => 1]);//
		$ety->innerJoinWith('CentreExamTypes', function ($q) { return $q->where(['centre_id' => $this->centreID]);});
		if(!$ety->isEmpty())
		{
			$etypes=$ety->toArray();
			$etype=array();
			foreach($etypes as $k=>$v)$etype[$v['id'].'_'.$v['short_name']]= $v['short_name'];
			return $etype;
		}
		return array(-1=>'No Exams');
	}
	private function getsubjects($exam)
	{
		//echo $centid;exit;
		$subs = $this->Subjects->find('all',array('fields' => array('id','code','name')))->where(['exam_type_id' => $exam]);//
		$subjects=$subs->toArray();
		$subject=array();
		foreach($subjects as $k=>$v)$subject[$v['id'].'_'.$v['code'].'_'.$v['name']]= $v['name'];
		return $subject;
	}
	
	public function getcentres($distid)
	{
		$cnt = $this->Centres->find('all',array('fields' => array('id','number','name')))->where(['district_id' => $distid]);
		//$cnt->innerJoinWith('Candidates', function ($q) { return $q->where(['1' => '1']);});
		if(!$cnt->isEmpty())
		{
			$centres=$cnt->toArray();
			$centre=array();
			$a=0;
			foreach($centres as $k=>$v)
			{
				$centre[$v['id'].'_'.$v['number'].'_'.$v['name']]=$v['number'].' - '.$v['name'];
				$a++;
			}
			return $centre;
		}
		return array(-1=>'No Centres');
	}
	
	public function getdistricts($regid)
	{
		$dst = $this->Districts->find('all',array('fields' => array('id','number','name')))->where(['region_id' => $regid]);
		if(!$dst->isEmpty())
		{
			$dists=$dst->toArray();
			$dist=array();
			$a=0;
			foreach($dists as $k=>$v)
			{
				$dist[$v['id']]=$v['number'].' - '.$v['name'];
				$a++;
			}
			return $dist;
		}
		return array(-1=>'No Districts');
	}
	
	public function getregions()
	{
		$reg = $this->Regions->find('all',array('fields' => array('id','number','name')));
		if(!$reg->isEmpty())
		{
			$regs=$reg->toArray();
			$region=array();
			$a=0;
			$region[0]='Region';
			foreach($regs as $k=>$v)
			{
				if($a==0)$getexm=$v['id'];
				$region[$v['id']]=$v['number'].' - '.$v['name'];
				$a++;
			}
			return $region;
		}
		return array(-1=>'No Regions');
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
	
	private function write($exam, $centid, $centre, $subs)
	{
		$cands = $this->Candidates->find('all',array('fields' => array('id','first_name','other_name','surname','number')))->where(['centre_id' => $centid]);
		
		
		//$subs= array('031'=>'PHYSICS','032'=>'CHEMISRTY','033'=>'BIOLOGY','040'=>'MATHEMATICS','013'=>'GEOGRAPHY');
		$dwnpath='downloads/ca/';
		$head=array();
		$head['A1']='THE NATIONAL EXAMINATIONS COUNCIL OF TANZANIA';
		$head['A2']='CONTINUOUS ASSESSMENT FORM FOR SECONDARY  SCHOOLS';
		
		//ROW3
		$head['A3']=$exam;		$head['B3']='FORM C.A. 1';		$head['C3']='Phone No:';		$head['D3']='766232987';
		
		//ROW4		
		$cent=explode('_', $centre);		
		$head['A4']='CENTRE NUMBER:';	$head['B4']=$cent[1];	$head['C4']='NAME:';	$head['D4']=$cent[0];	$head['E4']='YEAR:'; $head['F4']=date('Y');
		
		//ROW5
		$head['A5']='SUBJECT CODE:';/*$head['B5']=$ksb;*/	$head['C5']='NAME:'; /*$head['D5']=$sub;*/	$head['E5']='FORM:';	$head['F5']='VI';
		
		//ROW6
		$head['A6']="STUDENT'S";	$head['B6']='NAME OF STUDENT';	$head['C6']='F-3/5';	$head['D6']='F-3/5';	$head['E6']='PROJECT %';
		
		//ROW7
		$head['A7']='INDEX No.';/*$head['B7']='FORM II EXAM No.';*/	$head['B7']='FIRST NAME'; $head['C7']='MIDDLE NAME'; $head['D7']='SURNAME'; $head['E7']='T1 %';
		$head['F7']='T2 %';		$head['G7']='T1 %'; $head['H7']='PR %';
		
		$spreadsheet = new Spreadsheet();
		$helper = new Helper\Sample();
		$helper ->log( 'Create new Spreadsheet object' );
		$spreadsheet  = new Spreadsheet();
		//Set document properties 
		$helper ->log('Set document properties');
		$user=$this->Auth->user('first_name').' '.$this->Auth->user('other_name').' '.$this->Auth->user('surname');
		$spreadsheet ->getProperties()
		->setCreator($user)
		->setLastModifiedBy($user)
		->setTitle('NECTA eSERVICE'.date('Y').' CA Template')
		->setSubject('Candidate CA')
		->setDescription('Continuous Assessment Template')
		->setKeywords('NECTA CA Template')
		->setCategory('CA');
		
		//
		$spreadsheet->getSecurity()->setLockStructure(true);
		$spreadsheet->getSecurity()->setWorkbookPassword("BARAZA");
		// Add some data 
		$helper ->log('Add some data');
		$a=0;
		foreach($subs as $val)
		{
			//53_121_KISWAHILI
			$somo=explode('_',$val);
			$ksb = $somo[1];
			$sub = $somo[2];
			
			$head['B5']=$ksb;
			$head['D5']=ucfirst(strtolower($sub));
			if($a>0)$spreadsheet ->createSheet();
			foreach($head as $k=>$v)
			{
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue($k, $v);
			}
			$spreadsheet->getActiveSheet()->mergeCells('$A1:$G1');
			$spreadsheet->getActiveSheet()->mergeCells('$A2:$G2');		
			
			//CANDIDATES
			$rw=8;
				if(!$cands->isEmpty())
				{
					$cand=$cands->toArray();
					
					foreach($cand as $v)
					{
						$spreadsheet ->setActiveSheetIndex($a)->setCellValue('A'.$rw,$v['number']);
						$spreadsheet ->setActiveSheetIndex($a)->setCellValue('B'.$rw,$v['first_name']);
						$spreadsheet ->setActiveSheetIndex($a)->setCellValue('C'.$rw,$v['other_name']);
						$spreadsheet ->setActiveSheetIndex($a)->setCellValue('D'.$rw,$v['surname']);
						$rw++;
					}
				}
			
			//SHEET WIDTH
			$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(14);
			//
			/*error_reporting(0);
			foreach(range('A','H') as $columnID) 
			{
				$spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			}
			*/
			
			//SHEET PROTECTION
			$spreadsheet->getActiveSheet()->getProtection()->setPassword('BARAZA');
			$spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
			$spreadsheet->getActiveSheet()->getProtection()->setSort(true);
			$spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
			$spreadsheet->getActiveSheet()->getProtection()->setInsertColumns(true);
			$spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
			//$spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
			$spreadsheet->getActiveSheet()->getStyle('E8:H'.($rw-1)) ->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			
			//$spreadsheet->getActiveSheet()->getStyle('E8:H'.($rw-1))->getFill()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
			$fill=array('fill' => array('type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,'color' => array('rgb' => 'FF0000')));
			$spreadsheet->getActiveSheet()->getStyle('E8:H'.($rw-1))->applyFromArray($fill);
			
			$validation = $spreadsheet->getActiveSheet()->getCell('E8') ->getDataValidation();
			$validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_WHOLE );
			$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP );
			$validation->setAllowBlank(true);
			$validation->setShowInputMessage(true);
			$validation->setShowErrorMessage(true);
			$validation->setErrorTitle('Marks error');
			$validation->setError('Marks not allowed!');
			$validation->setPromptTitle('Allowed Marks');
			$validation->setPrompt('Only numbers between 0 and 100 are allowed.');
			$validation->setFormula1(0.00);
			$validation->setFormula2(100.00);
			//
			$spreadsheet->getActiveSheet()->getCell('B8')->setDataValidation(clone $validation);

			//STYLE HEAD 1
			$h1=array( 'font' => array('bold' => true,'size' => 16)
			,'alignment' => array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER));
			//STYLE HEAD 2
			$h2=array( 'font' => array('bold' => false,'size' => 14)
			,'alignment' => array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER));
			//STYLE HEAD 3
			$h3=array( 'font' => array('bold' => true)
			,'alignment' => array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER));
		
			$spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($h1);
			$spreadsheet->getActiveSheet()->getStyle('A2')->applyFromArray($h2);
			$spreadsheet->getActiveSheet()->getStyle('A3')->applyFromArray($h3);
			
			//SET BORDERS			
			$bod=array( 'borders' => array('outline' =>  array('borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,'outline' =>array('color' => ['argb' => 'FFFF0000']))));
			foreach(range('A','H') as $columnID) 
			{
				for($i=7;$i<$rw;$i++)
				{
					$spreadsheet->getActiveSheet()->getStyle($columnID.$i)->applyFromArray($bod);
				}
			}
			
			//THE BOLDS
			foreach(range('A','G') as $col) $spreadsheet->getActiveSheet()->getStyle($col.'7')->applyFromArray($h3);
			$bolds=array('B4','D4','B5','D5','F5');
			foreach($bolds as $cell) $spreadsheet->getActiveSheet()->getStyle($cell)->applyFromArray($h3);
			
			///****/
			
			//FOOTER
				/*I certify that the information given in this form is correct						
				Name and signature of subject teacher     .    						
				WYCLIFFE OTENYO			Date	20.03.2018		
				Name and signature of Head of department     .    						
				WYCLIFFE OTENYO			Date	20.03.2018		*/

			//******//
			$ft=array();
			$ft['B'.$rw]='I certify that the information given in this form is correct';
			$ft['B'.($rw+1)]='Name and signature of subject teacher';
			$ft['B'.($rw+2)]='WYCLIFFE OTENYO';	$ft['E'.($rw+2)]='Date';	$ft['F'.($rw+2)]='20.03.2018';
			$ft['B'.($rw+3)]='Name and signature of Head of department ';
			$ft['B'.($rw+4)]='WYCLIFFE OTENYO';	$ft['E'.($rw+4)]='Date';	$ft['F'.($rw+4)]='20.03.2018';
			foreach($ft as $kf=>$vf)
			{
				//echo $kf.'||';
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue($kf, $vf);
			}//exit;
			$spreadsheet->getActiveSheet()->mergeCells('$B'.$rw.':H$'.$rw);
			$spreadsheet->getActiveSheet()->mergeCells('$B'.($rw+1).':H$'.($rw+1));
			$spreadsheet->getActiveSheet()->mergeCells('$B'.($rw+3).':H$'.($rw+3));
			$spreadsheet->getActiveSheet()->mergeCells('$B'.($rw+2).':D$'.($rw+2));
			$spreadsheet->getActiveSheet()->mergeCells('$F'.($rw+2).':H$'.($rw+2));
			$spreadsheet->getActiveSheet()->mergeCells('$B'.($rw+4).':D$'.($rw+4));
			$spreadsheet->getActiveSheet()->mergeCells('$F'.($rw+4).':H$'.($rw+4));
			//STYLE FOOTER
			$SF1=array( 'font' => array('bold' => true,'italic' => true)
			,'alignment' => array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER));
			$SF2=array( 'font' => array('bold' => true,'italic' => true));
			
			$spreadsheet->getActiveSheet()->getStyle('B'.($rw))->applyFromArray($SF1);
			$f2=array('B'.($rw+1),'B'.($rw+3),'E'.($rw+2),'E'.($rw+4));
			foreach($f2 as $cell) $spreadsheet->getActiveSheet()->getStyle($cell)->applyFromArray($SF2);
			
			//finishing SHEET
			$spreadsheet ->getActiveSheet()->setTitle($ksb.'-'.$sub);
			
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
