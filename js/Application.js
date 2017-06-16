/**
 * Created by Priyansh on 2017-05-30.
 */

$('.confirmation').on('click',function(){
    return confirm('Are you sure you wabnt to delete this item?');
});


// passwords - https://www.formget.com/password-strength-checker-in-jquery/
$(document).ready(function() {
    $('#password').keyup(function() {
        $('#result').html(checkStrength($('#password').val()))
    })
    function checkStrength(password) {
        var strength = 0
        if (password.length < 6) {
            $('#result').removeClass()
            $('#result').addClass('alert-danger')
            return 'Too short'
        }
        if (password.length > 7) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2
        if (strength < 2) {
            $('#result').removeClass()
            $('#result').addClass('alert-warning')
            return 'Weak'
        } else if (strength == 2) {
            $('#result').removeClass()
            $('#result').addClass('alert-info')
            return 'Good'
        } else {
            $('#result').removeClass()
            $('#result').addClass('alert-success')
            return 'Strong'
        }
    }
});