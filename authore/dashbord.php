<?php
require_once '../signup/config_seesion.inc.php';  
if (!isset($_SESSION['user_id'])) {
    header('Location: ../signup/sign_index.php?error=unauthorized');
    exit();
}

include '../signup/header_author.php';
?>
<main class="main_dash">
    <div class="table">
        <div class="table_header">
            <div class="adddd">
              <form action="creat_post.php"><button class="add_new"  >+Add new</button>
              </form>
            </div>
        </div>

        <div class="tables_section">
            <table>
                <thead>
                    <tr>
                        <th>Arc.title</th>
                        <th>vues</th>
                        <th>commentaires</th>
                        <th>likes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
        </div>
    </div>
</main>
