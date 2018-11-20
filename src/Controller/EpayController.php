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
		//
		$this->loadModel('BillItemCandidates');

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        echo '<h2>Access Denied!</h2>';exit;
    }
	
	public function feesall()
    {
		$err = '';
		if(!empty($this->request->getSession()->read('centreId')))
		{
			$centid = $this->request->getSession()->read('centreId');
			$examid = 1;
			$query = $this->Candidates->find('all',array('fields' => array('id')))->where(['centre_id' => $centid,'exam_type_id' => $examid]);
			$data = $query->toArray();
			if(!empty($data))
			{
				$dent = array(); 
				foreach($data as $rw)$dent[] = $rw['id'];
				$this->fees($dent);
				return NULL ;
			}
			else
			{
				$err = 'No Candidates Registered in that Centre';
			}
		}
		else
		{
			 $err = 'Please Select Centre';
		}
		$this->Flash->error(__($err));
		return $this->redirect(['controller' => 'candidates','action' => 'index']);
    }
	
	public function contolnumber()
    {
		'154.72.86.88/eservice/epay/contolnumber';
		'154.72.86.88/eservice/epay/payment';
		'154.72.86.88/eservice/epay/recoinciliation';
    }
	public function reconciliation()
    {
    }
	public function payment()
    {
    }
	
	
	public function fees($getcand = false)
	{
		if(!$getcand)
		{
			$cands = $this->request->data('put');
			$carray = explode(',',$cands);
			$getcand=array();
			foreach($carray as $v)
			{
				if(is_numeric($v))$getcand[]=$v;
			}
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
				$sendpay['examid']=$candidate->exam_type_id;
				$sendpay['count']=1;
				
				
			}
			else
			{
				//BULK CANDIDADOS
				$msg= 'Many<br>';
				$candidate = $this->Candidates->get($getcand[0]);
				$sendpay['fullname']=$this->Auth->user('first_name').' '.$this->Auth->user('other_name').' '.$this->Auth->user('surname');
				$sendpay['phone']=$this->Auth->user('mobile');
				$sendpay['email']=$this->Auth->user('email');
				$sendpay['examid']=$candidate->exam_type_id;
				$sendpay['count']=sizeof($getcand);
			}
			
			foreach($getcand as $id)
			{
				$cand = $this->Candidates->get($id);
				$cand->billhash = $billhash;
				$this->Candidates->save($cand);
			}
			
			$this->request->getSession()->write('candfee', $sendpay);
			return $this->redirect(['controller' => 'bills','action' => 'add']);
		}
		else
		{
			 $this->Flash->error(__('No Candidates Selected'));
			 return $this->redirect(['controller' => 'candidates','action' => 'index']);
		}
		exit;
	}
	
	public function paidcands($reqid, $payid)
	{
			$query = $this->Candidates->find('all',array('fields' => array('id')))->where(['billhash' => $reqid]);
			$data = $query->toArray();
			if(!empty($data))
			{
				foreach($data as $cid)
				{
					$qr = $this->BillItemCandidates->find()->where(['candidate_id' => $cid['id'],'bill_item_id' => $payid]);
				
					$dt = $qr->toArray();
					if(empty($dt))
					{
						$bic = $this->BillItemCandidates->newEntity();
						$bic->candidate_id = $cid['id'];
						$bic->bill_item_id = $payid;
						$this->BillItemCandidates->save($bic);
					}
					
					$cand = $this->Candidates->get($cid['id']);
					$cand->billhash = 'BL';
					$this->Candidates->save($cand);
				}
			}
		
		return 'Received Request ID : '.$reqid.' PayID : '.$payid;
		
	}
	
	public function gepgrequest($data)
	{
		$Htagb = '<Gepg>';
		$Htage = '</Gepg>';
		$Sigtagb = '<gepgSignature>';
		$Sigtage = '</gepgSignature>';
		/*$data="<gepgBillSubReq>
				<BillHdr>
				<SpCode>SP110</SpCode>
				<RtrRespFlg>true</RtrRespFlg>
				</BillHdr>
				<BillTrxInf>
				<BillId>7885</BillId>
				<SubSpCode>1002</SubSpCode>
				<SpSysId>TNECTA001</SpSysId>
				<BillAmt>7885</BillAmt>
				<MiscAmt>0</MiscAmt>
				<BillExprDt>2019-05-30T10:00:01</BillExprDt>
				<PyrId>Samizi</PyrId>
				<PyrName>Samizi Abdallah</PyrName>
				<BillDesc>Bill Number 7885</BillDesc>
				<BillGenDt>2018-11-19T10:00:10</BillGenDt>
				<BillGenBy>100</BillGenBy>
				<BillApprBy>Hashim</BillApprBy>
				<PyrCellNum>0699210053</PyrCellNum>
				<PyrEmail>Samizi@gmail.com</PyrEmail>
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
				<GfsCode>300103</GfsCode>
				</BillItem>
				</BillItems>
				</BillTrxInf>
				</gepgBillSubReq>";*/
				
			$resp =	$this->sign($data);
			
			if($resp[0] == 1)
			{
				$dataO = $Htagb.$data.$Sigtagb.$resp[1].$Sigtage.$Htage;
				
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://154.118.230.18/api/bill/sigqrequest",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $dataO,
				  CURLOPT_HTTPHEADER => array(
					"Content-Type: application/xml",
					"Gepg-Code: SP110",
					"Gepg-Com: default.sp.in",
					"cache-control: no-cache"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
				
				curl_close($curl);
				
				if ($err) {
					return 'cURL error';
				 // echo "cURL Error #:" . $err;
				} else {
					$fp=fopen(APP.'Resource'.DS.'respBill.txt','w');
					fwrite($fp,$response);
					return $response;
				}
				
			}
			else 
			//echo '1) STATUS : '.$resp[0].'<BR>2) RESPONSE;<BR> '.$resp[1];
			return false;
	}
	
	private function sign($data)
	{
		//FILE PATH 
		$readPath=APP.'Resource'.DS.'certs'.DS.'gepgclientprivatekey.pfx';
		
		// 1) Reading the pfx file
		$cert_store = file_get_contents($readPath);
		$status = openssl_pkcs12_read($cert_store, $cert_info, 'passpass');
		
		if (!$status) return array(0,'Invalid pasword');
		
		$public_key = $cert_info['cert'];
		$private_key = $cert_info['pkey'];
		
		// 2) Reading the private key
		$pkeyid = openssl_get_privatekey($private_key);
		
		if (!$pkeyid) return array(0,'Invalid private key');
		
		// 3) Computing the signature with SHA-1
		$status = openssl_sign($data, $signature, $pkeyid, OPENSSL_ALGO_SHA1);
			
		// 4) Free the key from memory
		openssl_free_key($pkeyid);
			
		if (!$status) return array(0,'Computing of the signature failed');
			
		$signature_value = base64_encode($signature);
		return array(1,$signature_value);
	}
	private function verify($data, $signedData)
	{
		//FILE PATH 
		$readPath=APP.'Resource'.DS.'certs'.DS.'gepgpubliccertificate.pfx';
		
		$cert_store = file_get_contents($readPath);
		$ok = openssl_verify($data, $signedData, $cert_store);
		if ($ok == 1) {
			echo "good";
		} elseif ($ok == 0) {
			echo "bad";
		} else {
			echo "ugly, error checking signature";
		}
		exit;
	}
	
	private function chapa($dt)
	{
		echo '<xmp>';
		var_dump($dt);
		echo '</xmp>';
		die("<br>------------------------|-----------------<br>");
	}
}
