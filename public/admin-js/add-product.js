jQuery(document).ready(function(){
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
  });  

  $(document).on('click', '#add_product_btn', function() {
    // if ($("#add_product_form").valid() == false) {
    //     true
    // } else {
        var form = $("#add_product_form")[0];
        var formData = new FormData(form);
        formData.append('parent_id','0');
        $.ajax({
        url: $(this).attr('data-url'),
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
            success: function(response) {
                if ((response.results['status'] == true) && (response.results['status_code'] == 200)) {
                    bootbox.confirm(response.results['message'], function (confirmed) {
                        if (confirmed) {
                            location.reload(true);
                        }
                    });
                }   else {alert();
                    bootbox.confirm(response.results['message'], function (confirmed) {
                        if (confirmed) {
                            location.reload(true);
                        }
                    });
                }  
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var errors = $.parseJSON(jqXHR.responseText);
                $.each(errors.errors, function (key, val) {
                    $("#" + key + "_msg").text(val[0]);
                });
            }
        });
        
    // }
    
});