$(document).ready(function () {

    $(".addtocartproduct").click(function (e) {
        e.preventDefault();
        let id=$(this).data('id');
        let quantity=$("#quantity").val();
        let size=$("#sizes").val();



        if(quantity>0)
        {
            addToCartAjax(id,size,quantity);
        }

    })
})
