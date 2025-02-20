<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- Estilos personalizados -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    #sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 250px;
        background-color: #343a40;
        color: white;
        padding: 20px;
        overflow-y: auto;
    }
    #content {
        margin-left: 250px;
        padding: 20px;
    }
    .dataTables_filter {
        float: right;
    }
    .container {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    table {
        width: 100%;
        height: 100%;
        table-layout: fixed;  
    }

    table.dataTable {
        width: 100%;
        height: auto;
        overflow-x: auto; 
    }
    .dt-button {
            background-color: #007bff; 
            color: #fff;
            padding: 10px 20px; 
            font-size: 16px; 
            border-radius: 5px; 
            border: none; 
            cursor: pointer; 
            transition: background-color 0.3s ease; 
    }

        .dt-button:hover {
            background-color: #0056b3; 
        }

        .dt-button:active {
            background-color: #003f7f; 
        }

        .dt-button:disabled {
            background-color: #cccccc; 
            cursor: not-allowed; 
        }

</style>
