<?php
require_once (__DIR__ . '/../class/classTypesBd.php');
$post = array();
isset($_POST["submit"]) ? $post = (array)$_POST : $post = null;
if ($post != null) {
    $post['supports'] = json_encode($post['supports']);
    $bd = new TypesBd();
    $add = $bd->insert($post);
}
?>
<div class="row justify-content-center">
    <?php if ($post != null) { ?>
        <div class="col-12 col-md-8">
            <p><?php echo $add; ?></p>
        </div>
    <?php } else { ?>
        <div class="col-12 col-md-8">
            <h2>Adicionar</h2>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="name">Nome: </label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="singular_name">singular_name: </label>
                    <input type="text" name="singular_name" id="singular_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="menu_name">menu_name: </label>
                    <input type="text" name="menu_name" id="menu_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name_admin_bar">name_admin_bar: </label>
                    <input type="text" name="name_admin_bar" id="name_admin_bar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="add_new">add_new: </label>
                    <input type="text" name="add_new" id="add_new" class="form-control">
                </div>
                <div class="form-group">
                    <label for="add_new_item">add_new_item: </label>
                    <input type="text" name="add_new_item" id="add_new_item" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edit_item">edit_item: </label>
                    <input type="text" name="edit_item" id="edit_item" class="form-control">
                </div>
                <div class="form-group">
                    <label for="view_item">view_item: </label>
                    <input type="text" name="view_item" id="view_item" class="form-control">
                </div>
                <div class="form-group">
                    <label for="all_items">all_items: </label>
                    <input type="text" name="all_items" id="all_items" class="form-control">
                </div>
                <div class="form-group">
                    <label for="search_items">search_items: </label>
                    <input type="text" name="search_items" id="search_items" class="form-control">
                </div>
                <div class="form-group">
                    <label for="parent_item_colon">parent_item_colon: </label>
                    <input type="text" name="parent_item_colon" id="parent_item_colon" class="form-control">
                </div>
                <div class="form-group">
                    <label for="not_found">not_found: </label>
                    <input type="text" name="not_found" id="not_found" class="form-control">
                </div>
                <div class="form-group">
                    <label for="not_found_in_trash">not_found_in_trash: </label>
                    <input type="text" name="not_found_in_trash" id="not_found_in_trash" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">description: </label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="public" id="public" value="1" class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="public">
                                public
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="publicly_queryable" value="1" id="publicly_queryable"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="publicly_queryable">
                                publicly_queryable
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="show_ui" id="show_ui" value="1" class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="show_ui">
                                show_ui
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="show_in_menu" value="1" id="show_in_menu"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="show_in_menu">
                                show_in_menu
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="query_var" id="query_var" value="1" class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="query_var">
                                query_var
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rewrite">rewrite: </label>
                    <input type="text" name="rewrite" id="rewrite" class="form-control">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="has_archive" id="has_archive" value="1"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="query_var">
                                has_archive
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="hierarchical" id="hierarchical" value="1"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="hierarchical">
                                hierarchical
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="menu_position">menu_position: </label>
                    <input type="number" step="1" min="1" name="menu_position" id="menu_position" class="form-control">
                </div>
                <div class="form-group">
                    <label for="menu_icon">menu_icon: </label>
                    <input type="text" name="menu_icon" id="menu_icon" class="form-control">
                </div>
                <div class="form-group">
                    <label>supports</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="supports[]" id="title" value="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="title">
                                title
                            </label>
                        </div>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="supports[]" id="editor" value="editor"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="editor">
                                editor
                            </label>
                        </div>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="supports[]" id="thumbnailr" value="thumbnail"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="thumbnail">
                                thumbnail
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="show_in_rest" id="show_in_rest" value="1"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="query_var">
                                show_in_rest
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-md">
                    Criar post type
                </button>
            </form>
        </div>
        <?php } ?>
    </div>
