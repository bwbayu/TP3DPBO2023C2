<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Idol.php');
include('classes/Template.php');

// buat instance idol
$idol = new Idol($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$idol->open();

$data_idol = null;

// detail
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $idol->getIdolById($id);
        $row = $idol->getResult();

        $data_idol .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['IDOL_NAME'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['IDOL_IMAGE'] . '" class="img-thumbnail fixed-image" alt="' . $row['IDOL_IMAGE'] . '" width="100">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>' . $row['REAL_NAME'] . '</td>
                                </tr>
                                <tr>
                                    <td>Idol Name</td>
                                    <td>:</td>
                                    <td>' . $row['IDOL_NAME'] . '</td>
                                </tr>
                                <tr>
                                    <td>Idol Age</td>
                                    <td>:</td>
                                    <td>' . $row['IDOL_AGE'] . '</td>
                                </tr>
                                <tr>
                                    <td>Idol Nationality</td>
                                    <td>:</td>
                                    <td>' . $row['IDOL_NATIONALITY'] . '</td>
                                </tr>
                                <tr>
                                    <td>Idol Born</td>
                                    <td>:</td>
                                    <td>' . $row['IDOL_BORN'] . '</td>
                                </tr>
                                <tr>
                                    <td>Idol Height</td>
                                    <td>:</td>
                                    <td>' . $row['IDOL_HEIGHT'] . '</td>
                                </tr>
                                <tr>
                                    <td>Idol Group</td>
                                    <td>:</td>
                                    <td>' . $row['GROUP_NAME'] . '</td>
                                </tr>
                                <tr>
                                    <td>Idol Role</td>
                                    <td>:</td>
                                    <td>' . $row['ROLE_NAME'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="update.php?id=' . $row['IDOL_ID'] . '"><button type="button" class="btn btn-success text-white">Update </button></a>
                <a href="detail.php?hapus=' . $row['IDOL_ID'] . '"><button type="button" class="btn btn-danger">Delete Data</button></a>
            </div>';
    }
}

// button hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($idol->deleteData($id) > 0) {
            echo "<script>
            alert('Data Idol berhasil dihapus!');
            document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
            alert('Data Idol gagal dihapus!');
            document.location.href = 'index.php';
            </script>";
        }
    }
}

$idol->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_IDOL', $data_idol);
$detail->write();
