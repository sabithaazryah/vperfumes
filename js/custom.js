$(document).ready(function () {
    /*
     * Generate canonical name for product category
     */
    $('#productcategory-category').keyup(function () {
        $('#productcategory-canonical_name').val(slug($(this).val()));
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
    $('#products-product_name').keyup(function () {
        $('#products-canonical_name').val(slug($(this).val()));
    });

    /*
     * Generate canonical name for customer stories title
     */
    $('#customerstories-title').keyup(function () {
        $('#customerstories-canonical_name').val(slug($(this).val()));
    });

    /*
     * Generate canonical name for news and events title
     */
    $('#latestnews-title').keyup(function () {
        $('#latestnews-canonical_name').val(slug($(this).val()));
    });
    /*
     * Generate canonical name for customer story name
     */
    $('#customerstories-name').keyup(function () {
        $('#customerstories-canonical_name').val(slug($(this).val()));
    });

    /*
     * This function find product subcategories based on category change
     */

    $(document).on('click', '#product-spec', function () {
        $.ajax({
            url: '<?= Yii::$app->homeUrl; ?>cms/product-specification/get-specification',
            type: "POST",
            data: {},
            success: function (data) {
                var res = $.parseJSON(data);
                $('.modal-content').html(res.result['report']);
                $('#modal-default').modal('show');
            }
        });
    });

    /*
     * This function open form in popup
     */

    $(document).on('click', '.product-spec', function () {
        alert();
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


