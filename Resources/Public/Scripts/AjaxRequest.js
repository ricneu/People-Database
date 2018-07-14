function ajaxCall(location) {
    var resultContainer = $('#ajaxCallResult');
    var parameters = 'type=1452982642&no_cache=1&tx_rncontacts_locationmap%5Blocation%5D=' + location;
    if (window.location.href.indexOf("?") > -1)
        var fullUrl = window.location.href + "&" + parameters;
    else
        var fullUrl = window.location.href + "?" + parameters;

    var fullUrl = fullUrl.replace("#zip-filter", "");
    $.ajax({
        url: fullUrl,
        cache: false,
        success: function (result) {
            resultContainer.empty();
            resultContainer.wrapInner(result).fadeIn('fast');
            $("html, body").animate({scrollTop: resultContainer.offset().top - 100}, 1000);
            ajaxCallPagination(fullUrl);

        },
        error: function (jqXHR, textStatus, errorThrow) {
            resultContainer.html('Ajax request - ' + textStatus + ': ' + errorThrow).fadeIn('fast');
        }
    });
}

function ajaxCallPagination(fullUrl) {

    var resultContainer = $('#ajaxCallResult');
    $('a.c-m-pagination__element').click(function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        var currentPage = getURLParameter(url, 'tx_rncontacts_locationmap%5B%40widget_0%5D%5BcurrentPage%5D');
        var fullUrlWithPaginate = fullUrl + '&tx_rncontacts_locationmap%5B%40widget_0%5D%5BcurrentPage%5D=' + currentPage;

        console.log(fullUrlWithPaginate);

        $.ajax({
            url: $(this).attr('href'),
            success: function (result) {
                resultContainer.empty();
                resultContainer.wrapInner(result).fadeIn('fast');
                $("html, body").animate({scrollTop: resultContainer.offset().top - 100}, 1000);
                ajaxCallPagination(fullUrlWithPaginate);
            }
        });
        return false;
    });
}


function getURLParameter(url, name) {
    return (RegExp(name + '=' + '(.+?)(&|$)').exec(url) || [, null])[1];
}

