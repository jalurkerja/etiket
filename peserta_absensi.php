<?php
include "_head.php";
include "_menu.php";
?>
<?php
include_once "common.php";
if (isset($_POST["simpan"])) {

    // Judul Training	
    // Day	
    // Nama Peserta	
    // Kepesertaan	
    // Perusahaan	
    // Nomor Handphone	
    // Email

    $schedule_trainings_id        = base64_decode($_GET["q"]);
    $name                         = $_POST["name"];
    $kepesertaan                  = $_POST["kepesertaan"];
    $perusahaan                   = $_POST["perusahaan"];
    $number_handphone             = $_POST["number_handphone"];
    $email                        = $_POST["email"];

    $pattern = "/[<`'~!$*,:|>]/";
    $pattern_alamat = "/[`'~!$*<>:|]/";

    if (preg_match($pattern, $name)) {
        $_SESSION["errormessage"] = "Mohon untuk Nama hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $kepesertaan)) {
        $_SESSION["errormessage"] = "Mohon untuk Kepesertaan hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $perusahaan)) {
        $_SESSION["errormessage"] = "Mohon untuk Perusahaan hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $number_handphone)) {
        $_SESSION["errormessage"] = "Mohon untuk Nomor Telephone Pribadi hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $email)) {
        $_SESSION["errormessage"] = "Mohon untuk Email hanya Memasukan tulisan tanpa special karakter";
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
                    <?php
                    $date_start = date_create($_GET["tanggal_start"]);
                    $date_end = date_create($_GET["tanggal_end"]);
                    ?>
                    <h3>Pengisian Absensi Day <?= $_GET["day"]; ?> <br> <?= $_GET["title"]; ?> <br> <?= date_format($date_start, "d F Y"); ?> - <?= date_format($date_end, "d F Y"); ?> </h3>
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
                        <input type="hidden" name="mode" value="mode_absensi">
                        <input type="hidden" name="schedule_trainings_id" value="<?= base64_decode($_GET["q"]); ?>">
                        <input type="hidden" name="day" value="<?= $_GET["day"]; ?>">

                        <!-- // Judul Training
                        // Day
                        // Nama Peserta
                        // Kepesertaan
                        // Perusahaan
                        // Nomor Handphone
                        // Email -->
                        <div class="form-group">
                            <label class="control-label">Nama Lengkap *</label>
                            <input type="text" class="form-control" title="Nama Lengkap" autocomplete="off" required id="name" name="name" value="<?= $_POST["name"]; ?>" onkeypress="return isAlphabetsKey(event)" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kepesertaan</label>
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select name="kepesertaan" id="kepesertaan" required title="kepesertaan" class="dropdown-product selectpicker">
                                        <option value="" Selected></option>
                                        <option value="1">Trainer</option>
                                        <option value="2">Peserta Training</option>
                                        <option value="3">Tim Training Center</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Perusahaan</label>
                                <input type="text" class="form-control" title="Perusahaan" autocomplete="off" name="perusahaan" value="<?= $_POST["perusahaan"]; ?>" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nomor Handphone</label>
                                <input type="text" class="form-control" title="Nomor Handphone" autocomplete="off" name="number_handphone" value="<?= $_POST["number_handphone"]; ?>" onkeypress="return isNumberKey(event)" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" title="Email" autocomplete="off" required name="email" value="<?= $_POST["email"]; ?>" />
                            </div>
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