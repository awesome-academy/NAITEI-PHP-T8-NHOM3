# Introduction

Tài liệu API cho quản lý Order (Đơn hàng).

<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>

    Tài liệu này cung cấp thông tin chi tiết về API Order của hệ thống e-commerce.
    
    ## Xác thực
    API yêu cầu xác thực người dùng. Sử dụng session authentication hoặc token-based authentication.
    
    ## Phân quyền
    - **User**: Có thể xem và tạo đơn hàng của riêng mình
    - **Admin**: Có thể xem tất cả đơn hàng, cập nhật trạng thái và xem thống kê
    
    ## Trạng thái đơn hàng
    - `pending`: Chờ xử lý
    - `processing`: Đang xử lý
    - `completed`: Hoàn thành
    - `cancelled`: Đã hủy
    - `return`: Trả hàng

    <aside>Khi bạn cuộn, bạn sẽ thấy các ví dụ code để làm việc với API trong các ngôn ngữ lập trình khác nhau ở phía bên phải.</aside>

