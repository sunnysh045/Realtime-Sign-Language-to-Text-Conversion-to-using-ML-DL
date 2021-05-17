<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<script>
 ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
</body>
</html>
