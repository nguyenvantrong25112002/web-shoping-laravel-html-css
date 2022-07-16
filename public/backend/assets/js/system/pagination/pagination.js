const paginate = {
    limit: function(elment, url) {
        $(elment).change(function(e) {
            e.preventDefault();
            let val = $(this).val();
            window.location.href = url + `?limit=${val}`
        });
        // alert()
    }
}