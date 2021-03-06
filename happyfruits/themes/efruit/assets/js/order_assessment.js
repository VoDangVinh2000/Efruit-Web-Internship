$(document).ready(function(){
    $('#rateFrm .criteria-list a.btn').click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
    });

    $('.assessment_star .star-box input').click(function(e){
        $('.assessment_star .star-box .star-rate').addClass('gray-star');
        var index = $(this).parent().index();
        if($(this).is(':checked')){
            $('.assessment_star .star-box > div').slice(0, index + 1).find('.star-rate').removeClass('gray-star');
            $('.assessment_content').html($(this).next('label').attr('title'));
        }
    });
    $('.assessment_star .star-box input:checked').click();

    $("#rateFrm .btn-submit").click(function(){
        if($('#rateFrm .assessment_star .star-box input:checked').length == 0){
            showAlertError(translate('Vui lòng chọn sao để đánh giá'));
            return false;
        }

        var criteria = [];
        $('#rateFrm .criteria-list a.btn.active').each(function(){
            criteria.push($(this).attr('data-value'));
        });

        var params = {
            action: 'assess_order',
            assessment_id: $('#rateFrm #assessment_id').val(),
            order_id: $('#rateFrm #order_id').val(),
            score: $('#rateFrm .assessment_star .star-box input:checked').attr('value'),
            criteria: criteria.join(','),
            feedback: $('#rateFrm textarea[name="comment"]').val()
        };
        $("#rateFrm .btn-submit").attr('disabled', true);
        $.post(postback_url, params, function(data){
            $("#rateFrm .btn-submit").attr('disabled', false);
            if (data.status == 'OK'){
                if(data.discount_code){
                    showAlertError(translate('eFruit cám ơn bạn đã đánh giá đơn hàng') + '<br/>' + translate('eFruit gửi bạn mã khuyến mãi -10%, hạn sử dụng trong 10 ngày') + '<br/><div style="text-align: center;font-weight: bold;font-size: 150%;margin-top: 10px;">' + data.discount_code + '</div>');
                }else{
                    showAlertError(translate('eFruit cám ơn bạn đã đánh giá đơn hàng'));
                }
            }else{
                showAlertError(translate(data.message));
            }
        },"json");
        return false;
    });
});