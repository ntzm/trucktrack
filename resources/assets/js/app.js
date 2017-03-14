window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
require('Select2');

const api = {
    locationCache: {},
    getGameLocations: function(game, callback) {
        if (api.locationCache.hasOwnProperty(game)) {
            callback(api.locationCache[game]);
        }

        $.get('/api/games/' + game + '/locations')
            .done(function(locations) {
                api.locationCache[game] = locations;

                callback(locations);
            })
            .fail(function() {
                console.log('fail');
            });
    }
};

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    let $gameSelector = $('#game');
    let $gameLocationContainer = $('#location-container');

    if ($gameSelector.val()) {
        displayGameLocations($gameSelector.val(), $gameLocationContainer);
    }

    $gameSelector.change(function() {
        displayGameLocations($(this).val(), $gameLocationContainer);
    });

    initSelect2();
});

function displayGameLocations(game, $el) {
    $el.html('<div class="well">Loading...</div>');

    api.getGameLocations(game, function(locations) {
        renderGameLocations(locations, $el);
        initSelect2();
    });
}

function renderGameLocations(maps, $el) {
    let html = '<div class="well"><div class="row">';

    let types = [
        {
            slug: 'from',
            display: 'From',
        },
        {
            slug: 'to',
            display: 'To',
        },
    ];

    types.forEach(function(type) {
        let oldValue = $('#old-' + type.slug).val();

        html += '<div class="col-sm-6">' +
            '<div class="form-group">' +
                '<label for="from" class="control-label">' + type.display + '</label>' +
                '<select id="' + type.slug + '" class="form-control single-selector-search" name="' + type.slug + '" required>' +
                '<option></option>';

        maps.forEach(function(map) {
            html += '<optgroup label="' + e(map.name) + '">';

            map.locations.forEach(function(location) {
                html += '<option value="' + e(location.id) + '"' + (e(location.id) === oldValue ? ' selected' : '') + '>' + e(location.name) + '</option>';
            });

            html += '</optgroup>';
        });

        html += '</select></div></div>';
    });

    html += '</div></div>';

    $el.html(html);
}

function initSelect2() {
    $('.single-selector-search').select2({
        placeholder: '',
        theme: 'bootstrap',
        width: '100%',
    });
}

function e(text) {
    return $('<div/>').text(text).html();
}