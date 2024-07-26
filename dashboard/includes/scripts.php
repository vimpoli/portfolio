<script src="lib/jquery/js/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="lu=ib/datatables/js/jquery.dataTables.min.js"></script>
<script src="lu=ib/datatables/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script>
  $.fn.dataTable.ext.errMode = 'none';
  $(document).ready(function() {
    $('#myDataTable').DataTable();
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      placeholder: 'Type your own',
      height: 300
    });
    $('.dropdown-toggle').dropdown();
  });
</script>
</body>

</html>