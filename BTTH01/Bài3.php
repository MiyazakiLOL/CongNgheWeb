<?php
/**
 * File PHP một trang (hien_thi_csv.php)
 * Chức năng: Đọc nội dung CSV mô phỏng từ file đã tải lên và hiển thị dưới dạng bảng.
 * Đây là tiền đề để tiến hành lưu dữ liệu vào CSDL.
 */

// --- BƯỚC 1: MÔ PHỎNG NỘI DUNG TỆP CSV ---
// Đã nhúng nội dung của tệp "65HTTT_Danh_sach_diem_danh.csv" vào biến chuỗi này
$csv_content = "username,password,lastname,firstname,city,email,course1
2351160500,cse@485A,Đinh Thị Lan,Anh,65HTTT,2351160500@e.tlu.edu.vn,CSE485.202401
2151062699,cse@485A,Đỗ Phạm Hoàng,Anh,63CNTT4,2151062699@e.tlu.edu.vn,CSE485.202401
2351160501,cse@485A,Đỗ Quang Nam,Anh,65HTTT,2351160501@e.tlu.edu.vn,CSE485.202401
2351160502,cse@485A,Nguyễn Thái,Anh,65HTTT,2351160502@e.tlu.edu.vn,CSE485.202401
2351160503,cse@485A,Tạ Thị Ngọc,Anh,65HTTT,2351160503@e.tlu.edu.vn,CSE485.202401
2351160504,cse@485A,Trần Mai Ngọc,Anh,65HTTT,2351160504@e.tlu.edu.vn,CSE485.202401
2351160505,cse@485A,Nguyễn Huy,Bách,65HTTT,2351160505@e.tlu.edu.vn,CSE485.202401
2351160506,cse@485A,Nguyễn Thị Thu,Chinh,65HTTT,2351160506@e.tlu.edu.vn,CSE485.202401
2351160507,cse@485A,Nguyễn Hữu,Chương,65HTTT,2351160507@e.tlu.edu.vn,CSE485.202401
2351160508,cse@485A,Nguyễn Đức,Công,65HTTT,2351160508@e.tlu.edu.vn,CSE485.202401
2351160509,cse@485A,Lê Thảo,Dung,65HTTT,2351160509@e.tlu.edu.vn,CSE485.202401
2351160510,cse@485A,Đào Xuân,Dũng,65HTTT,2351160510@e.tlu.edu.vn,CSE485.202401
2351160511,cse@485A,Đinh Việt,Dũng,65HTTT,2351160511@e.tlu.edu.vn,CSE485.202401
2351160512,cse@485A,Nguyễn Xuân,Dũng,65HTTT,2351160512@e.tlu.edu.vn,CSE485.202401
2351160513,cse@485A,Nguyễn Trọng,Đức,65HTTT,2351160513@e.tlu.edu.vn,CSE485.202401
2351160514,cse@485A,Nguyễn Văn,Đức,65HTTT,2351160514@e.tlu.edu.vn,CSE485.202401
2351160515,cse@485A,Phạm Minh,Đức,65HTTT,2351160515@e.tlu.edu.vn,CSE485.202401
2351160516,cse@485A,Phạm Huy,Hải,65HTTT,2351160516@e.tlu.edu.vn,CSE485.202401
2351160517,cse@485A,Đinh Thị Lan,Hằng,65HTTT,2351160517@e.tlu.edu.vn,CSE485.202401
2351160518,cse@485A,Nguyễn Thị Thúy,Hằng,65HTTT,2351160518@e.tlu.edu.vn,CSE485.202401
2351160519,cse@485A,Phạm Thị,Hằng,65HTTT,2351160519@e.tlu.edu.vn,CSE485.202401
2351160520,cse@485A,Nguyễn Quang,Hiếu,65HTTT,2351160520@e.tlu.edu.vn,CSE485.202401
2351160521,cse@485A,Nguyễn Đức,Hùng,65HTTT,2351160521@e.tlu.edu.vn,CSE485.202401
2351160522,cse@485A,Hoàng Thị,Hương,65HTTT,2351160522@e.tlu.edu.vn,CSE485.202401
2351160523,cse@485A,Nguyễn Thị,Hương,65HTTT,2351160523@e.tlu.edu.vn,CSE485.202401
2351160524,cse@485A,Nguyễn Trung,Kiên,65HTTT,2351160524@e.tlu.edu.vn,CSE485.202401
2351160525,cse@485A,Nguyễn Văn,Lâm,65HTTT,2351160525@e.tlu.edu.vn,CSE485.202401
2351160526,cse@485A,Nguyễn Huy,Linh,65HTTT,2351160526@e.tlu.edu.vn,CSE485.202401
2351160527,cse@485A,Phạm Thị,Loan,65HTTT,2351160527@e.tlu.edu.vn,CSE485.202401
2351160528,cse@485A,Nguyễn Thị Thùy,Linh,65HTTT,2351160528@e.tlu.edu.vn,CSE485.202401
2351160529,cse@485A,Nguyễn Hữu,Lợi,65HTTT,2351160529@e.tlu.edu.vn,CSE485.202401
2351160530,cse@485A,Nguyễn Thị,Mai,65HTTT,2351160530@e.tlu.edu.vn,CSE485.202401
2351160531,cse@485A,Nguyễn Thị,Mai,65HTTT,2351160531@e.tlu.edu.vn,CSE485.202401
2351160532,cse@485A,Nguyễn Thành,Nam,65HTTT,2351160532@e.tlu.edu.vn,CSE485.202401
2351160533,cse@485A,Vũ Thị,Ngọc,65HTTT,2351160533@e.tlu.edu.vn,CSE485.202401
2351160534,cse@485A,Phạm Văn,Nhân,65HTTT,2351160534@e.tlu.edu.vn,CSE485.202401
2351160535,cse@485A,Nguyễn Thị,Nhung,65HTTT,2351160535@e.tlu.edu.vn,CSE485.202401
2351160536,cse@485A,Trần Thị,Nhung,65HTTT,2351160536@e.tlu.edu.vn,CSE485.202401
2351160537,cse@485A,Nguyễn Văn,Phát,65HTTT,2351160537@e.tlu.edu.vn,CSE485.202401
2351160538,cse@485A,Nguyễn Thị,Phượng,65HTTT,2351160538@e.tlu.edu.vn,CSE485.202401
2351160539,cse@485A,Phạm Công,Quân,65HTTT,2351160539@e.tlu.edu.vn,CSE485.202401
2351160540,cse@485A,Nguyễn Đình,Quân,65HTTT,2351160540@e.tlu.edu.vn,CSE485.202401
2351160541,cse@485A,Nguyễn Anh,Quân,65HTTT,2351160541@e.tlu.edu.vn,CSE485.202401
2251162122,cse@485A,NGUYỄN ĐỨC,QUÂN,64HTTT4,2251162122@e.tlu.edu.vn,CSE485.202401
2351160542,cse@485A,Nguyễn Văn,Quang,65HTTT,2351160542@e.tlu.edu.vn,CSE485.202401
2351160543,cse@485A,Vũ Văn,Quảng,65HTTT,2351160543@e.tlu.edu.vn,CSE485.202401
2351160544,cse@485A,Nguyễn Thị Diễm,Quỳnh,65HTTT,2351160544@e.tlu.edu.vn,CSE485.202401
2351160545,cse@485A,Phạm Trọng,Sang,65HTTT,2351160545@e.tlu.edu.vn,CSE485.202401
2351160546,cse@485A,Nguyễn Thanh,Sơn,65HTTT,2351160546@e.tlu.edu.vn,CSE485.202401
2351160547,cse@485A,Nguyễn Ngọc,Tài,65HTTT,2351160547@e.tlu.edu.vn,CSE485.202401
2351160548,cse@485A,Nguyễn Văn,Thái,65HTTT,2351160548@e.tlu.edu.vn,CSE485.202401
2351160549,cse@485A,Vũ Đình,Thành,65HTTT,2351160549@e.tlu.edu.vn,CSE485.202401
2351160550,cse@485A,Phạm Trung,Thành,65HTTT,2351160550@e.tlu.edu.vn,CSE485.202401
2351160551,cse@485A,Nguyễn Trung,Thanh,65HTTT,2351160551@e.tlu.edu.vn,CSE485.202401
2351160552,cse@485A,Phạm Duy,Thịnh,65HTTT,2351160552@e.tlu.edu.vn,CSE485.202401
2351160553,cse@485A,Đào Thị Quỳnh,Thúy,65HTTT,2351160553@e.tlu.edu.vn,CSE485.202401
2351160554,cse@485A,Phạm Văn,Tiến,65HTTT,2351160554@e.tlu.edu.vn,CSE485.202401
2351160555,cse@485A,Nguyễn Thị,Trang,65HTTT,2351160555@e.tlu.edu.vn,CSE485.202401
2351160556,cse@485A,Phạm Xuân,Trung,65HTTT,2351160556@e.tlu.edu.vn,CSE485.202401
2351160557,cse@485A,Hoàng Mạnh,Tuân,65HTTT,2351160557@e.tlu.edu.vn,CSE485.202401
2351160558,cse@485A,Nguyễn Minh,Tuấn,65HTTT,2351160558@e.tlu.edu.vn,CSE485.202401
2351160559,cse@485A,Nguyễn Văn,Tuấn,65HTTT,2351160559@e.tlu.edu.vn,CSE485.202401
2351160560,cse@485A,Nguyễn Anh,Tú,65HTTT,2351160560@e.tlu.edu.vn,CSE485.202401
2351160561,cse@485A,Nguyễn Thanh,Tùng,65HTTT,2351160561@e.tlu.edu.vn,CSE485.202401
2351160562,cse@485A,Nguyễn Đức,Việt,65HTTT,2351160562@e.tlu.edu.vn,CSE485.202401
2351160563,cse@485A,Phạm Thị,Vui,65HTTT,2351160563@e.tlu.edu.vn,CSE485.202401";

// --- BƯỚC 2: PHÂN TÍCH CSV THÀNH CẤU TRÚC MẢNG ---

$data = [];
$lines = explode("\n", $csv_content);

if (count($lines) > 0) {
    // Tách dòng đầu tiên làm tiêu đề và loại bỏ khoảng trắng (trim)
    $header_raw = array_shift($lines);
    // Sử dụng str_getcsv để xử lý trường hợp có dấu phẩy trong dữ liệu (nếu có, mặc dù file này không có)
    $header = array_map('trim', str_getcsv($header_raw));

    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line)) continue;

        // Tách dữ liệu hàng và loại bỏ khoảng trắng
        $row_data = array_map('trim', str_getcsv($line));
        
        // Đảm bảo số cột khớp với tiêu đề
        if (count($row_data) === count($header)) {
             // Tạo mảng kết hợp (key-value)
            $data[] = array_combine($header, $row_data);
        }
    }
}

// --- BƯỚC 3: HIỂN THỊ GIAO DIỆN WEB ---

$total_records = count($data);
$column_count = isset($header) ? count($header) : 0;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển Thị Danh Sách Điểm Danh (CSV)</title>
    <!-- Tích hợp Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Thiết lập font Inter làm font chính */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }
        .table-container th, .table-container td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        .table-container th {
            background-color: #4c51bf; /* Indigo 600 */
            color: white;
            text-transform: uppercase;
            font-size: 0.875rem;
            font-weight: 600;
        }
        .table-container tr:nth-child(even) {
            background-color: #f9fafb; /* Lớp zebra */
        }
        .table-container tr:hover {
            background-color: #e0e7ff; /* Blue 100 on hover */
            transition: background-color 0.2s;
        }
    </style>
</head>
<body>

<div class="container mx-auto p-4 sm:p-8 lg:p-12">
    <header class="text-center mb-10">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800">
            Dữ Liệu Từ Tệp "65HTTT_Danh_sach_diem_danh.csv"
        </h1>
        <p class="mt-2 text-xl text-gray-500">
            Tổng cộng: <span class="font-semibold text-indigo-500"><?php echo $total_records; ?></span> bản ghi
        </p>
        <p class="mt-4 p-3 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded-md inline-block text-sm">
            Đây là tiền đề để lập trình chức năng Lưu dữ liệu vào Cơ sở dữ liệu (CSDL).
        </p>
    </header>

    <div class="overflow-x-auto bg-white rounded-xl shadow-2xl table-container">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="sticky top-0 bg-indigo-600 rounded-tl-xl">STT</th>
                    <?php 
                    if (isset($header)) {
                        foreach ($header as $col_name) {
                            // Chuyển đổi tên cột tiếng Anh sang tiếng Việt để hiển thị thân thiện hơn
                            $display_name = match ($col_name) {
                                'username' => 'Mã SV',
                                'password' => 'Mật khẩu',
                                'lastname' => 'Họ',
                                'firstname' => 'Tên',
                                'city' => 'Lớp',
                                'email' => 'Email',
                                'course1' => 'Mã khóa học',
                                default => $col_name,
                            };
                            echo '<th class="sticky top-0 bg-indigo-600">' . htmlspecialchars($display_name) . '</th>';
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if ($total_records === 0): ?>
                    <tr>
                        <td colspan="<?php echo $column_count + 1; ?>" class="text-center py-6 text-gray-500">Không tìm thấy dữ liệu hợp lệ nào.</td>
                    </tr>
                <?php else: ?>
                    <?php 
                    $stt = 0;
                    foreach ($data as $row): 
                        $stt++;
                    ?>
                        <tr>
                            <td class="whitespace-nowrap font-medium text-gray-900"><?php echo $stt; ?></td>
                            <?php foreach ($row as $cell): ?>
                                <td class="whitespace-nowrap text-gray-600"><?php echo htmlspecialchars($cell); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>