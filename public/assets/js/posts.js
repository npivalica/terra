$(document).ready(function(){
    $(".page-link").click(loadMoreProducts);
    $(".categories").click(sortAndFilter);
    $(".btnPrice").click(sortAndFilter);
});

var categories = [];

function loadMoreProducts(e){
    categories = [];
    $.each($("input[name='categories']:checked"), function(){
        categories.push($(this).val());
    });
    let sortValue = $("input[name=btnPrice]:checked").val();
    // e.preventDefault();
    let page = $(this).data("page");
    // POZVATI ODGOVARAJUCU FUNKCIJU
}

function sortAndFilter() {
 let sortValue = $("input[name=btnPrice]:checked").val();
    categories = [];
    $.each($("input[name='categories']:checked"), function(){
        categories.push($(this).val());
    });
 // POZVATI ODGOVARAJUCU FUNKCIJU
}

function getProducts(page, categories, sortValue){
    const caller = arguments.callee.caller.name;
    $.ajax({
        url: "",
        method: "",
        data: {

        },
        dataType: "",
        success: function (response) {
            // POZVATI ODGOVARAJUCU FUNKCIJU
            if(caller == 'sortAndFilter'){
                changePagination(response.last_page, response.current_page);
            }
            if(caller == 'loadMoreProducts'){
                changeActivePageLink(response.current_page);
            }
        }
    });
}

function changePagination(totalLinks, currentPage){
    let html = "";
    for(let i = 1; i <= totalLinks; i++){
        if(i != currentPage){
            html += `<li class="page-item"><a class="page-link" id="link${i}" data-page="${i}" href="#">${i}</a></li>`;
        }else{
            html += `<li class="page-item active"><a class="page-link" id = "link${i}" data-page="${i}" href="#">${i}</a></li>`;
        }
    }
    $(".pagination").html(html);
    $(".page-link").click(loadMoreProducts);
}

function changeActivePageLink(currentPage){
    $('.page-item').removeClass('active');
    $('#link' + currentPage).parent().addClass('active');
}

function showProducts(products){
    let html = "";
    for(let product of products) {
        html += `
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="${urlImg}/${product.image}" alt="${product.name}"></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="products/${product.id}">${product.name}</a>
                    </h4>
                    <h5>$${product.price}</h5>
                        <p class="card-text">
                          Categories: `;
                        for (category in product.categories) {
                            html += `${product.categories[category].name}`;
                            if (!(category == (product.categories.length - 1))) {
                                html += `,`;
                            }
                        }
                        html += `</p>
                                </div>
                                </div>
                            </div>`;
    }
    $("#products").html(html);
}
