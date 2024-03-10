<!-- Begin Page Content -->
<link rel="stylesheet" type="text/css" href="../style/listdm.css">
<div class="container-fluid listdm">

    <form action="?act=listdm" method="post">
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right"> 
                <h1 class="h3 mb-2 text-gray-800 mb-5 animated">Danh sách danh mục</h1>

                    <div class="input-group">
                        <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="search">
                               Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã loại</th>
                                <th>Tên danh mục</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listdm as $dm) {
                                    extract($dm);
                                    echo '<tr>
                                            <td class="">'.$id.'</td>
                                            <td>'.$tendm.'</td>
                                            <td class=""><a href="?act=updatedm&id='.$id.'"><button type="button" class="btn btn-secondary btn-sm">Sửa</button></a> | 
                                                <a onclick="return confirm(\'Bạn có muốn xóa không?\')" href="?act=xoadm&id='.$id.'"><button type="button" class="btn btn-secondary btn-sm">Xóa</button></a></td>
                                        </tr>';
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <a href="?act=adddm"><button type="button" class="btn btn-secondary btn-sm">Nhập thêm</button></a>
        </div>
    </form>
</div>
<!--  -->
