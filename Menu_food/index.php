<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Models\FoodItem;
use App\Models\Recipe;
use App\Services\FoodRecipe;

$recipesList = [
    new FoodRecipe('สูตรคั่วพริกเกลือ', new Recipe([
        'รากผักชีสับละเอียด' => '5 ราก', 'กระเทียมสับ' => '5 กลีบ', 'พริกขี้หนูสับหยาบ' => '10 เม็ด',
        'เกลือ' => '½ ช้อนชา', 'ผงปรุงรส' => '1 ช้อนโต๊ะ', 'ผักชีซอย' => '1 ต้น'
    ])),
    new FoodRecipe('สูตรกะเพราแห้ง', new Recipe([
        'พริกสด' => '6 เม็ด', 'กระเทียมกลีบเล็ก' => '2 ช้อนโต๊ะ', 'น้ำมันพืช' => '2 ช้อนโต๊ะ',
        'พริกไทยป่น' => '1 ช้อนชา', 'ผงปรุงรส' => '1/2 ช้อนโต๊ะ', 'น้ำตาลทราย' => '1 ช้อนโต๊ะ',
        'ซอสหอยนางรม' => '1 ช้อนโต๊ะ', 'ซอสปรุงรส' => '1/2 ช้อนโต๊ะ', 'ใบกะเพรา' => 'ตามชอบ'
    ])),
    new FoodRecipe('สูตรผัดกระเทียมพริกไทย', new Recipe([
        'กระเทียม' => '1/2 ถ้วยตวง', 'น้ำมันหอย' => '1 ช้อนโต๊ะ', 'ซีอิ๊วขาว' => '2 ช้อนโต๊ะ',
        'น้ำตาล' => '1 ช้อนชา', 'น้ำมัน' => '1 ช้อนโต๊ะ', 'พริกไทย' => 'โรยหน้า', 'ผักชี' => 'สำหรับแต่งหน้า'
    ])),
    new FoodRecipe('สูตรผัดขี้เมา', new Recipe([
        'พริกไทยสด' => '2-3 พวง', 'พริกชี้ฟ้าแดง' => '4 เม็ด', 'กระเทียมสับ' => '4 กลีบ',
        'ข้าวโพดอ่อน' => '5 ฝัก', 'ใบมะกรูด' => '5 ใบ', 'ใบกะเพรา' => '1 กำ',
        'น้ำตาลทราย' => '1/2 ช้อนโต๊ะ', 'น้ำมันหอย' => '1 ช้อนโต๊ะ', 'น้ำเปล่า' => '1/2 ช้อนโต๊ะ', 'น้ำมันพืช' => '1 ช้อนโต๊ะ'
    ])),
    new FoodRecipe('สูตรผัดผงกะหรี่', new Recipe([
        'ผงกะหรี่' => '2 ช้อนโต๊ะ', 'น้ำพริกเผา' => '1 ½ ช้อนโต๊ะ', 'กระเทียมสับ' => '1 ช้อนโต๊ะ',
        'ซอสปรุงรส' => '½ ช้อนโต๊ะ', 'น้ำตาลทราย' => '1 ช้อนโต๊ะ', 'ซีอิ๊วขาว' => '1 ช้อนโต๊ะ',
        'ซอสเห็ดหอม' => '3 ช้อนโต๊ะ', 'นมข้นจืด' => '½ ถ้วยตวง', 'น้ำเปล่า' => '¼ ถ้วยตวง', 'น้ำมันพืช' => '1 ช้อนโต๊ะ'
    ])),
    new FoodRecipe('สูตรผัดพริกแกง', new Recipe([
        'ถั่วฝักยาวหั่น' => '1 ถ้วย', 'น้ำมันพืช' => '2 ช้อนโต๊ะ', 'น้ำพริกแกงเผ็ด' => '1-2 ช้อนโต๊ะ',
        'น้ำปลา' => '1 ช้อนโต๊ะ', 'น้ำตาลทราย' => '1/2 ช้อนโต๊ะ', 'ใบมะกรูดซอย' => '3 ใบ', 'พริกชี้ฟ้าแดง' => 'ตกแต่ง'
    ]))
];

$menuCategoriesRaw = [
    'ข้าวจานเดียว' => [
        'ข้าวกะเพราไก่', 'ข้าวกะเพราหมู', 'ข้าวกะเพราหมูกรอบ', 'ข้าวกะเพราทะเล', 'ข้าวกะเพราเนื้อ', 'ข้าวกะเพราไข่เยี่ยวม้า',
        'ข้าวผัดหมู', 'ข้าวผัดไก่', 'ข้าวผัดกุ้ง', 'ข้าวผัดปู', 'ข้าวผัดทะเล', 'ข้าวผัดพริกแกงหมู', 'ข้าวผัดพริกแกงไก่',
        'ข้าวผัดพริกแกงทะเล', 'ข้าวผัดน้ำพริกเผา', 'ข้าวผัดต้มยำ', 'ข้าวผัดอเมริกัน', 'ข้าวหมูกระเทียม', 'ข้าวไก่กระเทียม',
        'ข้าวกุ้งกระเทียม', 'ข้าวหมูทอดน้ำปลา', 'ข้าวหมูทอดไข่ดาว', 'ข้าวหมูผัดพริกไทยดำ', 'ข้าวไก่ผัดพริกไทยดำ', 'ข้าวหมูผัดขิง',
        'ข้าวไก่ผัดขิง', 'ข้าวหมูผัดพริกหยวก', 'ข้าวไก่ผัดเม็ดมะม่วง', 'ข้าวหมูผัดเปรี้ยวหวาน', 'ข้าวไก่ผัดเปรี้ยวหวาน', 'ข้าวผัดคะน้าหมูกรอบ',
        'ข้าวหมูแดง', 'ข้าวหมูกรอบ', 'ข้าวขาหมู', 'ข้าวมันไก่', 'ข้าวมันไก่ทอด', 'ข้าวไข่เจียวหมูสับ', 'ข้าวไข่เจียวกุ้ง',
        'ข้าวไข่เจียวแหนม', 'ข้าวไข่ข้นกุ้ง', 'ข้าวไข่ข้นหมู', 'ข้าวไข่ข้นแฮมชีส', 'ข้าวราดแกงเขียวหวานไก่', 'ข้าวราดพะแนงหมู',
        'ข้าวราดมัสมั่นเนื้อ', 'ข้าวราดแกงเผ็ดเป็ดย่าง', 'ข้าวราดแกงป่าไก่', 'ข้าวราดผัดฉ่าทะเล', 'ข้าวราดผัดเผ็ดหมูป่า', 'ข้าวปลาหมึกผัดไข่เค็ม'
    ],
    'เมนูเส้น' => [
        'ผัดไทย', 'ผัดไทยกุ้งสด', 'ผัดซีอิ๊วหมู', 'ผัดซีอิ๊วไก่', 'ผัดซีอิ๊วทะเล', 'ราดหน้าหมู', 'ราดหน้าไก่', 'ราดหน้าทะเล',
        'ก๋วยเตี๋ยวคั่วไก่', 'ก๋วยเตี๋ยวคั่วทะเล', 'มาม่าผัดขี้เมา', 'มาม่าผัดต้มยำ', 'สุกี้แห้งหมู', 'สุกี้แห้งทะเล', 'สุกี้น้ำหมู',
        'สุกี้น้ำไก่', 'เส้นใหญ่ผัดซีอิ๊ว', 'เส้นหมี่ผัดซีอิ๊ว', 'เส้นหมี่ผัดกระเฉด', 'ผัดหมี่ซั่ว', 'วุ้นเส้นผัดไข่', 'ตำเส้นเล็ก',
        'ตำซั่ว', 'ยำขนมจีน', 'ยำวุ้นเส้น', 'ยำมาม่า'
    ],
    'ต้ม แกง และอื่นๆ' => [
        'ต้มยำกุ้ง', 'ต้มยำรวมมิตร', 'ต้มแซ่บกระดูกอ่อน', 'ต้มจืดเต้าหู้หมูสับ', 'ต้มจืดวุ้นเส้น', 'แกงจืดตำลึงหมูสับ',
        'แกงเขียวหวานไก่', 'แกงพะแนงหมู', 'แกงมัสมั่นเนื้อ', 'แกงส้มชะอมไข่', 'แกงส้มแป๊ะซะ', 'แกงป่าหมู',
        'แกงเลียงกุ้งสด', 'แกงเผ็ดหมู', 'แกงคั่วหอยขม', 'แกงไตปลา', 'ไข่ตุ๋น', 'ไข่พะโล้', 'คอหมูย่างน้ำจิ้มแจ่ว',
        'ไก่ทอดเกลือ', 'หมูสามชั้นทอดน้ำปลา', 'หมูกรอบผัดพริกเกลือ', 'หมูสับผัดไข่เค็ม', 'กุ้งผัดผงกะหรี่'
    ]
];

$menuCategories = [];
foreach ($menuCategoriesRaw as $categoryName => $menus) {
    $menuCategories[$categoryName] = array_map(function($menuName) use ($categoryName) {
        return FoodItem::create($menuName, $categoryName);
    }, $menus);
}

$icons = [
    'ข้าวจานเดียว' => '🍛',
    'เมนูเส้น' => '🍜',
    'ต้ม แกง และอื่นๆ' => '🍲'
];
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>100 เมนูอาหารตามสั่ง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fafafa;
            font-family: 'Prompt', sans-serif;
            color: #333;
        }
        .text-brand { color: #d9381e; } /* สีแดงตุ่นๆ แบบร้านอาหาร */
        .card-custom {
            border: 1px solid rgba(0,0,0,0.05);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s;
        }
        .card-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        }
        .menu-item-box {
            background-color: #ffffff;
            border: 1px solid #eee;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        
        <header class="text-center mb-5 pb-3">
            <h1 class="display-4 fw-bold text-dark mb-3">✨ <span class="text-brand">100 เมนู</span>อาหารตามสั่ง ✨</h1>
            <p class="lead text-secondary">แจกลิสต์เก็บไว้อ่านเวลาคิดไม่ออกว่าจะกินอะไรดี พร้อมสูตรเด็ด 6 เมนูพื้นฐาน</p>
        </header>

        <!-- ส่วนที่ 1: สูตรอาหารแนะนำ -->
        <section class="mb-5 pb-4">
            <div class="d-flex align-items-center mb-4">
                <h3 class="fw-bold mb-0 me-3">🍳 สูตรอาหารแนะนำ</h3>
                <div class="flex-grow-1 border-bottom" style="opacity: 0.2;"></div>
            </div>
            
            <div class="row g-4">
                <?php foreach($recipesList as $foodRecipe): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom h-100 shadow-sm bg-white rounded-4">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-dark mb-3"><?= htmlspecialchars($foodRecipe->getName()) ?></h5>
                            <ul class="list-group list-group-flush small">
                                <?php foreach($foodRecipe->getRecipe()->getIngredients() as $ingredient => $amount): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent text-secondary border-light">
                                    <?= htmlspecialchars($ingredient) ?>
                                    <span class="badge text-dark bg-light border fw-normal"><?= htmlspecialchars($amount) ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ส่วนที่ 2: 100 เมนูอาหาร    -->
        <section>
            <div class="d-flex align-items-center mb-4">
                <h3 class="fw-bold mb-0 me-3">📖 ลิสต์ 100 เมนู</h3>
                <div class="flex-grow-1 border-bottom" style="opacity: 0.2;"></div>
            </div>

            <div class="row g-4">
                <?php 
                $itemNumber = 1;
                foreach ($menuCategories as $categoryName => $foodItems): 
                    $icon = $icons[$categoryName] ?? '🍽️';
                ?>
                <div class="col-12">
                    <div class="card card-custom border-0 shadow-sm bg-white rounded-4 mb-2">
                        <div class="card-header bg-transparent border-0 pt-4 pb-2 px-4">
                            <h4 class="fw-bold text-dark mb-0"><?= $icon ?> <?= htmlspecialchars($categoryName) ?></h4>
                        </div>
                        <div class="card-body px-4 pb-4">
                            <div class="row g-3">
                                <?php foreach ($foodItems as $foodItem): ?>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="menu-item-box p-3 rounded-3 d-flex align-items-center h-100">
                                        <span class="badge bg-dark text-white rounded-pill me-3 px-3 py-2 fw-normal" style="min-width: 50px;">
                                            <?= sprintf("%03d", $itemNumber++) ?>
                                        </span>
                                        <span class="text-dark fw-medium"><?= htmlspecialchars($foodItem->getName()) ?></span>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>