//Data table
$(function () {
    $('.tabla').DataTable({
    	"language": {"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"},
	    "paging": true,
	    "lengthChange": true,
	    "searching": true,
	    "ordering": true,
	    "info": true,
	    "autoWidth": false,
	    "responsive": true,
    });
});

