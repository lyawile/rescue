<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Table\User; // <—My model
use Cake\Datasource\ConnectionManager;

/**
 * Candidates Controller
 *
 * @property \App\Model\Table\CandidatesTable $Candidates
 *
 * @method \App\Model\Entity\Candidate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpayController extends AppController
{
	 public function initialize(){
        parent::initialize();
        
        // Include the FlashComponent
        $this->loadComponent('Flash');
		$this->loadModel('ExamTypes');
		
		//centres  
		$this->loadModel('Centres');
		
		//candidates
		$this->loadModel('Candidates');

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
	
	public function fees()
	{
		$cands = $this->request->data('put');
		$carray = explode(',',$cands);
		$getcand=array();
		foreach($carray as $v)
		{
			if(is_numeric($v))$getcand[]=$v;
		}
		if(!empty($getcand))
		{
			
			//PAYER INFORMATION
			$sendpay=array();
			
			//REQUEST ID
			$billhash=md5(uniqid(rand(),true));
			$sendpay['reqid']=$billhash;
			
			
			if(sizeof($getcand)==1)
			{
				//ONE CANDIDADO
				$msg= 'One<br>'; 
				$candidate = $this->Candidates->get($getcand[0]);
				$sendpay['fullname']=$candidate->first_name.' '.$candidate->other_name.' '.$candidate->surname;
				$sendpay['phone']=$candidate->mobile;
				$sendpay['email']=$candidate->email;
				
				/*
				$query = $this->Candidates->find('all')->where(['id IN' => $getcand]);
				$data = $query->toArray();
				$spc='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				$a=1;
				foreach($data as $candobject)
				*/
			}
			else
			{
				//BULK CANDIDADOS
				$msg= 'Many<br>';
				$sendpay['fullname']=$this->Auth->user('first_name').' '.$this->Auth->user('other_name').' '.$this->Auth->user('surname');
				$sendpay['phone']=$this->Auth->user('mobile');
				$sendpay['email']=$this->Auth->user('email');
			}
			
			echo '<h1>'.$msg.' UUID '.$sendpay['reqid'].' for '.$sendpay['fullname'].' mobil '.$sendpay['phone'].' email '.$sendpay['email'].'</h1>';
			$this->chapa($sendpay);
			exit;
			
			
				"<gepgBillSubReq>
						<BillHdr>
							<SpCode>S023</SpCode>
							<RtrRespFlg>true</RtrRespFlg>
						</BillHdr>
						<BillTrxInf>
							<BillId>7885</BillId>
							<SubSpCode>2001</SubSpCode>
							<SpSysId>tjv47</SpSysId>
							<BillAmt>7885</BillAmt>
							<MiscAmt>0</MiscAmt>
							<BillExprDt>2017-05-30T10:00:01</BillExprDt>
							<PyrId>Palapala</PyrId>
							<PyrName>Charles Palapala</PyrName>
							<BillDesc>Bill Number 7885</BillDesc>
							<BillGenDt>2017-02-22T10:00:10</BillGenDt>
							<BillGenBy>100</BillGenBy>
							<BillApprBy>Hashim</BillApprBy>
							<PyrCellNum>0699210053</PyrCellNum>
							<PyrEmail>charlestp@yahoo.com</PyrEmail>
							<Ccy>TZS</Ccy>
							<BillEqvAmt>7885</BillEqvAmt>
							<RemFlag>true</RemFlag>
							<BillPayOpt>1</BillPayOpt>
							<BillItems>
										<BillItem>
										<BillItemRef>788578851</BillItemRef>
											<UseItemRefOnPay>N</UseItemRefOnPay>
											<BillItemAmt>7885</BillItemAmt>
											<BillItemEqvAmt>7885</BillItemEqvAmt>
											<BillItemMiscAmt>0</BillItemMiscAmt>
											<GfsCode>140206</GfsCode>
										</BillItem>
										<BillItem>
										<BillItemRef>788578852</BillItemRef>
											<UseItemRefOnPay>N</UseItemRefOnPay>
											<BillItemAmt>7885</BillItemAmt>
											<BillItemEqvAmt>7885</BillItemEqvAmt>
											<BillItemMiscAmt>0</BillItemMiscAmt>
											<GfsCode>140206</GfsCode>
										</BillItem>
							</BillItems>
						</BillTrxInf>
				</gepgBillSubReq>";
		}else echo '<h1>No Data Men</h1>';
		exit;
	}
	public function paidcands()
	{
		
	}
	
	private function chapa($dt)
	{
		echo '<pre>';
		var_dump($dt);
		echo '</pre>';
		die("<br>------------------------|-----------------<br>");
	}
}
