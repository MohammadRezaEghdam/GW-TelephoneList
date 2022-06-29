<script>
    // $('#DeleteModule').on('shown.bs.modal', function () {
    //   $('#DeleteModule').trigger('focus')
    // })


    $(document).ready(function () {
      $(window).on('load', function () {
        runner(1)
      });
      // ! Pagginatio here
      var page;

      $("#firstPage").click(function () {
        page = 1;
        runner(page);
      });
      $("#secondPage").click(function () {
        page = 2;
        runner(page);
      });


      var runner = function (page) {

        const xhr = new XMLHttpRequest();
        xhr.open("GET", "https://randomuser.me/api?page=" + page + "&results=10&seed=erfan", true);
        xhr.onload = function () {
          if (this.status === 200) {
            obj = JSON.parse(this.responseText);

            let tableList = document.getElementById("list");

            str = ""
            for (const key in obj.results) {
              var id = key;
              str += `<tr>
                <th scope="row" id="id">${++id}</th>
                <td>${obj.results[key].gender}</td>
                <td>${obj.results[key].name['title'] + " " + obj.results[key].name['first'] + "" + obj.results[key].name['last']}</td>
                <td>${obj.results[key].email}</td>
                <td>${obj.results[key].phone}</td>
                <td><img src="${obj.results[key].picture['thumbnail']}" alt="" srcset="" height="30px" width="30px"></td>
                <td> <a href="edit.html" class="btn btn-info">Update <i class="fas fa-edit    "></i></a> </td>
                <td> <a id="deleteUserBtn" class="btn btn-danger">delete <i class="fas fa-trash"></i></a> </td>
              </tr>`;
              tableList.innerHTML = str;
            }
          } else {
            console.log("API failed!")
          }
        }
        xhr.send();
      }


      // print table here
      $("#printTable").on("click", function (e) {
        const win = window.open();
        const content = $('#list')[0].outerHTML;
        win.document.write(content);
        win.document.close();
        win.print();
        e.preventDefault();
      });


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


      $("#deleteUserBtn").click(function(){
        console.log("Delete...")
        $.ajax({
          url: "http://webhook.site/5a540f85-49b5-4aa9-8ec8-811b85601c0f?id=10",
          method: 'delete',
          success: function (response) {
            console.log("Deleted!")
          }
        })
      });

    });
  </script>
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
</body>

</html>