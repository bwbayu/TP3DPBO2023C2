<?php

class Idol extends DB
{
    function getIdolFull()
    {
        // mengambil data idol full dengan data dari tabel group dan role
        $query = "SELECT * FROM idol JOIN idol_group ON idol.GROUP_ID=idol_group.GROUP_ID JOIN role ON idol.ROLE_ID=role.ROLE_ID ORDER BY idol.IDOL_ID";
        return $this->execute($query);
    }

    function getIdol()
    {
        // mengambil data idol
        $query = "SELECT * FROM idol";
        return $this->execute($query);
    }

    function getIdolById($id)
    {
        // mengambil data idol berdasarkan id nya
        $query = "SELECT * FROM idol JOIN idol_group ON idol.GROUP_ID=idol_group.GROUP_ID JOIN role ON idol.ROLE_ID=role.ROLE_ID WHERE IDOL_ID=$id";
        return $this->execute($query);
    }

    function searchIdol($keyword)
    {
        // mencari data idol berdasarkan keyword user
        $query = "SELECT * FROM idol JOIN idol_group ON idol.GROUP_ID=idol_group.GROUP_ID JOIN role ON idol.ROLE_ID=role.ROLE_ID WHERE IDOL_NAME LIKE '%$keyword%' OR ROLE_NAME LIKE '%$keyword%' OR GROUP_NAME LIKE '%$keyword%' ORDER BY idol.IDOL_ID;";
        return $this->execute($query);
    }

    function addIdol($data, $file)
    {
        // menambahkan data idol
        $namaIdol = $data['namaIdol'];
        $nama = $data['namaAsli'];
        $umur = $data['umur'];
        $kebangsaan = $data['kebangsaan'];
        $tgl_lahir = $data['tgl_lahir'];
        $tinggi = $data['tinggi'];
        $group = $data['group'];
        $role = $data['role'];
        // foto
        $fileName = $file['foto']['name'];
        $uploadedFile = $file['foto']['tmp_name'];
        $dir = 'assets/images/' . $fileName;
        $temp = move_uploaded_file($uploadedFile, $dir);
        if (!$temp) {
            $dir = 'assets/images/default.jpg';
        }

        $query = "INSERT INTO idol VALUES('', '$group', '$role', '$namaIdol', '$nama', '$umur', '$kebangsaan', '$tgl_lahir', '$tinggi', '$fileName');";

        return $this->executeAffected($query);
    }

    function updateIdol($id, $data, $file)
    {
        // memperbaharui data idol
        $namaIdol = $data['namaIdol'];
        $nama = $data['namaAsli'];
        $umur = $data['umur'];
        $kebangsaan = $data['kebangsaan'];
        $tgl_lahir = $data['tgl_lahir'];
        $tinggi = $data['tinggi'];
        $group = $data['group'];
        $role = $data['role'];
        // foto
        $fileName = $file['foto']['name'];
        $uploadedFile = $file['foto']['tmp_name'];
        $dir = 'assets/images/' . $fileName;
        $temp = move_uploaded_file($uploadedFile, $dir);
        if (!$temp) {
            $dir = 'assets/images/default.jpg';
        }

        $query = "UPDATE idol SET GROUP_ID='$group', ROLE_ID='$role', IDOL_NAME='$namaIdol', REAL_NAME='$nama', IDOL_AGE='$umur', IDOL_NATIONALITY='$kebangsaan', IDOL_BORN='$tgl_lahir', IDOL_HEIGHT='$tinggi', IDOL_IMAGE='$fileName' WHERE IDOL_ID='$id';";

        return $this->executeAffected($query);
    }

    function deleteData($id)
    {
        // menghapus data idol
        $query = "DELETE FROM idol WHERE IDOL_ID=$id";
        return $this->executeAffected($query);
    }
}
