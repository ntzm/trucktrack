var Api = () => {
    this.locationCache = {};
};

Api.prototype.getGameLocations = (game, callback) => {
    if (this.locationCache.hasOwnProperty(game)) {
        callback(this.locationCache[game]);
    }

    $.get('/api/games/' + game + '/locations')
        .done(locations => {
            this.locationCache[game] = locations;

            callback(locations);
        });
};

Api.prototype.getDirections = (from, to) => {
    return $.get('/api/directions', {from: from, to: to});
};

export default new Api();
