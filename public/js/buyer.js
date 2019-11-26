function readBuyers() {
    $('#buyerTable').DataTable({
        "responsive": true,
        "ajax": {
            url: baseUrl + "/ReadBuyers",
            type: 'POST'
        },
        "columns": [

        {
            "data": "id",
            "render": function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { "data": "amount" },
        { "data": "buyer" },
        { "data": "receipt_id" },
        { "data": "items" },
        { "data": "buyer_email" },
        { "data": "buyer_ip" },
        { "data": "note" },
        { "data": "city" },
        { "data": "phone" },
        { "data": "hash_key" },
        { "data": "entry_at" },
        { "data": "entry_by" }
        ]
    });

}