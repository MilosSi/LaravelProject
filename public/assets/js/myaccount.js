$(document).ready(function () {
    $(".editadd").click(function (e) {
        e.preventDefault();
        let id=$(this).data('id');
        $(".editadress").css('display','flex');
        $.ajax({
            type:"GET",
            url:"/editaddress",
            data:{
                id
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {
                console.log(podaci);
                createEditModule(podaci);
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        })
    })

});

function createEditModule(data) {
    $("#city").val(data.city);
    $("#san").val(data.street);
    $("#zipcode").val(data.post_code);
    $("#telephone").val(data.telephone);
    $("#id").val(data.id);
}

