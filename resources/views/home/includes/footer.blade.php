<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    	getCart();
    	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    	$(".cartbtn").click(function() {
    		var id = $(this).attr('data-id');
    		$.ajax({
    			url: "{{ url('addtocart') }}",
    			type: "POST",
    			data: {_token: CSRF_TOKEN, userid: 1, product_id: id},
    			success:function(response) {
    				if (response.status == 'success') {
    					getCart();
    				}
    			}
    		})
    	});
    });

    function getCart() {
    	$.ajax({
    		url: "{{ url('getcart/1') }}",
    		type: "GET",
    		success: function(response) {
    			$(".badge-light").text(response.cartCount);
    		}
    	});
    }
</script>
</body>
</html>