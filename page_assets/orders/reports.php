<?php
require_once "../../engine/dbh.inc.php";
session_start();
$statement = $pdo->prepare("SELECT products.*,product_order.* FROM products
 INNER JOIN product_order ON products.product_id=product_order.product_order_product_id 
 WHERE products.product_sys_user_id=:id");
$statement->bindValue(":id", $_SESSION['uid']);
$statement->execute();
$prod_infos = $statement->fetchAll(PDO::FETCH_ASSOC);
// var_dump($prod_info);
// exit;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <table class="table" id="simple_table" style="display: none;">
        <tr>
            <th>Product</th>
            <th>Unit type</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Date Ordered</th>
        </tr>
        <?php foreach ($prod_infos as $prod_info) : { ?>
                <tr>
                    <td><?php echo $prod_info["product_name"] ?></td>
                    <td><?php echo $prod_info["product_unit_type"] ?></td>
                    <td><?php echo $prod_info["product_price"] ?></td>
                    <td><?php echo $prod_info["product_order_qty"] ?></td>
                    <td><?php echo $prod_info["product_order_qty"] * $prod_info["product_price"] ?></td>
                    <td><?php echo $prod_info["product_order_date"] ?></td>
                </tr>
        <?php }
        endforeach ?>
    </table>
    <div style="display: block;" class="d-flex justify-content-center align-items-center flex-column">
        <h2 class="text-muted">Loading...</h2>

        <br>
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only"></span>
        </div>
    </div>

    <!-- <input type="button" onclick="generate()" value="Export To PDF" /> -->
    <script>
        window.onload = function generate() {
            var doc = new jsPDF('p', 'pt', 'letter');
            var htmlstring = '';
            var tempVarToCheckPageHeight = 0;
            var pageHeight = 0;
            pageHeight = doc.internal.pageSize.height;
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector  
                '#bypassme': function(element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"  
                    return true
                }
            };
            margins = {
                top: 150,
                bottom: 60,
                left: 40,
                right: 40,
                width: 600
            };
            var y = 20;
            doc.setLineWidth(2);
            doc.text(200, y = y + 30, "ORDERS");
            doc.autoTable({
                html: '#simple_table',
                startY: 70,
                theme: 'grid',
                columnStyles: {
                    0: {
                        cellWidth: 100,
                    },
                    1: {
                        cellWidth: 100,
                    },
                    2: {
                        cellWidth: 100,
                    },
                    3: {
                        cellWidth: 100,
                    }

                },
                styles: {
                    minCellHeight: 15
                }
            })

            setTimeout(function() {
                doc.save('system_report.pdf');
                window.location.href = "../../index.php";
            }, 2000);


        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
</body>

</html>