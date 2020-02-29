function removeOption(item) {
    if (confirm("Are you sure you want to delete author?")) {
        var author_id = $(item).parent().attr('data-id');

        $('.author-' + author_id).show();
        $('#author_id').val($('#author_id').val().replace(','+author_id,''));
        $(item).parent().remove();
    }
}

$(document).ready(function(){
    $(document).on('click','.author-items-list-block ul li',function () {
        var id = $(this).attr('data-id');

        var title = $(this).text();
        var authorItem = "<div class='aItem' data-id='" + id + "'>" + title + " <span onclick='removeOption(this)'>&#10006;</span></div>";
        $('#search').val('');
        $(".search-author").prepend(authorItem);
        $('#author_id').val($('#author_id').val()+','+id);
        $(this).hide();
    });



    $("#search").keyup(function(){
        var value = $(this).val();
        $.ajax({
            url:'/library/backend/web/authors/get-authors-by-title',
            method:'post',
            data:{
                q:value,
                authors:$('#author_id').val()
            },
            success:function(data){
                if(data){
                    var result = JSON.parse(data);
                    var html = '<ul class="author-items-list">';
                    for(var i =0; i<result.length;i++){
                        html += '<li class="author-'+result[i].id+'" data-id="'+result[i].id+'">' +result[i].firstName+ " " +result[i].lastName +'</li>';
                    }
                    html += '</ul>';
                    $('.author-items-list-block').html(html).show();
                }
            }
        })
    });

    $('body').click(function (e) {
        console.log(e);
        if(!$(e.target).is('li[class^=author]') ){
            $('.author-items-list-block').hide();
        }

    });
})

