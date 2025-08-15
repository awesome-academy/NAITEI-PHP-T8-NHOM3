<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy category IDs
        $categories = Category::pluck('id', 'name');

        $products = [
            // Văn học Việt Nam
            [
                'name' => 'Tôi thấy hoa vàng trên cỏ xanh',
                'author' => 'Nguyễn Nhật Ánh',
                'description' => 'Cuốn tiểu thuyết hay nhất của Nguyễn Nhật Ánh kể về tuổi thơ với những kỷ niệm đẹp đẽ ở quê hương.',
                'price' => 89000,
                'category_id' => $categories['Văn học Việt Nam'],
                'stock' => 50,
                'image_url' => 'https://www.nxbtre.com.vn/Images/Book/NXBTreStoryFull_08352010_033550.jpg'
            ],
            [
                'name' => 'Dế Mèn phiêu lưu ký',
                'author' => 'Tô Hoài',
                'description' => 'Tác phẩm kinh điển của văn học thiếu nhi Việt Nam về cuộc phiêu lưu của chú dế Mèn.',
                'price' => 65000,
                'category_id' => $categories['Thiếu nhi'],
                'stock' => 75,
                'image_url' => 'https://media.thuvien.edu.vn/v_lib/upload/48000836/default-forder/2024/10/67111d08e8c91a001dfd2733.jpg'
            ],
            [
                'name' => 'Truyện Kiều',
                'author' => 'Nguyễn Du',
                'description' => 'Tác phẩm bất hủ của đại thi hào Nguyễn Du, được coi là kiệt tác của văn học Việt Nam.',
                'price' => 120000,
                'category_id' => $categories['Văn học Việt Nam'],
                'stock' => 30,
                'image_url' => 'https://www.nxbtre.com.vn/Images/Book/NXBTreStoryFull_03462015_104616.jpg'
            ],
            [
                'name' => 'Số đỏ',
                'author' => 'Vũ Trọng Phụng',
                'description' => 'Tiểu thuyết phê phán hiện thực sắc bén về xã hội Việt Nam đầu thế kỷ 20.',
                'price' => 95000,
                'category_id' => $categories['Văn học Việt Nam'],
                'stock' => 25,
                'image_url' => 'https://cdn1.fahasa.com/media/catalog/product/s/o/so-do_vu-trong-phung_1.jpg'
            ],
            [
                'name' => 'Chí Phèo',
                'author' => 'Nam Cao',
                'description' => 'Truyện ngắn nổi tiếng về số phận bi thảm của người nông dân nghèo.',
                'price' => 45000,
                'category_id' => $categories['Văn học Việt Nam'],
                'stock' => 60,
                'image_url' => 'https://product.hstatic.net/200000017360/product/chi-pheo_72e3f1370e484cf49b0fc94ee4ce0f80_master.jpg'
            ],

            // Văn học nước ngoài
            [
                'name' => 'Harry Potter và Hòn đá Phù thủy',
                'author' => 'J.K. Rowling',
                'description' => 'Cuốn sách đầu tiên trong series Harry Potter nổi tiếng thế giới.',
                'price' => 150000,
                'category_id' => $categories['Văn học nước ngoài'],
                'stock' => 80,
                'image_url' => 'https://www.nxbtre.com.vn/Images/Book/nxbtre_full_21542017_035423.jpg'
            ],
            [
                'name' => 'Không gia đình',
                'author' => 'Hector Malot',
                'description' => 'Tiểu thuyết cảm động về cậu bé Remi và cuộc hành trình tìm kiếm gia đình.',
                'price' => 78000,
                'category_id' => $categories['Văn học nước ngoài'],
                'stock' => 40,
                'image_url' => 'https://product.hstatic.net/200000017360/product/z5768061127935_ffce9e0948bdc6f7a0260d5debfde0ac_5e83f9e368254a02b99ba5f0a25bebb8.jpg'
            ],
            [
                'name' => '1984',
                'author' => 'George Orwell',
                'description' => 'Tiểu thuyết kinh điển về chủ nghĩa toàn trị và sự kiểm soát xã hội.',
                'price' => 110000,
                'category_id' => $categories['Văn học nước ngoài'],
                'stock' => 35,
                'image_url' => 'https://comics.vn/img/news/2022/09/larger/1011-1984-1.jpg?v=8882'
            ],
            [
                'name' => 'Sherlock Holmes Toàn tập',
                'author' => 'Arthur Conan Doyle',
                'description' => 'Tuyển tập đầy đủ các câu chuyện về thám tử nổi tiếng Sherlock Holmes.',
                'price' => 250000,
                'category_id' => $categories['Văn học nước ngoài'],
                'stock' => 20,
                'image_url' => 'https://nhasachphuongnam.com/images/detailed/243/sherlock-holmes-toan-tap-tb-2022.jpg'
            ],

            // Tâm lý - Kỹ năng sống
            [
                'name' => 'Đắc nhân tâm',
                'author' => 'Dale Carnegie',
                'description' => 'Cuốn sách kinh điển về nghệ thuật giao tiếp và ứng xử với mọi người.',
                'price' => 86000,
                'category_id' => $categories['Tâm lý - Kỹ năng sống'],
                'stock' => 100,
                'image_url' => 'https://cdn1.fahasa.com/media/catalog/product/d/n/dntttttuntitled.jpg'
            ],
            [
                'name' => 'Atomic Habits',
                'author' => 'James Clear',
                'description' => 'Hướng dẫn xây dựng thói quen tốt và loại bỏ thói quen xấu một cách hiệu quả.',
                'price' => 125000,
                'category_id' => $categories['Tâm lý - Kỹ năng sống'],
                'stock' => 65,
                'image_url' => 'https://pos.nvncdn.com/fd5775-40602/ps/20240107_7xE6cNqlzc.jpeg?v=1704611729'
            ],
            [
                'name' => '7 Thói quen của người thành đạt',
                'author' => 'Stephen Covey',
                'description' => 'Bảy nguyên tắc cơ bản để đạt được thành công trong cuộc sống và sự nghiệp.',
                'price' => 105000,
                'category_id' => $categories['Tâm lý - Kỹ năng sống'],
                'stock' => 45,
                'image_url' => 'https://firstnews.vn/upload/products/original/-1731399166.jpg'
            ],

            // Kinh tế 
            [
                'name' => 'Nghĩ giàu làm giàu',
                'author' => 'Napoleon Hill',
                'description' => 'Cuốn sách kinh điển về tư duy và phương pháp tạo dựng sự giàu có.',
                'price' => 89000,
                'category_id' => $categories['Kinh tế'],
                'stock' => 70,
                'image_url' => 'https://cdn1.fahasa.com/media/catalog/product/n/g/nghigiaulamgiau_110k-01_bia_1.jpg'
            ],
            [
                'name' => 'Dạy con làm giàu',
                'author' => 'Robert Kiyosaki',
                'description' => 'Hướng dẫn cách giáo dục tài chính cho con trẻ từ sớm.',
                'price' => 95000,
                'category_id' => $categories['Kinh tế'],
                'stock' => 55,
                'image_url' => 'https://cdn1.fahasa.com/media/catalog/product/c/o/combo-12112019-7_1.jpg'
            ],
            [
                'name' => 'The Lean Startup',
                'author' => 'Eric Ries',
                'description' => 'Phương pháp khởi nghiệp tinh gọn cho các doanh nghiệp mới.',
                'price' => 135000,
                'category_id' => $categories['Kinh tế'],
                'stock' => 30,
                'image_url' => 'https://salt.tikicdn.com/cache/w1200/ts/product/99/df/29/8ef1fb67e07d24037c10a128c9fe647c.jpg'
            ],

            // Công nghệ thông tin
            [
                'name' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'Hướng dẫn viết code sạch và dễ bảo trì cho các lập trình viên.',
                'price' => 165000,
                'category_id' => $categories['Công nghệ thông tin'],
                'stock' => 40,
                'image_url' => 'https://cdn1.fahasa.com/media/catalog/product/8/9/8936107813361.jpg'
            ],
            [
                'name' => 'Design Patterns',
                'author' => 'Gang of Four',
                'description' => 'Các mẫu thiết kế phần mềm cơ bản mà mọi lập trình viên nên biết.',
                'price' => 185000,
                'category_id' => $categories['Công nghệ thông tin'],
                'stock' => 25,
                'image_url' => 'https://d1iv5z3ivlqga1.cloudfront.net/wp-content/uploads/2023/10/31153710/51JYkEpbhzL-1.jpeg'
            ],
            [
                'name' => 'JavaScript: The Good Parts',
                'author' => 'Douglas Crockford',
                'description' => 'Hướng dẫn sử dụng JavaScript một cách hiệu quả và chuyên nghiệp.',
                'price' => 145000,
                'category_id' => $categories['Công nghệ thông tin'],
                'stock' => 35,
                'image_url' => 'https://codeaholicguy.com/wp-content/uploads/2016/06/images.jpeg?w=228&h=300'
            ],

            // Lịch sử
            [
                'name' => 'Sapiens: Lược sử loài người',
                'author' => 'Yuval Noah Harari',
                'description' => 'Cuộc hành trình từ động vật đến thần linh của loài người qua các thời kỳ lịch sử.',
                'price' => 155000,
                'category_id' => $categories['Lịch sử'],
                'stock' => 60,
                'image_url' => 'https://khosachhay247.com/wp-content/uploads/2024/10/bia-sach-luoc-su-loai-nguoi.jpg-300x300.webp'
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
