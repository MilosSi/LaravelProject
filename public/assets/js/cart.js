$(document).ready(function () {

    if(cart!=null)
    {
        createMainCart(cart);
    }
    else
    {
        emptyCartMain();
    }

    $(".updateCart").change(function () {
        let value=$(this).val();
        let id=$(this).data('id');
        let velicina=$(this).data('size');

        if(value>0)
        {
            updateOrder(cart,value,id,velicina);
            location.reload();
        }


    })
    //Ukloni sve
    $("#removecart").click(function (e) {
        e.preventDefault();
        deleteCart('korpa');
        location.reload();
    })

    //Ukloni produkt
    $(".removefromcart").click(function (e) {
        e.preventDefault();
        let id=$(this).data('id');
        let velicina=$(this).data('size');
        deleteOrderCart(id,velicina);
        location.reload();

    })

    $(".totalCost").html("$"+totalPrice);
})



function createMainCart(data) {

    let ispis=``;

    data.forEach(function (elem) {
        let price=Number(elem.kolicina)*Number(elem.cenaSaPopustom);
        ispis+=`
           <tr>
                <td class="product-remove">
                    <a href="#" class="removefromcart" data-id="${elem.idProizovda}" data-size="${elem.velicina}"><i class="fa fa-trash-o"></i></a>
                </td>
                <td class="product-img" style="width: 85px; height: 183px;">
                    <a href="/product/${elem.idProizovda}"><img src="/assets/images/product/${elem.putanjaMS}" alt="${elem.nazivProizvoda}" style="width: 100%;height: 100%;"></a>
                </td>
                <td class="product-name">
                <a href="/product/${elem.idProizovda}">${elem.nazivProizvoda} x ${elem.velicina.toUpperCase()}</a>
                </td>
                <td class="product-price"><span class="amount">$${elem.cenaSaPopustom}</span></td>
                <td class="cart-quality">
                    <div class="quickview-quality quality-height-dec2">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box updateCart" type="text" name="qtybutton" value="${elem.kolicina}" data-id="${elem.idProizovda}" data-size="${elem.velicina}">
                        </div>
                    </div>
                </td>
                <td class="product-total"><span>$${price}</span></td>
            </tr>

        `;
    })

    $("#addCartMain").html(ispis);

}

function emptyCartMain() {
    let ispis=`
     <div class="grand-total-wrap">
      <h4 style="text-align: center;margin-bottom: 15px;text-transform: uppercase;">Your cart is empty</h4>
        <div class="grand-btn">
            <a href="/allproducts">All products</a>
        </div>
     </div>
    `
    $(".emptyCol").css('display','none');
    $(".emptyRow").css('justify-content','center');
    $(".emptyCartMain").html(ispis);
}
