<?php

namespace App\Controller;


class DashboardsController extends AppController
{

    public function registration()
    {
        $this->loadModel('Centres');
        $totalCentres = $this->Centres->find('all')->count();

//        $this->paginate = [
//            'contain' => ['Districts']
//        ];
//        $centres = $this->paginate($this->Centres);
//
        $this->set(compact('totalCentres'));
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
