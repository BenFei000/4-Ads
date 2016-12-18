/**
 * This functions change sub categories select options to show only sub categories
 * that are related to the main category that have an id = main_category
 * @author Sabry Ragab
 * @param main_category_id integer
 */
function fillSubCategorySelectOptions(main_category_id) {

    var request_data = {
           'main_category_id':main_category_id,
           '_token': $('meta[name="csrf-token"]').attr('content')
    }

    $.ajax({
        type: 'POST',
        url: '/get/sub/categories',
        data: request_data,
        success: function(data){

            $('#sub_category').empty();
            $('#sub_category').append($('<option>', {
                value: "",
                text: 'None'
            }));

            var sub_categories = data.subCategories;
            for (var i = 0; i < sub_categories.length; ++i) {
                $('#sub_category').append($('<option>', {
                    value: sub_categories[i].id,
                    text: sub_categories[i].name
                }));
            }
            //remove any validation message shown before
              $("#validation_errors").empty();
        },
        error: function (request, status, error) {
            //alert(request.responseText);
            console.log(request.responseText);
           var errors = request.responseJSON;
           $.each( errors, function( key, value ) {
              $("#validation_errors").append($("<li>").text(value[0]));
           });
        }
    });
}

$( document ).ready(function() {

    $('#main_category').on('change', function() {
      var main_category_id = this.value;
      // If sub_category is exist in the page && type select
      if( $('#sub_category').length && $("#sub_category").is("select")) {
        fillSubCategorySelectOptions(main_category_id);
      }
    });

});
