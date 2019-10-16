<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
	 $(".add").click(function () {
            var id = $(this).attr("id-add");
	     $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            $.post("/cart/countAjax/"+id, {}, function (data) {
                $("#cart").html(data);
            });
            return false;
        });
	$(".dell").click(function () {
            var id = $(this).attr("id-dell");
            $.post("/cart/dellAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);		
            });
	    $.post("/cart/countAjax/"+id, {}, function (data) {
                $("#cart").html(data);
            });
	 return false;
	});
    });
</script>

</body>
</html>