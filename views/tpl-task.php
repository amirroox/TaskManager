<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task manager UI</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body style="background-image : url('../assets/img/gradient.png') ;">
<!-- partial:index.partial.html -->
<div class="page">
    <div class="pageHeader">
        <div class="title">Dashboard</div>
        <div class="userPanel">
            <a href="?LogOut=1"><i class="fa fa-sign-out"></i></a>
            <span class="username"><?= $_SESSION['user_login']['name'] ?></span>
            <img id="profile-img" src="<?=$grav_url?>" alt="profile"/>
        </div>
    </div>
    <div class="main">
        <div class="nav">
            <div class="searchbox">
                <div><i class="fa fa-search"></i>
                    <label>
                        <input type="search" placeholder="Search"/>
                    </label>
                </div>
            </div>
            <form action="javascript:void(0)" class="folderbox" method="get">
                <label>
                    <input type="text" id="name_folder" name="name_folder" placeholder="Add Folder"/>
                </label>
                <button class="fa fa-plus" id="add_folder"></button>
            </form>
            <div class="menu">
                <div class="title">Folders</div>
                <ul id="Result_ajax">
                    <li class="<?= !isset($_GET['Folder_id']) ? 'active' : 'deactivate' ; ?>">
                        <a href="<?=site_url()?>">
                            <i class="fa fa-folder"></i>
                            All
                        </a>
                    </li>
                    <?php foreach ($folders as $value) : ?>
                        <li class="<?= (isset($_GET['Folder_id']) and $_GET['Folder_id'] == $value['id']) ? 'active' : 'deactivate' ; ?>" >
                            <a href="?Folder_id=<?= $value['id'] ?>"><i class="fa fa-folder"></i><?= $value['name'] ?></a>
                            <a style="color: purple" class="a_delete" href="?Delete_folder=<?= $value['id'] ?>"><i class="fa fa-trash-o"></i></a>
                        </li>
                    <?php endforeach; ?>


                </ul>
            </div>
        </div>
        <div class="view">
            <div class="viewHeader">
                <div class="title">Manage Tasks</div>
                <div class="functions">
                    <form method="post" action="javascript:void(1)">
                        <label>
                            <input type="text" id="name_tasks"/>
                        </label>
                        <button class="button active" id="Add_tasks">Add New Task</button>
                    </form>

                </div>
            </div>
            <div class="content">
                <div class="list">
                    <div class="title">Today</div>
                    <ul id="Result_ajax_tasks">
                        <?php if($tasks) : ?>
                            <?php foreach ($tasks as $value) : ?>
                                <li class="<?= $value['status'] ? 'checked' : ''; ?>">
                                    <!--                                <a href="--><?php //=$value['status'].'*'.$value['id']?><!--"></a>    Method 2 - NOT Ajax-->
                                    <i data-isDone="<?=$value['status'].'*'.$value['id']?>" class="isDone fa <?= $value['status'] ? 'fa-check-square-o' : 'fa-square-o'; ?>"></i>
                                    <span><?= $value['title'] ?></span>
                                    <div class="info">
                                        <a href="?Delete_tasks=<?= $value['id'] ?>" class="button green" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                        <span>Created in <?= date("Y-m-d H:i:s",strtotime($value['created_at']))?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li style="display: flex; justify-content: center;" class="no_tasks">
                                <i class="fa fa-asterisk"></i>
                                <span>No Tasks Were Found</span>
                                <i class="fa fa-asterisk"></i>
                            </li>
                        <?php endif ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<script src='<?=site_url('assets/vendor/jquery.min.js')?>'></script>
<script src='<?=site_url('assets/vendor/sweetalert2.js')?>'></script>
<script src="<?=site_url('assets/js/script.js')?>"></script>

</body>
</html>
