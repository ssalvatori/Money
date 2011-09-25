var categories;

function categoriees_get_all() {
    $.ajax({
        type: "POST",
        url: url+"/categories/get_by_type.json",
        success: function(result){
            categories = result;
        }
    });
}

function categories_get_type(id) {
    $.each(categories,function(data,i) {
        console.log(data);
        console.log(i);
    });
}