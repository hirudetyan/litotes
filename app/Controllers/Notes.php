<?php

namespace App\Controllers;

use App\Models\NotesModel;

class Notes extends BaseController
{

    public function pullNote()
    {
        $model = new NotesModel();
        $id = $this->request->getGet('id');
        $valid = $this->validate(['id' => 'required|alpha_numeric|max_length[10]']);
        if ($valid)
        {
            return $model->pullNote($id);
        }

        return '';
    }

    public function pushNote()
    {
        $model = new NotesModel();
        $id = $this->request->getPost('id');
        $note = $this->request->getPost('note');
        $valid = $this->validate(['id' => 'required|alpha_numeric|max_length[10]']);

        if ($valid)
        {
            return $model->pushNote($id, $note);
        }

        return 'false';
    }

    public function isNoteExists()
    {
        $model = new NotesModel();
        $id = $this->request->getGet('id');
        $valid = $this->validate(['id' => 'required|alpha_numeric|max_length[10]']);

        if ($valid)
        {
            return $model->isNoteExists($id);
        }

        return 'false';
    }

    public function randNote()
    {
        $model = new NotesModel();
        $randstr = $model->randNote();

        while ($model->isNoteExists($randstr) == 'true')
        {
            $randstr = $model->randNote();
        }

        return $randstr;
    }

}
