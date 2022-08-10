$(document).ready(function(){
    var busy = false;
    var link;

    $('[data-toggle="popover"]').popover()

    $(document).on('click', '.copy', function(e)
    {
        //e.preventDefault();

        /* Get the text field */
        var copyText = document.getElementById("copyFrom");

        /* Select the text field */
        copyText.select();

        /* Copy the text inside the text field */
        document.execCommand("copy");

        //return false;

    });

    $(document).on('click', '.showOriginalBtn', function(){
        var text = $(this).data('original');

        $(".mainPostText").html(text);
    });

    $(document).on('click', '.showOriginalCmtBtn', function(){
        var text = $(this).data('original');
        var id = $(this).data('cmtid');

        $("#cmtContent" + id).html(text);
    });

    $(document).on('click', '.close-btn', function(){
        window.location.assign('/thought/' + link);

    });

    $(document).on('submit', '#postMakerForm', function(e)
    {
        if(busy == false)
        {
            busy = true;

            e.preventDefault();

            var text = $("#postText");
            var number = $("#postNumber");

            if(text.val() != "")
            {
                $.post('/thought/create', {postText: text.val(), postNumber: number.val()}, function(data)
                {
                    if(data.code == 1)
                    {
                        link = data.link;
                        $("#successModal").modal()
                    }else{

                    }
                });
            }else{

            }

            busy = false;
        }

        return false;
    });

    $(document).on('click', '.likeBtn', function(e)
    {
        if(busy == false)
        {
            busy = true;
            e.preventDefault();

            var t = $(this);

            var id = t.data('id');

            if(id != "")
            {
                $.post('/thought/like', {postId: id}, function(data){
                    var obj = jQuery.parseJSON(data);

                    if(obj.code == 1)
                    {
                        $("#icon-" + id).addClass('bounce');
                        $("#icon-" + id).html('<i class="fas fa-heart"></i>');
                        $("#count-" + id).html(obj.like_count);
                    }else{
                        alert(obj.status);
                        return false;
                    }
                });
            }else{

            }

            busy = false;
        }

        return false;
    });

    $(document).on('submit', '#commentMaker', function(e)
    {
        if(busy == false)
        {
            busy = true;
            e.preventDefault();

            var id = $("#postId").val();
            var content = $("#commentContent").val();
            var action = $(this).attr('action');

            if(id != "")
            {
                $.post(action, {postId: id, commentContent: content}, function(data){
                    var obj = jQuery.parseJSON(data);

                    if(obj.code == 1)
                    {
                        location.reload();
                        return false;
                    }else{
                        alert(obj.status);
                        return false;
                    }
                });
            }else{
                return false;
            }

            busy = false;
        }

        return false;
    });
});