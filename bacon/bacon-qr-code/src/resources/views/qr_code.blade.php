<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập Thông Tin và Tạo QR Code</title>
</head>
<body>
    <h1>Nhập Thông Tin Cá Nhân</h1>
    <form method="POST" action="{{ route('generate.qrcode') }}">
        @csrf
        <label for="name">Tên:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" name="phone" id="phone" required><br><br>

        <input type="submit" value="Tạo QR Code">
    </form>

    @if (isset($qrCodeUrl))
        <h2>Mã QR của bạn:</h2>
        <img src="{{ $qrCodeUrl }}" alt="QR Code">
    @endif
</body>
</html>
