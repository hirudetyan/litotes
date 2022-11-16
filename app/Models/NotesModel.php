<?php

namespace App\Models;

use CodeIgniter\Model;


class NotesModel extends Model
{

    public function pullNote($id)
    {
        $sql = "SELECT * FROM notes WHERE id = ? LIMIT 1";
        $result = $this->db->query($sql, $id)->getRow();

        if ($result)
        {
            return $result->note;
        }

        return '';
    }

    public function pushNote($id, $note)
    {
        $sql = "INSERT INTO `notes` (`id`, `note`) VALUES (?, ?)
        ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `note` = VALUES(`note`)";
        $result = $this->db->query($sql, [$id, $note]);

        if ($result == true)
        {
            return 'true';
        }

        return 'false';
    }

    public function isNoteExists($id)
    {
        $sql = "SELECT 1 FROM `notes` WHERE `id` = ? LIMIT 1";
        $result = $this->db->query($sql, [$id])->getNumRows();

        if ($result == 0)
        {
            return 'false';
        }

        return 'true';
    }

    public function randNote()
    {
        return substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz', rand(1, 4))), 0, 4);
    }

}