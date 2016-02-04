/**
 * Created by Jørgen Johansen on 02.02.2016.
 */

$(document).ready(function(){
    $('#images').on('change',function(){
        $('#multiple_upload_form').ajaxForm({
            //display the uploaded images
            target:'#images_preview',
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
            },
            error:function(e){
            }
        }).submit();
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#images').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#testimg1").change(function(){
    readURL(this);
});

function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("testimg1").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("testimg1").src = oFREvent.target.result;
    };
};