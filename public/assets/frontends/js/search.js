$(document).ready(function(){
    $('body').on('keyup', '#search-text', function() {
        var searchText = $(this).val();
        $.ajax({
            method: 'POST',
            url: '{{ route("search-book") }}',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                searchText: searchText,
            },
            success: function(res){
                console.log(res);
                var row = '';
                $('.search-data').html('');
                $.each(res, function(index, value) {
                    row = '<div class="row"><div class="col-9 p-0 m-0"><p class="found-text">'+ value.bk_title +'</p></div><div class="col-3"><a href="{{route('information')}}/'+ value.bk_id +'" class="quick-view-btn">Quick View</a></div></div>';
                    $('.search-data').append(row);
                });
            }
        });
    });
});