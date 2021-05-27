$(document).ready(
    function(){
        $('input[name="filePhoto1"]').change(
            function(){
                if ($(this).val()) {
                    $('input[name="filePhoto2"]').attr('disabled',false);
                    $('input[name="filePhoto3"]').attr('disabled',false);
                } 
            }
            );
    });