<?php
// Ambil orderId dari URL
$orderId = isset($_GET['orderId']) ? $_GET['orderId'] : '';

// Simulasi data metode pembayaran (bisa diganti dengan API)
$payments = [
    "12345" => ["method" => "QRIS", "image" => "qris_example.png"],
    "67890" => ["method" => "Transfer Bank", "details" => "BCA - 1234567890 a/n Topup Store"],
];

// Cek apakah orderId valid
$paymentInfo = isset($payments[$orderId]) ? $payments[$orderId] : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Override Topup</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        .container { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        img { max-width: 100%; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Metode Pembayaran</h2>
        <?php if ($paymentInfo): ?>
            <p>Metode: <strong><?php echo $paymentInfo['method']; ?></strong></p>
            <?php if (isset($paymentInfo['image'])): ?>
                <img src="<?php echo $paymentInfo['image']; ?>" alt="QRIS">
            <?php else: ?>
                <p><?php echo $paymentInfo['details']; ?></p>
            <?php endif; ?>
        <?php else: ?>
            <p><strong>Order ID tidak ditemukan!</strong></p>
        <?php endif; ?>
    </div>
</body>
</html>
