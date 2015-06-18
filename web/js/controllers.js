var phonecatApp = angular.module('phonecatApp', []);

phonecatApp.controller('PhoneListCtrl', function ($scope) {
    $scope.phones = [
        {
            'name': 'Chargeur DS LITE',
            'volts': 5.2,
            'amps': 1,
            'type': 3,
            'length': 1.2,
            'imageUrl': 'img/chargers/phone1.jpg',
            'snippet': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'},
        {
            'name': 'Motorola XOOM™ with Wi-Fi',
            'volts': 4.8,
            'amps': 1.7,
            'type': 2,
            'length': 3,
            'imageUrl': 'img/chargers/laptop1.jpg',
            'snippet': 'Curabitur eu odio imperdiet, blandit lacus eu, pulvinar ante.'},
        {
            'name': 'Galaxy S6',
            'volts': 2.6,
            'amps': 4.1,
            'type': 1,
            'length': 1.4,
            'imageUrl': 'img/chargers/phone3.jpg',
            'snippet': 'Etiam ac tempus metus, at imperdiet dolor. Integer ut feugiat libero. '},
        {
            'name': 'Cisco WP-75S',
            'volts': 1.9,
            'amps': 2.8,
            'type': 3,
            'length': 4.5,
            'imageUrl': 'img/chargers/router2.jpg',
            'snippet': 'Sed nibh lorem, rutrum id enim id, volutpat mattis odio.'},
        {
            'name': 'Chargeur iPhone 6',
            'volts': 3.7,
            'amps': 1.4,
            'type': 1,
            'length': 2.1,
            'imageUrl': 'img/chargers/phone2.jpg',
            'snippet': 'Nullam ut interdum nulla. Duis quis tellus viverra, dapibus metus nec, pharetra tellus.'},
        {
            'name': 'Routeur LinkSys',
            'volts': 2.8,
            'amps': 7.2,
            'type': 3,
            'length': 3.5,
            'imageUrl': 'img/chargers/router1.jpg',
            'snippet': 'Sed et posuere nibh. '},
        {
            'name': 'Tablette Nexus One™',
            'volts': 2,
            'amps': 3.5,
            'type': 1,
            'length': 1.7,
            'imageUrl': 'img/chargers/laptop2.jpg',
            'snippet': 'In placerat tincidunt ligula, in consectetur mauris gravida nec.'}
    ];

    $scope.typeIncludes = [];

    $scope.includeType = function(type) {
        var i = $.inArray(type, $scope.typeIncludes);
        if (i > -1) {
            $scope.typeIncludes.splice(i, 1);
        } else {
            $scope.typeIncludes.push(type);
        }
    }

    $scope.typeFilter = function(phones) {
        if ($scope.typeIncludes.length > 0) {
            if ($.inArray(phones.type, $scope.typeIncludes) < 0)
                return;
        }

        return phone;
    }

});/**
 * Created by theo on 08/06/15.
 */
