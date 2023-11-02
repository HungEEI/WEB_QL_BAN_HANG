
$(document).ready(function () {
    var inputFile = $('#file');
    $('#upload_single_bt').click(function (event) {
        var URI_single = $('#form-upload-single #file').attr('data-uri');
        var fileToUpload = inputFile[0].files[0];
        var formData = new FormData();
        formData.append('file', fileToUpload);
        $.ajax({
            url: URI_single,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.status == 'ok') {
                    showThumbUpload(data);
                    $('#thumbnail_url').val(data.image_id);
                }

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    });

    function showThumbUpload(data) {
        var items;
        items = '<img src="' + data.file_path + ' "/>';
        $('#show_list_file').html(items);       
    }
});

$(document).ready(function() {
    var inputFile = $('#file');
    $("#upload_multi_bt").click(function (event) {
        var URI_single = $('#upload_multi #file').attr('data-uri');
        var fileToUpload = inputFile[0].files;
        if (fileToUpload.length > 0) {
            var formData = new FormData();
            for (var i = 0; i < fileToUpload.length; i++) {
                var file = fileToUpload[i];
                formData.append('file[]', file, file.name);
            }
            $.ajax({
                url: URI_single,
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var imageIds = [];
                    var items = '';
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].status === 'ok') {
                            items += '<img src="' + data[i].file_path + '"/>';
                            if (data[i].image_id) {
                                imageIds.push(data[i].image_id);
                            }
                        }
                    }
                    $('#result').html(items);
                    $('#thumbnail_url').val(imageIds.join(','));
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    });
});