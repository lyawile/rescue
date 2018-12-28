<?php

namespace App\Controller;


class DashboardsController extends AppController
{

    public function registration()
    {
        $this->loadModel('Regions');
        $this->loadModel('Districts');
        $this->loadModel('Centres');
        $this->loadModel('Candidates');
        $this->loadModel('DisqualifiedCandidates');

        $regionId = $this->request->getSession()->read('regionId');
        $districtId = $this->request->getSession()->read('districtId');
        $centreId = $this->request->getSession()->read('centreId');
        $examTypeId = $this->request->getSession()->read('examTypeId');

        //CENTRE STATS
        if (!empty($districtId))
            $totalCentres = $this->Centres->findByDistrictId($districtId)->count();
        elseif (!empty($regionId)) {
            $totalCentres = $this->Regions->find()->matching('Districts.Centres')->where(['Regions.id' => $regionId])->count();
        } else
            $totalCentres = $this->Centres->find('all')->count();

        //CANDIDATE STATS
        if (!empty($examTypeId)) {
            $totalCandidates = $this->Candidates->findByCentreIdAndExamTypeId($centreId, $examTypeId)->count();
            $totalDisqualifiedCandidates = $this->DisqualifiedCandidates->findByCentreIdAndExamTypeId($centreId, $examTypeId)->count();
        } elseif (!empty($centreId)) {
            $totalCandidates = $this->Candidates->findByCentreId($centreId)->count();
            $totalDisqualifiedCandidates = $this->DisqualifiedCandidates->findByCentreId($centreId)->count();
        } elseif (!empty($districtId)) {
            $totalCandidates = $this->Districts->find()->matching('Centres.Candidates')->where(['Districts.id' => $districtId])->count();
            $totalDisqualifiedCandidates = $this->Districts->find()->matching('Centres.DisqualifiedCandidates')->where(['Districts.id' => $districtId])->count();
        } elseif(!empty($regionId)) {
            $totalCandidates = $this->Regions->find()->matching('Districts.Centres.Candidates')->where(['Regions.id' => $regionId])->count();
            $totalDisqualifiedCandidates = $this->Regions->find()->matching('Districts.Centres.DisqualifiedCandidates')->where(['Regions.id' => $regionId])->count();
        } else {
            $totalCandidates = $this->Candidates->find('all')->count();
            $totalDisqualifiedCandidates = $this->DisqualifiedCandidates->find('all')->count();
        }

        $this->set(compact('totalCentres', 'totalCandidates', 'totalDisqualifiedCandidates'));
    }

    public function finance()
    {
//        $centre = $this->Centres->get($id, [
//            'contain' => ['Districts']
//        ]);
//
//        $this->set('centre', $centre);
    }
}
