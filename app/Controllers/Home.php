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

}
