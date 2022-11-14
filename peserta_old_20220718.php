<?php
include "_head.php";
include "_menu.php";
?>
<?php
include_once "common.php";
if (isset($_POST["simpan"])) {

    $schedule_trainings_id        = base64_decode($_GET["q"]);
    $name                         = $_POST["name"];
    $jabatan                     = $_POST["jabatan"];
    if ($_GET["inhouse"] != 1) {
        $perusahaan                 = $_POST["perusahaan"];
    }
    $office_number                 = $_POST["office_number"];
    $email                         = $_POST["email"];
    $handphone_number_users     = $_POST["handphone_number_users"];
    $sertifikat     = $_POST["sertifikat"];

    $pattern = "/[<`'~!$*,:|>]/";
    $pattern_alamat = "/[`'~!$*<>:|]/";

    if (preg_match($pattern, $name)) {
        $_SESSION["errormessage"] = "Mohon untuk Nama hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $jabatan)) {
        $_SESSION["errormessage"] = "Mohon untuk Jabatan hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $office_number)) {
        $_SESSION["errormessage"] = "Mohon untuk Nomor Telephone Kantor hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $email)) {
        $_SESSION["errormessage"] = "Mohon untuk Email hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $handphone_number_users)) {
        $_SESSION["errormessage"] = "Mohon untuk Nomor Telephone Pribadi hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $sertifikat)) {
        $_SESSION["errormessage"] = "Mohon untuk Pengiriman Sertifikat hanya Memasukan tulisan tanpa special karakter";
    } else {

        $return = post_training_peserta($_POST);
    }

    if ($_SESSION["errormessage"] == "") {
        if ($return == "1") {
            $_SESSION["message"] = "Biodata Anda berhasil tersimpan, Terima Kasih.";
            javascript("setTimeout(function(){ window.location='https://corphr.com/'; }, 5000);");
        } else {
            $_SESSION["errormessage"] = "Comprehensive Resume Anda Gagal tersimpan, Harap Coba Lagi atau hubungi CS kami.";
        }
    }
}

?>
<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <!-- <h3>Pengisian Data Diri Training Peserta</h3> -->
                    <?php
                    $date_start = date_create($_GET["tanggal_start"]);
                    $date_end = date_create($_GET["tanggal_end"]);
                    ?>
                    <h3>Pengisian Data Diri Training Peserta<br> <?= $_GET["title"]; ?> <br> <?= date_format($date_start, "d F Y"); ?> - <?= date_format($date_end, "d F Y"); ?> </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Content section Start -->
<section id="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="post-job box">
                    <form class="form-ad" method="POST">
                        <input type="hidden" name="mode" value="step_01">
                        <input type="hidden" name="schedule_trainings_id" value="<?= base64_decode($_GET["q"]); ?>">
                        <?php
                        if ($_GET["inhouse"]) {
                            $public_inhouse = "2";
                        } else {
                            $public_inhouse = "1";
                        }
                        ?>
                        <input type="hidden" name="public_inhouse" value="<?= $public_inhouse; ?>">
                        <div class="form-group">
                            <label class="control-label">Nama Lengkap *</label>
                            <input type="text" class="form-control" title="Nama Lengkap" autocomplete="off" required id="name" name="name" value="<?= $_POST["name"]; ?>" onkeypress="return isAlphabetsKey(event)" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <input type="text" class="form-control" title="Jabatan" autocomplete="off" name="jabatan" value="<?= $_POST["jabatan"]; ?>" />
                        </div>
                        <?php if ($_GET["inhouse"] != 1) { ?>
                            <div class="form-group">
                                <label class="control-label">Perusahaan</label>
                                <input type="text" class="form-control" title="Perusahaan" autocomplete="off" name="perusahaan" value="<?= $_POST["perusahaan"]; ?>" />
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="control-label">Nomor Telephone Kantor (Kosongkan jika anda melalui pribadi)</label>
                            <input type="text" class="form-control" title="Nomor Telephone Kantor (Kosongkan jika anda melalui pribadi)" autocomplete="off" name="office_number" value="<?= $_POST["office_number"]; ?>" onkeypress="return isNumberKey(event)" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" title="Email" autocomplete="off" required name="email" value="<?= $_POST["email"]; ?>" />
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Nomor Telephone Pribadi</label>
                            <input type="text" class="form-control" title="Nomor Telephone Pribadi" autocomplete="off" required name="handphone_number_users" value="<?= $_POST["handphone_number_users"]; ?>" onkeypress="return isNumberKey(event)" />
                        </div>
                        <?php if (!$_GET["inhouse"]) { ?>
                            <div class=" form-group">
                                <label class="control-label">Pengiriman Sertifikat</label>
                                <textarea class="form-control" rows="7" title="Pengiriman Sertifikat" autocomplete="off" required id="sertifikat" name="sertifikat" value="<?= $_POST["sertifikat"]; ?>"></textarea>
                            </div>
                        <?php } ?>
                        <input type="submit" name="simpan" value="save" class="btn btn-za">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section End -->
<?php
include_once "_footer.php";
?>