<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Group.php');
include('classes/Idol.php');
include('classes/Role.php');
include('classes/Template.php');

// buat instance idol
$listIdol = new Idol($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listIdol->open();
// tampilkan data idol
$listIdol->getIdolFull();

// cari pengurus
if (isset($_POST['btn-cari'])) {
    // methode mencari data pengurus
    $listIdol->searchIdol($_POST['cari']);
} else {
    // method menampilkan data pengurus
    $listIdol->getIdolFull();
}

$data = null;

// ambil data pengurus
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listIdol->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 idol-image">
        <a href="detail.php?id=' . $row['IDOL_ID'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['IDOL_IMAGE'] . '" class="card-img-top fixed-image" alt="' . $row['IDOL_IMAGE'] . '">
            </div>
            <div class="card-body">
                <p class="card-text idol-name my-0">' . $row['IDOL_NAME'] . '</p>
                <p class="card-text role-name">' . $row['ROLE_NAME'] . '</p>
                <p class="card-text group-name my-0">' . $row['GROUP_NAME'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listIdol->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_IDOL', $data);
$home->write();
