<script>
        $(document).ready(function() {
            $('#list').after('<div id="nav" class="text-center"></div>');
            var rowsShown = 1;
            var rowsTotal = $('#list tbody tr').length;
            var numPages = rowsTotal / rowsShown;
            for (i = 0; i < numPages; i++) {
                var pageNum = i + 1;
                $('#nav').append('<a class="btn btn-info" href="#" rel="' + i + '">' + pageNum + '</a> ');
            }
            $('#list tbody tr').hide();
            $('#list tbody tr').slice(0, rowsShown).show();
            $('#nav a:first').addClass('active');
            $('#nav a').bind('click', function() {

                $('#nav a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('rel');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#list tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
                css('display', 'table-row').animate({
                    opacity: 1
                }, 300);
            });
        });
    </script>