$(document).ready(function (){
    var inpit=$('.my_hidden');
    inpit.hide();
    var max_fields = 10;
    var x = 1;
    var add_button = $("#my-button-add-element");
    var wrapper = $(".my-ul");
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<li class="my-ul-li">\n' +
                '            <div class="my_box_anhlienquan">\n' +
                '                <div class="my_wrapper ">\n' +
                '                    <div class="form-group field-input_file_anhlienquan">\n' +
                '<label class="control-label" for="input_file_anhlienquan">Ảnh liên quan</label>\n' +
                '<input type="hidden" name="BaiViet[anh_lien_quans]" value=""><input type="file" id="input_file_anhlienquan" name="BaiViet[anh_dai_dien]">\n' +
                '\n' +
                '<div class="help-block"></div>\n' +
                '</div>                    <div class="row my_hidden range_anh_lien_quan">\n' +
                '                        <div class="col-sm-6">\n' +
                '                            <div class="form-group field-baiviet-anh_lien_quans_alts">\n' +
                '<label class="control-label" for="baiviet-anh_lien_quans_alts">Alt của ảnh liên quan</label>\n' +
                '<input type="text" id="baiviet-anh_lien_quans_alts" class="form-control" name="BaiViet[anh_lien_quans_alts]">\n' +
                '\n' +
                '<div class="help-block"></div>\n' +
                '</div>                        </div>\n' +
                '                        <div class="col-sm-6">\n' +
                '                            <div class="form-group field-baiviet-anh_lien_quans_titles">\n' +
                '<label class="control-label" for="baiviet-anh_lien_quans_titles">Title của ảnh liên quan</label>\n' +
                '<input type="text" id="baiviet-anh_lien_quans_titles" class="form-control" name="BaiViet[anh_lien_quans_titles]">\n' +
                '\n' +
                '<div class="help-block"></div>\n' +
                '</div>                        </div>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '                <div class="my-icon-top-right">\n' +
                '                    <button type="button" class="my-button-remove"><i class="glyphicon glyphicon-remove"></i></button>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </li>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });
    $(wrapper).on("click", ".my-button-remove", function(e) {
        e.preventDefault();
        $(this).parents('li').remove();
        x--;
    })
});
$("#input_file_anhdaidien").change(function(){
    var inpit=$('.range_anh_dai_dien');
    if ($("#input_file_anhdaidien").get(0).files.length !== 0) {
        inpit.show();
    }
    else inpit.hide();
});
$("#input_file_anhlienquan").change(function(){
    var inpit=$('.range_anh_lien_quan');
    if ($("#input_file_anhlienquan").get(0).files.length !== 0) {
        inpit.show();
    }
    else inpit.hide();
});