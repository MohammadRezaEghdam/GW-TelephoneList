<script>
    $("#search").on("keyup", function (e) {
        if (e.which === 46) {
          $(this).val('');
          $("#list tr").show();
        } else {
          var value = $(this).val().toLowerCase();

          $("#list tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        }

      });
</script>