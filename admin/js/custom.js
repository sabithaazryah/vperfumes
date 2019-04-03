$(document).ready(function () {
    /*
     * Generate canonical name for product category
     */
    $(document).on('keyup', '#category-category', function () {
        $('#category-category_code').val(slug($(this).val()));
    });

    /*
     * Generate canonical name for product subcategory
     */
    $('#productsubcategory-subcategory').keyup(function () {
        $('#productsubcategory-canonical_name').val(slug($(this).val()));
    });

    /*
     * Generate canonical name for products
     */
    $('#product-product_name').keyup(function () {
        $('#product-canonical_name').val(slug($(this).val()));
        $('#product-meta_title').val($(this).val());
        $('#product-profile_alt').val($(this).val());
        $('#product-gallery_alt').val($(this).val());
    });

    /*
     * Generate canonical name for products arabic
     */
//    $('#product-product_name_ar').keyup(function () {
//        $('#product-canonical_name_ar').val(slug($(this).val()));
//    });

    $('#product-product_name').blur(function () {
        var description_text = "Buy " + this.value + " from VPerfumes";
        $('#product-meta_description').val(description_text);
    });

    /*
     * Add Product category
     */

    $(document).on('submit', '#add_category', function (event) {
        event.preventDefault();
        var main_category = $('#product-main_category').val();
        var category = $('#category-category').val();
        var category_arabic = $('#category-category_ar').val();
        var code = $('#category-category_code').val();
        var form = $('.modal-title').attr('field_id');
        $.ajax({
            url: homeUrl + 'product/category/ajaxaddcategory',
            type: "post",
            data: {main_category: main_category, cat: category, code: code, category_arabic: category_arabic},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.con === "1") {
                    $('#' + form).append($('<option value="' + $data.id + '" selected="selected">' + $data.category + '</option>'));
                    $('#product-prcat').append($('<option value="' + $data.id + '" selected="selected">' + $data.category + '</option>'));
                    $('#modal-1').modal('toggle');
                } else {
                    alert($data.msg['category'] + ' or ' + $data.msg['category_code']);
                }

            }, error: function () {

            }
        });

    });

    /*
     * Add Product brand
     */

    $(document).on('submit', '#add_brand', function (event) {
        event.preventDefault();
        var brand = $('#brand-brand').val();
        var brand_ar = $('#brand-brand_ar').val();
        var category = $('#brand-category').val();
        var form = $('.modal-title5').attr('field_id');
        $.ajax({
            url: homeUrl + 'product/brand/ajaxaddbrand',
            type: "post",
            data: {brand: brand, brand_ar: brand_ar, category: category},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.con === "1") {
                    $('#' + form).append($('<option value="' + $data.id + '" selected="selected">' + $data.brand + '</option>'));

                    $('#brand-name').val('');
                    $('#modal-5').modal('toggle');
                } else if ($data.con === "0") {
                    alert($data.error);
                }

            }, error: function () {

            }
        });
    });

    /*
     * Add Product search tag
     */

    $(document).on('submit', '#add_searchtag', function (event) {
        event.preventDefault();
        var tag = $('#mastersearchtag-tag_name').val();
        var tag_ar = $('#mastersearchtag-tag_name_ar').val();
        var form = $('.modal-title4').attr('field_id');
        $.ajax({
            url: homeUrl + 'product/master-search-tag/ajaxaddtag',
            type: "post",
            data: {tag: tag, tag_ar: tag_ar},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.con === "1") {
                    var newOption = $('<option value="' + $data.id + '">' + $data.tag + '</option>');
                    $('#product-search_tag').append(newOption);
                    $('#product-search_tag' + ' option[value=' + $data.id + ']').attr("selected", "selected");
                    var vals = $('#product-search_tag').val();
                    $('#product-search_tag').select2('val', vals);
                    $('#modal-4').modal('toggle');
                } else if ($data.con === "2") {
                    alert($data.error);
                }

            }, error: function () {

            }
        });
    });


    $('#product-main_category').change(function () {
        var $ids = $(this).attr('id');
        var ids = $ids.split('-');
        var main_category = $(this).val();
        Maincategory(main_category, ids);

    });

    $(document).on('change', '#product-search_by_brand', function (event) {
        var brand = $(this).val();
        var related_product = $('#product-related_product').val();

        $.ajax({
            url: homeUrl + 'product/product/get-related-products',
            type: "POST",
            data: {brand: brand, related_product: related_product},
            success: function (data) {
                $('#product-related_product').html(data);
                if (related_product != '') {
                    $('#product-related_product').val(related_product);
                    $('#product-related_product').trigger('change');
                }
            }
        });

    });

    $(document).on('change', '#productlisting-search_by_brand', function (event) {
        var brand = $(this).val();
        var related_product = $('#productlisting-product_id').val();

        $.ajax({
            url: homeUrl + 'product/product/get-related-products',
            type: "POST",
            data: {brand: brand, related_product: related_product},
            success: function (data) {
                $('#productlisting-product_id').html(data);
                if (related_product != '') {
                    $('#productlisting-product_id').val(related_product);
                    $('#productlisting-product_id').trigger('change');
                }
            }
        });

    });

});
var slug = function (str) {
    var $slug = '';
    var trimmed = $.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}

function Maincategory(main_category, ids) {
    $.ajax({
        url: homeUrl + 'product/product/category',
        type: "post",
        data: {main_cat: main_category},
        success: function (data) {
            if (ids[0] === 'subcategory') {
                var idr = '-category_id';
            } else {
                var idr = '-category';
            }
            $('#' + ids[0] + idr).html("").html(data);
            $('#product-prcat ').html("").html(data);
        }, error: function () {

        }
    });
    
    
    
}


