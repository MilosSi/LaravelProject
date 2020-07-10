$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#addtocol").click(function (e) {
        e.preventDefault();
        let idCollection=$(this).data('id');
        let idProduct=$("#addtocolpro").val();

        $.ajax({
            type:"POST",
            url:"/admin/ajaxaddtocollection",
            data:{
                idCollection,
                idProduct
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {
                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Product added')
                    location.reload();
                }
                else
                {
                    alert("Failed adding !")
                }

            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });
    })

    $(".removeproduct").click(function (e) {
        e.preventDefault();
        let idProduct=$(this).data('id');
        let idCollection=$(this).data('idcol');

        $.ajax({
            type:"POST",
            url:"/admin/ajaxremovefromcol",
            data:{
                idCollection,
                idProduct
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {
                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Product removed from collection')
                    location.reload();
                }
                else
                {
                    alert("Failed removing !")
                }

            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });


    });



    //Tags


    $("#addtotag").click(function (e) {
        e.preventDefault();
        let idTag=$(this).data('id');
        let idProduct=$("#addtotagpro").val();

        $.ajax({
            type:"POST",
            url:"/admin/ajaxaddtags",
            data:{
                idTag,
                idProduct
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {
                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Product taged')
                    location.reload();
                }
                else
                {
                    alert("Failed tagging !")
                }

            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });
    })

    $(".removeproducttag").click(function (e) {
        e.preventDefault();
        let idProduct=$(this).data('id');
        let idTag=$(this).data('idcol');


        $.ajax({
            type:"POST",
            url:"/admin/ajaxremovefromtag",
            data:{
                idTag,
                idProduct
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {
                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Tag removed from product')
                    location.reload();
                }
                else
                {
                    alert("Failed removing !")
                }

            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });


    });

    //Categoires

    $("#genderpick").change(function () {
        let id=$(this).val();
        if(id!=0)
        {
            $.ajax({
                type:"POST",
                url:"/admin/ajaxshowcategories",
                data:{
                    id
                },
                dataType: "json",
                success:function(podaci,jq,kod)
                {

                    createCategoriesOut(podaci.categoriesout);
                    createCategoriesIn(podaci.categoriesin);
                },
                error:function(err)
                {
                    console.log(`${err.status}`);
                }
            });
        }
    })


    $("#addcattogender").click(function (e) {
        e.preventDefault();
        let idGender=$("#genderpick").val();
        let idCategory=$("#categoriesout").val();

        if(idGender!=0)
        {
            $.ajax({
                type:"POST",
                url:"/admin/ajaxaddcattogender",
                data:{
                    idGender,
                    idCategory
                },
                dataType: "json",
                success:function(podaci,jq,kod)
                {

                    if(kod.status==200)
                    {
                        alert('Category added to gender')
                        location.reload();
                    }
                    else
                    {
                        alert("Failed adding !")
                    }
                },
                error:function(err)
                {
                    console.log(`${err.status}`);
                }
            });
        }
    })


    //Order
    $("#statuspro").change(function (e) {
        let idOrder=$("#idnar").val();
        let status=$(this).val();

        $.ajax({
            type:"POST",
            url:"/admin/ajaxstatusorder",
            data:{
                idOrder,
                status
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {

                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Order completed')
                    location.reload();
                }
                else
                {
                    alert("Failed completing !")
                }
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });

    })


    //Product edit
    $(".cbxactiveprice").change(function () {
        let idPrice=$(this).val();
        let idp=$("#idp").val();


        $.ajax({
            type:"POST",
            url:"/admin/ajaxchangeprice",
            data:{
                idPrice,
                idp
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {

                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Price updated')
                    location.reload();
                }
                else
                {
                    alert("Failed completing !")
                }
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });

    });


    $('.cbxmainpic').change(function () {
        let idPic=$(this).val();
        let idp=$("#idp").val();

        $.ajax({
            type:"POST",
            url:"/admin/ajaxchangemainpic",
            data:{
                idPic,
                idp
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {

                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Picture updated')
                    location.reload();
                }
                else
                {
                    alert("Failed completing !")
                }
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });
    })

    //Remove image

    $(".removeimage").click(function (e) {
        e.preventDefault();
        let idPicture=$(this).data('id');
        let idp=$("#idp").val();


        $.ajax({
            type:"POST",
            url:"/admin/ajaxremoveimage",
            data:{
                idPicture,
                idp
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {

                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Picture deleted')
                    location.reload();
                }
                else
                {
                    alert("Failed deleting !")
                }
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });
    })
})

function createCategoriesOut(data) {
    let ispis=``;
    data.forEach(function (elem) {
        ispis+=` <option value="${elem.sub_cat_id}">${elem.sub_cat_name} - ${elem.cat_name}</option>`;
    })

    $("#categoriesout").html(ispis);
}

function createCategoriesIn(data) {
    let ispis=``;
    data.forEach(function (elem) {
        ispis+=`
             <tr>
                <td>${elem.id_category}</td>
                <td>${elem.cat_name}</td>
                <td>${elem.gender_name}</td>

                <td>
                    <a class="btn btn-danger btn-sm removecategorygender" href="#" data-id="${elem.cg_id}">
                        <i class="fas fa-trash">
                        </i>
                        Remove from collection
                    </a>
                </td>
            </tr>

        `;
    })

    $("#addcatin").html(ispis);

    $(".removecategorygender").click(function (e) {
        e.preventDefault();
        let idCategory=$(this).data('id');
        let idGender=$("#genderpick").val();


        $.ajax({
            type:"POST",
            url:"/admin/ajaxremovecategorygender",
            data:{
                idGender,
                idCategory
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {
                console.log(podaci);
                if(kod.status==200)
                {
                    alert('Category removed to gender')
                    createCategoriesIn(podaci);
                }
                else
                {
                    alert("Failed adding !")
                }
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        });
    });




}
