$(document).ready(function () {

    console.log(cart);
    if(cart!=null)
    {
        createProductsCheckout(cart);

        $(".totalchc").html("$"+totalPrice);
    }
    else
    {
        $(".placeorder").css('display','none');
    }
    $(".placeorder").click(function (e) {
        e.preventDefault();
        let id = $("#idu").val();
        let address = $("#addresses").val();

        let tp = totalPrice;

        let payment = $('input[name="payment_method"]:checked').val();
        let terms = $('#terms').is(':checked');


        if (terms)
        {
            $.ajax({
                type: "POST",
                url: "/placeorder",
                data: {
                    id,
                    address,
                    tp,
                    payment,
                    cart
                },
                dataType: "json",
                success: function (podaci, jq, kod) {


                    if(kod.status==200)
                    {
                        alert("Order placed")
                        deleteCart('korpa')
                        location.reload();
                    }
                    else
                    {
                        console.log("500 ! Error");
                    }
                },
                error: function (err) {
                    console.log(`${err.status}`);
                }
            })
        }
    })
})



function createProductsCheckout(data) {
    let ispis=``;

    data.forEach(function (elem) {
        let total=Number(elem.kolicina)*Number(elem.cenaSaPopustom);
        ispis+=`
         <div class="single-order-middle">
            <div class="single-order-content">
                <h5>${elem.nazivProizvoda} <span> × ${elem.kolicina}</span></h5>
                <span>${elem.velicina.toUpperCase()}</span>
            </div>
            <div class="single-order-price">
                <span>$${total}</span>
            </div>
        </div>
        `;
    })

    $(".chcproducts").html(ispis);

}
