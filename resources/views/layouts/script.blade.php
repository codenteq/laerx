<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/sb-1.2.2/sp-1.4.0/datatables.min.js"></script>
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
                },
            },
            responsive: true
        });
    });
</script>
