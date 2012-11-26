
var picker = new Pikaday({field: $('.datepicker')[0]});
    

$(document).ready(function() {
     $( ".datepicker" ).pikaday({
        firstDay: 1,
        format: 'DD-MM-YYYY',
        minDate: moment().toDate(),
        i18n: {
            months: [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'
                ],
            weekdays: [
                'Sunday',
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday'
            ],
            weekdaysShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
        }
    });
    
    
});


