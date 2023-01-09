<?php

namespace App\Controllers;

use App\Models\NotesModel;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }
    
    public function view()
    {
        return view('home');
    }
    
    public function randRedirect()
    {
        $model = new NotesModel();
        $randstr = $model->randNote();
        
        while ($model->isNoteExists($randstr) == 'true')
        {
            $randstr = $model->randNote();
        }
        
        return redirect()->to(base_url(). '/' . $randstr);
    }

    public function outText($id)
    {
        $model = new NotesModel();
        $id = preg_replace('/\.txt/', '', $id);
        $this->response->setHeader('content-type', 'text/plain; charset="UTF-8"');

        return $model->pullNote($id);
    }

    public function outMD()
    {
        return view('md');
    }

}
