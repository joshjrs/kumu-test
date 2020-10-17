/* custompager.js */

let customPagerWidget = {
    init: function (options) {
        if (options.pageSizeParam == "undefined" || !(options.pageSizeParam)) {
            return;
        }

        if (options.pageParam == "undefined" || !(options.pageParam)) {
            return;
        }

        if (options.url == "undefined" || !(options.url)) {
            return;
        }

        this.bindEvent(options.pageSizeParam, options.pageParam, options.url);
    },
    bindEvent: function (pageSizeParam, pageParam, url) {
        // $('input[name="page"]')
        $('input[name="' + pageParam + '"]').on('keydown', function (evt) {
            if (evt.which == 13) {
                let targetPage =  $(this).val();

                // new RegExp("\(&page=\)\\d+", "gi")
                let pattern = new RegExp("\(&" + pageParam + "=\)\\d+", "gi");
                let newUrl = url.replace(pattern, "$1"+targetPage);
                window.location.href = newUrl;
            }
        });

        // $('select[name="per-page"]')
        $('select[name="' + pageSizeParam + '"]').on('change', function () {
            let selectedPageSize = $(this).find('option:selected').val();

            // new RegExp("\(&per-page=\)\\d+", "gi")
            let pattern = new RegExp("\(&" + pageSizeParam + "=\)\\d+", "gi");
            let newUrl = url.replace(pattern, "$1"+selectedPageSize);
            window.location.href = newUrl;
        });
    }
};