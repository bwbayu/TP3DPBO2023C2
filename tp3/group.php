<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Group.php');
include('classes/Template.php');

$group = new Group($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$group->open();
$group->getGroup();

// TAMBAH DATA GROUP
if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($group->addGroup($_POST) > 0) {
            echo "<script>
                alert('Data group berhasil ditambah!');
                document.location.href = 'group.php';
            </script>";
        } else {
            echo "<script>
                alert('Data group gagal ditambah!');
                document.location.href = 'group.php';
            </script>";
        }
    }

    $button = 'Add';
    $jenis = 'Add';
}

// SEARCH DATA GROUP
if (isset($_POST['btn-cari-Group'])) {
    $group->searchGroup($_POST['cari']);
} else {
    $group->getGroup();
}

// SHOW DATA GROUP
$data = null;
$no = 1;
while ($temp = $group->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $temp['GROUP_NAME'] . '</td>
    <td style="font-size: 22px;">
    <a href="group.php?id=' . $temp['ID_GROUP'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;
    <a href="group.php?hapus=' . $temp['ID_GROUP'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
    </td>
    </tr>';
    $no++;
}

$view = new Template('templates/skintabel.html');
// UPDATE DATA GROUP
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        // isi data di form
        $group->getGroupById($id);
        $row = $group->getResult();

        $dataUpdate = $row['GROUP_NAME'];
        $button = 'Save';
        $jenis = 'Update';
        $view->replace('DATA_NAMA', $dataUpdate);

        // button save
        if (isset($_POST['submit'])) {
            if ($group->updateGroup($_POST, $id) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'group.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'group.php';
            </script>";
            }
        }
    }
}

// DELETE DATA GROUP
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($group->deleteGroup($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'group.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'group.php';
            </script>";
        }
    }
}

$group->close();

$header = '<tr>
<th>No</th>
<th>Nama Group</th>
<th>Action</th>
</tr>';
$title = 'Group';
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_TABLEHEADER', $header);
$view->replace('DATA_TABLE', $data);
$view->replace('DATA_JENIS', $jenis);
$view->replace('DATA_LABEL', 'Group');
$view->replace('DATA_BUTTON', $button);
$view->write();
