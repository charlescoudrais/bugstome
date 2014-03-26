var picker      = new Pikaday({field: $('.datepicker')[0]});
var translation = new Array();
if (navigator.language == 'fr') {
    translation = {
        months: [
            'Janvier', 'Février', 'Mars', 'Avril',
            'Mai', 'Juin', 'Juillet', 'Août',
            'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ],
        weekdays: [
            'Dimanche', 'Lundi', 'Mardi', 'Mercredi',
            'Jeudi', 'Vendredi', 'Samedi'
        ],
        weekdaysShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam']
    };
} else {
    translation = {
        months: [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'
        ],
        weekdays: [
            'Sunday', 'Monday', 'Tuesday', 'Wednesday',
            'Thursday', 'Friday', 'Saturday'
        ],
        weekdaysShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
    };
}

$(document).ready(function() {
    $( ".datepicker" ).pikaday({
        firstDay: 1,
//        format: 'DD-MM-YYYY HH:mm:ss',
        format: 'DD-MM-YYYY',
        minDate: moment().toDate(),
        i18n: translation
    });
    
    
});


