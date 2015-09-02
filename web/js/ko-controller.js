// Class to represent a row in the seat reservations grid
$(document).ready(function(){

function genRemoveRoute(item) {
    return Routing.generate('ja_cable_remove', { id: item, _locale:configuration.locale });
}

function Cable(data) {
    var self = this;
    self.id = data.id;
    self.name = data.name;
    self.volts = data.volts;
    self.amps = data.amps;
    self.type = data.type;
    self.length = data.length;
    self.imageUrl = data.imageUrl;
    self.snippet = data.snippet;
    self.remRoute = genRemoveRoute(data.id);
}

function CableViewModel() {
    var self = this;
    self.cables = ko.observableArray([]);
    $.getJSON(configuration.JSONUrl, function(allData) {
        var mappedTasks = $.map(allData, function(item) { return new Cable(item); });
        self.cables(mappedTasks);
    });
    self.currentFilter = ko.observable();


    self.filteredCables = ko.computed(function() {
        if(!self.currentFilter() || self.currentFilter() == "all") {
            return self.cables();
        } else {
            return ko.utils.arrayFilter(self.cables(), function(cable) {
                return cable.type == self.currentFilter();
            });
        }
    });

    self.filterType = ko.observable("all");
    this.filterType.subscribe(function(newValue){
        this.currentFilter(newValue);
    }, this);


    self.addCable = function(item){
        self.cables.push(new Cable(item));
    }
    self.removeCable = function(cable){
        self.cables.remove(cable);
    }

    self.sortBy = ko.observable("volts");
    self.sortBy.subscribe(function(newValue){
        self.sorter(newValue);
    }, this);

    self.sorter = function(header){
        switch(header){
            case 'volts':
                self.cables.sort(function(a,b){
                    return a.volts < b.volts ? -1 : a.volts > b.volts ? 1 : a.volts == b.volts ? 0 : 0;
                });
                break;
            case 'amps':
                self.cables.sort(function(a,b){
                    return a.amps < b.amps ? -1 : a.amps > b.amps ? 1 : a.amps == b.amps ? 0 : 0;
                });
                break;
            case 'length':
                self.cables.sort(function(a,b){
                    return a.length < b.length ? -1 : a.length > b.length ? 1 : a.length == b.length ? 0 : 0;
                });
                break;
        }
    };


    self.sorter("volts");





}

ko.applyBindings(new CableViewModel());


});