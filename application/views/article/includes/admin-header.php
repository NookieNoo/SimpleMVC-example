<div id="adminHeader">
    <h2>Widget News Admin</h2>
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['user']['userName']) ?></b>.
        <?php if ($_SESSION['user']['role']=='admin') echo "
        <a href='?route=articles/editlist'>Edit Articles</a> 
        <a href='?route=categories/index'>Edit Categories</a> 
        <a href='?route=admin/adminusers/index'?>View Users</a>
        <a href='?route=subcategories/index'?>View SubCategories</a>
        "?>
        <a href="?route=login/logout"?>Log Out</a>
    </p>
</div>