<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Logo\LogoInterface;
use Illuminate\Http\Request;
use Endroid\QrCode\Writer\WriterInterface;

class QrCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {
        // Kiểm tra nếu có dữ liệu từ form
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');

        // Tạo chuỗi dữ liệu cá nhân
        $data = "Name: " . $name . "\nEmail: " . $email . "\nPhone: " . $phone;

        // Tạo QR code từ chuỗi dữ liệu
        $qrCode = new QrCode($data);

        // Đường dẫn đến logo bạn muốn thêm vào
        $logoPath = public_path('images/logo.png'); // Đảm bảo bạn có logo tại đường dẫn này

        // Thêm logo vào QR code

        // Tạo writer để tạo file PNG từ QR code
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        // Trả về mã QR dưới dạng hình ảnh
        return response($result->getString(), 200, [
            'Content-Type' => 'image/png',
        ]);
    }

    public function showQRCode()
    {
        // Trả về view để người dùng nhập thông tin
        return view('qr_code');
    }
}
