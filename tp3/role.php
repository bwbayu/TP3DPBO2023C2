<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Role.php');
include('classes/Template.php');

$role = new Role($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$role->open();
$role->getRole();

// TAMBAH DATA GROUP
if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($role->addRole($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'role.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'role.php';
            </script>";
        }
    }

    $button = 'Add';
    $jenis = 'Add';
}

// SEARCH DATA ROLE
if (isset($_POST['btn-cari-Role'])) {
    $role->searchRole($_POST['cari']);
} else {
    $role->getRole();
}

$view = new Template('templates/skintabel.html');
// SHOW DATA ROLE
$data = null;
$no = 1;
while ($temp = $role->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $temp['ROLE_NAME'] . '</td>
    <td style="font-size: 22px;">
    <a href="role.php?id=' . $temp['ROLE_ID'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;
    <a href="role.php?hapus=' . $temp['ROLE_ID'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
    </td>
    </tr>';
    $no++;
}

// UPDATE DATA ROLE
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($role->updateRole($_POST, $id) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'role.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'role.php';
            </script>";
            }
        }

        $role->getRoleById($id);
        $row = $role->getResult();

        $dataUpdate = $row['ROLE_NAME'];
        $button = 'Save';
        $jenis = 'Update';

        $view->replace('DATA_NAMA', $dataUpdate);
    }
}

// DELETE DATA ROLE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($role->deleteRole($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'role.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'role.php';
            </script>";
        }
    }
}

$role->close();

$header = '<tr>
<th>No</th>
<th>Nama Role</th>
<th>Action</th>
</tr>';
$title = 'Role';
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_TABLEHEADER', $header);
$view->replace('DATA_TABLE', $data);
$view->replace('DATA_JENIS', $jenis);
$view->replace('DATA_LABEL', 'Role');
$view->replace('DATA_BUTTON', $button);
$view->write();
