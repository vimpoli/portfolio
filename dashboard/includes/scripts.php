<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $('#summernote').summernote({
    placeholder: 'Type your own',
    tabsize: 2,
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>
</body>

</html>