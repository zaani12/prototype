
import "https://code.jquery.com/jquery-3.6.0.min.js";

$(document).ready(function () {
    // Function to get URL parameter value by name
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
        var results = regex.exec(location.search);
        return results === null ? null : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    // Function to update a parameter in the URL
    function updateURLParameter(param, paramVal) {
        var url = window.location.href;
        var hash = location.hash;
        url = url.replace(hash, "");
        if (url.indexOf(param + "=") >= 0) {
            var prefix = url.substring(0, url.indexOf(param + "="));
            var suffix = url.substring(url.indexOf(param + "="));
            suffix = suffix.substring(suffix.indexOf("=") + 1);
            suffix =
                suffix.indexOf("&") >= 0
                    ? suffix.substring(suffix.indexOf("&"))
                    : "";
            url = prefix + param + "=" + paramVal + suffix;
        } else {
            if (url.indexOf("?") < 0) url += "?" + param + "=" + paramVal;
            else url += "&" + param + "=" + paramVal;
        }
        window.history.replaceState({ path: url }, "", url + hash);
    }

    // Function to fetch data with AJAX
    function fetchData(page, searchValue) {
        var url = "";
        if (window.location.pathname.includes("projets")) {
            url = "/projets";
        } else if (window.location.pathname.includes("Apprenant")) {
            url = "/Apprenant";
        }

        $.ajax({
            url: url + "/?page=" + page + "&searchValue=" + searchValue,
            success: function (data) {
                var newData = $(data);
                if (url === "/projets") {
                    $("tbody").html(newData.find("tbody").html());
                } else if (url === "/Apprenant") {
                    $("#table-personne").html(newData.find("#table-personne").html());
                }
                $("#card-footer").html(newData.find("#card-footer").html());
                var paginationHtml = newData.find(".pagination").html();
                $(".pagination").html(paginationHtml || "");
            },
        });

        if (page !== null && searchValue !== null) {
            updateURLParameter("page", page);
            updateURLParameter("searchValue", searchValue);
        } else {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    }

    // Get initial page value
    var initialPage = getUrlParameter("page");

    // Trigger initial data fetch if page is defined
    if (initialPage) {
        var searchValueFromUrl = getUrlParameter("searchValue");
        $("#table_search").val(searchValueFromUrl);
        fetchData(initialPage, searchValueFromUrl);
    }

    // Handle pagination click event
    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        var page = $(this).attr("href").split("page=")[1];
        var searchValue = $("#table_search").val();
        fetchData(page, searchValue);
    });

    // Handle search input event
    $("body").on("keyup", "#table_search", function () {
        var page = initialPage || 1; // Set a default page value if undefined
        var searchValue = $(this).val();
        fetchData(page, searchValue);
    });

    // Soumission du formulaire
    function submitForm() {
        document.getElementById("importForm").submit();
    }

    // Activation des dropdowns Bootstrap
    $(".dropdown-toggle").dropdown();
});
