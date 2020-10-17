$(function () {
    'use strict';

    let autocompletePath = $("input[name=autocomplete_url]").val();
    let whole
    $('input.typeahead').typeahead({
        openLinkInNewTab: true,
        fitToElement: true,
        source:  function (query, process) {
        return $.get(autocompletePath, { query: query }, function (data) {
                let guests = [];
                data.map((guest) => {
                    let fullname = `${guest.first_name} ${guest.last_name}`;
                    guests.push(fullname);
                });
                return process(guests);
            });
        },
        afterSelect: (data) => {
            $('#search-button').removeAttr('disabled');
        }
    });


    $('#datepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#timepicker').datetimepicker({
        format: 'hh:mm:ss'
    });
    
    function reloadPageBySize() {
        let sid = $( '#pageSizeEvent' ).val( );
        let currentURL = window.location.pathname;
        let n=currentURL.indexOf("/sid");// use '/sid' only in indexOf to remove else part
        if(n!=-1) {
            var newurl = currentURL.substring(0,n); 
            window.location.href = newurl + '/sid/' + sid;
        }
    }
    

});