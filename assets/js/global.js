window.addEventListener('DOMContentLoaded', (event) => {
    /**
    =========================
    * Vanilla js start from here
    *=========================
    */
    let currentText = 0;
    const texts = document.querySelectorAll('.rotating-text');
    function rotateText() {
        texts[currentText].classList.add('hide');
        currentText = (currentText + 1) % texts.length;
        texts[currentText].classList.remove('hide');
    }
    setInterval(rotateText, 2000);
    /*=========================Vanilla js end above this=========================*/
    jQuery(function () {
        /*=========================jQuery start below this line=========================*/
        /**
        =========================
        * Conditional script Start
        *=========================
        */
        var $body = jQuery('body'); // Cache pemilih untuk efisiensi
        if ($body.hasClass('page-template-photo-gallery-page')) {
            mm_photo_gallery();
        } else if ($body.hasClass('page-template-landing-video-page')) {
            mm_video_modal();
        } else if ($body.hasClass('home')) {
            mm_flickity_testimonial();
        }
        /*=========================Conditional script end=========================*/
        /**
        =========================
        * Photo Gallery
        *=========================
        */
        function mm_photo_gallery() {
            jQuery('.img-item').on('click', function () {
                var imgSrc = jQuery(this).find('img').attr('src');
                jQuery('body').append('<div class="modal"><div class="modal-content"><span class="modal-close">&times;</span><img src="' + imgSrc + '"></div></div>');
                jQuery('.modal').fadeIn();
                jQuery('body').addClass('no-scroll');
            });
            // Menutup modal saat mengklik tombol close.
            jQuery(document).on('click', '.modal-close', function () {
                jQuery('body').removeClass('no-scroll');
                jQuery('.modal').fadeOut(function () {
                    jQuery(this).remove();
                });
            });
            // Menutup modal saat mengklik di luar modal-content.
            jQuery(document).on('click', '.modal', function (e) {
                jQuery('body').removeClass('no-scroll');
                if (jQuery(e.target).hasClass('modal')) {
                    jQuery('.modal').fadeOut(function () {
                        jQuery(this).remove();
                    });
                }
            });
        }


        /**
        =========================
        * Testomonial slider flickity
        *=========================
        */
        function mm_flickity_testimonial() {
            jQuery('#testi-item-wr').flickity({
                // options
                cellAlign: 'left',
                contain: true,
                wrapAround: true,
                autoPlay: true,
            });
        }






        /**
        =========================
        * Video Modal
        *=========================
        */
        function mm_video_modal() {
            jQuery(".video-item").on("click", function (e) {
                e.preventDefault(); // Hentikan aksi default
                var videoSrc = jQuery(this).data("video"); // Ambil URL video
                jQuery(".video-modal-iframe").attr("src", videoSrc + "?autoplay=1&enablejsapi=1"); // Tambahkan parameter autoplay dan enablejsapi
                jQuery(".video-modal").fadeIn(); // Tampilkan modal
                jQuery('body').addClass('no-scroll'); // Tambahkan class no-scroll pada body untuk mencegah scroll saat modal muncul.
            });
            // Fungsi saat tombol close di modal diklik.
            jQuery(".video-modal-close").on("click", function () {
                jQuery('body').removeClass('no-scroll'); // Hapus class no-scroll pada body untuk mengaktifkan scroll kembali.
                jQuery(".video-modal").fadeOut(function () {
                    jQuery(".video-modal-iframe").attr("src", ""); // Hapus URL video untuk menghentikan pemutaran setelah modal hilang
                });
            });
            // Jika area luar modal diklik, tutup modal (opsional).
            jQuery(".video-modal").on("click", function (e) {
                jQuery('body').removeClass('no-scroll'); // Hapus class no-scroll pada body untuk mengaktifkan scroll kembali.
                if (e.target !== this) return; // Pastikan hanya bereaksi saat bagian luar diklik
                jQuery(".video-modal").fadeOut(function () {
                    jQuery(".video-modal-iframe").attr("src", ""); // Hapus URL video untuk menghentikan pemutaran setelah modal hilang
                });
            });
        }
        /*=========================Video Modal End=========================*/
        jQuery('.waform-trigger').click(function () {
            mm_call_waform();
            jQuery('#fwa').slideUp();
        });
        function mm_call_waform() {
            jQuery('#waform').addClass('show');
            jQuery('#waform-desc').slideUp();
            jQuery('#waform-item-wr').slideUp();
            jQuery('body').addClass('no-scroll');
            jQuery('#waform-option-elements-wr').addClass('animate__fadeInUp');
            //open chat form.
            jQuery('#open-chat').click(function () {
                jQuery('#waform-option-elements-wr').slideUp();
                jQuery('#waform-item-wr').slideDown();
                jQuery('#waform-cancel').slideUp();
                jQuery('#waform-desc').slideDown();
                jQuery('#waform-head').slideUp();
                jQuery('#nama').focus();
            });
            //cancel sending waform.
            jQuery('#waform-cancel').click(function () {
                jQuery('#waform').removeClass('show');
                jQuery('body').removeClass('no-scroll');
                jQuery('#fwa').slideDown();
                jQuery('#waform-option-elements-wr').removeClass('animate__fadeInUp');
            });
            //close whatsapp form.
            jQuery('#waform-close').click(function () {
                jQuery('#waform-desc').slideUp();
                jQuery('#waform-head').slideDown();
                jQuery('#waform-item-wr').slideUp();
                jQuery('#waform-option-elements-wr').slideDown();
                jQuery('#waform-cancel').slideDown();
                jQuery('#waform-option-elements-wr').removeClass('animate__fadeInUp');
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
                var nomorWhatsapp = jQuery("#tombol-kirim-pesan").attr('data-whatsapp');
                console.log(nomorWhatsapp);
                var nama = jQuery("#nama").val().trim();
                var keperluan = jQuery("#keperluan").val();
                var isipesan = jQuery("#isipesan").val().replace(/ /g, '%20');
                // Jika semua elemen telah diisi.
                if (nama && keperluan && isipesan) {
                    if (keperluan !== "Lowongan Kerja" || (keperluan === "Lowongan Kerja" && adaLoker === "yes")) {
                        jQuery("#waform-submit").prop("disabled", false);
                        keperluan = "*" + keperluan + "*";
                        var whatsappURL = nomorWhatsapp + '&text=Hallo, ' + nama + ', ingin informasi tentang ' + keperluan + ' ' + isipesan + '. Terimakasih 🙏';
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
        * Submenu
        *=========================
        */
        jQuery('.menu-item-has-children').on('click', function (e) {
            var $submenu = jQuery(this).find('.sub-menu');

            // Cek apakah submenu sedang terbuka
            if (!$submenu.hasClass('show')) {
                // Sembunyikan semua submenu yang lain
                jQuery('.sub-menu.show').fadeOut(500).removeClass('show');
                // Tampilkan submenu yang diklik
                $submenu.stop(true, true).delay(200).fadeIn(500).addClass('show');
                jQuery('#header-menu-list').addClass('show');
            } else {
                // Jika submenu sudah terbuka, sembunyikan
                $submenu.stop(true, true).delay(200).fadeOut(500).removeClass('show');
                jQuery('#header-menu-list').removeClass('show');
            }

            // Jangan hentikan event click jika submenu ada
            if ($submenu.length === 0) {
                e.preventDefault();
            }
        });






























        /**
        =========================
        * jQuery end above this line
        *=========================
        */
    });
});