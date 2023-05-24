<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Group.php');
include('classes/Idol.php');
include('classes/Role.php');
include('classes/Template.php');

// ambil data group untuk option
$group = new Group($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$group->open();
$group->getGroup();
$listGroup = [];
while ($temp = $group->getResult()) {
    $listGroup[] = $temp;
}

$dataGroup = '<option value="DATA_GROUPID">DATA_GROUP</option>';
foreach ($listGroup as $data) {
    $dataGroup .= '<option value="' . $data['GROUP_ID'] . '">' . $data['GROUP_NAME'] . '</option>';
}

$group->close();
// ambil data group untuk option
$role = new Role($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$role->open();
$role->getRole();
$listRole = [];
while ($temp = $role->getResult()) {
    $listRole[] = $temp;
}

$dataRole = '<option value="DATA_ROLEID">DATA_ROLE</option>';
foreach ($listRole as $data) {
    $dataRole .= '<option value="' . $data['ROLE_ID'] . '">' . $data['ROLE_NAME'] . '</option>';
}

$role->close();

// request dari form tambah data
$idol = new Idol($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$idol->open();

if (isset($_POST['btn-submit'])) {
    if ($idol->addIdol($_POST, $_FILES) > 0) {
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'index.php';
        </script>";
    }
}
$idol->close();

$template = new Template('templates/skinForm.html');
$template->replace('DATA_SELECTGROUP', $dataGroup);
$template->replace('DATA_SELECTROLE', $dataRole);
$template->replace('DATA_TITLE', 'Add');
$template->replace('DATA_GROUPID', '');
$template->replace('DATA_GROUP', 'Select Idol Group');
$template->replace('DATA_ROLEID', '');
$template->replace('DATA_ROLE', 'Select Idol Role');
$template->write();
