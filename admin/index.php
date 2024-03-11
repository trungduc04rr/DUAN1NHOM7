<?php 
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "header.php";
if(isset($_GET['act'])&&($_GET['act']!="")){
    $act=$_GET['act'];

    switch ($act) {
        case 'listdm':
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw='';
            }
            $listdm=load_all_dm($kyw);
            include "danhmuc/list.php";
            break;
        case 'adddm':
            $tendmErr="";
            if(isset($_POST['submit'])){
                $tendm=$_POST['tendm'];
                if(empty(trim($tendm))){
                    $tendmErr="Vui lòng nhập tên danh mục !";
                }else{
                        insert_dm($tendm);      
                }
            }
            include "danhmuc/add.php";
            break;
            // sửa dm
        case 'updatedm':
            $tendmErr="";
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                $dm=load_one_dm($id);
                if($dm){
                    $id=$dm['id'];
                    $tendm=$dm['tendm'];
                }
            }
            if(isset($_POST['submit'])){
                $id=$_POST['id'];
                $tendm=$_POST['tendm'];
                if(empty(trim($tendm))){
                    $tendmErr="Vui lòng nhập tên danh mục !";
                }else{
                        update_dm($id,$tendm);
                        echo '<script>
                            alert("Bạn đã sửa danh mục thành công !");
                            window.location.href="?act=listdm";
                        </script>';
                    
                }
            }
            include "danhmuc/update.php";
            break;  
        case 'xoadm':
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                $listsp=load_one_spdm($id);
                foreach ($listsp as $sp) {
                    delete_sp_dm($sp['iddm']);
                }
                delete_dm($id);
                echo '<script>
                        alert("Bạn đã xóa danh mục thành công !");
                        window.location.href="?act=listdm";
                    </script>';
            }
            include "danhmuc/list.php";
            break;    
        // SẢN PHẨM
        case 'listsp':
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            if(isset($_GET['page'])&&($_GET['page']!="")) $page=$_GET['page'];
            else $page=1;
            $tongsp=dem_sp();
            $listsp=load_all_sp($kyw,$page);
            include "sanpham/list.php";
            break;
            // thêm sp
            case 'addsp':
                $tenspErr="";
                $imageErr="";
                $motaErr="";
                if(isset($_POST['submit'])){
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $image=basename($_FILES['image']['name']);
                    $soluong=$_POST['soluong'];
                    $khuyenmai=$_POST['khuyenmai'];
                    $mota=$_POST['mota'];
                    $danhmuc=$_POST['danhmuc'];
                    $check=true;
                    if(empty(trim($tensp))){
                        $tenspErr="Vui lòng nhập tên sản phẩm !";
                        $check=false;
                    }
                    if(empty(trim($mota))){
                        $motaErr="Vui lòng nhập mô tả sản phẩm !";
                        $check=false;
                    }
                    if(empty($giasp)) $giasp=1;
                    if(empty($soluong)) $soluong=1;
                    if(empty($khuyenmai)) $khuyenmai=0;
                    $giakm=intval($giasp)*((100-intval($khuyenmai))/100);
                    if(empty($image)){
                        $check=false;
                        $imageErr="Vui lòng uploads file ảnh !";
                    }else{
                        $file_tmp=$_FILES['image']['tmp_name'];
                        $target_file="../uploads/".$image;
                        $extension=pathinfo($target_file,PATHINFO_EXTENSION);
                        if(!in_array($extension,["png","jpeg","jpg","webp"])){
                            $check=false;
                            $imageErr="File không đúng định dạng !";
                        }else{
                            if($check){
                                move_uploaded_file($file_tmp,$target_file);
                            }
                        }
                    }
                    if($check){
                        insert_sp($danhmuc, $tensp, $giasp, $image,$giakm, $soluong,$khuyenmai, $mota);                 
                    }
                }
                $listdm=load_all_dm("");
                include "sanpham/add.php";
                break; 
                // sửa sp
            case 'updatesp':
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                $sp=load_one_sp($id);
                if($sp){
                    $id=$sp['id'];
                    $oldImage=$sp['image'];
                    $tensp=$sp['tensp'];
                    $giasp=$sp['giasp'];
                    $soluong=$sp['soluong'];
                    $khuyenmai=$sp['khuyenmai'];
                    $mota=$sp['mota'];
                    $danhmuc=$sp['iddm'];
                }
            }
            $tenspErr="";
            $imageErr="";
            $trangthai=0;
            if(isset($_POST['submit'])){
                $id=$_POST['id'];
                $oldImage=$_POST['oldImage'];
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $image=basename($_FILES['image']['name']);
                $soluong=$_POST['soluong'];
                $khuyenmai=$_POST['khuyenmai'];
                $mota=$_POST['mota'];
                $danhmuc=$_POST['danhmuc'];
                $check=true;
                if(empty(trim($tensp))){
                    $tenspErr="Vui lòng nhập tên sản phẩm !";
                    $check=false;
                }
                if(empty($giasp)||($giasp<1)) $giasp=1;
                if(empty($khuyenmai)||($khuyenmai<0)) $khuyenmai=0;
                if(empty($soluong)||($soluong<0)){$soluong=0;$trangthai=1;}
                $giakm=intval($giasp)*((100-intval($khuyenmai))/100);
                if(empty($image)){
                    $image=$oldImage;
                }else{
                    $file_tmp=$_FILES['image']['tmp_name'];
                    $target_file="../uploads/".$image;
                    $extension=pathinfo($target_file,PATHINFO_EXTENSION);
                    if(!in_array($extension,["png","jpeg","jpg","webp"])){
                        $check=false;
                        $imageErr="File không đúng định dạng !";
                    }else{
                        if($check){
                            move_uploaded_file($file_tmp,$target_file);
                            unlink("../uploads/".$oldImage);
                        }
                    }
                }
                if($check){
                    update_sp($id,$danhmuc,$tensp,$giasp,$giakm,$image,$oldImage,$soluong,$khuyenmai,$mota,$trangthai);
                    echo '<script>
                        alert("Bạn đã sửa sản phẩm thành công !");
                        window.location.href="?act=listsp";
                    </script>';
                }
            }
            $listdm=load_all_dm("");
            include "sanpham/update.php";
            break;    
            // xóa sp
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']!="")){
                    $id=$_GET['id'];
                    $sp=load_one_sp($id);
                    if($sp){
                        unlink("../uploads/".$sp['image']);
                        delete_sp($sp['id']);
                        echo '<script>
                            alert("Bạn đã xóa sản phẩm thành công !");
                            window.location.href="?act=listsp";
                        </script>';
                    }
                }
                $listsp=load_all_sp("",0);
                include "sanpham/list.php";
                break;

        default:
        include "home.php";
            break;
    }
}else {
    include "home.php";
}

include "footer.php";
//hello 
?>