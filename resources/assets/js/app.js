import $ from 'jquery';
import 'bootstrap-sass';
import 'select2';

import api from './api';
import {escape as e} from './helpers';

import initDeliveriesShowMap from './map/callback';
global.initDeliveriesShowMap = initDeliveriesShowMap;

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    let $gameSelector = $('input[name=game]');
    var $selectedGame = $('input[name=game]:checked');
    let $gameLocationContainer = $('#location-container');

    if ($selectedGame.val()) {
        displayGameLocations($selectedGame.val(), $gameLocationContainer);
    }

    $gameSelector.change(function() {
        displayGameLocations($(this).val(), $gameLocationContainer);
    });

    initSelect2();
});

// Stop disabled button clicks propagating
$('.btn-group .btn.disabled').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
});

$('.js-logout').click(function(e) {
    e.preventDefault();
    document.getElementById('logout-form').submit();
});

function displayGameLocations(game, $el) {
    $el.html('<div class="well">Loading...</div>');

    api.getGameLocations(game, function(locations) {
        renderGameLocations(locations, $el);
        initSelect2();
    });
}

function old(key) {
    return $('#old-' + key).val();
}

function renderGameLocations(maps, $el) {
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

    $el.html(`
        <div class="row">
            ${types.map(type => `
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="from" class="control-label">${type.display}</label>
                        <select id="${type.slug}" class="form-control single-selector-search" name="${type.slug}" required>
                            <option></option>
                            ${maps.map(map => `
                                <optgroup label="${e(map.name)}">
                                    ${map.locations.map(location => `
                                        <option value="${e(location.id)}" ${e(location.id) === old(type.slug) ? 'selected' : ''}>
                                            ${e(location.name)}
                                        </option>
                                    `).join('')}
                                </optgroup>
                            `).join('')}
                        </select>
                    </div>
                </div>
            `).join('')}
        </div>
    `);
}

function initSelect2() {
    $('.single-selector-search').select2({
        placeholder: '',
        theme: 'bootstrap',
        width: '100%',
    });
}
