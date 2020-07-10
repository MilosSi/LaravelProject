$(document).ready(function () {

    if(wishlist!=null)
    {
        createWishlist(wishlist);
    }
    else
    {
        emptyWishlist();
    }

    $(".wishlistremove").click(function (e) {
        e.preventDefault();
        let id=$(this).data('id');
        deleteOrder(id,'wishlist');
        location.reload();
    })
})

function createWishlist(data) {
    let ispis=``;
    data.forEach(function (elem) {
        let desc=elem.opis.substr(0,elem.opis.indexOf('.'));
        ispis+=`
            <tr>
                <td class="wishlist-remove">
                    <a href="#" data-id="${elem.idProizovda}" class="wishlistremove"><i class="fa fa-trash-o"></i></a>
                </td>
                <td class="wishlist-img" style="width: 85px; height: 183px;">
                    <a href="#"><img src="assets/images/product/${elem.putanja}" alt="${elem.naziv}" style="width: 100%;height: 100%;"></a>
                </td>
                <td class="wishlist-name">
                    <a href="#" style="margin-left: 7px">${elem.naziv}</a>
                </td>
                <td class="wishlist-stock">
                   <p>${desc}</p>
                </td>
                <td class="wishlist-price"><span class="amount">$${elem.cenaP}</span></td>
                <td class="wishlist-cart">
                    <a href="/product/${elem.idProizovda}">See product</a>
                </td>
            </tr>
        `;
    })

    $(".wishlistitems").html(ispis);
}

function emptyWishlist() {
    ispis=`
        <h3 class="text-center"> Your wish list is empty </h3>
        <a href="/" class="text-center" style="margin-top: 15px; padding: 20px;background-color: #a38b5e;display: flex;margin-left: auto;margin-right: auto;width: 30%;color: #fff;justify-content: center; border-radius: 5px;">Home</a>

    `;

    $(".emptywhishlist").html(ispis);
}
