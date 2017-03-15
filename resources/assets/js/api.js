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

Api.prototype.getDirections = (from, to, callback) => {
    $.get('/api/directions', {from: from, to: to}).done(callback);
};

export default new Api();
