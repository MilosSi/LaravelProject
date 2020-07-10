$(document).ready(function () {
    $("#filterbutton").click(function (e) {
        e.preventDefault();

        let allCategories=[];
        $('.cbxcategory:checkbox').each(function () {
            allCategories.push($(this).val());
        });

        let allSize=[];
        $('.cbxsizes:checkbox').each(function () {
            allSize.push($(this).val());
        });



        let categories=[];
        $('.cbxcategory:checkbox:checked').each(function () {
             categories.push($(this).val());
        });

        let size=[];
        $('.cbxsizes:checkbox:checked').each(function () {
            size.push($(this).val());
        });

        let min=$("#min").val();
        let max=$("#max").val();




        if(categories.length==0)
        {
            categories=allCategories
        }
        if(size.length==0)
        {
            size=allSize;
        }

        let limit=9;
        let offset=0;
        let sortC=$('input[name="sort"]:checked').val();

        if(typeof(sortC) =="undefined")
        {
            sortC=1
        }

        getItems(categories,size,min,max,limit,offset,sortC,true,false);

        getItems(categories,size,min,max,5200,offset,sortC,false,true);



    })

})



function getItems(categories,size,min,max,limit,offset,sort,products=false,links=false) {

    $.ajax({
        type:"POST",
        url:"/ajaxfilter",
        data:{
            categories,
            size,
            min,
            max,
            limit,
            offset,
            sort
        },
        dataType: "json",
        success:function(podaci,jq,kod)
        {
            console.log(podaci);
            if(products)
            {
                createProducts(podaci);
            }
            if (links)
            {
                createLinks(podaci,9);

                $(".ajaxlinkclick").click(function (e) {
                    limit=9
                    e.preventDefault();
                    let offsetNovi=$(this).data('page');
                    offsetNovi=offsetNovi*limit;


                    getItems(categories,size,min,max,limit,offsetNovi,sort,true,false);
                })
            }

        },
        error:function(err)
        {
            console.log(`${err.status}`);
        }
    })
}


function  createProducts(data) {
    let ispis=``;
    data.forEach(function (elem) {

        let popust=(elem.prices_sale*100)/elem.price;
        popust=Math.round(popust);
        popust=100-popust;
        ispis+=`
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="product-wrap mb-50">
            <div class="product-img mb-25">
                <a href="/product/${elem.id}">
                    <img class="default-img" src="/assets/images/product/${elem.pic_path}" alt="${elem.pic_alt}">`;
                    if(elem.featured)
                    {
                        ispis+=`<span class="badge-pink badge-left">Feature</span>`;
                    }

                    if(elem.prices_sale!=null)
                    {

                        ispis+=`<span class="badge-green badge-right">-${popust}%</span>`;
                    }
                ispis+=`
                </a>
                <div class="product-action">
                    <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="${elem.id_product}" class="quickadd"><i class="dl-icon-view"></i><span>Quick Shop</span></a>
                    <a data-toggle="tooltip" title="Add to Wishlist" href="#" class="wishlistadd" data-id="${elem.id_product}"><i class="dl-icon-heart4"></i></a>

                </div>
            </div>
            <div class="product-content text-center">
                <h3><a href="/product/${elem.id}">${elem.pro_name}</a></h3>
                <div class="product-price">`;
                    if(elem.prices_sale!=null)
                    {
                        ispis+=`<span class="old-price">$${elem.price}</span>
                         <span class="new-price">$${elem.prices_sale}</span>`;
                    }
                    else {
                        ispis += `<span>$${elem.price}</span>`;
                    }
                ispis+=`
                </div>
            </div>
        </div>
        </div>
        `;
    });

    $(".ajaxfilter").html(ispis);
}

function  createLinks(data,limit) {
    let totalNumber=data.length;

    let iterations=Math.ceil(totalNumber/limit);

    let ispis=`
    <nav>

        <ul class="pagination">
            <li class="page-item">
                <a class="page-link ajaxlinkclick" href="#" data-page="0">‹</a>
            </li>
`;

            for(var i=0;i<iterations;i++)
            {
                let br=i+1;
                ispis+=`
                    <li class="page-item"><a class="page-link ajaxlinkclick" href="#" data-page="${i}">${br}</a></li>

                `;
            }




            ispis+=`<li class="page-item">
                <a class="page-link ajaxlinkclick" href="#" data-page="${i-1}">›</a>
            </li>
        </ul>
    </nav>
    `;

    $(".ajaxlinks").html(ispis);



}
