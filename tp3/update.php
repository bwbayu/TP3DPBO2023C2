<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Group.php');
include('classes/Idol.php');
include('classes/Role.php');
include('classes/Template.php');

$idol = new Idol($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$idol->open();
$group = new Group($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$group->open();
$role = new Role($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$role->open();

$dataIdol = [];
$dataGroup = '<option value="DATA_GROUPID">DATA_GROUP</option>';
$dataRole = '<option value="DATA_ROLEID">DATA_ROLE</option>';
// mengisi form dengan data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        // ambil data idol full
        $idol->getIdolById($id);
        $row = $idol->getResult();

        // ambil data group untuk option select
        $listGroup = [];
        $group->getGroup();
        while ($temp = $group->getResult()) {
            $listGroup[] = $temp;
        }

        foreach ($listGroup as $data) {
            if ($data['GROUP_ID'] != $row['GROUP_ID']) { // jika group id dari database adalah group id pilihan user yang mau di update maka group id itu akan dikecualikan
                $dataGroup .= '<option value="' . $data['GROUP_ID'] . '">' . $data['GROUP_NAME'] . '</option>';
            }
        }

        $group->close();

        // ambil data role untuk option select
        $listRole = [];
        $role->getRole();
        while ($temp = $role->getResult()) {
            $listRole[] = $temp;
        }

        foreach ($listRole as $data) {
            if ($data['ROLE_ID'] != $row['ROLE_ID']) {
                $dataRole .= '<option value="' . $data['ROLE_ID'] . '">' . $data['ROLE_NAME'] . '</option>';
            }
        }

        $role->close();

        // assign data untuk mengisi form
        $dataIdol['idolName'] = $row['IDOL_NAME'];
        $dataIdol['nama'] = $row['REAL_NAME'];
        $dataIdol['umur'] = $row['IDOL_AGE'];
        $dataIdol['kebangsaan'] = $row['IDOL_NATIONALITY'];
        $dataIdol['tgl_lahir'] = $row['IDOL_BORN'];
        $dataIdol['tinggi'] = $row['IDOL_HEIGHT'];
        $dataIdol['group'] = $row['GROUP_ID'];
        $dataIdol['groupName'] = $row['GROUP_NAME'];
        $dataIdol['role'] = $row['ROLE_ID'];
        $dataIdol['roleName'] = $row['ROLE_NAME'];
    }
}

// jika button save di klik
if (isset($_POST['btn-submit'])) {
    $id = $_GET['id'];
    if ($idol->updateIdol($id, $_POST, $_FILES) > 0) {
        echo "<script>
            alert('Data Idol berhasil diubah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Idol gagal diubah!');
            document.location.href = 'index.php';
        </script>";
    }
}
$idol->close();
// membuat template form
$template = new Template('templates/skinForm.html');
$template->replace('DATA_SELECTGROUP', $dataGroup);
$template->replace('DATA_SELECTROLE', $dataRole);
$template->replace('DATA_TITLE', 'Update');
$template->replace('DATA_IDOLNAME', $dataIdol['idolName']);
$template->replace('DATA_REALNAME', $dataIdol['nama']);
$template->replace('DATA_AGE', $dataIdol['umur']);
$template->replace('DATA_HEIGHT', $dataIdol['tinggi']);
$template->replace('DATA_NATIONALITY', $dataIdol['kebangsaan']);
$template->replace('DATA_BORN', $dataIdol['tgl_lahir']);
$template->replace('DATA_GROUPID', $dataIdol['group']);
$template->replace('DATA_GROUP', $dataIdol['groupName']);
$template->replace('DATA_ROLEID', $dataIdol['role']);
$template->replace('DATA_ROLE', $dataIdol['roleName']);

$template->write();
