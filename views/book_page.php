<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>

<body class="container">
    <h2 class="mb-3 my-2">Book Bank</h2>
    <table class="table table-bordered">
        <tr>
            <th>Book Name</th>
            <th>Author Name</th>

        </tr>
        <?php if(!empty($books)){ 
        foreach($books as $book){ ?>
        <tr>
            <td><?php echo $book['name']; ?></td>
            <td><?php echo $book['author_name']; ?></td>
        </tr>
        <?php }}else{ ?>
            <tr><td colspan="2">No Books Found</td></tr>
            <?php } ?>
        
    </table>
</body>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $("table tr").hide();
    $("table tr").each(function(index) {
        $(this).delay(index * 500).show(1000);
    });
</script>

</html>