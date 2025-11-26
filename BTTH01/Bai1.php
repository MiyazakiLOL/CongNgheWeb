<?php
session_start();

// --- DỮ LIỆU HOA ---
$flowers = [
    ['name'=>'Hoa Dạ Yến Thảo','description'=>'Là lựa chọn thích hợp...','image'=>'images/da_yen_thao.jpg'],
    ['name'=>'Hoa Đồng Tiền','description'=>'Thích hợp để trồng...','image'=>'images/dong_tien.jpg'],
    ['name'=>'Hoa Giấy','description'=>'Hoa giấy có mặt ở hầu khắp...','image'=>'images/giay.jpg']
];

// --- ROLE USER ---
if(isset($_GET['role'])) $_SESSION['user_role']=($_GET['role']==='admin')?'admin':'guest';
$user_role = $_SESSION['user_role'] ?? 'guest';
$is_admin = $user_role==='admin';

// --- XỬ LÝ CRUD MÔ PHỎNG ---
$message=''; $current_action=''; $edited_flower=null;
if($is_admin && isset($_POST['action'])){
    $message = "Thao tác {$_POST['action']} đã ghi nhận. (Cần DB để xử lý thực tế)";
}
if($is_admin && isset($_GET['edit_id']) && is_numeric($_GET['edit_id']) && $_GET['edit_id']>=0 && $_GET['edit_id']<count($flowers)){
    $edit_id = $_GET['edit_id'];
    $edited_flower = $flowers[$edit_id];
    $current_action='edit';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Danh Sách Hoa Xuân Hè</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
body{font-family:'Inter',sans-serif;background:#f7f9fb;}
.admin-table th, .admin-table td{padding:12px;border-bottom:1px solid #e2e8f0;text-align:left;}
.admin-table th{background:#4c51bf;color:#fff;text-transform:uppercase;font-size:.875rem;}
.flower-card{box-shadow:0 4px 6px rgba(0,0,0,.1);transition:transform .3s;}
.flower-card:hover{transform:translateY(-4px);}
.flower-image{width:100%;height:300px;object-fit:cover;}
.role-toggle{position:fixed;top:20px;right:20px;z-index:1000;}
</style>
</head>
<body>

<div class="role-toggle">
    <a href="?role=<?php echo $is_admin?'guest':'admin'; ?>" class="px-4 py-2 font-bold rounded-full shadow-lg text-white <?php echo $is_admin?'bg-pink-500 hover:bg-pink-600':'bg-indigo-500 hover:bg-indigo-600'; ?>">
        <?php echo $is_admin?'Chế độ Khách':'Chế độ Quản trị'; ?>
    </a>
</div>

<div class="container mx-auto p-4 sm:p-8 lg:p-12">
    <header class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800"><?php echo $is_admin?'Bảng Quản Trị Danh Sách Hoa':count($flowers).' Loại Hoa Tuyệt Đẹp'; ?></h1>
        <p class="mt-2 text-xl text-gray-500">Vai trò hiện tại: <span class="font-semibold text-<?php echo $is_admin?'indigo':'pink'; ?>-500"><?php echo $user_role; ?></span></p>
    </header>

    <?php if($message): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"><?php echo $message; ?></div>
    <?php endif; ?>

    <?php if($is_admin): 
    // --- FORM EDIT ---
    if($current_action==='edit' && $edited_flower): ?>
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8 border border-indigo-200">
            <h2 class="text-2xl font-bold text-indigo-700 mb-4"><?php echo "Chỉnh Sửa: ".htmlspecialchars($edited_flower['name']); ?></h2>
            <form method="POST" class="space-y-4">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
                <div><label class="block text-gray-700">Tên Hoa:</label><input type="text" name="name" value="<?php echo htmlspecialchars($edited_flower['name']); ?>" required class="w-full mt-1 p-2 border rounded-md focus:ring-indigo-500"></div>
                <div><label class="block text-gray-700">Mô Tả:</label><textarea name="description" rows="3" required class="w-full mt-1 p-2 border rounded-md focus:ring-indigo-500"><?php echo htmlspecialchars($edited_flower['description']); ?></textarea></div>
                <div><label class="block text-gray-700">Tên Ảnh:</label><input type="text" name="image" value="<?php echo basename($edited_flower['image']); ?>" required class="w-full mt-1 p-2 border rounded-md focus:ring-indigo-500"></div>
                <div class="flex space-x-4"><button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md">Cập Nhật</button>
                <a href="?role=admin" class="px-6 py-2 bg-gray-500 text-white rounded-md">Hủy</a></div>
            </form>
        </div>
    <?php endif; ?>

    <!-- --- TABLE ADMIN --->
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
        <table class="min-w-full admin-table">
            <thead><tr><th>ID</th><th>Tên Hoa</th><th>Mô Tả</th><th>Ảnh</th><th>Thao Tác</th></tr></thead>
            <tbody>
                <?php foreach($flowers as $i=>$f):
                $short= (strlen($f['description'])>80)?substr($f['description'],0,80).'...':$f['description']; ?>
                <tr class="hover:bg-indigo-50">
                <td><?php echo $i; ?></td>
                <td class="font-semibold"><?php echo htmlspecialchars($f['name']); ?></td>
                <td><?php echo htmlspecialchars($short); ?></td>
                <td><img src="<?php echo htmlspecialchars($f['image']); ?>" alt="<?php echo htmlspecialchars($f['name']); ?>" class="w-16 h-16 object-cover rounded-md" onerror="this.onerror=null;this.src='https://placehold.co/64x64/e0e0e0/333333?text=Hoa';"></td>
                <td>
                <a href="?role=admin&edit_id=<?php echo $i; ?>" class="text-indigo-600 hover:text-indigo-900 font-medium mr-3">Sửa</a>
                <form method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa <?php echo htmlspecialchars($f['name']); ?>?');">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $i; ?>">
                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Xóa</button>
                </form>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php else: 
    // --- GUEST CARD LAYOUT ---
    echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">';
    foreach($flowers as $f): ?>
    <div class="flower-card bg-white rounded-xl overflow-hidden shadow-xl">
    <div class="relative">
    <img src="<?php echo htmlspecialchars($f['image']); ?>" alt="<?php echo htmlspecialchars($f['name']); ?>" class="flower-image" onerror="this.onerror=null;this.src='https\://placehold.co/400x300/e0e0e0/333333?text='<?php echo urlencode($f['name']); ?>';">
    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
    <span class="absolute top-3 left-3 px-3 py-1 bg-pink-500 text-white text-sm font-bold rounded-full shadow-md">Xuân Hè</span>
    </div>
    <div class="p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-3"><?php echo htmlspecialchars($f['name']); ?></h2>
    <p class="text-gray-600 leading-relaxed"><?php echo htmlspecialchars($f['description']); ?></p>
    </div>
    </div>
    <?php endforeach; echo '</div>'; endif; ?>
</div>

</body>
</html>
