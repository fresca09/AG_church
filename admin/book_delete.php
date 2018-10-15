<?php 
require 'header.php';

 ?>

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">EDIT BOOKS</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">BOOKS INFO</label>
          
          
            
           <div class="section-wrapper mg-t-20">
          <label class="section-title">Small Modal</label>
          <p class="mg-b-20 mg-sm-b-40">Below is the static example of small modal.</p>

          <p id="message" style="font-size: 18px; color: #A9919D; margin-left: -15px;"></p><br>

          <div class="modal-wrapper-demo">
            <div class="modal d-block pos-static">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content bd-0">
                  <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Notice</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body pd-20">
                    <p class="mg-b-5" style="text-align: center;">Are you sure want to delete the <?php echo $row['depart']; ?> department from Database?</p>
                  </div>
                  <div class="modal-footer justify-content-center">
                   <form method="post" action="book_delete.php">
              <input type="text" name="id" class="form-control" value="<?= $_GET['ID']; ?>">

            <input type="submit" name="delete" id="delete" class="btn btn-primary" value="Delete">

            <input type="submit" class="btn btn-secondary" data-dismiss="modal" value="Cancel">

            <div><h5>Click to view <a href="view_books.php">Books</a></h5>
          </form>
                  </div>
                </div>
              </div><!-- modal-dialog -->
            </div><!-- modal -->
          </div><!-- modal-wrapper-demo -->
           </div><!-- section-wrapper -->

        <?php require 'footer.php'; ?>

    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
    <script src="lib/parsleyjs/js/parsley.js"></script>

    <script src="js/slim.js"></script>
    <script>
      $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
    </script>
    <script type="text/javascript">
      function change_country()
    {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "ajaxD.php?country="+document.getElementById("countrydd").value, false);
      xmlhttp.send(null);
      //alert(xmlhttp.responseText);
      document.getElementById("state").innerHTML=xmlhttp.responseText;
    }
    </script>

    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        $('#selectForm').parsley();
        $('#selectForm2').parsley();
      });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#delete').click(function(event){
        event.preventDefault();
        $.ajax({
          url: "delete_book.php",
          method: "post",
          data: $('form').serialize(),
          dataType: "text",
          success: function(strMessage){
            $('#message').text(strMessage)
          }
        })
      })
    })
  </script>
  </body>
</html>
