<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "aaSorting": [],
            "language": {
                "decimal": "",
                "emptyTable": "Tabloda veri yok",
                "info": "_START_ ile _END_ arasını gösteriyor toplam: _TOTAL_",
                "infoEmpty": "0 girdiden 0 ile 0 arası gösteriliyor",
                "infoFiltered": "(_MAX_ toplam girişten filtrelendi)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Her _MENU_ sayfa başına",
                "loadingRecords": "Yükleniyor...",
                "processing": "İşlemde...",
                "search": "Arama:",
                "zeroRecords": "Hiçbir eşleşen kayıt bulunamadı",
                "paginate": {
                    "first": "Birinci",
                    "last": "Sonuncu",
                    "next": "Sonraki",
                    "previous": "Önceki"
                },
                "aria": {
                    "sortAscending": ": sütunu artan şekilde sıralamak için etkinleştir",
                    "sortDescending": ": sütunu azalan sıralamak için etkinleştir"
                }
            }
        });
    });
</script>
