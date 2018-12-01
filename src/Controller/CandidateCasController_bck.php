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
		$this->loadModel('CandidateCas');
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
            'contain' => ['Candidates', 'Subjects']
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
            'contain' => ['Candidates', 'Subjects']
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
        $candidates = $this->CandidateCas->Candidates->find('list', ['limit' => 200]);
        $subjects = $this->CandidateCas->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('candidateCa', 'candidates', 'subjects'));
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
        $candidates = $this->CandidateCas->Candidates->find('list', ['limit' => 200]);
        $subjects = $this->CandidateCas->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('candidateCa', 'candidates', 'subjects'));
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
			$etype =  explode('_',$this->request->getData['exam']);
			$cent = $this->getcentres($this->request->getSession()->read('centreId'));
			$subs = $this->request->getData['chksub'];
			if($cent[0]<1 )$this->Flash->error(__('Please Select Centre'));
			else if($etype[0]<1)$this->Flash->error(__('Please Select Exam'));
			else
			{
				$this->write($etype[1],$cent[0],$cent[2].'_'.$cent[1],$subs);
			}
			
		}
        $cent = $this->getcentres($this->request->getSession()->read('centreId'));
		$centid = '';
		if($cent!='Select Centre')
		{
			$c=explode('_',$cent);
			$cent=$c[1];
			$centid = $c[0].'_'.$c[1];
		}
        $this->set('centre', $cent);
		
		$exams=$this->getexam();
		$this->set('etypes',$exams);
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
		$a=0;
		//$out='{"option0":{"value":"0","text":"Exams"}';
		foreach($cnts as $k=>$v)
		{
			$k=str_replace('"',"'",$k);
			$v=str_replace('"',"'",$v);
			if($a!=0)$out.=',';
			else $out='{';
			
			$out.='"option'.$a.'":{"value":"'.$k.'","text":"'.$v.'"}';
			$a++;
		}
		$out.='}';
		echo $out;
		exit();
	}
		
	private function getexam()
	{
		//echo $centid;exit;
		$ety = $this->ExamTypes->find('all',array('fields' => array('id','short_name')))->where(['has_ca' => 1]);//
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
	private function getsubjects($exam)
	{
		//echo $centid;exit;
		$subs = $this->Subjects->find('all',array('fields' => array('id','code','name')))->where(['exam_type_id' => $exam]);//
		$subjects=$subs->toArray();
		$subject=array();
		foreach($subjects as $k=>$v)$subject[$v['id'].'_'.$v['code'].'_'.$v['name']]= $v['name'];
		return $subject;
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
	
	
	public function bulk()
    {
		 $uploadData = '';
		 $allowedtypes=array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		 
        if ($this->request->is('post')) {
			if(!empty($this->request->getData['exam']))
				if(!empty($this->request->getData['file']['name'])){
					$fileName = $this->request->getData['file']['name'];
					$exam = $this->request->getData['exam'];
					
					if(in_array($this->request->getData['file']['type'],$allowedtypes) )
					{
						$uploadPath = 'uploads'.DS.'cas'.DS;
						$uploadFile = $uploadPath.$fileName;
						//$ftype = $this->request->getData['file']['name'];
						if(move_uploaded_file($this->request->getData['file']['tmp_name'],$uploadFile)){
							$msg=$this->importExcelfile($uploadFile, $exam);
							//$this->chapa($msg);
							$this->set('msgs',$msg);
							
						}else{
							$this->Flash->error(__('Unable to upload file, please try again.'));
						}
					}else{
							$this->Flash->error(__('Please Upload Only XLS,CSV and XLSX files'));
						}
				}else{
					$this->Flash->error(__('Please choose a file to upload.'));
           }else{
					$this->Flash->error(__('Please Select Exam'));
				} 
        }
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
	
	
	private function importExcelfile ($fname, $exam){
		ini_set('memory_limit', '512M');
		$spreadsheet = IOFactory::load($fname);
		//
		$scount = $spreadsheet->getSheetCount();
		$allsheets = $spreadsheet->getSheetNames();
		$file = explode(DS,$fname);
		$filename = $file[sizeof($file)-1];
		$ansArr=array();
		for($a=0;$a<$scount;$a++)
		{
			$sheetData = $spreadsheet->getSheet($a)->toArray(null, true, true, true);
			$ans = $this->fileprocess($sheetData,$exam);
			$ansArr[]=array($filename,$allsheets[$a],$ans);
		}
		return $ansArr;
	}
		
	private function fileprocess($data,$exam)
	{
		$alpha=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
	//TEMPLATES SET
									
	//CONTINUOUS ASSESSMENT FORM FOR TEACHER TRAINING COLLEGES								

		$templates=array(
		'CSEE'=>array(array('CSEE'),8,array('proj'=>true,'begn'=>4,'btp'=>false)),
		'ACSEE'=>array(array('ACSEE'),8,array('proj'=>true,'begn'=>4,'btp'=>false)),
		'DSEE'=>array(array('DSEE'),8,array('proj'=>false,'begn'=>4,'btp'=>false)),
		'DTE'=>array(array('DTE'),8,array('proj'=>false,'begn'=>4,'btp'=>false)),
		'GATCE'=>array(array("GATCE"),8,array('proj'=>false,'begn'=>4,'btp'=>false)),
		'GATSCCE'=>array(array("GATSCCE"),8,array('proj'=>false,'begn'=>4,'btp'=>false)));
		
		
		//DATA START INDICATORS
		$dataIC=array('INDEX NO.');
		$subBTP=array(array("BTP"),7,array('proj'=>true,'begn'=>4,'btp'=>true));
		
		$checkET=false;
		$checkCT=false;
		$checkDT=false;
		$checkSB=false;
		$checkBTP=false;
		$dataStart=0;
		$tWidth=sizeof($data[1]);
		$exmWidth=0;
		$msg=array();
		$keepRead=true;
			
		if(is_array($data))
		{
			// 1) RECONCILIATE EXAM TYPES and CENTRE number
					$tempLength=sizeof($data);
					$endcheck=9;
					$bAT=($endcheck<$tempLength)?$endcheck:$tempLength;
					for($j=1;$j<$endcheck;$j++)
					{
						if($j>$bAT)break;
						foreach($data[$j] as $key=>$cell)
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
								
								//SUBJECT
								if(preg_match("/^[0-9]{2,3}/i", trim($cell)))
								{
									$checkSB=true;
									$subNo=substr('00'.(trim($cell)),-3);
									//egeshea $data[$j]
									$key2=$key;
									$key2++;
									$key2++;
									$subName = $data[$j][$key2];
								}
							}
							else
							{
								foreach($dataIC as $st)
								{
									//exam type
										if (strpos(strtoupper($cell),$st) !== false)
										{ 
											$checkDT = true;
											$dataStart = $j+1;
										}
								}
							}
							if(trim(strtoupper($cell)) == 'BTP')
							{
								$checkBTP=true;
								$subNo='000';
								$subName = 'BTP';
							}
						}//foreach
					}//for
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
			
			//Exam Subject
			if(!$checkSB)
			{
				$msg[]='Subject Code Not Found in the Template';
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
			//Data Presence
			if(sizeof($data)<$dataStart)
			{
				$msg[]="No Registration Data Found";
				$keepRead=false;
			}
			
			

			
			if($keepRead)
			{
				//ARRAYS
				$metaDT=$checkBTP?$subBTP[2]:$templates[$examTP][2];	
				
				$incomplete=array();
				
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
				
				//GET SUBJECT ID
				$dbsub = $this->Subjects->find()->where(["right(concat('00',code),3)" => $subNo])->first();
				if(!empty($dbsub))
				{
					$dbsubid=$dbsub->id;
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
				
				
			//	echo 'EXAM '.$examTP.' vs '.$exam.' : CENTRE '.$dbcentid.' vs '.($this->request->getSession()->read('centreId')).' : SUBJECT '. $dbsubid; exit;
			//return '99;'."SUBJECT NAME ".$subName.' : SUBJECT NO '.$subNo.' : SUBJECT ID '. $dbsubid;
					$b=0;
					$d=0;			
			for($rw=$dataStart; $rw<sizeof($data);$rw++)
			{
				
				//BEGIN
				//CANDIDADOS
				$c=1;
				$nem=array();
				$nem[]= trim($data[$rw][$alpha[$c]]);
				$nem[]= trim($data[$rw][$alpha[$c+1]]);
				$nem[]= trim($data[$rw][$alpha[$c+2]]);
				
				if($nem[0]!='' && $nem[2]!='')
				{
					//1)NAMBA
					$refNO=substr('00'.$data[$rw][$alpha[0]],-4);	
					
					//3) MARKS begn
					$c=$metaDT['begn'];
					//'proj'=>true,'begn'=>5,'btp'=>false
						if($metaDT['btp'])
						{
							$grade = trim($data[$rw][$alpha[$c]]);
							$btp = preg_match("/^[A-Z]/i",$grade)?$grade:'NULL';
							$proj=intval(trim($data[$rw][$alpha[$c+1]]));
							$remks=trim($data[$rw][$alpha[$c+2]]);
							$onem = false;$twom = false;$threem = false;
						}
						else
						{
							
							$onem=intval(trim($data[$rw][$alpha[$c]]));
							$twom=intval(trim($data[$rw][$alpha[$c+1]]));
							$threem=intval(trim($data[$rw][$alpha[$c+2]]));
							if($metaDT['proj'])
							{
								$proj=intval(trim($data[$rw][$alpha[$c+3]]));
								$remks = false;
							}
							else
							{
								$remks = trim($data[$rw][$alpha[$c+3]]);
								$proj = false;
							}
							
							$btp = false;
							
						}
					
					//GET CANDIDATE
					$where = array(
									"right(concat('00',number),3)" => $refNO
									,'first_name' => $nem[0]
									,'other_name' => $nem[1]
									,'surname' => $nem[2]
									,'centre_id' => $dbcentid
									,'exam_type_id' => $dbexamid);
									
					$cands = $this->Candidates->find()->select(array('id', 'exam_type_id'))->where($where)->first();
					if(!empty($cands))
					{ 
						$twhere=array('subject_id' => $dbsubid,'candidate_id' => $cands->id);
						
						$caob = $this->CandidateCas->find()->where($twhere)->first();
						if(empty($caob))
						{
							$ca =$this->CandidateCas->newEntity();
							$b++;
						}
						else
						{
							$ca = $caob;
							$d++;
						}
						
						if($onem)$ca->y1t1=$onem;
						if($twom)$ca->y1t2=$twom;
						if($threem)$ca->y2t1=$threem;
						if($proj)$ca->project=$proj;
						if($remks)$ca->remarks=$remks;
						if($btp)$ca->btp=$btp;
						
						$ca->candidate_id=$cands->id;
						$ca->subject_id=$dbsubid; 
						$this->CandidateCas->save($ca);
						//CandidateCas*/
						
					}
			
				}//NO CANDIDATE NAME
				
			}//CANDS LOOP
			//finish
			$ret = empty($msg)?'2':'1';
			
			$msg[]=$subName.' ('.$subNo.') : '.($d+$b).' - Candidates, '.$b.' - Inserted, '.$d.' - Changed';
			return $ret.';'.implode('<br> ',$msg);
			
			}//TEMPLATE CHECKS 
			else return '0;'.implode('<br> ',$msg);

		}//ARRAY CHECK
		else return '0;'."Empty File : Could not Read Data";
	}
		
	private function write($exam, $centid, $centre, $subs)
	{
		$cands = $this->Candidates->find('all',array('fields' => array('id','first_name','other_name','surname','number')))->where(['centre_id' => $centid]);
		
		$templates=array(
		'CSEE'=>array('C3'=>'FORM CA 1','E5'=>'FORM','F5'=>'IV','E6'=>'F-3','G6'=>'F-4'),
		'ACSEE'=>array('C3'=>'FORM CA 1','E5'=>'FORM','F5'=>'VI','E6'=>'F-5','G6'=>'F-6'),
		'DSEE'=>array('C3'=>'FORM CA 1','E5'=>'','F5'=>'','E6'=>'1st yr','G6'=>'2nd yr'),
		'DTE'=>array('C3'=>'FORM CA 1','E5'=>'','F5'=>'','E6'=>'1st yr','G6'=>'2nd yr'),
		'GATCE'=>array('C3'=>'FORM CA 1','E5'=>'','F5'=>'','E6'=>'1st yr','G6'=>'2nd yr'),
		'GATSCCE'=>array('C3'=>'FORM CA 1','E5'=>'','F5'=>'','E6'=>'1st yr','G6'=>'2nd yr')
		);
		
		$shead=$templates[$exam];
		$DIFFetype=array('CSEE','ACSEE');
		$dwnpath='downloads'.DS.'ca'.DS;
		$head=array();
		$head['A1']='THE NATIONAL EXAMINATIONS COUNCIL OF TANZANIA';
		$head['A2']='CONTINUOUS ASSESSMENT FORM FOR SECONDARY  SCHOOLS';
		
		//ROW3
		$head['A3']='Exam';		$head['B3']=$exam;		$head['E3']='Phone No:';		$head['F3']='';
		
		//ROW4		
		$cent=explode('_', $centre);		
		$head['A4']='CENTRE NUMBER:';	$head['B4']=$cent[1];	$head['C4']='NAME:';	$head['D4']=$cent[0];	$head['E4']='YEAR:'; $head['F4']=date('Y');
		
		//ROW5
		$head['A5']='SUBJECT CODE:';/*$head['B5']=$ksb;*/	$head['C5']='NAME:'; /*$head['D5']=$sub;	$head['E5']='FORM:';	$head['F5']='VI';*/
		
		//ROW6
		$head['A6']="STUDENT'S";	$head['B6']='NAME OF STUDENT';	/*$head['C6']='F-3/5';	$head['D6']='F-3/5';*/	
		
		$head['H6']=in_array($exam,$DIFFetype)?'PROJECT %':'REMARKS';
		
		//ROW7
		$head['A7']='INDEX No.';/*$head['B7']='FORM II EXAM No.';*/	$head['B7']='FIRST NAME'; $head['C7']='MIDDLE NAME'; $head['D7']='SURNAME'; $head['E7']='T1 %';
		$head['F7']='T2 %';		$head['G7']='T1 %'; 
		
		
		$spreadsheet  = new Spreadsheet();
		
		//Set document properties 
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
		$a=0;
		foreach($subs as $val)
		{
			//53_121_KISWAHILI
			$somo=explode('_',$val);
			$ksb = $somo[1];
			$sub = ucfirst(strtolower(trim($somo[2])));
			
			$head['B5']=$ksb;
			$head['D5']=$sub;
			if($a>0)$spreadsheet ->createSheet();
			
			//WRITE HEADER
			foreach($head as $k=>$v)
			{
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue($k, $v);
			}
			//WRITE SELECTIVE HEADER
			foreach($shead as $k=>$v)
			{
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue($k, $v);
			}
			
			//MERGE CELLS IN HEADER
			$spreadsheet->getActiveSheet()->mergeCells('$A1:$G1');
			$spreadsheet->getActiveSheet()->mergeCells('$A2:$G2');
			//names
			$spreadsheet->getActiveSheet()->mergeCells('$B6:$D6');
			
			//PROVISION FOR BTP
			if($sub=='Btp')
			{
				foreach(range('A','G') as $colm)$spreadsheet ->setActiveSheetIndex($a)->setCellValue($colm.'5', '');
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue('B5', 'BTP');
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue('E6', 'BTP');
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue('F6', 'PROJECT');
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue('G6', '');
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue('H6', '');
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue('E7', 'Grade');
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue('F7', 'Marks %');
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue('G7', 'REMARKS');
				$endcol='G';
				$valRange=array('F');
			}
			else
			{
				$endcol='H';
				//ca
				$spreadsheet->getActiveSheet()->mergeCells('$E6:$F6');
				//validation range
				$valRange=in_array($exam,$DIFFetype)?range('E','H'):range('E','G');	
			}
			
			
			
				
			
			//WRITE CANDIDATES
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

			//INPUT CELLS
		$spreadsheet->getActiveSheet()->getStyle('E8:'.$endcol.($rw-1))->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			
			//INPUT CELLS VALIDATION
			//$spreadsheet->getActiveSheet()->getStyle('E8:H'.($rw-1))->getNumberFormat()->setFormatCode('#.##'); 
			$validation = $spreadsheet->getActiveSheet()->getCell('F8') ->getDataValidation();
			$validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_DECIMAL);
			$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP );
			$validation->setAllowBlank(true);
			$validation->setShowInputMessage(true);
			$validation->setShowErrorMessage(true);
			$validation->setErrorTitle('Marks error');
			$validation->setError('Marks not allowed!');
			$validation->setPromptTitle('Allowed Marks');
			$validation->setPrompt('Only numbers between 0 and 100 are allowed.');
			$validation->setFormula1(0);
			$validation->setFormula2(100);
			
			//
			//$RANGE=in_array($exam,$DIFFetype)?range('E','H'):range('E','G');
			foreach($valRange as $columnID) 
			{
				for($i=7;$i<$rw;$i++)
				{
					$spreadsheet->getActiveSheet()->getCell($columnID.$i)->setDataValidation(clone $validation);
				}
			}
			
			//styling
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
			$spreadsheet->getActiveSheet()->getStyle('B3')->applyFromArray($h3);
			
			//SET BORDERS			
$bod=array('borders'=>array('outline'=>array('borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,'outline'=>array('color' =>['argb'=> 'FFFF0000']))));
			foreach(range('A',$endcol) as $columnID) 
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
			
			$ft=array();
			$ft['B'.$rw]='I certify that the information given in this form is correct';
			$ft['B'.($rw+1)]='Name and signature of subject teacher';
			$ft['B'.($rw+2)]='';	$ft['E'.($rw+2)]='Date';	$ft['F'.($rw+2)]='';
			$ft['B'.($rw+3)]='Name and signature of Head of department ';
			$ft['B'.($rw+4)]='';	$ft['E'.($rw+4)]='Date';	$ft['F'.($rw+4)]=''; 
			
			//IN HEADER
			$spreadsheet->getActiveSheet()->getStyle('F3') ->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			//IN FOOTER
			$spreadsheet->getActiveSheet()->getStyle('B'.($rw+2)) ->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			$spreadsheet->getActiveSheet()->getStyle('F'.($rw+2)) ->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			$spreadsheet->getActiveSheet()->getStyle('B'.($rw+4)) ->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			$spreadsheet->getActiveSheet()->getStyle('F'.($rw+4)) ->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			
			foreach($ft as $kf=>$vf)
			{
				$spreadsheet ->setActiveSheetIndex($a)->setCellValue($kf, $vf);
			}
			
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
			$spreadsheet ->getActiveSheet()->setTitle($ksb);
			
			$a++;	
		}
		$filepath=WWW_ROOT.$dwnpath.'CA'.date('Y').'.xlsx';
		$writer = new Xlsx($spreadsheet);
		$writer ->save($filepath);
		$this->sendFile($filepath);
		//$this->response->withFile($filepath, array( 'download' => true,'name' => 'file_name.xlsx'));
		//$response = $this->response->file($filepath,array('download' => true, 'name' => 'template.xlsx'));
		exit;
	//	return $response;
		
	}
	
	public function sendFile($id)
	{
		//echo $id; exit;
		$file = $this->Attachments->getFile('C:\xampp\htdocs\eservice\webroot\downloads\ca\CA2018.xlsx');
		$response = $this->response->withFile($file['path'],array( 'download' => true,'name' => 'file_name.xlsx'));
	   
		return $response;
	}
	
	private function chapa($dt)
	{
		echo '<pre>';
		var_dump($dt);
		echo '</pre>';
		die("<br>------------------------|-----------------<br>");
	}
}
