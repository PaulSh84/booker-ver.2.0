$(document).ready(function () {

    var $radioButton = $('input[type="radio"]'),
        $positiveRadioButton = $('input[type="radio"]#positive'),
        $negativeRadioButton = $('input[type="radio"]#negative'),
        $recurringOptions = $('.recur'),
        $biWeeklyInput = $('input[type="radio"]#bi-weekly'),
        $weeklyInput = $('input[type="radio"]#weekly'),
        $monthlyInput = $('input[type="radio"]#monthly'),
        $checkedRadioButton = $('.recur input[type="radio"]:checked'),
        $inputField = $('input[type="number"]');
        
 
    if ($positiveRadioButton.attr('checked'))
        $recurringOptions.show();
    else
        $recurringOptions.hide();

    $radioButton.click(function () {

        if ($(this).attr('id') == 'positive') {

            $positiveRadioButton.attr('checked', 'checked');
            $negativeRadioButton.removeAttr('checked');
            $weeklyInput.prop('checked', true);

            $recurringOptions.show();

            $('home,body').animate({
                scrollTop: $(document).height()
            }, 'slow');

        } else if ($(this).attr('id') == 'negative') {

            $negativeRadioButton.attr('checked', 'checked');
            $positiveRadioButton.removeAttr('checked');
            

            $recurringOptions.hide();

        } else if ($(this).attr('id') == 'bi-weekly') {
            
            $checkedRadioButton.removeAttr('checked');
            $biWeeklyInput.prop('checked', true);
            
            $inputField.attr('max', '3');
            $inputField.attr('min', '2');
            $inputField.removeAttr('readonly');
            $inputField.val(2);

        } else if ($(this).attr('id') == 'weekly') {
            
            $checkedRadioButton.removeAttr('checked');
            $weeklyInput.prop('checked', true);
                        
            $inputField.attr('max', '4');
            $inputField.attr('min', '2');
            $inputField.val(2);
            $inputField.removeAttr('readonly');

        } else if ($(this).attr('id') == 'monthly') {
            
            $checkedRadioButton.removeAttr('checked');
            $monthlyInput.prop('checked', true);
            
            $inputField.val(2);
            $inputField.attr('readonly', 'readonly');
        }

    });
});