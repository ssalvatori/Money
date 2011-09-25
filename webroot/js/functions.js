var categories;

function categoriees_get_all() {
    $.ajax({
        dataType: 'json',
        url: url+"/categories/get_by_type.json",
        success: function(result){
            categories = result;
        }
    });
}
function category_get_type(category_id) {
    $.ajax({
        dataType: 'json',
        data: 'category_id='+category_id,
        url: url+"/categories/get_type.json",
        success: function(result){
            if(result.Category.type == "1") {
                $("#CategoryTypeMessage").html("<h3>Categor type: INCOMING</h3>");
            }
            else {
                $("#CategoryTypeMessage").html("<h2>Categor type: OUTCOMING</h2>");
            }
        }
    });
}

function categories_get_type(category_id) {
    $.each(categories,function(i, category) {

        if(category.Category.id == category_id) {
            return category.Category.type;
        }

    });
}

function Account_Show_Avaliable_in_Field(account_id, field) {
    $.ajax({
        type: "POST",
        url: url+"/accounts/get_avaliable_amount.json",
        data: "account_id="+account_id,
        success: function(result) {
            $(field).val(result);
        }
    });
}

function Account_Show_Dout_in_Field(account_id, field) {
    $.ajax({
        type: "POST",
        url: url+"/accounts/get_dout_amount.json",
        data: "account_id="+account_id,
        success: function(result){            
            $(field).val(result);
        }
    });
}