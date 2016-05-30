 $(function () {
    
   function getLastDayOfTheYear() {
       var lastDay = moment().set(
       {
           'year':moment().get('year'),
           'month':11,
           'date':31
        }).format('YYYY-MM-DD');
        
        return lastDay;
   }
   
   $('#datetimepicker1').datetimepicker({
        viewMode: 'months',
        format: 'MM',
        locale: 'en',
        minDate: new Date(),
        maxDate: new Date(getLastDayOfTheYear())  
   });
                  
   $('#datetimepicker2').datetimepicker({
        daysOfWeekDisabled: [0, 6],
        viewMode: 'days',
        format: 'DD',
        locale: 'en',
        minDate: new Date(),
        maxDate: new Date(getLastDayOfTheYear())
   });   
     
   $('#datetimepicker3').datetimepicker({
        viewMode: 'years',
        format: 'YYYY',
        locale: 'en',
        minDate: new Date(),
        maxDate: new Date(getLastDayOfTheYear())
   });   
     
   $('#datetimepicker4').datetimepicker({
        format: 'H:mm',
        stepping: 15,
        locale: 'en',
        disabledTimeIntervals: [[moment({ h: 0 }), moment({ h: 9 })], [moment({ h: 22, m:50 }), moment({ h: 24 })]],
          
   });   
     
   $('#datetimepicker5').datetimepicker({
        format: 'H:mm',
        stepping: 15,
        locale: 'en',
        disabledTimeIntervals: [[moment({ h: 0 }), moment({ h: 9, m:15 })], [moment({ h: 23, m:1 }), moment({ h: 24 })]],
   });   
     
   $('#datetimepicker1').datetimepicker().on('dp.change', function(e) {
    $('#datetimepicker2').data('DateTimePicker').date(e.date);
       //console.log(e.date);
  });
 
 
});