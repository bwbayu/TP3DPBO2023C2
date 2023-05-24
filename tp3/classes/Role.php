<?php

class Role extends DB
{
    function getRole()
    {
        // mengambil semua data dari tabel role
        $query = "SELECT * FROM role";
        return $this->execute($query);
    }

    function getRoleById($id)
    {
        // mengambil data dari tabel role berdasarkan id
        $query = "SELECT * FROM role WHERE ROLE_ID=$id";
        return $this->execute($query);
    }

    function addRole($data)
    {
        // menambahkan data ke tabel role
        $nama = $data['nama'];
        $query = "INSERT INTO role VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateRole($data, $id)
    {
        // memperbaharui data dari tabel role
        $nama = $data['nama'];
        $query = "UPDATE role set ROLE_NAME='$nama' WHERE ROLE_ID=$id";
        return $this->executeAffected($query);
    }

    function deleteRole($id)
    {
        // menghapus data dari tabel role
        $query = "DELETE FROM role WHERE ROLE_ID=$id";
        return $this->executeAffected($query);
    }

    function searchRole($keyword)
    {
        // mencari role dari tabel role
        $query = "SELECT * FROM role WHERE ROLE_NAME LIKE '%$keyword%' ORDER BY ROLE_ID;";
        return $this->execute($query);
    }
}
