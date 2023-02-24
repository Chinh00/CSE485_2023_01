<?
    session_start();
    if ($_SESSION["isLogin"] != 1){
        header("Location: ../../../../login.php");
        
    } 
?>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" aria-current="page" href="./">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Trang ngoài</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../../BTTH01_CSE485/admin/category/category.php">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../../BTTH01_CSE485/admin/author/author.php">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../../BTTH01_CSE485/admin/article/article.php">Bài viết</a>
                        </li>
                        <li class="nav-item right">
                            
                        </li>
                        
                    </ul>
                    <div class="d-flex">
                        <?php 
                        session_start();
                        if (isset($_SESSION["isLogin"])) {
                            if ($_SESSION["isLogin"] == 1){
                                ?>
                                    <!-- Example single danger button -->
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION["role"] ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../../BTTH01_CSE485/admin/process_admin.php">Đăng xuất</a></li>
                                    
                                </ul>
                                </div>
                                <?php
                            } else {
                                header("Location: ../../../../BTTH01_CSE485/login.php");
                            }
                        } else {
                            header("Location: ../../../../BTTH01_CSE485/login.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>