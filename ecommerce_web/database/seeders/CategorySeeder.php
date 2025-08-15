<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Văn học Việt Nam',
                'description' => 'Tuyển tập các tác phẩm văn học của các tác giả Việt Nam nổi tiếng'
            ],
            [
                'name' => 'Văn học nước ngoài',
                'description' => 'Những tác phẩm văn học kinh điển và hiện đại từ các nước trên thế giới'
            ],
            [
                'name' => 'Kinh tế',
                'description' => 'Sách về kinh tế, quản trị kinh doanh, khởi nghiệp và đầu tư'
            ],
            [
                'name' => 'Công nghệ thông tin',
                'description' => 'Sách lập trình, phát triển phần mềm, AI và các công nghệ mới'
            ],
            [
                'name' => 'Tâm lý - Kỹ năng sống',
                'description' => 'Sách về phát triển bản thân, tâm lý học và các kỹ năng sống'
            ],
            [
                'name' => 'Lịch sử',
                'description' => 'Sách về lịch sử Việt Nam và thế giới, nhân vật lịch sử'
            ],
            [
                'name' => 'Khoa học - Kỹ thuật',
                'description' => 'Sách về các ngành khoa học tự nhiên, kỹ thuật và công nghệ'
            ],
            [
                'name' => 'Thiếu nhi',
                'description' => 'Sách dành cho trẻ em, truyện tranh và sách giáo dục sớm'
            ],
            [
                'name' => 'Học ngoại ngữ',
                'description' => 'Sách học tiếng Anh, tiếng Trung, tiếng Nhật và các ngôn ngữ khác'
            ],
            [
                'name' => 'Tiểu sử - hồi ký',
                'description' => 'Sách về  tiểu sử hồi ký '
            ],
            [
                'name' => 'Du lịch',
                'description' => 'Sách hướng dẫn du lịch, cẩm nang du lịch các vùng miền'
            ],
            [
                'name' => 'Nấu ăn',
                'description' => 'Sách dạy nấu ăn, công thức món ăn truyền thống và hiện đại'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
