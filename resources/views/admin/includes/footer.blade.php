</div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/js/additional-methods.min.js') }}"></script>
  <script type="text/javascript">
      $(document).ready(function() {
        $("#productsTable").DataTable();
        $("#cartTable").DataTable();

        $("#productForm").validate({
            rules: {
                productname: 'required',
                price: {
                    required: true,
                    digits: true
                },
                'products[]': {
                    required: true
                }
            }
        });

        $(".viewbtn").click(function() {
            var images = $(this).attr('data-value');
            var data = JSON.parse(images);
            var html = "";
            $.each(data, function(key, value) {
                html += "<div class='col-md-6'><figure><img src='{{ asset('storage/product_images') }}/"+value.imageName+"' width='250' height='250'></figure></div>";
            });
            $("#productImg").html(html);
            $("#imageModal").modal('show');
        })
      });
  </script>