<?phpinclude("cnn.php");$id = "";if(isset($_REQUEST["id"])) $id = $_REQUEST["id"];$action = $_REQUEST["action"];$categoryname = $_REQUEST["categoryname"];if($action == "insert"){	mysql_query("INSERT INTO mxm_categories (categorie_name) VALUES ('" . $categoryname . "')");}if($action == "edit"){	mysql_query("UPDATE mxm_categories SET categorie_name='" . $categoryname . "' WHERE id_cat=" . $id);}if($action == "delete"){	mysql_query("DELETE FROM mxm_categories WHERE id_cat=" . $id);}$host  = $_SERVER['HTTP_HOST'];$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');$extra = 'blog_category.php';header("Location: http://$host$uri/$extra");?>