




  <!-- Bootstrap core JavaScript-->
  <script src="../static/vendor/jquery/jquery.min.js"></script>
  <script src="../static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../static/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <!-- <script src="../static/js/sb-admin-2-fix.min.js"></script> -->
  <script src="../static/js/sb-admin-2.min.js"></script>


  <!-- Page level plugins -->
  <script src="../static/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../static/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../static/js/demo/datatables-demo.js"></script>

<script type="text/javascript">

  if ($(window).width() < 480) {
    $("#sidebarToggleTop").click();
  }


  // $("body").addClass("sidebar-toggled");
  // $(".sidebar").addClass("toggled");
  // $(".sidebar .collapse").collapse("hide");
</script>
<!-- <script type="text/javascript">
$(document).ready(function() {
   $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $('#wrapper.toggled').find("#sidebar-wrapper").find(".collapse").collapse('hide');
    });
});
</script> -->
  <!-- Page level plugins -->
  <!-- <script src="../static/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="../static/js/demo/chart-area-demo.js"></script>
  <script src="../static/js/demo/chart-pie-demo.js"></script> -->
   <script src="../static/vendor/dropify/js/dropify.min.js"></script>

    <script>
	$(function() {
		// $('.dropify').dropify();

		var drEvent = $('#dropify-event').dropify();
		drEvent.on('dropify.beforeClear', function(event, element) {
			return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
		});

		drEvent.on('dropify.afterClear', function(event, element) {
			alert('File deleted');
		});

		// $('.dropify-fr').dropify({
		// 	messages: {
		// 		default: 'Glissez-déposez un fichier ici ou cliquez',
		// 		replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
		// 		remove: 'Supprimer',
		// 		error: 'Désolé, le fichier trop volumineux'
		// 	}
		// });
	});
	</script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <!-- <script src="../static/dist/js/clipboard.min.js"></script> -->


	<!-- <script src="../static/_assets/libs/easeljs-NEXT.min.js"></script>
<script src="../static/_assets/libs/tweenjs-NEXT.min.js"></script>

<script type="text/javascript" src="../static/_assets/libs/preloadjs-NEXT.js"></script> -->

<!-- <link href="../static/_assets/css/shared.css" rel="stylesheet" type="text/css"/>
	<link href="../static/_assets/css/examples.css" rel="stylesheet" type="text/css"/> -->
	<!-- <script src="../static/_assets/js/examples.js"></script> -->


    <!-- 2. Include library -->
    <script src="../static/dist/js/clipboard.min.js"></script>

    <!-- 3. Instantiate clipboard -->

            <script>
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>
