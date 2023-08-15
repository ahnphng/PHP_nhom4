<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize ps-3">Quản lý danh mục</h6>
                                <a class="btn btn-success mx-3" href="admin/category/create">Thêm mới</a>
                            </div>
                            <form method="GET">
                                <div class="input-group input-group-outline ps-3 d-flex" style="width: 30%">
                                    <input type="text" name="s" placeholder="Tìm kiếm theo tiêu đề" class="form-control bg-white" value="">
                                    <button class="btn btn-info mb-0">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tiêu đề</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày cập nhật</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Active</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Place your table rows here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- Pagination here -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeStatus(e) {
            let id = e.getAttribute('data-id');
            let active = 1 - e.getAttribute('data-active');
            window.location.href = `path/to/your/update/script?id=${id}&active=${active}`;
        }
    </script>
</body>
</html>
