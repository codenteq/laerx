<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/sb-1.2.2/sp-1.4.0/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "aaSorting": [],
            "language": {
                "searchPlaceholder": "Arama Yapın...",
                "decimal": "",
                "emptyTable": "Kayıt Bulunamadı",
                "info": "",
                "infoEmpty": "",
                "infoFiltered": "(_MAX_ toplam girişten filtrelendi)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Sayfa Başına _MENU_",
                "loadingRecords": "Yükleniyor...",
                "processing": "İşlemde...",
                "search": "",
                "zeroRecords": "Hiçbir kayıt bulunamadı",
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
