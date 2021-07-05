        <div class="footer">
            <!-- <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div> -->
            <div>
                <strong>Copyright</strong> Tectotum Tecnologia &copy; <?php echo date('Y') ?>
            </div>
        </div>


        </div>
    </div>
    <div class="loading-off" id="loading"></div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dataTables-view').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json",
                    buttons: {
                        copy: 'Copiar',
                        copyTitle: 'Copiado',
                        copyKeys: '',
                        copySuccess: {
                            _: '%d Linhas copidas',
                            1: '1 linha copiada'
                        },
                        print:'Imprimir',
                    }
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                columnDefs: [ {
                    'targets': 'no-orderable',
                    'orderable': false
                }],
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: '.on-print'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: '.on-print'
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'table-doc',
                        exportOptions: {
                            columns: '.on-print'
                        }
                    },
                    {
                        extend: 'pdf',
                        title: 'table-pdf',
                        exportOptions: {
                            columns: '.on-print'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: '.on-print'
                        },
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>
