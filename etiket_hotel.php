<?php
include "_head.php";
include "_menu.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
include_once "common.php";
if (isset($_POST["simpan"])) {

    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $nik = $_POST["nik"];
    $no_hp_penumpang = $_POST["no_hp_penumpang"];
    $kota_tujuan = $_POST["kota_tujuan"];
    $nama_hotel = $_POST["nama_hotel"];
    $lampiran_email_approval = $_POST["lampiran_email_approval"];

    $pattern = "/[<`'~!$*,:|>]/";
    $pattern_alamat = "/[`'~!$*<>:|]/";

    if (preg_match($pattern, $name)) {
        $_SESSION["errormessage"] = "Mohon untuk Nama hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $nik)) {
        $_SESSION["errormessage"] = "Mohon untuk NIK hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $no_hp_penumpang)) {
        $_SESSION["errormessage"] = "Mohon untuk Nomor Handphone Penumpang hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $kota_tujuan)) {
        $_SESSION["errormessage"] = "Mohon untuk Kota Tujuan hanya Memasukan tulisan tanpa special karakter";
    } else if (preg_match($pattern, $nama_hotel)) {
        $_SESSION["errormessage"] = "Mohon untuk Nama Hotel hanya Memasukan tulisan tanpa special karakter";
    } else {
        $return = post_etiket_data($_POST);
    }

    if ($_SESSION["errormessage"] == "") {
        if (substr($return, 0, 2) == "1:") {
            $id     = explode(":", $return)[1];
            $nik     = explode(":", $return)[2];
            post_etiket_attachments($id, $nik, $_FILES["attachment_email"]);
            $_SESSION["message"] = "Request Anda berhasil disimpan, Mohon untuk Menunggu sampai Request bisa kami proses lebih lanjut, Terima Kasih.";
            javascript("setTimeout(function(){ window.location='https://corphr.com/'; }, 7500);");
        } else {
            $_SESSION["errormessage"] = "Data Anda Gagal tersimpan, Harap Coba Lagi atau hubungi CS kami.";
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
                    <h3>Form E-tiket <br> Request Pemesanan Tiket Business Trip</h3>
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
                    <form method="POST" enctype="multipart/form-data" class="form-ad">
                        <input type="hidden" name="mode" value="etiket_hotel">
                        <div class="form-group">
                            <label class="control-label">Nama Lengkap (Nama Sesuai KTP)</label>
                            <input type="text" class="form-control" required title="Nama Lengkap" autocomplete="off" required id="nama" name="nama" value="<?= $_POST["nama"]; ?>" onkeypress="return isAlphabetsKey(event)" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" title="Tanggal Lahir" autocomplete="off" required id="tanggal_lahir" name="tanggal_lahir" value="<?= $_POST["tanggal_lahir"]; ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">NIK</label>
                            <input type="text" class="form-control" title="NIK" required autocomplete="off" name="nik" value="<?= $_POST["nik"]; ?>" maxlength="16" onkeypress="return isNumberKey(event)" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor Handphone Penumpang</label>
                            <input type="text" class="form-control" title="Nomor Handphone Penumpang" required autocomplete="off" name="no_hp_penumpang" value="<?= $_POST["no_hp_penumpang"]; ?>" onkeypress="return isNumberKey(event)" />
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Kota Tujuan</label>
                            <input type="text" class="form-control" title="Kota Tujuan" autocomplete="off" required name="kota_tujuan" value="<?= $_POST["kota_tujuan"]; ?>" />
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Nama Hotel</label>
                            <input type="text" class="form-control" title="Nama Hotel Jam Keberangkatan" autocomplete="off" name="nama_hotel" value="<?= $_POST["nama_hotel"]; ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Check In</label>
                            <input type="date" class="form-control" title="Check In" autocomplete="off" required id="check_in" name="check_in" value="<?= $_POST["check_in"]; ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Check Out</label>
                            <input type="date" class="form-control" title="Check Out" autocomplete="off" required id="check_out" name="check_out" value="<?= $_POST["check_out"]; ?>" />
                        </div>
                        <label class="control-label" id="label_candidates_bank_account">Screenshot Lampiran Email Approval <?= $_txt_required; ?>
                            <br><b>&emsp;(Max Size:2MB )</b></label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" title="Lampiran Email Approval" name="attachment_email" id="attachment_email" accept="image/*,application/pdf" / required>
                            <label class="custom-file-label form-control" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <script>
                            // Add the following code if you want the name of the file appear on select
                            $(".custom-file-input").on("change", function() {
                                var fileName = $(this).val().split("\\").pop();
                                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                            });
                        </script>
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