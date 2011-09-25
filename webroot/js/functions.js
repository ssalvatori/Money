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