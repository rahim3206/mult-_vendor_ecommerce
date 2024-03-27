$(document).ready(function(){

    // Change Vendor Status
    $(document).on('change','.changeVendorStatus',function(){
        const url = $(this).data('url');
        const id = $(this).data('id');
        const status = $(this).val();

        $.ajax({
            type:"GET",
            url:url,
            data:{
                id:id,
                status:status
            },
            success:function(response){
                if(response.status)
                {
                    Toastify({
                        text: response.status,
                        className: "success",
                        style: {
                            background: "#008000",
                        }
                    }) .showToast();
                }
            }
        });
    });

});
