
function showButton() {
    document.getElementById("submit_btn").style.visibility="visible";
}
$(function () {
    $(".slider_click").click(function () {
        var id = $(this).data('id');
        var slidertitle = $(this).data('slidertitle');
        var slideralt = $(this).data('slideralt');
         $("#slider_id").val(id);
         $("#sliders_update_title").val(slidertitle);
         $("#sliders_update_alt").val(slideralt);
    })
});
$(function () {
    $(".edit_danhmuc").click(function () {
        var id = $(this).data('id');
        var tendanhmuc = $(this).data('tendanhmuc');
        var danhmucchaid = $(this).data('danhmucchaid');
        $("#danhmuc_id").val(id);
        $("#danhmuc-tendanhmuc").val(tendanhmuc);
        $("#danhmuc-danhmuccha_id").val(danhmucchaid).trigger('change');
    })
});
$(function () {
    $("#btn_reset_danhmuc").click(function () {
        $("#danhmuc_id").val(-1);
        $("#danhmuc-tendanhmuc").val("");
        $("#danhmuc-danhmuccha_id").val(0).trigger('change');
    })
});
$(function () {
    $(".edit_xaphuong").click(function () {
        var id = $(this).data('id');
        var tenxaphuong = $(this).data('tenxaphuong');
        $("#xaphuong_id").val(id);
        $("#xaphuong-tenxaphuong").val(tenxaphuong);
    })
});
$(function () {
    $("#btn_reset_xa_phuong").click(function () {
        $("#xaphuong_id").val(-1);
        $("#xaphuong-tenxaphuong").val("");
    })
});
$(function () {
    $("#btn_reset_loaiditich").click(function () {
        $("#loaiditich_id").val(-1);
        $("#loaiditich-tenloaiditich").val("");
        $("#loaiditich-mota").val("");
        $("#modal_loaiditich_title").html("Thêm loại di tích");
    })
});
$(function () {
    $(".edit_loai_di_tich").click(function () {
        var id = $(this).data('id');
        var mota_loaiditich = $(this).data('mota');
        var tenloaiditich = $(this).data('tenloaiditich');
        $("#loaiditich-tenloaiditich").val(tenloaiditich);
        $("#loaiditich_id").val(id);
        $("#loaiditich-mota").val(mota_loaiditich);
        $("#modal_loaiditich_title").html("Chỉnh sửa loại di tích");
    })
});
$("#content_anhdaidien_file").change(function(){
    var inpit=$('.range_anh_dai_dien');
    if ($("#content_anhdaidien_file").get(0).files.length !== 0) {
        inpit.show();
    }
    else inpit.hide();
});
$(".baiviet_anhlienquan").change(function(){
    var inpit=$('.range_anh_lienquan');
    inpit.show();
});
$(document).ready(function() {
    var inpit=$('.range_anh_dai_dien');
    var inpit1=$('.range_anh_lienquan');
    inpit.hide();
    inpit1.hide();
});
$(document).ready(function (){
    var x = 1;
    var add_button = $("#my-button-add-element");
    var wrapper = $(".my-ul_anh_lien_quan");
    $(add_button).click(function(e) {
        e.preventDefault();
        wrapper.append('<li class="my-ul-li_anh_lien_quan">\n' +
            '            <div class="my_box_anhlienquan">\n' +
            '                <div class="image_anh_lien_quan"><input type="file" accept="image/png,image/jpg,image/jpeg" name="anh_lien_quan[]"></div>\n' +
            '                <div class="row range_anh_lienquan" style="">\n' +
            '                    <div class="col-md-6">\n' +
            '                        <div class="form-group field-anhlienquan_title">\n' +
            '                            <label class="control-label" for="anhdaidien_title">Title của ảnh liên quan</label>\n' +
            '                            <input type="text" class="form-control" name="anhlienquan_title[]" maxlength="200" aria-invalid="false">\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                    <div class="col-md-6">\n' +
            '                        <div class="form-group field-anhlienquan_title">\n' +
            '                            <label class="control-label" for="anhdaidien_alt">Alt của ảnh liên quan</label>\n' +
            '                            <input type="text" class="form-control" name="anhlienquan_alt[]" maxlength="200" aria-invalid="false">\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="item_closed"><button type="button" class="my-button-remove"><i class="glyphicon glyphicon-remove"></i></button></div>\n' +
            '            </div>\n' +
            '        </li>');
    });
    $(wrapper).on("click", ".my-button-remove", function(e) {
        e.preventDefault();
        $(this).parents('li').remove();
    });
});