var table_name = 'assessment';
$(document).ready(function(){
    $('input[type=radio],input[type=checkbox]').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'icheckbox_square-blue',
        increaseArea: '20%' // optional
    });
    $('#assessment_date').datepicker({language: 'vn', autoclose: true});
    $('input[name="rules_violation"]').on('ifChecked', function(event){
        if ($(this).attr('id') == 'rules_violation_1')
            $('.violated-rule-container').removeClass('hidden');
        else
            $('.violated-rule-container').addClass('hidden');
    });
    $('input[name="concentration"]').on('ifChecked', function(event){
        if ($(this).attr('id') == 'concentration_0')
            $('.disconcentrated-container').removeClass('hidden');
        else
            $('.disconcentrated-container').addClass('hidden');
    });
    $('input[name="break_things"]').on('ifChecked', function(event){
        if ($(this).attr('id') == 'breaking_things_yes')
            $('#breaking_things').parent('div').removeClass('hidden');
        else
            $('#breaking_things').parent('div').addClass('hidden');
    });
    $('input[name="has_parked"]').on('ifChecked', function(event){
        $('.parking_fee_container').removeClass('hidden');
    });
    $('input[name="has_parked"]').on('ifUnchecked', function(event){
        $('.parking_fee_container').addClass('hidden');
    });

    $('input#assiduousness_work_late, input#assiduousness_finish_soon').on('ifChecked', function(event){
        $('.minutes_late_container').removeClass('hidden');
    });
    $('input#assiduousness_work_late, input#assiduousness_finish_soon').on('ifUnchecked', function(event){
        $('.minutes_late_container').addClass('hidden');
    });
    
    $('input[name="assiduousness"]').on('ifClicked', function(event){
        if ($(this).is(':checked')){
            $(this).iCheck('uncheck');
            $('span.required').show();
            $('.hide-when-off').show();
            $('#working_time').attr('required','');
        }else{
            var val = $(this).val();
            if (val == 'off_w_permission' || val == 'off_wt_permission' || val == 'off_by_manager'){
                $('span.required').hide();
                $('.hide-when-off').hide();
                $('#working_time').removeAttr('required');
                $('#description').focus();
            }else{
                $('span.required').show();
                $('.hide-when-off').show();
                $('#working_time').attr('required','');
            }
        }
    });
    
    $('#frmAssessment').submit(function(){
        if (!isValidForm('frmAssessment'))
            return false;
        var need_valid = 1;
        var assiduousness = $('input[name="assiduousness"]:checked');
        if (assiduousness.length)
        {
            if (assiduousness.val() == 'off_w_permission' 
                || assiduousness.val() == 'off_wt_permission'
                || assiduousness.val() == 'off_by_manager')
                need_valid = 0;
        }
        if (need_valid)
        {
            if($('input#assiduousness_work_late:checked, input#assiduousness_finish_soon:checked').length > 0) {
                if($('#minutes_late').val() == ''){
                    alert("Vui l??ng nh???p s??? ph??t ??i tr???/v??? s???m.");
                    $('#minutes_late').focus();
                    return false;
                }
            }
            if($('input[name="work_process"]:checked').length <= 0) {
                alert("Vui l??ng ????nh gi?? ti???n ????? c??ng vi???c.");
                return false;
            }
            if($('input[name="rules_violation"]:checked').length <= 0) {
                alert("B???n c?? vi ph???m n???i quy kh??ng? Vui l??ng ????nh gi??.");
                return false;
            }else{
                if($('input[name="rules_violation"]:checked').val() == 1 && $('#violated_rule').val() == ''){
                    alert("Vui l??ng nh???p n???i quy ???? qu??n.");
                    $('#violated_rule').focus();
                    return false;
                }
            }
            if($('input[name="being_prompted"]:checked').length <= 0) {
                alert("B???n c?? b??? qu???n l?? nh???c nh??? kh??ng? Vui l??ng ????nh gi??.");
                return false;
            }
            if($('input[name="concentration"]:checked').length <= 0) {
               alert("Vui l??ng ????nh gi?? ????? t???p trung cho c??ng vi???c.");
               return false;
            }else{
                if($('input[name="concentration"]:checked').val() == 0 && $('#disconcentrated').val() == ''){
                    alert("Vui l??ng ghi r?? n???i dung ch??a t???p trung.");
                    $('#disconcentrated').focus();
                    return false;
                }
            }
            if($('input[name="break_things"]:checked').length <= 0) {
               alert("B???n c?? l??m h???ng v???t d???ng hay sai m??n? Vui l??ng ????nh gi??.");
               return false;
            }else{
               if($('input[name="break_things"]:checked').val() == 1 && $('#breaking_things').val() == ''){
                    alert("Vui l??ng nh???p t??n v???t d???ng b??? h???ng hay m??n b??? sai.");
                    $('#breaking_things').focus();
                    return false;
               }
            }
            var working_time = parseFloat($('input[name="working_time"]').val());
            if( working_time <= 0){
                alert("Vui l??ng nh???p s??? gi??? l??m vi???c l???n h??n 0.");
                $('input[name="working_time"]').focus();
                return false;
            }else if(working_time >= 14){
                alert("Vui l??ng nh???p s??? gi??? l??m vi???c nh??? h??n 14.");
                $('input[name="working_time"]').focus();
                return false;
            }
            
            var overtime = parseFloat($('input[name="overtime"]').val());
            if(overtime >= 10){
                alert("Vui l??ng nh???p s??? gi??? t??ng ca nh??? h??n 10.");
                $('input[name="overtime"]').focus();
                return false;
            }
        }
        
        var params = $(this).serialize() + '&ajax=1';
        $("#frmAssessment #submit").attr('disabled', true);
        $("#frmAssessment #submit span").text('??ang l??u...');
        blockElement('#main-wrapper');
        $.post(postback_url, params, function(data){
            if (data.status == 'OK')
                window.location.href = base_url + URIs[table_name];
            else
            {
                $("#frmAssessment #submit").attr('disabled', false);
                $("#frmAssessment #submit span").text('L??u');
                unblockElement('#main-wrapper');
                alert(data.message);
            }
        },"json");
        return false; 
    });
});