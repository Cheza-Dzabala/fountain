/**
 * Created by cheza on 9/26/16.
 */

fountainAngular.controller('clientProfileEditController', ['$rootScope', '$http', function ($rootScope, $http) {
    this.EditPersonalDetails = 'no';
    
    this.EditPersonalDetailsYes = function () {
        this.EditPersonalDetails = 'yes'
    };


    this.EditPersonalDetailsNo = function () {
        this.EditPersonalDetails = 'no'
    };
    
    this.saveSection = function () {
        this.ClientID = document.getElementsByName('firstName')[0].ClientID;
        this.firstName = document.getElementsByName('firstName')[0].value;
        this.lastName = document.getElementsByName('lastName')[0].value;
        this.otherName = document.getElementsByName('otherName')[0].value;
        this.dateOfBirth = document.getElementsByName('dateOfBirth')[0].value;

        if(document.getElementsByName('gender')[0].checked)
        {
            this.gender = document.getElementsByName('gender')[0].value;
        }else{
            this.gender = document.getElementsByName('gender')[1].value;
        }

        var vm = this;


        savePersonalData();

        function savePersonalData()
        {

            $http({
                url: 'http://localhost:8000/api/savePersonalDetails',
                dataType: 'json',
                method: "POST",
                data: {
                    'clientID' : vm.ClientID,
                    'firstName': vm.firstName,
                    'lastName': vm.lastName,
                    'otherName': vm.otherName,
                    'dateOfBirth': vm.dateOfBirth,
                    'gender': vm.gender,
                }
            })
                .success(function(response) {
                    console.log(response);
                    vm.EditPersonalDetailsNo();
                })
                .error(function(response) {
                    console.log(response);
                });
        };

    }

}]);