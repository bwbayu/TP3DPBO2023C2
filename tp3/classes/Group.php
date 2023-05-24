<?php

class Group extends DB
{
    function getGroup()
    {
        // mengambil semua data dari tabel group
        $query = "SELECT * FROM idol_group";
        return $this->execute($query);
    }

    function getGroupById($id)
    {
        // mengambil data dari tabel group berdasarkan id
        $query = "SELECT * FROM idol_group WHERE GROUP_ID=$id";
        return $this->execute($query);
    }

    function addGroup($data)
    {
        // menambahkan data ke tabel group
        $nama = $data['nama'];
        $query = "INSERT INTO idol_group VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateGroup($data, $id)
    {
        // memperbaharui data dari tabel group
        $nama = $data['nama'];
        $query = "UPDATE idol_group set GROUP_NAME='$nama' WHERE GROUP_ID=$id";
        return $this->executeAffected($query);
    }

    function deleteGroup($id)
    {
        // menghapus data dari tabel group
        $query = "DELETE FROM idol_group WHERE GROUP_ID=$id";
        return $this->executeAffected($query);
    }

    function searchGroup($keyword)
    {
        // mencari role dari tabel group
        $query = "SELECT * FROM idol_group WHERE GROUP_NAME LIKE '%$keyword%' ORDER BY GROUP_ID;";
        return $this->execute($query);
    }
}
