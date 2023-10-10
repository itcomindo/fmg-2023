window.addEventListener('DOMContentLoaded', (event) => {

    /**
    =========================
    * Vanilla js start from here
    *=========================
    */





    /*=========================Vanilla js end above this=========================*/

    jQuery(function () {

        /*=========================jQuery start below this line=========================*/



        jQuery('.waform-trigger').click(function () {
            mm_call_waform();
            jQuery('#fwa').slideUp();
        });


        function mm_call_waform() {
            jQuery('#waform').addClass('show');
            jQuery('#waform-desc').slideUp();
            jQuery('#waform-item-wr').slideUp();
            jQuery('body').addClass('no-scroll');
            //open chat form.
            jQuery('#open-chat').click(function () {
                jQuery('#waform-option-elements-wr').slideUp();
                jQuery('#waform-item-wr').slideDown();
                jQuery('#waform-cancel').slideUp();
                jQuery('#waform-desc').slideDown();
                jQuery('#waform-head').slideUp();
                //focus on input #nama.
                jQuery('#nama').focus();
            });

            //cancel sending waform.
            jQuery('#waform-cancel').click(function () {
                jQuery('#waform').removeClass('show');
                jQuery('body').removeClass('no-scroll');
                jQuery('#fwa').slideDown();
            });

            //close whatsapp form.
            jQuery('#waform-close').click(function () {
                jQuery('#waform-desc').slideUp();
                jQuery('#waform-head').slideDown();
                jQuery('#waform-item-wr').slideUp();
                jQuery('#waform-option-elements-wr').slideDown();
                jQuery('#waform-cancel').slideDown();
                // jQuery('body').removeClass('no-scroll');.
            });

            mm_whatsapp_form();
        }
        /**
        =========================
        * Sending Waform
        *=========================
        */

        function mm_whatsapp_form() {
            // Menonaktifkan tombol waform-submit saat awal halaman dimuat.
            jQuery("#waform-submit").prop("disabled", true);
            var adaLoker = jQuery('#waform-item-wr').data('loker');
            // Mencegah tautan di dalam tombol dijalankan saat tombol dinonaktifkan.
            jQuery("#waform-submit a").click(function (e) {
                if (jQuery("#waform-submit").prop("disabled")) {
                    e.preventDefault();
                }
            });
            // Logika untuk menampilkan info lowongan berdasarkan pilihan select tanpa harus mengisi form lainnya.
            jQuery("#keperluan").on("change", function () {
                var keperluan = jQuery(this).val();

                // Sembunyikan kedua pesan saat opsi berubah.
                jQuery('#loker-yes, #loker-no').slideUp();

                if (keperluan === "Lowongan Kerja") {
                    if (adaLoker === "yes") {
                        jQuery('#loker-yes').slideDown();
                    } else {
                        jQuery('#loker-no').slideDown();
                    }
                }
            });

            jQuery("#nama, #keperluan, #isipesan").on("input change", function () {
                var nama = jQuery("#nama").val().trim();
                var keperluan = jQuery("#keperluan").val();
                var isipesan = jQuery("#isipesan").val().replace(/ /g, '%20');

                // Jika semua elemen telah diisi.
                if (nama && keperluan && isipesan) {
                    if (keperluan !== "Lowongan Kerja" || (keperluan === "Lowongan Kerja" && adaLoker === "yes")) {
                        jQuery("#waform-submit").prop("disabled", false);
                        keperluan = "*" + keperluan + "*"; // Tambahkan tanda * pada awal dan akhir keperluan untuk membuat teks bold
                        var whatsappURL = "//api.whatsapp.com/send?phone=<?php mm_the_phone('whatsapp'); ?>&text=Hallo, " + nama + ", ingin informasi tentang " + keperluan + " " + isipesan + ". Terimakasih 🙏";
                        jQuery("#waform-submit a").attr("href", whatsappURL);
                        jQuery('#btn-msg').addClass('show');
                    } else {
                        jQuery("#waform-submit").prop("disabled", true);
                        jQuery('#btn-msg').removeClass('show');
                    }
                } else {
                    jQuery("#waform-submit").prop("disabled", true);
                    jQuery('#btn-msg').removeClass('show');
                }
            });
        }











        /**
        =========================
        * jQuery end above this line
        *=========================
        */

    });


});